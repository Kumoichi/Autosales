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
        return view('sendingpages/timeselection');
    }

    public function showTemplateSelectionPage()
    {
        return view('sendingpages/templateselection');
    }

    public function handleTemplateSelection(Request $request)
    {
        $templateTitle = $request->input('selectedTemplate');
        $request->session()->put('templateTitle', $templateTitle);

        return redirect()->route('contentselection');
    }

    public function showContentSelectionPage(Request $request)
    {
        return view('sendingpages/contentselection');
    }

    public function handleContentSelection(Request $request)
    {
        $contentURL = $request->input('selectedContent');
        $request->session()->put('contentURL', $contentURL);

        return redirect()->route('targetselection');
    }

    public function showTargetSelectionPage()
    {
        return view('sendingpages/targetselection');
    }

    public function handleTargetSelection(Request $request)
{
    $target = $request->input('targetName');
    $request->session()->put('target', $target);
    return redirect()->route('summary-page');
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



function getContentLetter($number)
{
    // Define an array of textual representations for numbers
    $words = [
        1 => 'A',
        2 => 'B',
        3 => 'C',
        4 => 'D',
        5 => 'E',
        6 => 'F',
        7 => 'G',
        8 => 'H',
        9 => 'I',
        10 => 'J'
        // Add more numbers if needed
    ];

    // Check if the number exists in the array
    if (isset($words[$number])) {
        return $words[$number];
    } else {
        // Return the number itself if not found in the array
        return (string) $number;
    }
}

public function showSummaryPage(Request $request)
{
    $target = $request->session()->get('target');
    $contentNumber = $request->session()->get('contentURL');
    $templateTitle = $request->session()->get('templateTitle');


    // Get the textual representation of the content number
    $contentWord =  $this->getContentLetter($contentNumber); // Added a backslash (\) before getContentLetter

    // Pass both 'target' and 'convertedWord' to the view
    return view('sendingpages/summary-page', [
        'target' => $target,
        'contentWord' => $contentWord,
        'templateTitle' => $templateTitle,
    ]);
}


// ここから下練習ファイル

public function targetName()
{
    $target = Target::all();

    $name = Target::pluck('name');

    return view('another-page',['names' => $name]);
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
    

// public function submitForm(Request $request)
//     {
//         // Retrieve the selected box value from the form data
//         $selectedBox = $request->input('selectedBox');
//         dd($selectedBox);

//         // Now you can process the selected box value as needed, for example, save it to the database
//         // You can also return a response if needed
//     }
}

