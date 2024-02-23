<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendingController extends Controller
{
    public function targetselection()
    {
        return view('pages/targetselection');
    }

    public function contentselection()
    {
        return view('pages/contentselection');
    }
}
