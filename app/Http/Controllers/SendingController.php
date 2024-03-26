<?php

namespace App\Http\Controllers;
use App\Models\Target;
use App\Models\Template;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;


class SendingController extends Controller
{

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

    public function showTemplateSelectionPage()
    {
        return view('pages/templateselection');
    }

    public function handleTemplateSelection(Request $request)
    {
        $templateTitle = $request->input('selectedTemplate');
        $request->session()->put('templateTitle', $templateTitle);

        return redirect()->route('contentselection');
    }

    public function showContentSelectionPage(Request $request)
    {
        return view('pages/contentselection');
    }

    public function handleContentSelection(Request $request)
    {
        $contentURL = $request->input('selectedContent');
        $request->session()->put('contentURL', $contentURL);

        return redirect()->route('targetselection');
    }

    public function showTargetSelectionPage()
    {
        return view('pages/targetselection');
    }

    public function handleTargetSelection(Request $request)
{
    $targetName = $request->input('targetName');
    $targetNumberMapping = $this->getTargetNameMapping();

    // Get the target number corresponding to the target name
    $targetNumber = $targetNumberMapping[$targetName] ?? null;

    // Check if the target name exists in the mapping
    if ($targetNumber !== null) {
        $request->session()->put('targetNumber', $targetNumber);
    }
    return view('summary-page');
}

function getTargetNameMapping()
{
    return [
        "ターゲットA" => "1",
        "ターゲットB" => "2",
        "ターゲットC" => "3",
        "ターゲットD" => "4",
    ];
}





public function showSummaryPage($targetName)
{
    return view('summary-page');
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

