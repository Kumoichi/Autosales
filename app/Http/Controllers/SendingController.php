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


public function handleContentSelection(Request $request)
{
    $targetName = $request->input('targetName');

    try {
        $target = Target::where('name', $targetName)->first();

        if ($target) {
            $locationData = $target->location;

            if (is_string($locationData)) {
                return view('summary-page', ['targetName' => $targetName, 'locationData' => $locationData]);
            } else {
            
                return redirect()->back()->with('error', 'Invalid location data');
            }
        } else {
            return redirect()->back()->with('error', 'Target not found');
        }
    } catch (\Exception $e) {
        
        return redirect()->back()->with('error', 'An error occurred');
    }
}


    
}

