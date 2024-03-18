<?php

namespace App\Http\Controllers;
use App\Models\Selection;
use Illuminate\Http\Request;

class ListSelectionController extends Controller
{
    public function listselection(){
        return view ("listpages.listselection");
    }


public function handleListSelection(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'value1' => 'required',
        'value2' => 'required',
    ]);

    // Create and save a new Selection instance for the first input
    Selection::create([
        'item_id' => 5,
        'selected_number' => $request->input('value1'),
    ]);

    // Create and save a new Selection instance for the second input
    Selection::create([
        'item_id' => 6,
        'selected_number' => $request->input('value2'),
    ]);

    // Redirect back or to a different page after successful submission
    return redirect()->back()->with('success', 'Data inserted successfully!');
}

}
