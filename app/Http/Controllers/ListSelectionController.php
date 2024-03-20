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
        'value3' => 'required',
        'value4' => 'required',
        'value5' => 'required',
        'value6' => 'required',
        'value8' => 'required',
        'value10' => 'required',
        'value11' => 'required',
        'value12' => 'required',
        'value13' => 'required',
    ]);

    $items = [
        ['item_id' => 3, 'input_name' => 'value3'],
        ['item_id' => 4, 'input_name' => 'value4'],
        ['item_id' => 5, 'input_name' => 'value5'],
        ['item_id' => 6, 'input_name' => 'value6'],
        ['item_id' => 8, 'input_name' => 'value8'],
        ['item_id' => 10, 'input_name' => 'value10'],
        ['item_id' => 11, 'input_name' => 'value11'],
        ['item_id' => 12, 'input_name' => 'value12'],
        ['item_id' => 13, 'input_name' => 'value13'],
    ];
    
    foreach ($items as $item) {
        Selection::create([
            'item_id' => $item['item_id'],
            'selected_number' => $validatedData[$item['input_name']],
        ]);
    }
   

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