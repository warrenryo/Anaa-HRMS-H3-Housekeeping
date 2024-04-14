<?php

namespace App\Http\Controllers\Housekeeping;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HousekeepingModel\Staff;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\HousekeepingModel\HousekeepingDoorKeys;
use App\Models\HousekeepingModel\HousekeepingDoorLogs;

class DoorLockController extends Controller
{
    public function index(){
        $key = HousekeepingDoorKeys::all();
        $housekeeper = User::where('role', 'Housekeeper')->get();
        return view('HousekeepingAdmin.doorlockSystem.doorKeyIndex', compact('key', 'housekeeper'));
    }

    public function assignKey(Request $request, $id){
        $key = HousekeepingDoorKeys::find($id);

        try {
            if($key){
                $housekeeper_name = User::where('user_code', $request['housekeeper'])->first();
                $key->update([
                    'key_user' => $housekeeper_name->name
                ]);
                Alert::success('Success', 'Door key has been assigned to housekeeper '.$key->key_user.'');
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


    //DOOR LOGS FUNCTIONS 
    public function doorLogsIndex(){
        $logs = HousekeepingDoorLogs::all();
        return view('HousekeepingAdmin.doorlockSystem.doorlogsIndex', compact('logs'));
    }


    //VIEW LOGS
    public function viewLogs($room_no){
        $logs = HousekeepingDoorLogs::where('room_no', $room_no)->get();
        return view('HousekeepingAdmin.doorlockSystem.roomDoorLogs', compact('logs', 'room_no'));
    }

    public function removeDoorKey($id){
        $key = HousekeepingDoorKeys::find($id);

        try {
            if($key){
                $key->delete();

                Alert::success('Success', 'Door key '.$key->key_UID. ' has been removed');
                return redirect()->back();
            }else{
                Alert::error('Error', 'Somethin went wrong');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
                return redirect()->back();
        }
    }
}
