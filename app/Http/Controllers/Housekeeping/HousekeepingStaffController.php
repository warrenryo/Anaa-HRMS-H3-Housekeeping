<?php

namespace App\Http\Controllers\Housekeeping;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HousekeepingModel\Staff;
use RealRashid\SweetAlert\Facades\Alert;

class HousekeepingStaffController extends Controller
{
    public function index(){
       
        $staff = User::where('role', 'Housekeeper')->paginate(10);
        return view('HousekeepingAdmin.housekeepingStaff.housekeepingStaffIndex', compact('staff'));
    }

    public function addStaff(Request $request){
        
        $staffCode = mt_rand(10000, 99999);
        if($this->staff_code($staffCode)){
            $staffCode = mt_rand(10000, 99999);
        }

        try{
            Staff::create([
                'h3_staff_code' => $staffCode,
                'h3_staffName' => $request['staff_name'],
                'h3_email' => $request['staff_email'],
                'h3_position' => $request['staff_position'],
            ]);

            Alert::success('Success!', 'Staff Added Successfully.');
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
   

        
    }

    public function staff_code($staffCode){
        return Staff::whereStaffCode($staffCode);
    }


    //HOUSEKEEPING STAFF EDIT
    public function staffEdit($id){
        $staff = Staff::find($id);
        return view('HousekeepingAdmin.HousekeepingStaff.housekeepingStaffEdit', compact('staff'));
    }

    //HOUSEKEEPING STAFF UDPATE
    public function updateStaff(Request $request, $id){
     
        $staff = Staff::find($id);
        try{
            $updateStaff = $staff->update([
                'h3_staffName' => $request['staff_name'],
                'h3_email' => $request['staff_email'],
                'h3_position' => $request['staff_position'],
            ]);
            if($updateStaff){
                Alert::success('Success!','Staff updated successfully.');
                return redirect('HousekeepingAdmin/housekeepingStaff');
            }else{
                Alert::error('Error','Something went wrong please try again.');
                return redirect()->back();
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    //HOUSEKEEPING STAFF DELETE 
    public function deleteStaff(Request $request, $id){
        $staff = Staff::find($id);

        try{
            $staff->delete();
            Alert::success('Success!','Staff deleted successfully.');
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }

}
