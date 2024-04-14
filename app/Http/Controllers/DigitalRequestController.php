<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\RequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\HousekeepingModel\HousekeepingRequest;
use App\Models\MaintenanceModel\MaintenanceRequest;

class DigitalRequestController extends Controller
{
    public function index(){
        return view('DigitalRequests.digitalRequestsIndex');
    }

    public function housekeepingRequest(Request $request){
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        return view('DigitalRequests.housekeepingRequest', compact('user'));
    }

    public function submitHrequest(Request $request){
        $hrequest = new HousekeepingRequest;

        if($request['room_no'] == null){
            $request->validate([
                'room_no' => 'required'
            ]);
            return redirect()->back();
        }

        $status = 'Pending';

        $request_code = mt_rand(10000,99999);
        if($this->requestCode($request_code)){
            $request_code = mt_rand(10000,99999);
        }

        try{
            $hrequest->h3_request_code = $request_code;
            $hrequest->h3_room_no = $request['room_no'];

            if($request['housekeeping_request'] == null){
                $hrequest->h3_housekeeping_request = json_encode(['No Request']);
            }else{
                $hrequest->h3_housekeeping_request = json_encode($request['housekeeping_request']);
            }

            if($request['items_services'] == null){
                $hrequest->h3_items_services = json_encode(['No Request']);
            }else{
                $hrequest->h3_items_services = json_encode($request['items_services']);
            }

            $hrequest->h3_additional_request = $request['additional_request'];
            $hrequest->h3_time_issue = $request['time_issue'];
            $hrequest->status = $status;
            $hrequest->save();

            if($hrequest){
                $auth_user = User::where('role', 'Admin')->pluck('id');
                $user = User::find($auth_user);
                Notification::send($user, new RequestNotification($request->room_no, $hrequest->h3_request_code, $hrequest->h3_time_issue));
                Alert::success('Success!', 'Your request has been submitted.');
            
                return redirect('digital-requests');
            }else{
                Alert::error('Error', 'Something went wrong, please try again later.');
            }
        }catch(\Exception $e){
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function requestCode($request_code){
        return HousekeepingRequest::whereRequestCode($request_code);
    }


    //MAINTENANCE REQUEST FUNCTIONS
    public function maintenanceRequest(){
        return view('DigitalRequests.maintenanceRequest');
    }

    public function submitMrequest(Request $request){
        $maintenance = new MaintenanceRequest;

        $maintenance_code = mt_rand(10000, 99999);
        if($this->maintenanceCode($maintenance_code)){
            $maintenance_code = mt_rand(10000, 99999);
        }

        $status = 'Pending';
        $no_request = json_encode(['No Requests']);

        try {
            $maintenance->create([
                'h3_request_code' => $maintenance_code,
                'h3_room_no' => $request['room_no'],
                'h3_maintenance_request' => ($request['maintenance_request'] == null ) ? $no_request : json_encode($request['maintenance_request']),
                'h3_additional_request' => $request['additional_request'],
                'h3_time_issue' => $request['time_issue'],
                'h3_status' => $status
            ]);

            Alert::success('Thank you!', 'Your request has been submitted, We will get back to you as soon as possible.');
            return redirect('digital-requests');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function maintenanceCode($maintenance_code){
        return MaintenanceRequest::whereMaintenanceCode($maintenance_code);
    }
}
