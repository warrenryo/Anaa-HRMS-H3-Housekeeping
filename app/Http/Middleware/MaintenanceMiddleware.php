<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            try{
                if(Auth::user()->role == 'Maintenance Manager' || Auth::user()->role == 'Admin'){
                    return $next($request);
                }else{
                    Alert::error('Access Denied', 'Access Denied as you are not the Maintenance Manager');
                    return redirect()->back();
                }
            }catch(\Exception $e){
                Alert::error('Error', $e->getMessage());
                return redirect()->back();
            }
        }else{
            Alert::error('Error', 'Something went wrong');
            return redirect()->back();
        }
    }
}
