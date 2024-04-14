<?php

namespace App\Http\Controllers\API;

use App\Models\DoorLockModel\DoorKeys;
use App\Models\DoorLockModel\DoorLockLogs;
use App\Models\uid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HousekeepingModel\WorkOrderCart;
use App\Models\HousekeepingModel\HousekeepingRequest;
use App\Models\HousekeepingModel\HousekeepingWorkOrder;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;
use App\Models\InventoryModel\Reorder;

class APIController extends Controller
{
    public function example(){
        $workOrder = HousekeepingWorkOrder::first();
        
        $cart = WorkOrderCart::where('h3_h_request_code', $workOrder->h3_cart_items_id)->get();

        return response()->json($cart);
    }

    public function workOrder(){
        $work_order = HousekeepingWorkOrder::with('workOrderItem')->get();

        return response()->json($work_order);
    }

    public function apiUID(Request $request){
        $uid = new DoorKeys;

        $insertUID = $uid->create([
            'h3_door_key_uid' => $request['UIDresult'],
        ]);
        
    }

    //GET THE DOOR LOGS ACTIVITY
    public function doorLogs(Request $request){
        $uid = new DoorLockLogs;

        $insertLogs = $uid->create([
            'h3_doorLockUID' => $request['UIDresult']
        ]);
    }

    public function items(){
        $items = HousekeepingInventory::all();

        return response()->json($items);
    }

    public function takeOrder(Request $request){
        $order = Reorder::create($request->all());

        if($order){
            return response()->json(['message', 'Success']);
        }
    }

    public function keys(){
        $keys = DoorKeys::select('h3_door_key_uid')->get();

        return response()->json([
            'keys' => $keys
        ]);
    }
}
