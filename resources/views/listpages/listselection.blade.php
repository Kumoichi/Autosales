<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .listselection_container {
            display: flex;
            margin-right: 130px;
        }

        .two-box {
            flex: 1;
            height: 400px;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }

        .inner-box {
            width: 350px; 
            height: 50px;
            background-color: white;
            margin: 10px;
        }

        .horizontal-box {
            height: 40px;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .divider {
            margin: 0 10px; 
            font-size: 24px; 
        }

        .hori{
            border: solid 1px gray;
            width: 156px;
            margin: 0;
            padding: 0;
            height: 40px;
            display:flex;
            align-items: center;
        }

        .nested-div-region {
            border: solid 1px gray;
            position: relative; 
            height: 40px;
            width: 100%;
            margin-bottom: 10px;
            background-color: white;
        }

        .down-arrow {
            position: absolute; 
            right: 5px; 
            top: 50%; 
            transform: translateY(-50%); 
        }

        .underline{
            background-color: gray;
            width: 100%;
            height: 2px;
        }

        
    </style>
    @include('layout.topbar')
</head>
<body>
    <div class="listselection_container">
        <div class="two-box">
            <div>項目で詳細条件を選択してください</div>
            
                <div class="inner-box">
                    <div class="nested-div-description">地域：</div>
                    <div class="nested-div-region">地域を選択してください<div class="down-arrow">&#9660;</div></div>
                    <div class="underline"></div>    
                </div>

                <div class="inner-box">
                    <div class="nested-div-description">法人格：</div>
                    <div class="nested-div-region">法人格を選択してください<div class="down-arrow">&#9660;</div></div>  
                    <div class="underline"></div>    
                </div>

                <div class="inner-box">
                <div class="nested-div-description">資本金（千円）：</div>

                <div class="horizontal-box">
                    <input type="text" name="value1" placeholder="￥" class="inner-box hori" style="padding-left: 8px;">
                    <span class="divider">~</span>
                    <input type="text" name="value2" placeholder="￥" class="inner-box hori" style="padding-left: 8px;">
                </div>

                <div class="underline"></div>    
                </div>

        <form method="POST" action="{{ route('handle.list.selection') }}">
        @csrf
                <div class="inner-box">
                <div class="nested-div-description">設立年：</div>
                <div class="horizontal-box">
                    <input type="text" name="value1" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;">
                    <span class="divider">~</span>
                    <input type="text" name="value2" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;">
                </div>
                </div>
            </div>
            <button type="submit">Submit</button>
        </form>
        
   
        <div class="two-box">
        <div class="inner-box">
                <div class="nested-div-description">業種：</div>
                <div class="nested-div-region">業種を選択してください<div class="down-arrow">&#9660;</div></div>
                <div class="underline"></div>    
            </div>
        </div>
    </div>
</body>
</html>
