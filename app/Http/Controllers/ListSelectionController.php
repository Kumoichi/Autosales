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
        $selectedRegions = $request->input('selectedRegion');
        $selectedRegionArray = json_decode($selectedRegions);

        // getRegionMappingの関数から数字を都道府県ごとにあてはめている。
        $regionMapping = $this->getRegionMapping();

        
        $items = [];
        
        foreach ($selectedRegionArray as $input_name) {
                $items[] = [
                    'item_id' => 1,
                    'input_name' => $regionMapping[$input_name],
                ];
        }

        $validatedData = $request->validate([
            'value3' => 'required',
            'value4' => 'required',
            'value5' => 'required',
            'value6' => 'required',
            'value8' => 'required',
            'value9' => 'required',
            'value10' => 'required',
            'value11' => 'required',
            'value12' => 'required',
            'value13' => 'required',
        ]);
    
    
        $additionalItems = [
            ['item_id' => 3, 'input_name' => $validatedData['value3']],
            ['item_id' => 4, 'input_name' => $validatedData['value4']],
            ['item_id' => 5, 'input_name' => $validatedData['value5']],
            ['item_id' => 6, 'input_name' => $validatedData['value6']],
            ['item_id' => 8, 'input_name' => $validatedData['value8']],
            ['item_id' => 9, 'input_name' => $validatedData['value9']],
            ['item_id' => 10, 'input_name' => $validatedData['value10']],
            ['item_id' => 11, 'input_name' => $validatedData['value11']],
            ['item_id' => 12, 'input_name' => $validatedData['value12']],
            ['item_id' => 13, 'input_name' => $validatedData['value13']],
        ];

        // Merge the arrays
        $items = array_merge($items, $additionalItems);
    
        foreach ($items as $item) {
            Selection::create([
                'item_id' => $item['item_id'],
                'selected_number' => $item['input_name'],
            ]);
        }
    
        return redirect()->back()->with('success', 'Data inserted successfully!');
}


private function getRegionMapping() {
    return [
        "北海道" => 1,
        "青森県" => 2,
        "岩手県" => 3,
        // Add more regions here if needed
    ];
}

public function handleTestSelection(Request $request)
    {
        $validatedData = $request->validate([
            'data' => 'required',
        ]);
        
        // Retrieve the data sent from the form
        $data = $request->input('data');
        dd($data);
        

        Selection::create([
            'item_id' => 7,
            'selected_number' => $request->input('data'),
        ]);
        // return view ("listpages.listselection");
        return redirect()->back()->with('success', 'Data inserted successfully!');

    }


    public function handleModalSelection(Request $request)
    {
        $data = $request->input('selectedRegion');
        dd($data);
    }
}