<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function allUsers(){
        $user = User::all();
        return view('Users.allUsers', compact('user'));
    }

    //REDIRECT TO REGISTER FORM
    public function registerUser(){
        return view('Users.addUsers');
    }

    //ADD USER FUNCTION
    public function addUser(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user_code = mt_rand(10000, 99999);
        if($this->userCode($user_code)){
            $user_code = mt_rand(10000, 99999);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'user_code' => $user_code
        ]);

        event(new Registered($user));
        Alert::success('Success!', 'User added successfully');
        return redirect('users');
    }

    public function userCode($user_code){
        return User::whereUserCode($user_code);
    }

    //REDIRECT TO EDIT USER FORM
    public function editUser($id){
        $user = User::find($id);
        return view('Users.editUsers', compact('user'));
    }

    //UPDATE USER INFO
    public function updateUser(Request $request, $id){
        $user_id = User::find($id);

        try{
            $user = $user_id->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request['role']
            ]);

            if($user){
                Alert::success('Success!', 'User Updated successfully.');
                return redirect('users');
            }else{
                Alert::error('Error', 'Something went wrong');
                return redirect()->back();
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    //DELETE USER 
    public function deleteUser(Request $request){
        $user_id = $request['delete_user'];

        $user = User::find($user_id);
        try{
            $user->delete();
            Alert::success('Success!', 'User deleted successfully.');
            return redirect('users');
        }catch(\Exception $e){
            Alert::error('Something went wrong', $e->getMessage());
        }
    }
}
