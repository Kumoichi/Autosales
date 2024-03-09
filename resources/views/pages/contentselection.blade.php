<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/title.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/contents.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/bottomButton.css') }}"> 



    <title>Document</title>

</head>
<body class="contentselection">
<div>
    @include('layout.selection')
</div>



<div class="white-back">
        <p class="green-underline">コンテンツを選択する</p>
        <a href="template" class="skip-button">コンテンツを選択せず、テンプレート選択へ進む</a>

        <div class="image-container">
            <div class="containers">
                <div>one</div>
                <div>two</div>
                <div>three</div>
                <div>four</div>
                <div>five</div>
                <div>six</div>
            </div>
        </div>
</div>

<div class="center-container">
        <div class="button-wrapper">
            <a href="targetselection" class="pagemovement-button">前のページ</a>
            <a href="templateselection" id="openModal" class="pagemovement-button">テンプレートを選択</a>
        </div>
        <a href="targetselection" class="firstpage-button">最初から設定</a>
    </div>

</body>
</html>
