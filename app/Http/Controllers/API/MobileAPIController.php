<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

class MobileAPIController extends Controller
{
    public function index(Request $request)
    {
        return $request->user();
    }

    public function loginMobile(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = md5(time()).'.'.md5($request->email);
            $user->forceFill([
                'api_token'=>$token,
            ])->save();
            return response()->json([
                'token' => $token
            ]);

        }
        return response()->json([
            'message' => 'The provided credentials do not match our records'
        ],401);
    }

    public function logout(Request $request) 
    {
        $request->user()->forceFill([
            'api_token' => null,
        ])->save();

        return response()->json(['message' => 'success']);   
    }

    //FLUTTER APP
    public function flutterLogin(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt($credentials)){
            return response([
                'message' => 'Invalid Credentials'
            ]);
        }

        return response([
            'user' =>  auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ]);
    }

    public function flutterLogout(){
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout success'
        ], 200);
    }

    public function flutterUsers(){
        return response([
            'user' => auth()->user()
        ]);
    }
}
