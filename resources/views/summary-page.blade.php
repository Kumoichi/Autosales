<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Third Page</title>
    <link rel="stylesheet" href="{{ asset('css/summary-page.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/bottomButton.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/title.css') }}"> 
</head>

<body class="summaryphase">
<div>
    @include('layout.selection')
</div>


<p>Selected Target: {{ $targetName }}</p>
@if ($locationData)
    <p>Location Data: {{ $locationData }}</p>
@else
    <p>No location data found for {{ $targetName }}</p>
@endif

<div class="white-back">
    
    <p class="green-underline">配信内容を確認してください</p>
    <div class="summarycontainer">
        <div id="selectedTarget" class="targetContainer"></div>
        <div class="template-display">
            <div id="selectedTemplateContentContainer"></div>
        </div>
    </div>
</div>


<div class="center-container">
        <div class="button-wrapper">
            <a href="templateselection" class="pagemovement-button">前のページ</a>
            <a href="timeselection" id="openModal" class="pagemovement-button">テンプレートを選択</a>
        </div>
        <a href="targetselection" class="firstpage-button">最初から設定</a>
    </div>
<!-- 
<div class="center-container">
        <div class="button-wrapper">
            <a href="templateselection" class="pagemovement-button">前へ戻る</a>
            <a href="summary-page" id="openModal" class="pagemovement-button">配信画面の設定</a>
        </div>
        <a href="targetselection" class="firstpage-button">最初から設定</a>
    </div> -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var selectedTargetValue = sessionStorage.getItem('selectedTarget');
    if (selectedTargetValue) {
        var selectedTarget = document.getElementById('selectedTarget');
        selectedTarget.textContent = selectedTargetValue; 
    }
});

        document.addEventListener('DOMContentLoaded', function() {
            var selectedTemplateContent = sessionStorage.getItem('selectedTemplateContent');
            if (selectedTemplateContent) {
                var selectedTemplateContentContainer = document.getElementById('selectedTemplateContentContainer');
                selectedTemplateContentContainer.textContent = selectedTemplateContent;
            }
        });


    </script>
</body>
</html> 

