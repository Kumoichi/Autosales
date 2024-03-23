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
        // 都道府県
        $selectedRegions = $request->input('selectedRegion');
        $selectedRegionArray = json_decode($selectedRegions);

        $regionMapping = $this->getRegionMapping();
        
        $items = [];
        
        foreach ($selectedRegionArray as $input_name) {
                $items[] = [
                    'item_id' => 1,
                    'input_name' => $regionMapping[$input_name],
                ];
        }
        // 都道府県↑


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
        "宮城県" => 4,
        "秋田県" => 5,
        "山形県" => 6,
        "福島県" => 7,
        "茨城県" => 8,
        "栃木県" => 9,
        "群馬県" => 10,
        "埼玉県" => 11,
        "千葉県" => 12,
        "東京都" => 13,
        "神奈川県" => 14,
        "新潟県" => 15,
        "富山県" => 16,
        "石川県" => 17,
        "福井県" => 18,
        "山梨県" => 19,
        "長野県" => 20,
        "岐阜県" => 21,
        "静岡県" => 22,
        "愛知県" => 23,
        "三重県" => 24,
        "滋賀県" => 25,
        "京都府" => 26,
        "大阪府" => 27,
        "兵庫県" => 28,
        "奈良県" => 29,
        "和歌山県" => 30,
        "鳥取県" => 31,
        "島根県" => 32,
        "岡山県" => 33,
        "広島県" => 34,
        "山口県" => 35,
        "徳島県" => 36,
        "香川県" => 37,
        "愛媛県" => 38,
        "高知県" => 39,
        "福岡県" => 40,
        "佐賀県" => 41,
        "長崎県" => 42,
        "熊本県" => 43,
        "大分県" => 44,
        "宮崎県" => 45,
        "鹿児島県" => 46,
        "沖縄県" => 47,
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