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

    public function anotherPage()
    {
        return view('another-page');
    }


   

// Method to handle form submission from the target selection page
public function handleTargetSelection(Request $request)
{
    $targetName = $request->input('targetName');

    // You can perform any validation or processing here

    // Redirect the user to the content selection page, passing along the selected target name
    return redirect()->route('contentselection')->with('targetName', $targetName);
}

// Method to show the content selection page
public function showContentSelectionPage(Request $request)
{
    // Retrieve the targetName from the session flash data
    $targetName = $request->session()->get('targetName');

    // Your logic to fetch content options and display the content selection page
    return view('pages/contentselection', ['targetName' => $targetName]);
}


public function handleContentSelection(Request $request)
{
    $targetName = $request->session()->get('targetName');
    
    // Fetch location data based on the targetName
    $locationData = $this->fetchLocationData($targetName);

    // Return the summary page view with the targetName and locationData
    return view('summary-page', ['targetName' => $targetName, 'locationData' => $locationData]);
}


public function showSummaryPage($targetName)
{
    // Your logic to fetch summary data based on the target name
    $locationData = $this->fetchLocationData($targetName);

    // Return the summary page view with the targetName and locationData
    return view('summary-page', ['targetName' => $targetName, 'locationData' => $locationData]);
}



// Method to fetch location data based on the targetName
private function fetchLocationData($targetName)
{
    // Query the database to find the target by name
    $target = Target::where('name', $targetName)->first();

    // Check if the target exists
    if ($target) {
        // If the target exists, return its associated location data
        return $target->location;
    } else {
        // If the target doesn't exist, return null or an appropriate value indicating that no location data was found
        return null;
    }
}

    
}

