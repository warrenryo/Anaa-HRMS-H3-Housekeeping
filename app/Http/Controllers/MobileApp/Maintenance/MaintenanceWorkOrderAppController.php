<?php

namespace App\Http\Controllers\MobileApp\Maintenance;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CompletedTaskNotification;
use App\Models\MaintenanceModel\MaintenanceWorkOrder;

class MaintenanceWorkOrderAppController extends Controller
{
    public function index(Request $request){
        $user_code = $request->user();
        $work_order = MaintenanceWorkOrder::when($request['filter_status'] != null, function ($q) use ($request) {
            $q->where('h3_status', $request['filter_status'])->orderBy('id', 'DESC');
        })->whereIn('h3_status', ['Pending', 'In-Progress'])->where('h3_maintenance_staff_code', $user_code->user_code)->with('mWorkOrderItem')->paginate(5);
        return view('MobileAppMaintenance.workOrder.workOrderIndex', compact('work_order'));
    }

    public function updateStatus(Request $request, $id){
        $work_order = MaintenanceWorkOrder::find($id);

        try {
            $new_status = 'In-Progress';
            if ($work_order) {
                $work_order->update([
                    'h3_status' => $new_status
                ]);

                Alert::success('Work Order has been accepted');
                return redirect()->back();
            } else {
                Alert::error('Something went wrong');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function markAsCompleted($id){
        $work_order = MaintenanceWorkOrder::find($id);

        try {
            $new_status = 'Completed';
            if ($work_order) {
                $work_order->update([
                    'h3_status' => $new_status
                ]);

                //send notification to admin
                $currentTime = Carbon::now()->toTimeString();
                $auth_user = User::where('role', 'Admin')->pluck('id');
                $notif_admin = User::find($auth_user);
                Notification::send($notif_admin, new CompletedTaskNotification($work_order->h3_maintenance_staff_name, $work_order->h3_room_no, $currentTime));

                Alert::success('Work Order has been Completed');
                return redirect()->back();
            } else {
                Alert::error('Something went wrong');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function completedTaskIndex(Request $request){
        $user_code = $request->user();
        $work_order = MaintenanceWorkOrder::where('h3_status', 'Completed')->where('h3_maintenance_staff_code', $user_code->user_code)->with('mWorkOrderItem')->orderBy('id', 'DESC')->paginate(5);
        return view('MobileAppMaintenance.completedTask.completedTaskIndex', compact('work_order'));
    }
}
