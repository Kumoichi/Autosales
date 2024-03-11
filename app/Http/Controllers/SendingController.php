<?php

namespace App\Http\Controllers;
use App\Models\Target;
use App\Models\Template;
use Illuminate\Support\Facades\Session;

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

    public function templateselection()
    {
        $template = Template::all();
        $name = Template::pluck('template');
        return view('pages/templateselection',['template' => $template]);
    }

    public function anotherPage()
    {
        return view('another-page');
    }


public function showThirdPage()
{
    // Retrieve the selected template content from the session
    $selectedTemplateContent = session('selectedTemplateContent');
    

    // Retrieve the selected targets from the session
    $selectedTargets = Session::get('selectedTargets', []);    // dd($selectedTargets);
    // dd(session()->all());

    return view('third-page', [
        'selectedTemplateContent' => $selectedTemplateContent,
        'selectedTargets' => $selectedTargets
    ]);
}

    
}

