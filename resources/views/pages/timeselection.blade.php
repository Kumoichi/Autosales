<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/timeselection.css') }}" rel="stylesheet">


    <title>Document</title>
</head>
<body class="timeselection">


<div>
    @include('layout.selection')

    <p class="green-underline">配信タイミングの指定</p>

    <p class="underwords">必須項目は（<span style = "color: red;">＊</span>）すべて選択してください</p>
    @include('calendar_form')

    <div class="center-container">
    <div class="button-wrapper">
        <a href="targetselection" class="pagemovement-button">前のページ</a>
        <a href="contentselection" class="pagemovement-button">案件コードの入力</a>
    </div>
    <a href="targetselection" class="firstpage-button">最初から設定</a>
</div>



</div>
</body>
</html>
