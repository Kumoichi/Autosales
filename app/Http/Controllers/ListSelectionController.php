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
    $validatedData = $request->validate([
        'value1' => 'required',
        'value2' => 'required',
        'data' => 'required',
    ]);
    // $value1= $request->input('value1');
    // dd($value1);

    // $data = $request->input('data');
    // dd($data);

    // Create and save a new Selection instance for the first input
    Selection::create([
        'item_id' => 5,
        'selected_number' => $request->input('value1'),
    ]);

    Selection::create([
        'item_id' => 6,
        'selected_number' => $request->input('value2'),
    ]);

    Selection::create([
        'item_id' => 7,
        'selected_number' => $request->input('data'),
    ]);

    return redirect()->back()->with('success', 'Data inserted successfully!');
}

public function handleTestSelection(Request $request)
    {

        $validatedData = $request->validate([
            'data' => 'required',
        ]);
        
        // Retrieve the data sent from the form
        $data = $request->input('data');
        dd($data);
        

        // Use dd() to dump and die, showing the data received
        Selection::create([
            'item_id' => 7,
            'selected_number' => $request->input('data'),
        ]);
        // return view ("listpages.listselection");
        return redirect()->back()->with('success', 'Data inserted successfully!');

    }

}