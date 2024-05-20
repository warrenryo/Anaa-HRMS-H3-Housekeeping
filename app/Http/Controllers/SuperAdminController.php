<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class SuperAdminController extends Controller
{
    public function addUsers(Request $request)
    {
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'user_code' => $request->user_code
        ]);

        event(new Registered($users));

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function editUsers(Request $request)
    {
        $user_email = User::where('email', $request->email)->first();

        if ($user_email) {
            $user_email->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return response()->json([
                'message' => 'success'
            ]);
        }
    }

    public function deleteUsers(Request $request){
        $user_email = User::where('email', $request->email)->first();

        if ($user_email) {
            $user_email->delete();
            return response()->json([
                'message' => 'success'
            ]);
        }
    }
}
