<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\ActivityLogs\Activities;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();
        if($user->role == 'Housekeeper'){
            return redirect()->intended(RouteServiceProvider::MOBILEAPP);
        }elseif($user->role == 'Maintenance'){
            return redirect()->intended(RouteServiceProvider::MOBILEAPPM);
        }elseif($user->role == 'Guest'){
            return redirect()->intended(RouteServiceProvider::DIGITALREQUEST);
        }
        if($user->role == 'Housekeeping Manager'){
            return redirect()->intended(RouteServiceProvider::HOUSEKEEPING);
        }
        $activity_logs = new Activities;
        $activity_logs->h3_activities = ''.$user->name.' - '.$user->role.' has Logged in to the System';
        $activity_logs->h3_log_type = 'Logged-in';
        $activity_logs->save();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
