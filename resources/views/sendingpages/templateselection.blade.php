<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/title.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/contents.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/bottomButton.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/templateselection.css') }}"> 

    <title>Document</title>
    <style>

    </style>
</head>
<body class="selectionphase">
<div>
    @include('layout.selection')
</div>

<div class="white-back">
    <p class="green-underline">テンプレートを選択</p>
    <a href="contentselection" class="skip-button">テンプレートを選択せず、配信内容へ進む</a>
    <form id="templateForm" action="{{ route('handle.template.selection') }}" method="POST">
        @csrf
        <div class="template" id="templateOne" onclick="selectTemplate('templateTitleOne', this)">
            <input name="templateTitle" id="templateTitleOne" type="hidden" value="1">ベーステンプレート1
        </div> 

        <div class="template" id="templateTwo" onclick="selectTemplate('templateTitleTwo', this)">
            <input name="templateTitle" id="templateTitleTwo" type="hidden" value="2">ベーステンプレート2
        </div>

        <div class="template" id="templateThree" onclick="selectTemplate('templateTitleThree', this)">
            <input name="templateTitle" id="templateTitleThree" type="hidden" value="3">ベーステンプレート3
        </div>

        <div class="template" id="templateFour" onclick="selectTemplate('templateTitleFour', this)">
            <input name="templateTitle" id="templateTitleFour" type="hidden" value="4">ベーステンプレート4
        </div>

        <div class="template" id="templateFive" onclick="selectTemplate('templateTitleFive', this)">
            <input name="templateTitle" id="templateTitleFive" type="hidden" value="5">ベーステンプレート5
        </div>

        <div class="template" id="templateSix" onclick="selectTemplate('templateTitleSix', this)">
            <input name="templateTitle" id="templateTitleSix" type="hidden" value="6">ベーステンプレート6
        </div>

        <div class="template" id="templateSeven" onclick="selectTemplate('templateTitleSeven', this)">
            <input name="templateTitle" id="templateTitleSeven" type="hidden" value="7">ベーステンプレート7
        </div>


        <input type="hidden" name="selectedTemplate" id="selectedBox">
    </form>

</div>

<div class="center-bottom-buttons">
    <div class="button-wrapper">
        <a href="contentselection" class="pagemovement-button left">前のページ</a>
        <div id="openModal" onclick="submitForm()" class="pagemovement-button right">テンプレートを選択</div>
    </div>
</div>

<script>
    let selectedTemplate = null;

    function selectTemplate(templateId, element) {
        selectedTemplate = document.getElementById(templateId).value;
        
        // Remove red border from previously selected template
        let allTemplates = document.querySelectorAll('.template');
        allTemplates.forEach(template => {
            template.style.borderColor = 'gray';
        });

        // Add red border to the clicked template
        element.style.borderColor = 'orange';

        console.log("Selected Template Value:", selectedTemplate);
    }

    function submitForm() {
        if (selectedTemplate) {
            document.getElementById("selectedBox").value = selectedTemplate;
            document.getElementById("templateForm").submit();
        } else {
            alert("テンプレートを選択してください");
        }
    }
</script>

</body>
</html>
