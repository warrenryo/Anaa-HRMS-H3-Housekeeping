<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\HousekeepingModel\HousekeepingReports;
use Illuminate\Http\Request;

class AdminHousekeeperReports extends Controller
{
    public function housekeeperReports(){
        $reports = HousekeepingReports::orderBy('id', 'DESC')->get();
        return view('HousekeepingAdmin.housekeeperReports.reportIndex', compact('reports'));
    }
}
