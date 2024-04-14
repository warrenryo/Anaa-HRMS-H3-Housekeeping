<?php

namespace App\Http\Controllers\Housekeeping;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActivityLogs\Activities;
use App\Models\HousekeepingModel\Staff;
use App\Models\HousekeepingModel\HousekeepingRequest;
use App\Models\HousekeepingModel\HousekeepingWorkOrder;
use App\Models\HousekeepingModel\HousekeepingWorkOrderItem;
use App\Models\InventoryModel\InventoryItems\HousekeepingInventory;

class DashboardController extends Controller
{
    public function dashboardIndex(){
        $todays_date = Carbon::today()->toDateString();

        //HOUSEKEEPING REQUESTS
        $today_pending_request = HousekeepingRequest::where('status', 'Pending')->whereDate('created_at', $todays_date)->count();
        $total_pending = HousekeepingRequest::where('status', 'Pending')->count();
        $exceeded = HousekeepingRequest::whereDate('created_at', '!=', $todays_date)->where('status', 'Pending')->count();
        $recent_requests = HousekeepingRequest::whereDate('created_at', $todays_date)->orderBy('id', 'DESC')->paginate(4);
        
        //HOUSEKEEPING STAFF
        $staff = User::where('role', 'Housekeeper')->count();

        //HOUSEKEEPING TASK
        $today_task_progress = HousekeepingWorkOrder::where('h3_status', 'Pending')->whereDate('created_at', $todays_date)->count();
        $completed_task = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereDate('created_at', $todays_date)->count();
        $total_completed_task = HousekeepingWorkOrder::where('h3_status', 'Completed')->count();

        //INVENTORY STATUS
        $in_stock = HousekeepingInventory::where('h3_quantity', '>', 71)->count();
        $low_stock = HousekeepingInventory::where('h3_quantity', '<=', 70)->where('h3_quantity', '>', 0)->count();
        $out_of_stock = HousekeepingInventory::where('h3_quantity', '0')->count();

        //ACTIVITY LOGS
        $activity_logs = Activities::whereDate('created_at', $todays_date)->orderBy('id', 'DESC')->paginate(10);

        //CHARTS
        //inventory
        $inventory = HousekeepingInventory::all();

        //TASKS
        //number of task completed per month jan to dec
        $completed_task_jan = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 1)->count();
        $completed_task_feb = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 2)->count();
        $completed_task_mar = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 3)->count();
        $completed_task_apr = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 4)->count();
        $completed_task_may = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 5)->count();
        $completed_task_jun = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 6)->count();
        $completed_task_jul = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 7)->count();
        $completed_task_aug = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 8)->count();
        $completed_task_sep = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 9)->count();
        $completed_task_oct = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 10)->count();
        $completed_task_nov = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 11)->count();
        $completed_task_dec = HousekeepingWorkOrder::where('h3_status', 'Completed')->whereMonth('created_at', 12)->count();


        return view('HousekeepingAdmin.dashboard', compact('inventory', 'staff', 'today_pending_request'
        ,'todays_date', 'total_pending', 'today_task_progress','completed_task','total_completed_task'
        ,'in_stock','low_stock', 'out_of_stock', 'exceeded', 'completed_task_jan', 'completed_task_feb'
        ,'completed_task_mar', 'completed_task_apr', 'completed_task_may', 'completed_task_jun',
        'completed_task_jul', 'completed_task_aug', 'completed_task_sep', 'completed_task_oct', 
        'completed_task_nov', 'completed_task_dec', 'recent_requests','activity_logs'));
    }
}
