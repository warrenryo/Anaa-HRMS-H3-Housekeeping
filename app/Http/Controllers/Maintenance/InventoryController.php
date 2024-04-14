<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\InventoryModel\InventoryCategory\MaintenanceCategory;
use App\Models\InventoryModel\InventoryItems\MaintenanceInventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $m_inventory_category = MaintenanceCategory::all();
        $m_inventory_items = MaintenanceInventory::when($request['search_item'] !== null, function($q) use($request){
            $q->where('h3_category', 'like', '%' .$request['search_item']. '%')
            ->orWhere('h3_item_name', 'like', '%' .$request['search_item']. '%');
        })
        ->when($request['filter_category'] !== null, function($q) use($request){
            $q->whereIn('h3_category', $request['filter_category']);
        })
        ->paginate(10);
        
        return view('MaintenanceAdmin.maintenanceInventoryList.maintenanceInventoryListIndex', compact('m_inventory_category','m_inventory_items'));
    }
}
