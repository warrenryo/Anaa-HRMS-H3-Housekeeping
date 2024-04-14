<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\H1Model\RoomDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class HOTEL1APIController extends Controller
{

    public function getUsers(Request $request){
        $room_no = $request['room_no'];
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'user_code' => $request->user_code
        ]);

        event(new Registered($users));

        if($users){
            $users->guestRooms()->create([
                'guest_id' => $users->id,
                'room_no' => $room_no
            ]);
        }

        return response()->json([
            'message' => 'success'
        ]);
    }


    public function addRoomDetails(Request $request){
        $room = RoomDetails::create([
            'RoomTypeID' => $request['RoomTypeID'],
            'RoomType' => $request['RoomType'],
            'RoomNumber' => $request['RoomNumber'],
            'RoomStatus' => $request['RoomStatus'],
            'MaxGuests' => $request['MaxGuests'],
            'Description' => $request['Description']
        ]);

        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function updateRoomDetails(Request $request){
        $update = RoomDetails::where('RoomTypeID', $request['RoomTypeID'])->first();

        if($update){
            $update->update([
                'RoomTypeID' => $request['RoomTypeID'],
                'RoomType' => $request['RoomType'],
                'RoomNumber' => $request['RoomNumber'],
                'RoomStatus' => $request['RoomStatus'],
                'MaxGuests' => $request['MaxGuests'],
                'Description' => $request['Description']
            ]);
            return response()->json([
                'message' => 'Success'
            ]);
        }

    }

    public function updateStatus(Request $request){
        $status = RoomDetails::where('RoomTypeID', $request['RoomType'])->first();

        if($status){
            $status->update([
                'RoomStatus' => $request['RoomStatus']
            ]);

            return response()->json([
                'message' => 'success'
            ]);
        }
    }

    public function deleteRoom(Request $request){
        $room = RoomDetails::where('RoomTypeID', $request['RoomTypeID'])->first();

        try {
            $room->delete();
            return response()->json([
                'message' => 'Success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
