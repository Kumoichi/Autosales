<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendingController extends Controller
{
    public function targetselection()
    {
        return view('pages/targetselection');
    }
}
