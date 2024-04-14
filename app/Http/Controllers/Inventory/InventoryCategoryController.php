<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\InventoryModel\InventoryCategory\HousekeepingCategory;
use App\Models\InventoryModel\InventoryCategory\MaintenanceCategory;
use Illuminate\Contracts\Foundation\MaintenanceMode;
use PDO;

class InventoryCategoryController extends Controller
{
    public function housekeepingIndex()
    {
        $h_category = HousekeepingCategory::all();
        return view('InventoryAdmin.housekeepingCategory.housekeepingCategoryIndex', compact('h_category'));
    }

    //housekeeping Category function
    public function addHousekeepingCategory(Request $request)
    {
        $category = new HousekeepingCategory;

        try {
            $addCategory = $category->create([
                'h3_h_category' => $request['hCategory'],
            ]);

            if ($addCategory) {
                Alert::success('Success!', 'Housekeeping Category Added successfully.');
                return redirect()->back();
            } else {
                Alert::error('Error', 'Something went wrong, please try again');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    //HOUSEKEEPING CATEGORY FUNCTION
    public function hCategoryEdit($id)
    {
        $h_category_id = HousekeepingCategory::find($id);

        return view('InventoryAdmin.housekeepingCategory.housekeepingCategoryEdit', compact('h_category_id'));
    }

    //HOUSEKEEPING CATEGORY UPDATE FUNCTION
    public function updateHCategory(Request $request, $id)
    {
        $h_category_id = HousekeepingCategory::find($id);

        $h_category = $h_category_id->update([
            'h3_h_category' => $request['hCategory']
        ]);

        try {
            if ($h_category) {
                Alert::success('Success', 'Category updated successfully.');
                return redirect('inventory-admin/housekeeping-category');
            } else {
                Alert::error('Error', 'Something went wrong');
            }
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    //DELETE CATEGORY FUNCTION
    public function deleteCategory(Request $request,$id)
    {

        $deleteID = HousekeepingCategory::find($id);

        $delete_category = $deleteID->delete();

        if ($delete_category) {
            Alert::success('Success', 'Category deleted successfully');
            return redirect()->back();
        } else {
            Alert::error('Error', 'Something went wrong');
            return redirect()->back();
        }
    }


    //MAINTENANCE INVENTORY

    public function maintenanceIndex()
    {
        $m_category = MaintenanceCategory::all();
        return view('inventoryAdmin.maintenanceCategory.maintenanceCategoryIndex', compact('m_category'));
    }

    public function addMaintenanceCategory(Request $request)
    {
        $m_category = new MaintenanceCategory;

        try {
            $add_category = $m_category->create([
                'h3_m_category' => $request['m_category']
            ]);

            if ($add_category) {
                Alert::success('Success', 'Category added successfully');
                return redirect()->back();
            } else {
                Alert::error('Error', 'Something went wrong');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function updateMaintenaceCategory(Request $request, $id)
    {
        $category_id = MaintenanceCategory::find($id);

        try {

            $update_category = $category_id->update([
                'h3_m_category' => $request['m_category']
            ]);

            if ($update_category) {
                Alert::success('Success', 'Category ID ' . $category_id->id . ' has been updated.');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function deleteMaintenanceCategory($id){
        $delete_id = MaintenanceCategory::find($id);

        try {
            $delete_category = $delete_id->delete();

            if($delete_category){
                Alert::success('Success', 'Category has been deleted');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }
}
