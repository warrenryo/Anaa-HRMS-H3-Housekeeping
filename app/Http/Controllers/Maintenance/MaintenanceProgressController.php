<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceModel\MaintenanceWorkOrder;
use Illuminate\Http\Request;

class MaintenanceProgressController extends Controller
{
    public function index(Request $request){
        $work_order = MaintenanceWorkOrder::when($request['filter_status'] != null, function($q) use($request){
            $q->where('h3_status', $request['filter_status'])->orderBy('id', 'DESC');
        })->orderBy('id', 'DESC')->paginate(15);

        return view('MaintenanceAdmin.maintenanceProgress.maintenanceProgressIndex', compact('work_order'));
    }
}
