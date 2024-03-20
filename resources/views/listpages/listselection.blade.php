<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/listpagecss/listselection.css') }}" rel="stylesheet">
    <link href="{{ asset('css/listpagecss/circle-selection.css') }}" rel="stylesheet">

    <title>Document</title>
    
    @include('layout.topbar')
</head>
<body>

    <form class="listselection_container" id="data-form" action="{{ route('handle.list.selection') }}" method="POST">
    @csrf
    <!-- 左側 -->
        <div class="two-box">          
            <div>項目で詳細条件を選択してください</div> 
            <!-- 地域 -->
            <div class="inner-box">
                <div class="nested-div-description">地域：</div>
                <div class="nested-div-choice">地域を選択してください<div class="down-arrow">&#9660;</div></div>
                <div class="underline"></div>    
            </div>

            <!-- 法人格 -->
            <div class="inner-box">
                <div class="nested-div-description">法人格：</div>
                <div class="nested-div-choice">法人格を選択してください<div class="down-arrow">&#9660;</div></div>  
                <div class="underline"></div>    
            </div>

            <!-- 資本金 -->
            <div class="inner-box">
                <div class="nested-div-description">資本金（千円）：</div>
                <div class="horizontal-box">
                    <!-- <input type="text" name="value1" placeholder="￥" class="inner-box hori" style="padding-left: 8px;"> -->
                    <span class="divider">~</span>
                    <!-- <input type="text" name="value2" placeholder="￥" class="inner-box hori" style="padding-left: 8px;"> -->
                </div>

                <div class="underline"></div>
            </div>

            <!-- 設立年 -->
            <div class="inner-box">
                <div class="nested-div-description">設立年：</div>
                <div class="horizontal-box">
                    <input type="text" name="value1" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;">
                    <span class="divider">~</span>
                    <input type="text" name="value2" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;">
                </div>
            </div>
        </div>

        <!-- 右側 -->
        <!-- 業種 -->
        <div class="two-box bigger">
            <div class="inner-box">
                <div class="nested-div-description">業種：</div>
                <div class="nested-div-choice">業種を選択してください<div class="down-arrow">&#9660;</div></div>
                <div class="underline"></div>
            </div>

            
            <!-- 事業所区分 -->
            <div class="inner-box">                
                <div class="three-circle-selection-container">

                    <div class="circle-selection-container">
                        <div class="outer-circle" onclick="showInnerCircle(1)">
                            <div class="inner-circle" id="inner-circle-1"></div>
                        </div>

                        <div class="circle-selection-content">本社</div>
                        <div id="selected-data-1" style="display:none">1</div>
                    </div>

                    <div class="circle-selection-container">
                        <div class="outer-circle" onclick="showInnerCircle(2)">
                            <div class="inner-circle" id="inner-circle-2"></div>
                        </div>

                        <div class="circle-selection-content">その他・未分類</div>
                        <div id="selected-data-2" style="display:none">2</div>
                    </div>

                    <div class="circle-selection-container">
                        <div class="outer-circle" onclick="showInnerCircle(3)">
                            <div class="inner-circle" id="inner-circle-3"></div>
                        </div>

                        <div class="circle-selection-content">すべて</div>
                        <div id="selected-data-3" style="display:none">3</div>

                        
                    </div>
                </div>
                <div class="underline"></div>  
            </div>

            <!-- 従業員数 -->
            <div class="inner-box">
                <div class="nested-div-description">従業員数（人）：</div>
                <div class="horizontal-box">
                    <!-- <input type="text" name="value1" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;"> -->
                    <span class="divider">~</span>
                    <!-- <input type="text" name="value2" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;"> -->
                </div>
                <div class="underline"></div>        
            </div>


            <!-- 売上高 -->
            <div class="inner-box">
                <div class="nested-div-description">売上高（百万円）：</div>
                <div class="horizontal-box">
                    <!-- <input type="text" name="value1" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;"> -->
                    <span class="divider">~</span>
                    <!-- <input type="text" name="value2" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;"> -->
                </div>
                <div class="underline"></div>        
            </div>
        </div>
        
        <input id="jigyoukubunsho-input" type="hidden" name="data">
        <button type="submit" id="submit-btn">Submit</button>
    </form>
                            
</body>
</html>

<script>
    function showInnerCircle(circleNumber) {
        var innerCircle = document.getElementById("inner-circle-" + circleNumber);
        var outerCircle = innerCircle.parentElement;
        var selectedValue = document.getElementById("selected-data-" + circleNumber).innerText.trim();

        
        // Hide all inner circles and reset border colors
        var allInnerCircles = document.querySelectorAll('.inner-circle');
        var allOuterCircles = document.querySelectorAll('.outer-circle');
        allInnerCircles.forEach(function(circle) {
            circle.style.display = "none";
        });
        allOuterCircles.forEach(function(circle) {
            circle.style.borderColor = "black";
        });

        // Show inner circle and set border color for the selected circle
        innerCircle.style.display = "block";
        outerCircle.style.borderColor = "red";
        document.getElementById('jigyoukubunsho-input').value = selectedValue;
    }

    document.getElementById('submit-btn').addEventListener('click',function(event){
        event.preventDefault(); 
        document.getElementById('data-form').submit();
    });
</script>
