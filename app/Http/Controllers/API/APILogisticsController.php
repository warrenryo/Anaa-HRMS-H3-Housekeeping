<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventoryModel\Reorder;
use RealRashid\SweetAlert\Facades\Alert;

class APILogisticsController extends Controller
{
    public function logistics(Request $request)
    {


        $reorder = new Reorder;
        $reorder->create([
            'consumer' => $request['consumer'],
            'item_id' => $request['item_id'],
            'category' => $request['category'],
            'item_name' => $request['item_name'],
            'quantity' => $request['quantity'],
            'status' => $request['status']
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }
}
