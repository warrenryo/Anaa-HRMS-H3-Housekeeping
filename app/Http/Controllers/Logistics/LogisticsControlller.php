<?php

namespace App\Http\Controllers\Logistics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;
use App\Models\InventoryModel\Reorder;
use RealRashid\SweetAlert\Facades\Alert;

class LogisticsControlller extends Controller
{
    public function index()
    {
        $reorder = Reorder::where('status', 'Pending')->get();
        return view('logistic.logisticProcurement', compact('reorder'));
    }


    public function approve($id)
    {
        $order = Reorder::find($id);

        $approve = 'Approved';
        if ($order) {
            $order->update([
                'status' =>  $approve
            ]);

            Alert::success('Success', 'The order has been approved');
            return redirect()->back();
        }
    }

    public function approveLists()
    {
        $reorder = Reorder::where('status', 'Approved')->get();
        return view('logistic.logisticApproveIndex', compact('reorder'));
    }

    public function onDelivery($id)
    {
        $order = Reorder::find($id);

        if ($order) {
            $deliver = 'On-Delivery';
            $order->update([
                'status' => $deliver
            ]);
            Alert::success('Success', 'The order has been on delivery status');
            return redirect()->back();
        }
    }

    public function ondeliveryIndex()
    {
        $reorder = Reorder::where('status', 'On-Delivery')
            ->orWhere('status', 'Pending Complete')
            ->get();
        return view('logistic.logisticOnDeliveryIndex', compact('reorder'));
    }

    public function requestingComplete($id)
    {
        $reorder = Reorder::find($id);

        if ($reorder) {
            $requestCompleted = 'Pending Complete';
            $reorder->update([
                'status' => $requestCompleted
            ]);
            Alert::success('Success', 'The order has been processed and waiting for ' . $reorder->consumer . ' to completely received.');
            return redirect()->back();
        }
    }

    public function received($id){
        $reorder = Reorder::find($id);

        if ($reorder) {
            $completed = 'Completed';
            $reorder->update([
                'status' => $completed
            ]);
            Alert::success('Success', 'The order has been completed');
            return redirect()->back();
        }
    }

    public function claim($id){
        $reorder = Reorder::find($id);

        $new_status = 'Claimed';
        if ($reorder) {
            $reorder->update([
                'status' => $new_status
            ]);

            $status = 'Normal';
            $inventory = HousekeepingInventory::where('id', $reorder->item_id)->first();

            $inventory_update = $inventory->h3_quantity + $reorder->quantity;

            $inventory->update([
                'h3_quantity' => $inventory_update,
                'h3_status' => $status
            ]);

            Alert::success('Success', 'The order has been claimed and '.$reorder->quantity. ' has been added to inventory');
            return redirect()->back();
        }
    }
}
