<?php

namespace App\Http\Controllers\MobileApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppDashboardController extends Controller
{
    public function index(){
        return view('MobileApp.dashboard');
    }

    public function indexMaintenance(){
        return view('MobileAppMaintenance.dashboard');
    }
}
