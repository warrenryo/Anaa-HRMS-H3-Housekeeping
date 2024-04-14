<?php

namespace App\View\Components;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\HousekeepingModel\HousekeepingWorkOrder;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $total_work_order = HousekeepingWorkOrder::where('h3_status', 'Not Completed')->count();
        $auth = Auth::user()->id;
        $user = User::find($auth);
        $todayDate = Carbon::now();
        $date = $todayDate->format('m-d-y');
        return view('layouts.app', compact('user', 'date', 'total_work_order'));
    }
}
