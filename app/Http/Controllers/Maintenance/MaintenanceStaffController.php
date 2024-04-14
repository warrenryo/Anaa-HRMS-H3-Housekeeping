<?php

namespace App\Http\Controllers\Maintenance;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MaintenanceModel\MaintenanceStaff;

class MaintenanceStaffController extends Controller
{
    public function index(){
        $staff_lists = User::where('role', 'Maintenance')->get();
        return view('MaintenanceAdmin.maintenanceStaff.maintenance_staff_index', compact('staff_lists'));
    }

    //add maintenance staff
    public function addStaff(Request $request){
        $maintenance_staff = new MaintenanceStaff;
        
        $staffCode = mt_rand(10000, 99999);
        if($this->staff_code($staffCode)){
            $staffCode = mt_rand(10000, 99999);
        }

        try {
            $add_maintenance_staff = $maintenance_staff->create([
                'h3_staff_code' => $staffCode,
                'h3_staff_name' => $request['staff_name'],
                'h3_email' => $request['staff_email'],
                'h3_position' => $request['staff_position']
            ]);

            if($add_maintenance_staff){
                Alert::success('Success', 'Staff has been added successfully');
                return redirect()->back();
            }else{
                Alert::error('Error', 'Something went wrong please try again');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function staff_code($staffCode){
        return MaintenanceStaff::whereStaffCode($staffCode);
    }

    //Edit maintenance staff
    public function editMaintenanceStaff($id){
        $staff = MaintenanceStaff::find($id);
        return view('MaintenanceAdmin.maintenanceStaff.maintenance_staff_edit', compact('staff'));
    }

    //update maintenance staff
    public function updateMaintenanceStaff(Request $request, $id){
        $staff_id = MaintenanceStaff::find($id);

        try{
            $update_staff = $staff_id->update([
                'h3_staff_name' => $request['staff_name'],
                'h3_email' => $request['staff_email'],
                'h3_position' =>  $request['staff_position']
            ]);

            if($update_staff){
                Alert::success('Success', 'Staff '.$staff_id->h3_staff_code.' has been updated successfully');
                return redirect('maintenance-admin/maintenance-staff');
            }
        }catch(\Throwable $th){
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    //delete maintenance staff
    public function deleteMaintenanceStaff(Request $request){
        $delete_id = $request['delete_staff'];

        $delete_staff = MaintenanceStaff::find($delete_id);

        try{
            $delete_staff->delete();
            Alert::success('Success', 'Staff '.$delete_staff->h3_staff_name.' has been deleted successfully');
            return redirect()->back();
        }catch(\Throwable $e){
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }
}
