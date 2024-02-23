<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/targetselection.css') }}"> 
    <title>Sideways Triangle with Square</title>
    @include('layout.topbar')
</head>

<body class="targetselection">
    <div class="three-container">
    <h1>メール配信指示設定</h1>

    </div>
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

    <div>
        <a href="contentselection">yo</a>
    </div>
</body>
</html>
