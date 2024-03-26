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




<div class="white-back">
    
    <p class="green-underline">配信内容を確認してください</p>
    <div class="summarycontainer">
        <div id="selectedTarget" class="targetContainer"></div>
        <div class="template-display">
            <div id="selectedTemplateContentContainer"></div>
        </div>
    </div>
</div>  




    <script>

    </script>
</body>
</html> 

