<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HousekeepingModel\HousekeepingDoorKeys;
use Illuminate\Http\Request;

class HousekeepingDoorLockController extends Controller
{
    public function addDoorKey(Request $request){
        $existingKey = HousekeepingDoorKeys::where('key_UID', $request['UIDresult'])->first();

        if ($existingKey) {
            return response()->json([
                'message' => 'Key has been duplicated'
            ]);
        } else {
            $insertUID = HousekeepingDoorKeys::create([
                'key_UID' => $request['UIDresult'],
            ]);
        
            return response()->json([
                'message' => 'Success'
            ]);
        }

    }

    public function doorLogs(Request $request){
        $keys = HousekeepingDoorKeys::where('key_UID', $request['UIDresult'])->first();

        $keys->doorLogs()->create([
            'doorkey_id' => $keys->id,
            'key_UID' => $request['UIDresult'],
            'room_no' => $request['room']
        ]);

        return response()->json([
            'message' => 'Success'
        ]);
    }

    //SHARE DOOR LOCK KEYS
    public function doorKeys(){
        $keys = HousekeepingDoorKeys::select('key_UID')->get();

        return response()->json([
            'keys' => $keys
        ]);
    }



}
