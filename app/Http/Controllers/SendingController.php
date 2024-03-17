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

    // public function contentselection()
    // {
    //     return view('pages/contentselection');
    // }

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




   

public function handleTargetSelection(Request $request)
{
    $targetName = $request->input('targetName');

    return redirect()->route('contentselection')->with('targetName', $targetName);
}

public function showContentSelectionPage(Request $request)
{
    // Retrieve the targetName from the session flash data
    $targetName = $request->session()->get('targetName');
    $request->session()->put('testsession', $targetName);

    return view('pages/contentselection', ['targetName' => $targetName]);
}




public function showSummaryPage($targetName)
{
    $locationData = $this->fetchLocationData($targetName);
    return view('summary-page', ['targetName' => $targetName, 'locationData' => $locationData]);
}



private function fetchLocationData($targetName)
{
    $target = Target::where('name', $targetName)->first();

    if ($target) {
        return $target->location;
    } else {
        return null;
    }
}



//practice function    
public function anotherPage()
{
    return view('another-page');
}

    
}

