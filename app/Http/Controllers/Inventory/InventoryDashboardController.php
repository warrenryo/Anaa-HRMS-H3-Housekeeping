<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\ActivityLogs\Activities;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;
use Illuminate\Http\Request;

class InventoryDashboardController extends Controller
{
    public function index(){
        $h_inventory = HousekeepingInventory::all();
        $activity_logs = Activities::all();
        return view('InventoryAdmin.dashboard', compact('h_inventory', 'activity_logs'));
    }
}
