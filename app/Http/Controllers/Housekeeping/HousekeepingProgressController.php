<?php

namespace App\Http\Controllers\Housekeeping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLogs\Activities;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\HousekeepingModel\HousekeepingRequest;
use App\Models\HousekeepingModel\HousekeepingWorkOrder;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;

class HousekeepingProgressController extends Controller
{
    public function index(Request $request){
        //$work_order = HousekeepingWorkOrder::orderBy('id','DESC')->paginate(10);

        $work_order = HousekeepingWorkOrder::when($request['filter_status'] != null, function($q) use($request){
            $q->where('h3_status', $request['filter_status'])->orderBy('id', 'DESC');
        })->orderBy('id', 'DESC')->paginate(15);

        return view('HousekeepingAdmin.housekeepingProgress.housekeeping_progress_index', compact('work_order'));
    }

     //CANCEL THE WORK ORDER TASK AND RETRIEVE THE QUANTITY TO INVENTORY
     public function cancelTask($id){
        $task_id = HousekeepingWorkOrder::where('h3_housekeeping_task_id', $id)->first();
        $status_pending = 'Pending';
        try {
            foreach($task_id->workOrderItem as $item){
                $h_inventory_item = HousekeepingInventory::find($item->h3_h_inventory_id);
                //increment the quantity if the task is cancelled

                if ($h_inventory_item) {
                    // Increment the quantity if the task is canceled
                    $qty_increment = $h_inventory_item->h3_quantity + $item->h3_quantity;
            
                    $h_inventory_item->update([
                        'h3_quantity' => $qty_increment
                    ]);
                }
            }
            
            $h_request = HousekeepingRequest::where('h3_request_code', $id)->first();
            if($h_request){
                $h_request->update([
                    'status' => $status_pending
                ]);
            }

            $task_id->delete();

            $user = Auth::user()->name;
            $user_role = Auth::user()->role;

            $activity_logs = new Activities;
            $activity_logs->h3_activities = 'Task '.$id.' has been cancelled by '.$user.' - '.$user_role.'';
            $activity_logs->h3_log_type = 'Cancelled Task';
            $activity_logs->save();

            Alert::success('Success', 'Task '.$id.' has been successfully cancelled');
            return redirect()->back();

        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    //DELETE SPECIFIC COMPLETED TASK 
    public function deleteCompletedTask($id){
        $task_id = HousekeepingWorkOrder::where('h3_housekeeping_task_id',$id)->first();

        try {
            $task_id->delete();
            
            Alert::success('Success', 'Task '.$task_id->h3_housekeeping_task_id. ' has been deleted successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }       
    }
}
