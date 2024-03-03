<?php

namespace App\Http\Controllers;
use App\Models\Target;

use Illuminate\Http\Request;

class SendingController extends Controller
{
    public function targetselection()
    {
        $target = Target::all();
        $name = Target::pluck('name');
        return view('pages/targetselection',['names' => $name]);
    }

    public function contentselection()
    {
        return view('pages/contentselection');
    }

    public function timeselection()
    {
        return view('pages/timeselection');
    }


    public function targetName()
    {
        $target = Target::all();

        $name = Target::pluck('name');

        return view('another-page',['names' => $name]);
    }

    public function anotherPage()
    {
        return view('another-page');
    }

    public function showThirdPage()
    {
        $selectedTargets = session()->get('selectedTargets', []);
        
        return view('third-page', ['selectedTargets' => $selectedTargets]);
    }
}
