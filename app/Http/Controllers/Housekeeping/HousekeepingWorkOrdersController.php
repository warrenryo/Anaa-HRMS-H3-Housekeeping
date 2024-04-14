<?php

namespace App\Http\Controllers\Housekeeping;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLogs\Activities;
use App\Models\HousekeepingModel\Staff;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\HousekeepingModel\WorkOrderCart;
use App\Models\HousekeepingModel\HousekeepingRequest;
use App\Models\HousekeepingModel\HousekeepingWorkOrder;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;
use App\Notifications\WorkOrderNotification;
use DateTime;
use Illuminate\Support\Facades\Notification;

class HousekeepingWorkOrdersController extends Controller
{
    public function getRequestData($code)
    {
        $h_request_id = HousekeepingRequest::where('h3_request_code', $code)->first();
        $housekeeper = User::where('role', 'Housekeeper')->get();
        $inventory_items = HousekeepingInventory::all();
        $work_order_cart = WorkOrderCart::where('h3_h_request_code', $code)->get();

        return view('HousekeepingAdmin.housekeepingWorkOrders.housekeeping_work_orders', compact('h_request_id', 'housekeeper', 'inventory_items', 'work_order_cart'));
    }

    public function addItemsToCart(Request $request, $id, $code)
    {
        $quantity = $request['quantity'];

        if (WorkOrderCart::where('h3_h_request_code', $code)->where('h3_inventory_item_id', $id)->exists()) {
            $workOrderCode = WorkOrderCart::where('h3_h_request_code', $code)->where('h3_inventory_item_id', $id)->first();

            $itemExist = $workOrderCode->h3_quantity + $quantity;

            $workOrderCode->update([
                'h3_quantity' => $itemExist
            ]);
               
            Alert::success('Item Added to Work Order');
            return redirect()->back();
    
        } else {
            $h_inventory_quantity = HousekeepingInventory::where('id', $id)->first();

            if($quantity > $h_inventory_quantity->h3_quantity){
                Alert::warning('Warning', 'The selected quantity shall not exceed to the items left.');
                return redirect()->back();
            }else{
                WorkOrderCart::create([
                    'h3_h_request_code' => $code,
                    'h3_inventory_item_id' => $id,
                    'h3_quantity' => $quantity
                ]);
    
                Alert::success('Item Added to Work Order');
                return redirect()->back();
            }

        }
    }

    public function submitWorkOrder(Request $request, $code){
        
        $user_staff = User::where('user_code',$request['housekeeper_name'])->first();

        if($request['housekeeper_name'] == null){
            $request->validate([
                'housekeeper_name' => 'required'
            ]);
            return redirect()->back();
        }
        $status = 'Pending';
        $no_additional_request = 'No Additional Requests';
        $task = new HousekeepingWorkOrder;
        
        $work_order = $task->create([
            'h3_housekeeping_task_id' => $code,
            'h3_housekeeper_code' => $request['housekeeper_name'],
            'h3_housekeeper_name' => $user_staff->name,
            'h3_room_no' => $request['room_no'],
            'h3_scheduled_time' => $request['scheduled_time'],
            'h3_housekeeping_request' => json_encode($request['housekeeping_request']),
            'h3_additional_request' => $request['additional_requests'] == null ? $no_additional_request : $request['additional_requests'],
            'h3_items_services' => json_encode($request['items_services']),
            'h3_status' => $status
        ]);

        if($work_order){
            $request_status = 'Work Order Created';
            $housekeeping_request = HousekeepingRequest::where('h3_request_code', $code)->first();
            $housekeeping_request->status = $request_status;
            $housekeeping_request->update();


            $cartItem = WorkOrderCart::where('h3_h_request_code', $code)->get();
            

            foreach($cartItem as $item){
                $work_order->workOrderItem()->create([
                    'h3_task_id' => $work_order->id,
                    'h3_h_inventory_id' => $item->inventoryItem->id,
                    'h3_items' => $item->inventoryItem->h3_item_name,
                    'h3_quantity' => $item->h3_quantity
                ]);
                $item->delete();
            }

            foreach($work_order->workOrderItem as $inventory){
                $h_inventory_id = HousekeepingInventory::find($inventory->h3_h_inventory_id);
                $qty_sub = $h_inventory_id->h3_quantity - $inventory->h3_quantity;

                $h_inventory_id->update([
                    'h3_quantity' => $qty_sub
                ]);
            }

            $user = Auth::user()->name;
            $user_role = Auth::user()->role;

            $auth_user = User::where('user_code', $work_order->h3_housekeeper_code)->pluck('id');
            $notif_user = User::find($auth_user);
            Notification::send($notif_user, new WorkOrderNotification($work_order->h3_room_no, $work_order->h3_scheduled_time));

            $activity_logs = new Activities;
            $activity_logs->h3_activities = ''.$user.' - '.$user_role.' has created housekeeping task '.$work_order->h3_housekeeping_task_id.' to '.$work_order->h3_housekeeper_name.'';
            $activity_logs->h3_log_type = 'Task Added';
            $activity_logs->save();
          
            Alert::success('Success', 'Work Order has been added.');
            return redirect('HousekeepingAdmin/housekeeping-progress');
        }else{
            Alert::error('Error', 'Something went wrong');
            return redirect()->back();
        }
    }

    public function deleteItemCart($id){
        $delete_item = WorkOrderCart::find($id);

        $delete_item->delete();
        
        Alert::success('Item Deleted');
        return redirect()->back();
    }

    public function adminWorkOrder(Request $request){
        $user_staff = User::where('user_code',$request['housekeeper_name'])->first();

        if($request['housekeeper_name'] == null){
            $request->validate([
                'housekeeper_name' => 'required'
            ]);
            return redirect()->back();
        }
        $status = 'Pending';
        $no_additional_request = 'No Additional Requests';
        $task = new HousekeepingWorkOrder;

        $code = mt_rand(10000,99999);
        if($this->orderCode($code)){
            $code =  mt_rand(10000,99999);
        }

        $time_issue = new DateTime($request['time_issue']);
        $formattedTime = $time_issue->format('h:i A');

        $none = 'None';
        $by_admin = 'Yes';
        $work_order = $task->create([
            'h3_housekeeping_task_id' => $code,
            'h3_housekeeper_code' => $request['housekeeper_name'],
            'h3_housekeeper_name' => $user_staff->name,
            'h3_room_no' => $request['room_no'],
            'h3_scheduled_time' => $formattedTime,
            'h3_housekeeping_request' => json_encode([$request['housekeeping_task']]),
            'h3_additional_request' => $request['additional_requests'],
            'h3_by_admin' => $by_admin,
            'h3_items_services' => json_encode([$none]),
            'h3_status' => $status
        ]);

        if($work_order){

            $user = Auth::user()->name;
            $user_role = Auth::user()->role;

            $auth_user = User::where('user_code', $work_order->h3_housekeeper_code)->pluck('id');
            $notif_user = User::find($auth_user);
            Notification::send($notif_user, new WorkOrderNotification($work_order->h3_room_no, $work_order->h3_scheduled_time));

            $activity_logs = new Activities;
            $activity_logs->h3_activities = ''.$user.' - '.$user_role.' has created housekeeping task '.$work_order->h3_housekeeping_task_id.' to '.$work_order->h3_housekeeper_name.'';
            $activity_logs->h3_log_type = 'Task Added';
            $activity_logs->save();
            Alert::success('Task has been created');
            return redirect()->back();
        }else{
            Alert::error('Something went wrong');
            return redirect()->back();
        }
    }

    public function orderCode($code){
        return HousekeepingWorkOrder::whereOrderCode($code);
    }
   
}
