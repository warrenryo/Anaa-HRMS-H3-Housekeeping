<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventoryModel\Reorder;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;

class ReorderPointsController extends Controller
{
    public function index(Request $request){
     
        $low_stock = 70;

        $reorder = HousekeepingInventory::when($request['filter_status'] != null, function($q) use($request){
            $q->where('h3_status', $request['filter_status'])->orderBy('id', 'DESC');
        })
        ->where('h3_quantity', '<=', $low_stock)->paginate(10);

        return view('InventoryAdmin.reorderPoints.reorderPointsIndex', [
            'reorder' => $reorder,
        ]);
    }

    public function reorderView($id){
        $item = HousekeepingInventory::find($id);

        return view('InventoryAdmin.reorderPoints.reorderInvoice', compact('item'));
    }

    public function submitReorder(Request  $request, $id){
        $item = HousekeepingInventory::find($id);

        try {
            $reorder = new Reorder;
            
            $consumer = 'ANAA Hotel and Restaurant';
            $status = 'Pending';
            $submit_reorder = $reorder->create([
                'consumer' => $consumer,
                'item_id' => $item->id,
                'category' => $item->h3_category_name,
                'item_name' => $item->h3_item_name,
                'quantity' => $request['quantity'],
                'status' => $status
            ]);

            if($submit_reorder){

                $pending_order = 'Pending Order';
                $item->update([
                    'h3_status' => $pending_order
                ]);
                Alert::success('Order Submitted', 'Your order has been submitted to the logistics');
                return redirect()->back();
            }else{
                Alert::error('Error', 'Something went wrong');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
                Alert::error('Error', $th->getMessage());
                return redirect()->back();
        }   
    }


    public function pendingIndex(){
        $reorder = Reorder::where('status', 'Pending Order')
            ->orWhere('status', 'Approved')
            ->orWhere('status', 'On-Delivery')
            ->orWhere('status', 'Pending Complete')
            ->orWhere('status', 'Completed')
            ->orWhere('status', 'Claimed')->get();
        return view('InventoryAdmin.reorderPoints.pendingIndex', compact('reorder'));
    }

    public function cancelOrder($id){
        $reorder = Reorder::find($id);
    
        try {
            if($reorder){
                $reorder->delete();

                $update_status = HousekeepingInventory::where('id', $reorder->item_id)->first();

                $normal = 'Normal';
                if($update_status){
                    $update_status->update([
                        'h3_status' => $normal,
                    ]);
                }

                Alert::success('Success', 'Rorder items for '.$reorder->item_name.' has been cancelled');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }
}
