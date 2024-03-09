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

</head>
<body class="contentselection">
<div>
    @include('layout.selection')
</div>

<div class="white-back">
        <p class="green-underline">テンプレートを選択</p>
        <a href="template" class="skip-button">テンプレートを選択せず、配信内容へ進む</a>

        @foreach($template as $templateItem)
    <div class="template-one" onclick="selectTemplate(this, '{{ $templateItem->id }}')">
        {!! $templateItem->template !!}
    </div>
@endforeach



    
    <div class="center-container">
        <div class="button-wrapper">
            <a href="targetselection" class="pagemovement-button">前のページ</a>
            <a href="templateselection" id="openModal" class="pagemovement-button">テンプレートを選択</a>
        </div>
        <a href="targetselection" class="firstpage-button">最初から設定</a>
    </div>

</body>
</html>


<script>
function selectTemplate(selectedDiv, templateId) {
    // Remove 'clicked' class from all .template-one divs
    var templateDivs = document.querySelectorAll('.template-one');
    templateDivs.forEach(function(div) {
        div.classList.remove('clicked');
    });
    
    // Add 'clicked' class to the selected div
    selectedDiv.classList.add('clicked');
    
    // You can handle other selection actions here
}

</script>