<?php

namespace App\Http\Controllers;
use App\Models\Target;

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

    public function timeselection()
    {
        return view('pages/timeselection');
    }


    public function targetName($id)
    {
        $target = Target::find($id);

        if ($target) {
            $name = $target->name;
            return view('another-page', ['name' => $name]);
        } else {
            return "Target not found";
        }
    }

    public function anotherPage()
    {
        $name = session('name'); // Get the name from session if needed
        return view('another-page', ['name' => $name]);
    }
}
