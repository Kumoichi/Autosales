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
        if($selectedRegionArray != null){
            foreach ($selectedRegionArray as $selected_number) {
                    $items[] = [
                        'item_id' => 1,
                        'selected_number' => $regionMapping[$selected_number],
                    ];
            }
        }


        // 法人格
        $selectedCorporateStatus = $request->input('selectedCorporateStatus');
        $selectedCorporateStatus = json_decode($selectedCorporateStatus);

        $corporateStatusMapping = $this->getCorporateStatusMapping();
        
        $corporateStatusItems = [];
        if (!empty($selectedCorporateStatus)) {
            foreach ($selectedCorporateStatus as $selected_number) {
                    $corporateStatusItems[] = [
                        'item_id' => 2,
                        'selected_number' => $corporateStatusMapping[$selected_number],
                    ];
            }
        }


        // 業種
        $selectedIndustry = $request->input('selectedIndustry');
        $selectedIndustry = json_decode($selectedIndustry);
        
        dd($selectedIndustry);
        $corporateStatusItems = [];
        if (!empty($selectedCorporateStatus)) {
            foreach ($selectedCorporateStatus as $selected_number) {
                    $corporateStatusItems[] = [
                        'item_id' => 2,
                        'selected_number' => $corporateStatusMapping[$selected_number],
                    ];
            }
        }
        
        $validatedData = $request->validate([
            'value3' => 'nullable',
            'value4' => 'nullable',
            'value5' => 'nullable',
            'value6' => 'nullable',
            'value8' => 'nullable',
            'value9' => 'nullable',
            'value10' => 'nullable',
            'value11' => 'nullable',
            'value12' => 'nullable',
            'value13' => 'nullable',
        ]);
    
        $additionalItems = [
            ['item_id' => 3, 'selected_number' => $validatedData['value3']],
            ['item_id' => 4, 'selected_number' => $validatedData['value4']],
            ['item_id' => 5, 'selected_number' => $validatedData['value5']],
            ['item_id' => 6, 'selected_number' => $validatedData['value6']],
            ['item_id' => 8, 'selected_number' => $validatedData['value8']],
            ['item_id' => 9, 'selected_number' => $validatedData['value9']],
            ['item_id' => 10, 'selected_number' => $validatedData['value10']],
            ['item_id' => 11, 'selected_number' => $validatedData['value11']],
            ['item_id' => 12, 'selected_number' => $validatedData['value12']],
            ['item_id' => 13, 'selected_number' => $validatedData['value13']],
        ];

        // Merge the arrays
        $items = array_merge($items, $corporateStatusItems, $additionalItems);

        $items = array_filter($items, function ($item) {
            return $item['selected_number'] !== null;
        });

        // dd($items);

        foreach ($items as $item) {
            Selection::create([
                'item_id' => $item['item_id'],
                'selected_number' => $item['selected_number'],
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


function getCorporateStatusMapping() {
    return [
        "株式会社" => 1,
        "合名会社"=> 2,
        "特定非営利活動法人"=> 3,
        "有限会社"=> 4,
        "社会福祉法人"=> 5,
        "学校法人"=> 6,
        "合同会社"=> 7,
        "社団法人"=> 8,
        "財団法人"=> 9,
        "合資会社"=> 10,
        "その他"=> 11,
    ];
}


public function handleTestSelection(Request $request)
{

    // Retrieve the data sent from the form
    $data = $request->input('coins');
    $request->session()->put('testsession', $data);

    return view("modal-page");
}


public function handleModalSelection(Request $request)
    {
        $selectedRegions = $request->input('selectedIndustry');
        $selectedRegionArray = json_decode($selectedRegions);

        dd($selectedRegionArray);

    }

    public function getSessionData(Request $request)
    {
        $targetName = $request->session()->get('testsession');
        dd($targetName);
    }

}

