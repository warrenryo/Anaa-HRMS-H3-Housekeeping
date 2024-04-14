<?php

namespace App\Http\Controllers\DoorLock;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\DoorLockModel\DoorKeys;

class DoorLogsController extends Controller
{
    public function doorLogsIndex()
    {


        $url = 'https://doorlockrfid.000webhostapp.com/allDatabase.php';
        $response = Http::get($url);
        $data = $response->json();
        $door_key = DoorKeys::all();
        return view('DoorLockAdmin.doorLogs.door_logs_index', compact('data', 'door_key'));
    }
}
