<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CustomAuthController extends Controller
{
    public function login()
    {
        return view ("auth.login");
    }

    public function registration(){
        return view ("auth.registration");
    }

    public function registerUser(Request $request)
    {
        // this validate exists to get the users input.
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

        // Dynamic Property Assignment: Eloquent dynamically maps name,email,password
        // columns to properties on the model.
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $res = $user->save();
        if($res){
            // back() is back to the previous page, with is to show the message, left side is stored in a session.
            return back()->with('success','You have registered successfully');
        } else {
            return back()->with('fail', 'something wrong');
        }

        
    }
}