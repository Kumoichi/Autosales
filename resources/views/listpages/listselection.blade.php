<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/listpagecss/listselection.css') }}" rel="stylesheet">
    <link href="{{ asset('css/listpagecss/circle-selection.css') }}" rel="stylesheet">
    <link href="{{ asset('css/listpagecss/modal-page.css') }}" rel="stylesheet">
    <script src="{{ asset('js/modal-page.js') }}"></script>


    <title>Document</title>
    
    @include('layout.topbar')
</head>
<body>
<div style="margin-left:21%;">項目で詳細条件を選択してください</div> 
    <!-- 都道府県のモーダルウィンドウ -->
    @include('listpages.prefectures-modal')
    <!-- 法人格モーダルウィンドウ -->
    @include('listpages.corporateStatus-modal')
    <!-- 業種モーダルウィンドウ -->
    @include('listpages.industry-modal')

    <form class="listselection_container" id="data-form" action="{{ route('handle.list.selection') }}" method="POST">
    @csrf
    <!-- 左側 -->
        <div class="two-box">          
            <!-- 地域 -->
            <!-- Modalのjavascriptはmodal-page.jsにある -->
            <div class="inner-box">
                <div class="nested-div-description">地域：</div>
                <div class="nested-div-choice" onclick="openModal()">地域を選択してください<div class="down-arrow">&#9660;</div></div>
                <input type="hidden" id="selectedRegionInput" name="selectedRegion">
                <div class="underline"></div>
            </div>

            <!-- 法人格 -->
            <div class="inner-box">
                <div class="nested-div-description">法人格：</div>
                <div class="nested-div-choice corporateStatus" onclick="openCorporateStatusModal()">法人格を選択してください<div class="down-arrow">&#9660;</div></div>
                <input type="hidden" id="selectedCorporateStatus" name="selectedCorporateStatus">
                <div class="underline"></div>    
            </div>

            <!-- 資本金 -->
            <div class="inner-box">
                <div class="nested-div-description">資本金（千円）：</div>
                <div class="horizontal-box">
                    <input type="text" name="value3" placeholder="￥" class="inner-box hori" style="padding-left: 8px;">
                    <span class="divider">~</span>
                    <input type="text" name="value4" placeholder="￥" class="inner-box hori" style="padding-left: 8px;">
                </div>
                <div class="underline"></div>
            </div>

            <!-- 設立年 -->
            <div class="inner-box">
                <div class="nested-div-description">設立年：</div>
                <div class="horizontal-box">
                    <input type="text" name="value5" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;">
                    <span class="divider">~</span>
                    <input type="text" name="value6" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;">
                </div>
            </div>
        </div>

        <!-- 右側 -->


        <!-- 業種 -->
        <div class="two-box bigger">
            <!-- <div class="inner-box">
                <div class="nested-div-description">業種：</div>
                <div class="f">業種を選択してください<div class="down-arrow">&#9660;</div></div>
                <div class="underline"></div>
            </div> -->
            <div class="inner-box">
                <div class="nested-div-description">業種：</div>
                <div class="nested-div-choice" onclick="openIndustryModal()">業種を選択してください<div class="down-arrow">&#9660;</div></div>
                <input type="hidden" id="selectedIndustryInput" name="selectedIndustry">
                <div class="underline"></div>
            </div>

            
            <!-- 事業所区分 -->
            <div class="inner-box">     
            <div class="nested-div-description">事業所区分：</div>
                <div class="three-circle-selection-container">
                    <div class="circle-selection-container">
                        <div class="jigyo-outer-circle" onclick="jigyoShowInnerCircle(1)">
                            <div class="jigyo-inner-circle" id="jigyo-inner-circle-1"></div>
                        </div>

                        <div class="circle-selection-content">本社</div>
                        <div id="jigyo-selected-data-1" style="display:none">1</div>
                    </div>

                    <div class="circle-selection-container">
                        <div class="jigyo-outer-circle" onclick="jigyoShowInnerCircle(2)">
                            <div class="jigyo-inner-circle" id="jigyo-inner-circle-2"></div>
                        </div>

                        <div class="circle-selection-content">その他・未分類</div>
                        <div id="jigyo-selected-data-2" style="display:none">2</div>
                    </div>

                    <div class="circle-selection-container">
                        <div class="jigyo-outer-circle" onclick="jigyoShowInnerCircle(3)">
                            <div class="jigyo-inner-circle" id="jigyo-inner-circle-3"></div>
                        </div>

                        <div class="circle-selection-content">すべて</div>
                        <div id="jigyo-selected-data-3" style="display:none">3</div>
                    </div>
                    <input id="value8" type="hidden" name="value8">
                </div>
                <div class="underline"></div>  
            </div>


            <div class="inner-box">
            <div class="nested-div-description">上場区分：</div>
                <div class="three-circle-selection-container">
                    <div class="circle-selection-container">
                        <div class="jojo-outer-circle" onclick="jojoShowInnerCircle(4)">
                            <div class="jojo-inner-circle" id="jojo-inner-circle-4"></div>
                        </div>

                        <div class="circle-selection-content">上場</div>
                        <div id="jojo-selected-data-4" style="display:none">1</div>
                    </div>

                    <div class="circle-selection-container">
                        <div class="jojo-outer-circle" onclick="jojoShowInnerCircle(5)">
                            <div class="jojo-inner-circle" id="jojo-inner-circle-5"></div>
                        </div>

                        <div class="circle-selection-content">非上場</div>
                        <div id="jojo-selected-data-5" style="display:none">2</div>
                    </div>

                    <div class="circle-selection-container">
                        <div class="jojo-outer-circle" onclick="jojoShowInnerCircle(6)">
                            <div class="jojo-inner-circle" id="jojo-inner-circle-6"></div>
                        </div>

                        <div class="circle-selection-content">すべて</div>
                        <div id="jojo-selected-data-6" style="display:none">3</div>
                    </div>
                </div>
                <input id="value9" type="hidden" name="value9">

                <div class="underline"></div>  
            </div>


            <!-- 従業員数 -->
            <div class="inner-box">
                <div class="nested-div-description">従業員数（人）：</div>
                <div class="horizontal-box">
                    <input type="text" name="value10" placeholder="従業員" class="inner-box hori" style="padding-left: 8px;">
                    <span class="divider">~</span>
                    <input type="text" name="value11" placeholder="従業員" class="inner-box hori" style="padding-left: 8px;">
                </div>
                <div class="underline"></div>        
            </div>


            <!-- 売上高 -->
            <div class="inner-box">
                <div class="nested-div-description">売上高（百万円）：</div>
                <div class="horizontal-box">
                    <input type="text" name="value12" placeholder="売上高" class="inner-box hori" style="padding-left: 8px;">
                    <span class="divider">~</span>
                    <input type="text" name="value13" placeholder="売上高" class="inner-box hori" style="padding-left: 8px;">
                </div>
                       
            </div>
        </div>
        
    </form>
    <div class="submit-container">
        <button class="submit-button" type="submit" id="submit-btn">この条件で検索</button>   
    </div>
                            
