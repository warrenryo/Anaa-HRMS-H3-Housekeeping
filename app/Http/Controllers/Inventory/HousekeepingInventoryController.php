<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;
use App\Models\InventoryModel\InventoryCategory\HousekeepingCategory;

class HousekeepingInventoryController extends Controller
{
    public function hInventoryIndex(Request $request){
        $hCategory = HousekeepingCategory::all();
        
        $housekeepingItems = HousekeepingInventory::when($request['item_search'], function($q) use($request){
            $q->where(function($q2) use($request){
                $q2->where('h3_item_name', 'like', '%' .$request['item_search']. '%');
            }); 
        })->get();

        if(!$request->has('item_search')){
            $housekeepingItems = HousekeepingInventory::all();
        }
        return view('InventoryAdmin.housekeepingInventory.hInventoryIndex', compact('hCategory','housekeepingItems'));
    }

    //ADD HOUSEKEEPING ITEMS FUNCTION
    public function addItems(Request $request){
        $h_items = new HousekeepingInventory;

        try{
            $status = 'Normal';
            $add_items = $h_items->create([
                'h3_category_name' => $request['hCategory'],
                'h3_item_name' => $request['itemName'],
                'h3_quantity' => $request['quantity'],
                'h3_status' => $status
            ]);

            if($add_items){
                Alert::success('Success', ''.$add_items->h3_category_name.' has been added successfully.');
                return redirect()->back();
            }else{
                Alert::error('Error', 'Something went wrong..');
                return redirect()->back();
            }
        }catch(\Exception $e){
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    //HOUSEKEEPING ITEMS EDIT FUNCTION 
    public function itemEdit($id){
        $hCategory = HousekeepingCategory::all();
        $h_item_id = HousekeepingInventory::find($id);
        return view('InventoryAdmin.housekeepingInventory.hInventoryEdit', compact('h_item_id', 'hCategory'));
    }

    //UPDATE HOUSKEEPING ITEMS FUNCTION
    public function updateItem(Request $request, $id){
        $h_item_id = HousekeepingInventory::find($id);

        try{
            $update_item = $h_item_id->update([
                'h3_category_name' => $request['hCategory'],
                'h3_item_name' => $request['itemName'],
                'h3_quantity' => $request['quantity']
            ]);

            if($update_item){
                Alert::success('Success', 'Item '.$h_item_id->id.' has been updated successfully.');
                return redirect('inventory-admin/housekeeping-inventory');
            }else{
                Alert::error('Error', 'Something went wrong...');
            }
        }catch(\Exception $e){
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    //DELETE ITEM FUNCTION
    public function deleteItem(Request $request, $id){
   
        $deleteItem = HousekeepingInventory::find($id);

        try{
            if($deleteItem){
                $deleteItem->delete();
                Alert::success('Success', 'Item '.$deleteItem->id.'has been deleted successfully.');
                return redirect()->back();
            }else{
                Alert::error('Error', 'Something went wrong...');
                return redirect()->back();
            }
        }catch(\Exception $e){
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }


}
