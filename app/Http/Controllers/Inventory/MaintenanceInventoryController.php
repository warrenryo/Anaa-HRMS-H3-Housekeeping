<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventoryModel\InventoryCategory\MaintenanceCategory;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\InventoryModel\InventoryItems\MaintenanceInventory;
use Illuminate\Support\Facades\Redis;

class MaintenanceInventoryController extends Controller
{
    public function mInventoryIndex(){
        $m_category = MaintenanceCategory::all();
        $item = MaintenanceInventory::all();
        return view('InventoryAdmin.maintenanceInventory.maintenanceInventoryIndex', compact('m_category', 'item'));
    }

    public function addMaintenanceItem(Request $request){
        $maintenance_id = new MaintenanceInventory;

        try {
            $add_item = $maintenance_id->create([
                'h3_category' => $request['m_category'],
                'h3_item_name' => $request['item_name'],
                'h3_quantity' => $request['quantity']
            ]);

            if($add_item){
                Alert::success('Success', ''.$add_item->h3_item_name.' has been added to inventory.');
                return redirect()->back();
            }else{
                Alert::error('Error', 'Something went wrong');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('ERROR', $th->getMessage());
            return redirect()->back();
        }
    }

    public function updateMaintenance(Request $request, $id){
        $maintenance_id = MaintenanceInventory::find($id);

        try {
            
            $maintenance_id->update([
                'h3_category' => $request['m_category'],
                'h3_item_name' => $request['item_name'],
                'h3_quantity' => $request['quantity']
            ]);

            Alert::success('Success', 'Your item has been updated successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function deleteItem($id){
        $maintenance_id = MaintenanceInventory::find($id);
        
        try {
            $maintenance_id->delete();

            Alert::success('Success', 'Your item has been deleted successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

}
