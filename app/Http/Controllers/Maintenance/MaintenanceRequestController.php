<?php

namespace App\Http\Controllers\Maintenance;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLogs\Activities;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MaintenanceModel\MaintenanceRequest;

class MaintenanceRequestController extends Controller
{
    public function maintenanceListsIndex(Request $request){
        $m_request = MaintenanceRequest::when($request['filter_status'] != null, function($q) use($request){
            return $q->where('h3_status', $request['filter_status'])->orderBy('id','DESC');
        })->orderBy('id', 'DESC')->paginate(10);

        return view('MaintenanceAdmin.maintenanceRequest.maintenanceRequestIndex', compact('m_request'));
    }

    public function deleteAllExceeded(){
        $today_date = Carbon::now()->toDateString();
        $m_request_all = MaintenanceRequest::whereDate('created_at', '!=', $today_date)->where('h3_status', 'Pending')->get();

        try {
            foreach ($m_request_all as $request) {
                $request->delete();
            }

            $user = Auth::user()->name;
            $user_role = Auth::user()->role;

            $activity_logs = new Activities;
            $activity_logs->h3_activities = ''.$user.' - '.$user_role.' has deleted all the exceeded maintenance requests';
            $activity_logs->h3_log_type = 'Delete Exceeded Requests';
            $activity_logs->save();
            Alert::success('Success', 'Exceeded Housekeeping request has been deleted.');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }
}
