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
    
        $user = Admin::where('user_id', $request->user_id)->first();
    
        if($user){
            if($request->password === $user->password)
            {
                $request->session()->put('loginId', $user->user_id);
                return redirect('dashboard');
            } else {
                return back()->with('fail','Password does not match');
            }
        } else {
            return back()->with('fail', 'User ID not found');
        }
    }
    

    public function dashboard()
{
    $data = null;
    if(Session::has('loginId')){
        $data = Admin::find(Session::get('loginId'));   
    }
    return view('dashboard', compact('data'));
}

public function logout(){
    if(Session::has('loginId')){
        Session::forget('loginId'); 
    }
    return redirect('login'); 
}

public function testingpage() {
    return view('testingpage');
}


public function targetDisplay()
{
    return view('designs');
}

}