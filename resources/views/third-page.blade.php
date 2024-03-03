<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Third Page</title>
    <style>
        #selectedTargetsList {
            text-align: center;
            color: red;
            padding: 0;
        }
        
    </style>
</head>
<body>
    <h1>Third Page</h1>
    <p>Selected Target Names:</p>
    <div id="selectedTargetsList"><div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectedTargets = sessionStorage.getItem('selectedTargets');
            if (selectedTargets) {
                selectedTargets = JSON.parse(selectedTargets);
                var selectedTargetsList = document.getElementById('selectedTargetsList');
                selectedTargets.forEach(function(target) {
                    var listItem = document.createElement('div');
                    listItem.textContent = target;
                    selectedTargetsList.appendChild(listItem);
                });
            }
        });
    </script>
</body>
</html>