</body>
</html>

<script>
function validateForm() {
    var value3 = document.querySelector('input[name="value3"]').value.trim();
    var value4 = document.querySelector('input[name="value4"]').value.trim();
    var value5 = document.querySelector('input[name="value5"]').value.trim();
    var value6 = document.querySelector('input[name="value6"]').value.trim();
    var value8 = document.getElementById('value8').value.trim();
    var value9 = document.getElementById('value9').value.trim();
    var value10 = document.querySelector('input[name="value10"]').value.trim();
    var value11 = document.querySelector('input[name="value11"]').value.trim();
    var value12 = document.querySelector('input[name="value12"]').value.trim();
    var value13 = document.querySelector('input[name="value13"]').value.trim();

    if (value3 === '' || value4 === '') {
        alert('資本金を入力してください');
        return false;
    }

    if (value5 === '' || value6 === '') {
        alert('設立年を入力してください');
        return false;
    }

    if (value8 === '') {
        alert('事業所区分を選択してください');
        return false;
    }

    if (value9 === '') {
        alert('上場区分を選択してください');
        return false;
    }

    if (value10 === '' || value11 === '') {
        alert('従業員数を入力してください');
        return false;
    }

    if (value12 === '' || value13 === '') {
        alert('売上高を入力してください');
        return false;
    }

    return true;
}



    function jigyoShowInnerCircle(circleNumber) {
        var innerCircle = document.getElementById("jigyo-inner-circle-" + circleNumber);
        var outerCircle = innerCircle.parentElement;
        var selectedValue = document.getElementById("jigyo-selected-data-" + circleNumber).innerText.trim();

        
        // Hide all inner circles and reset border colors
        var allInnerCircles = document.querySelectorAll('.jigyo-inner-circle');
        var allOuterCircles = document.querySelectorAll('.jigyo-outer-circle');
        allInnerCircles.forEach(function(circle) {
            circle.style.display = "none";
        });
        allOuterCircles.forEach(function(circle) {
            circle.style.borderColor = "black";
        });

        // Show inner circle and set border color for the selected circle
        innerCircle.style.display = "block";
        outerCircle.style.borderColor = "#11A7B7";
        document.getElementById('value8').value = selectedValue;
    }

    function jojoShowInnerCircle(circleNumber) {
        var innerCircle = document.getElementById("jojo-inner-circle-" + circleNumber);
        var outerCircle = innerCircle.parentElement;
        var selectedValue = document.getElementById("jojo-selected-data-" + circleNumber).innerText.trim();

        
        // Hide all inner circles and reset border colors
        var allInnerCircles = document.querySelectorAll('.jojo-inner-circle');
        var allOuterCircles = document.querySelectorAll('.jojo-outer-circle');
        allInnerCircles.forEach(function(circle) {
            circle.style.display = "none";
        });
        allOuterCircles.forEach(function(circle) {
            circle.style.borderColor = "black";
        });

        // Show inner circle and set border color for the selected circle
        innerCircle.style.display = "block";
        outerCircle.style.borderColor = "#11A7B7";
        document.getElementById('value9').value = selectedValue;
    }

    document.getElementById('submit-btn').addEventListener('click',function(event){
        event.preventDefault(); 
        // if (validateForm()) {
        document.getElementById('data-form').submit();
        // }
    });
</script>
