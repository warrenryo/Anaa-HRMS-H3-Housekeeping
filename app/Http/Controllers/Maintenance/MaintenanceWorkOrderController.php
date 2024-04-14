<?php

namespace App\Http\Controllers\Maintenance;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLogs\Activities;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MaintenanceModel\MaintenanceRequest;
use Illuminate\Contracts\Foundation\MaintenanceMode;
use App\Models\MaintenanceModel\MaintenanceWorkOrder;
use App\Models\MaintenanceModel\MaintenanceWorkOrderCart;
use App\Models\InventoryModel\InventoryItems\MaintenanceInventory;

class MaintenanceWorkOrderController extends Controller
{
    public function createMaintenanceOrder($code)
    {
        $maintenance_request = MaintenanceRequest::where('h3_request_code', $code)->first();
        $maintenance_staff = User::where('role', 'Maintenance')->get();
        $maintenance_inventory = MaintenanceInventory::all();
        $maintenance_added_cart = MaintenanceWorkOrderCart::where('h3_m_request_code', $code)->get();

        return view('MaintenanceAdmin.maintenanceWorkOrder.maintenanceWorkOrderIndex', [
            'maintenance_request' => $maintenance_request,
            'maintenance_staff' => $maintenance_staff,
            'maintenance_inventory' => $maintenance_inventory,
            'maintenance_added_cart' => $maintenance_added_cart
        ]);
    }

    public function addItemsToCart(Request $request, $id, $code)
    {
        $quantity = $request['quantity'];

        if (MaintenanceWorkOrderCart::where('h3_m_request_code', $code)->where('h3_inventory_item_id', $id)->exists()) {
            $cart_code = MaintenanceWorkOrderCart::where('h3_m_request_code', $code)->where('h3_inventory_item_id', $id)->first();
            $maintenance_inventory = MaintenanceInventory::where('id', $cart_code->h3_inventory_item_id)->first();
            $itemExist = $cart_code->h3_quantity + $quantity;

            if ($quantity >= $maintenance_inventory->h3_quantity && $quantity >= $cart_code->h3_quantity) {


                Alert::warning('Warning', 'The selected quantity shall not exceed to the items left.');
                return redirect()->back();
            } else {
                if ($cart_code->h3_quantity >= $maintenance_inventory->h3_quantity || $itemExist > $maintenance_inventory->h3_quantity) {
                    Alert::warning('Warning', 'The selected quantity shall not exceed to the items left.');
                    return redirect()->back();
                } else {
                    $cart_code->update([
                        'h3_quantity' => $itemExist
                    ]);
                    Alert::success('Item Added to Work Order');
                    return redirect()->back();
                }
            }
        } else {
            $m_inventory_quantity = MaintenanceInventory::where('id', $id)->first();
            if ($quantity > $m_inventory_quantity->h3_quantity) {
                Alert::warning('Warning', 'The selected quantity shall not exceed to the items left.');
                return redirect()->back();
            } else {
                MaintenanceWorkOrderCart::create([
                    'h3_m_request_code' => $code,
                    'h3_inventory_item_id' => $id,
                    'h3_quantity' => $quantity
                ]);

                Alert::success('Item Added to Work Order');
                return redirect()->back();
            }
        }
    }

    public function submitMaintenanceWorkOrder(Request $request, $code)
    {
        $user_staff = User::where('user_code', $request['maintenance_staff'])->first();

        if ($request['maintenance_staff'] == null) {
            $request->validate([
                'maintenance_staff' => 'required'
            ]);
            return redirect()->back();
        }

        $status = 'Pending';
        $no_addition_request = 'No Additional Request';
        $task = new MaintenanceWorkOrder;

        $m_work_order = $task->create([
            'h3_maintenance_task_id' => $code,
            'h3_maintenance_staff_code' => $request['maintenance_staff'],
            'h3_maintenance_staff_name' => $user_staff->name,
            'h3_scheduled_time' => $request['scheduled_time'],
            'h3_room_no' => $request['room_no'],
            'h3_maintenance_request' => json_encode($request['maintenance_request']),
            'h3_additional_request' => $request['additional_requests'] == null ? $no_addition_request : $request['additional_requests'],
            'h3_status' => $status
        ]);

        if ($m_work_order) {
            $request_status = 'Work Order Created';
            $maintenance_request = MaintenanceRequest::where('h3_request_code', $code)->first();
            $maintenance_request->h3_status = $request_status;
            $maintenance_request->update();

            $maintenanceCartItem = MaintenanceWorkOrderCart::where('h3_m_request_code', $code)->get();
            
            foreach ($maintenanceCartItem as $item) {
                $m_work_order->mWorkOrderItem()->create([
                    'h3_m_task_id' => $m_work_order->id,
                    'h3_m_inventory' => $item->maintenanceInventory->id,
                    'h3_items' => $item->maintenanceInventory->h3_item_name,
                    'h3_quantity' => $item->h3_quantity
                ]);
                $item->delete();
            }

            foreach($m_work_order->mWorkOrderItem as $inventory){
                $m_inventory_id = MaintenanceInventory::find($inventory->h3_m_inventory);
                $qty_sub = $m_inventory_id->h3_quantity - $inventory->h3_quantity;

                $m_inventory_id->update([
                    'h3_quantity' => $qty_sub
                ]);
            }

            $user = Auth::user()->name;
            $user_role = Auth::user()->role;

            $activity_logs = new Activities;
            $activity_logs->h3_activities = ''.$user.' - '.$user_role.' has created maintenance task '.$m_work_order->h3_m_task_id.' to '.$m_work_order->h3_maintenance_staff_name.'';
            $activity_logs->h3_log_type = 'Task Added';
            $activity_logs->save();
          
            Alert::success('Success', 'Work Order has been added.');
            return redirect('maintenance-admin/maintenance-request-lists');
        }
        
    }
}
