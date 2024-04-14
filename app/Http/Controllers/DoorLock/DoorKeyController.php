<?php

namespace App\Http\Controllers\DoorLock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DoorLockModel\DoorKeys;
use RealRashid\SweetAlert\Facades\Alert;

class DoorKeyController extends Controller
{
    public function doorKeyLists(){
        $door_keys = DoorKeys::all();
        return view('DoorLockAdmin.doorKeyLists.door_key_index', compact('door_keys'));
    }

    //Assign rooms for registered door key and update the database
    public function assignRoomKeys(Request $request, $id){
        $key_id = DoorKeys::find($id);

        try {
            $update_key = $key_id->update([
                'h3_room_no' => $request['room_no']
            ]);

            if($update_key){
                Alert::success('Success', $key_id->h3_room_no.' has been assigned to door lock key '.$key_id->h3_door_key_uid);
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

    public function editDoorKey(Request $request, $id){
        $door_key_id = DoorKeys::find($id);

        try {
            $update_key = $door_key_id->update([
                'h3_room_no' => $request['room_no']
            ]);

            if($update_key){
                Alert::success('Success', $door_key_id->h3_door_key_uid.' has been assigned to '.$door_key_id->h3_room_no);
                return redirect()->back();
            }else{
                Alert::error('Error', 'Something went wrong please try again.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function deleteDoorKey(Request $request, $id){
        $delete_key_id = DoorKeys::find($id);
        
        try {
            $delete_door_key = $delete_key_id->delete();
            if($delete_door_key){
                Alert::success('Success', $delete_key_id->h3_door_key_uid.' has been deleted successfully');
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
}
