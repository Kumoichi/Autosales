<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class CustomAuthController extends Controller
{
    public function login()
    {
        return view ("auth.login");
    }

    public function loginUser(Request $request){
        $request->validate([
            'user_id'=>'required',
            'password'=>'required'
        ]);
    
        // Query using Admin model and 'user_id' field
        $user = Admin::where('user_id', $request->user_id)->first();
    
        if($user){
            // User with the provided 'user_id' exists, now check the password
            if($request->password === $user->password)
            {
                // Password matches, store the user's ID in the session
                $request->session()->put('loginId', $user->user_id);
                return redirect('dashboard');
            } else {
                // Password does not match
                return back()->with('fail','Password does not match');
            }
        } else {
            // User with the provided 'user_id' does not exist
            return back()->with('fail', 'User ID not found');
        }
    }
    

    public function dashboard()
{
    $data = null;
    if(Session::has('loginId')){
        // Query the Admin model using the stored user ID
        $data = Admin::find(Session::get('loginId'));   
    }
    return view('dashboard', compact('data'));
}

public function logout(){
    // Clear the login ID from the session when logging out
    if(Session::has('loginId')){
        Session::forget('loginId'); // Change Session::pull to Session::forget
    }
    return redirect('login'); // Redirect to the login page
}

public function testingpage() {
    return view('testingpage');
}
}