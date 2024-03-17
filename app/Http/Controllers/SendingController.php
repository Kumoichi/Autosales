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


public function showSummaryPage()
{
    // Retrieve the selected template content from the session
    $selectedTemplateContent = session()->get('selectedTemplateContent');

    // Retrieve the selected targets from the session
    $selectedTargets = Session::get('selectedTargets', []);    // dd($selectedTargets);

    return view('summary-page', [
        'selectedTemplateContent' => $selectedTemplateContent,
        'selectedTargets' => $selectedTargets
    ]);
}


// Method to handle form submission from the target selection page
public function handleContentSelection(Request $request)
{
    $targetName = $request->input('targetName');

    // Fetch location data based on the targetName
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

    
}

