<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HousekeepingModel\HousekeepingWorkOrder;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function displayTask(Request $request)
    {
        $user_code = $request->user();
        $tasks = HousekeepingWorkOrder::where('h3_status', 'Pending')->where('h3_housekeeper_code', $user_code->user_code)->with('workOrderItem')->get();

        if ($tasks->isEmpty()) {
            return response()->json(['No Current Task' => 'No tasks have been created'], 404);
        }

        $response = [];

        foreach ($tasks as $task) {
            $response[] = [
                'h3_housekeeping_task_id' => $task->h3_housekeeping_task_id,
                'h3_housekeeper_name' => $task->h3_housekeeper_name,
                'h3_room_no' => $task->h3_room_no,
                'h3_scheduled_time' => $task->h3_scheduled_time,
                'h3_housekeeping_request' => $task->h3_housekeeping_request,
                'h3_items_services' => $task->h3_items_services,
                'h3_additional_request' => $task->h3_additional_request,
                'workOrderItem' =>  $task->workOrderItem->map(function ($workOrderItem) {
                    return [
                        'h3_items' => $workOrderItem->h3_items,
                        'h3_quantity' => $workOrderItem->h3_quantity,
                    ];
                }),
                'h3_status' => $task->h3_status,
                'created_at' => $task->created_at,
                
            ];
        }

        return response()->json($response);
    }

    public function acceptTask(Request $request){
        $user_id = $request->user()->user_code;
    
        $accept_status = $request['accept_task'];
    
        // Use the update method directly on the query builder
        $inProgress = HousekeepingWorkOrder::where('h3_status', 'Pending')
            ->where('h3_housekeeper_code', $user_id)->where('h3_housekeeping_task_id', $request['work_order'])
            ->update(['h3_status' => $accept_status]);
    
        if($inProgress){
            return response([
                'message' => 'The status has been updated into "In-Progress"'
            ]);
        }else{
            return response([
                'message' => 'unauthorize'
            ]);
        }
        
    }


    public function inProgress(Request $request){
        $user_code = $request->user();
        $tasks = HousekeepingWorkOrder::where('h3_status', 'In-Progress')->where('h3_housekeeper_code', $user_code->user_code)->with('workOrderItem')->get();

        if ($tasks->isEmpty()) {
            return response()->json(['No Current Task' => 'No tasks have been created'], 404);
        }

        $response = [];

        foreach ($tasks as $task) {
            $response[] = [
                'h3_housekeeping_task_id' => $task->h3_housekeeping_task_id,
                'h3_housekeeper_name' => $task->h3_housekeeper_name,
                'h3_room_no' => $task->h3_room_no,
                'h3_scheduled_time' => $task->h3_scheduled_time,
                'h3_housekeeping_request' => $task->h3_housekeeping_request,
                'h3_items_services' => $task->h3_items_services,
                'h3_additional_request' => $task->h3_additional_request,
                'workOrderItem' =>  $task->workOrderItem->map(function ($workOrderItem) {
                    return [
                        'h3_items' => $workOrderItem->h3_items,
                        'h3_quantity' => $workOrderItem->h3_quantity,
                    ];
                }),
                'h3_status' => $task->h3_status,
                'created_at' => $task->created_at,
                
            ];
        }

        return response()->json($response);
    }


    public function completeTask(Request $request){
        $user_id = $request->user()->user_code;
    
        $accept_status = $request['complete_task'];
    
        // Use the update method directly on the query builder
        $inProgress = HousekeepingWorkOrder::where('h3_status', 'In-Progress')
            ->where('h3_housekeeper_code', $user_id)->where('h3_housekeeping_task_id', $request['work_order'])
            ->update(['h3_status' => $accept_status]);
    
        if($inProgress){
            return response([
                'message' => 'The status has been updated into "Completed Task"'
            ]);
        }else{
            return response([
                'message' => 'unauthorize'
            ]);
        }
        
    }
}
