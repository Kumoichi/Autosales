<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Third Page</title>
    <link rel="stylesheet" href="{{ asset('css/summary-page.css') }}"> 

</head>
<body>
<h1>Thirds Page</h1>
<div class="container">
    <div id="selectedTarget"></div>
    <div class="template-display">
        <div id="selectedTemplateContentContainer"></div>
    </div>
</div>


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

