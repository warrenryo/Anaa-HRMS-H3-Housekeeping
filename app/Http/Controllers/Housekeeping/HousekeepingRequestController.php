<?php

namespace App\Http\Controllers\Housekeeping;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLogs\Activities;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\HousekeepingModel\HousekeepingRequest;

class HousekeepingRequestController extends Controller
{
    public function index(Request $request){
        //$h_request = HousekeepingRequest::orderBy('id', 'DESC')->paginate(10);
       
        $h_request = HousekeepingRequest::when($request['filter_status'] != null, function($q) use($request){
            return $q->where('status', $request['filter_status'])->orderBy('id','DESC');
        })->orderBy('id', 'DESC')->paginate(10);
        return view('HousekeepingAdmin.HousekeepingRequest.housekeepingRequestList', compact('h_request')) ;
    }

    public function deleteExceeded(){
        $today_date = Carbon::now()->toDateString();
        $h_request_all = HousekeepingRequest::whereDate('created_at', '!=', $today_date)->where('status', 'Pending')->get();

        try {
            foreach ($h_request_all as $request) {
                $request->delete();
            }

            $user = Auth::user()->name;
            $user_role = Auth::user()->role;

            $activity_logs = new Activities;
            $activity_logs->h3_activities = ''.$user.' - '.$user_role.' has deleted all the exceeded housekeeping requests';
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
