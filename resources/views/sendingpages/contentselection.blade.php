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
<body class="selectionphase">
    <div>
        @include('layout.selection')
    </div>
 
<div class="white-back">
    <p class="green-underline">コンテンツを選択する</p>
    <a href="targetselection" class="skip-button">コンテンツを選択せず、テンプレート選択へ進む</a>
    <div class="image-container">
    <div class="containers">
        <div onclick="selectContent(1, this)">
            <img src="{{ asset('images/contents.png')}}" alt="User Icon" style="height: 160px; width: 300px;">
        </div>
        <div onclick="selectContent(3, this)">
            <img src="{{ asset('images/contents.png')}}" alt="User Icon" style="height: 160px; width: 300px;">
        </div>
        <div onclick="selectContent(5, this)">
            <img src="{{ asset('images/contents.png')}}" alt="User Icon" style="height: 160px; width: 300px;">
        </div>
        <div onclick="selectContent(7, this)">
            <img src="{{ asset('images/contents.png')}}" alt="User Icon" style="height: 160px; width: 300px;">
        </div>
        <div onclick="selectContent(9, this)">
            <img src="{{ asset('images/contents.png')}}" alt="User Icon" style="height: 160px; width: 300px;">
        </div>
    </div>
    <div class="containers">
        <div onclick="selectContent(2, this)">
            <img src="{{ asset('images/contents.png')}}" alt="User Icon" style="height: 160px; width: 300px;">
        </div>
        <div onclick="selectContent(4, this)">
            <img src="{{ asset('images/contents.png')}}" alt="User Icon" style="height: 160px; width: 300px;">
        </div>
        <div onclick="selectContent(6, this)">
            <img src="{{ asset('images/contents.png')}}" alt="User Icon" style="height: 160px; width: 300px;">
        </div>
        <div onclick="selectContent(8, this)">
            <img src="{{ asset('images/contents.png')}}" alt="User Icon" style="height: 160px; width: 300px;">
        </div>
        <div onclick="selectContent(10, this)">
            <img src="{{ asset('images/contents.png')}}" alt="User Icon" style="height: 160px; width: 300px;">
        </div>
    </div>
</div>

<div class="center-bottom-buttons">
    <div class="button-wrapper">
        <a href="contentselection" class="pagemovement-button left">前へ戻る</a>
        <a href="contentselection" class="pagemovement-button under">最初から設定</a>
        <div id="openModal" onclick="submitForm()" class="pagemovement-button right">ターゲット選択へ進む</div>
    </div>
</div>

<form id="contentForm" action="{{ route('handle.content.selection') }}" method="POST">
    @csrf
    <input type="hidden" name="selectedContent" id="selectedContent">
</form>

<script>
    let selectedContent = null;

    function selectContent(contentId, element) {
        selectedContent = contentId;

        let allContent = document.querySelectorAll('.containers div');
        allContent.forEach(content => {
            content.style.borderColor = 'gray';  
        });

        element.style.borderColor = 'orange';  

        console.log("Selected Content Value:", selectedContent); 

        if (selectedContent) {
            console.log("Content selected successfully."); 
        } else {
            console.log("No content selected."); 
        }
    }

    function submitForm() {
        if (selectedContent) {
            document.getElementById("selectedContent").value = selectedContent;
            document.getElementById("contentForm").submit();
        } else {
            alert("コンテンツを選択してください");
        }
    }
</script>

</body>
</html>