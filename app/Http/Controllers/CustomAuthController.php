<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        echo 'Value posted';
    }
}
