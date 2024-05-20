<?php

namespace App\Http\Controllers\MobileApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\HousekeepingModel\HousekeepingReports;

class AppReportController extends Controller
{
    public function index(Request $request){
        $user = $request->user();
        return view('MobileApp.reports.reportIndex', compact('user'));
    }

    public function submitReport(Request $request){
        $report = new HousekeepingReports;

        $validatedData = $request->validate([
            'housekeeper' => 'required|string',
            'report_type' => 'required|string',
        ]);
        
        try {

            $report->create([
                'h3_housekeeper' => $request['housekeeper'],
                'h3_report_type' => $request['report_type'],
                'h3_specify' => $request['specify']
            ]);

            Alert::success('Success', 'Your report has been submitted');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }
}
