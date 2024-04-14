<?php

namespace App\Http\Controllers\Housekeeping;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\H1Model\RoomDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RoomDetailsController extends Controller
{
    public function index(){
        $housekeeper = User::where('role', 'Housekeeper')->get();
        $room = Http::get('http://192.168.101.71:8000/api/room-details');
        
        if($room->successful()){
            $roomData = $room->json();
            return view('HousekeepingAdmin.roomDetails.roomDetailsIndex', compact('roomData', 'housekeeper'));
        }
 
    }
}
