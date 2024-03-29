<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/selection.css') }}"> 
    <title>Sideways Triangle with Square</title>
    @include('layout.topbar')
</head>

<body>

    <div class="three-container">
    <h2>メール配信指示設定</h2>

    </div>

        <div class="three-container">
            <div class="shape-container">
                <div class="square">
                    <div class="instruction">配信条件指示</div>
                    <div class="triangle-hide"></div> 
                </div>
                <div class="triangle"></div>
            </div>

            <div class="shape-container">
                <div class="square">
                <div class="instruction">配信内容確認</div>
                    <div class="triangle-hide"></div> 
                </div>
                <div class="triangle"></div>
            </div>

            <div class="shape-container">
                <div class="square">
                <div class="instruction3">配信タイミング指定</div>
                    <div class="triangle-hide"></div> 
                </div>
                <div class="triangle"></div>
            </div>
        </div>
</body>
</html>
