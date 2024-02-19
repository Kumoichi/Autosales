<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



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
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            // back() is back to the previous page, with is to show the message, left side is stored in a session.
            return back()->with('success','You have registered successfully');
        } else {
            return back()->with('fail', 'something wrong');
        }

    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        //first email that matches
        $user= User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password))
            {
                // user id is stored in session with the key name loginId
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail','password not matches');
            }

        } else {
            return back()->with('fail', 'This email is not registered');
        }
    }

    public function dashboard()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=', Session::get('loginId'))->first();
        }
        // compact is used for sending array type of data to the page.
        return view('dashboard',compact('data'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId'); // Clear the loginId from the session
        }
        return redirect('login'); // Redirect to the login page
    }
    
}