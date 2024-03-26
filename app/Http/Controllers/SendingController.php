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

    public function handleTemplateSelection(Request $request)
    {
        $templateTitle = $request->input('selectedBox');
        $request->session()->put('templateTitle', $templateTitle);
        // dd($templateTitle);

        return redirect()->route('contentselection');
    }

    public function templateselection()
    {
        return view('pages/templateselection');
    }




   

public function handleTargetSelection(Request $request)
{
    $targetName = $request->input('targetName');

    return redirect()->route('contentselection')->with('targetName', $targetName);
}

public function showContentSelectionPage(Request $request)
{
    return view('pages/contentselection');
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


public function modalPage()
{
    return view('modal-page');
}
    

public function submitForm(Request $request)
    {
        // Retrieve the selected box value from the form data
        $selectedBox = $request->input('selectedBox');
        dd($selectedBox);

        // Now you can process the selected box value as needed, for example, save it to the database
        // You can also return a response if needed
    }
}

