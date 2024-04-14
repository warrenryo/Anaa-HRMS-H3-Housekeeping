<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\InventoryModel\InventoryCategory\HousekeepingCategory;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;
use Illuminate\Http\Request;

class HousekeepingItemsController extends Controller
{
    public function index(Request $request){
        $h_inventory_category = HousekeepingCategory::all();
        $h_inventory_items = HousekeepingInventory::when($request['search_item'] !== null, function($q) use($request){
            $q->where('h3_category_name', 'like', '%' .$request['search_item']. '%')
            ->orWhere('h3_item_name', 'like', '%' .$request['search_item']. '%');
        })
        ->when($request['filter_category'] !== null, function($q) use($request){
            $q->whereIn('h3_category_name', $request['filter_category']);
        })
        ->paginate(10);

        $inventory = HousekeepingInventory::all();
        
        return view('HousekeepingAdmin.housekeepingInventoryList.housekeeping_items_lists_index', compact('h_inventory_items','h_inventory_category','inventory'));
    }
}


//next is the summary on dashboard