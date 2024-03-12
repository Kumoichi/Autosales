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
        <a href="summary-page" class="skip-button">テンプレートを選択せず、配信内容へ進む</a>

        @foreach($template as $templateItem)
        <div class="template-one" onclick="selectTemplate(this, '{{ $templateItem->id }}', '{{ $templateItem->template }}')">
        {!! $templateItem->template !!}
    </div>
@endforeach



    
    <div class="center-container">
        <div class="button-wrapper">
            <a href="contentselection" class="pagemovement-button">前のページ</a>
            <a href="summary-page" id="openModal" class="pagemovement-button">確認画面に進む</a>
        </div>
        <a href="targetselection" class="firstpage-button">最初から設定</a>
    </div>

</body>
</html>


<script>
function selectTemplate(selectedDiv, templateId, templateContent) {
    console.log('Template ID:', templateId); // Log the template ID
    console.log('Template Content:', templateContent); // Log the template content

    var templateDivs = document.querySelectorAll('.template-one');
    templateDivs.forEach(function(div) {
        div.classList.remove('clicked');
    });
    // Add 'clicked' class to the clicked div
    selectedDiv.classList.add('clicked');

    // Store the selected template ID and content in sessionStorage
    sessionStorage.setItem('selectedTemplateId', templateId);
    sessionStorage.setItem('selectedTemplateContent', templateContent);
}



// function selectTemplate(selectedDiv, templateId) {
//     // Remove 'clicked' class from all .template-one divs
//     var templateDivs = document.querySelectorAll('.template-one');
//     templateDivs.forEach(function(div) {
//         div.classList.remove('clicked');
//     });
    
//     // Add 'clicked' class to the selected div
//     selectedDiv.classList.add('clicked');
    
//     // You can handle other selection actions here
// }

</script>