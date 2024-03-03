<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Another Page</title>
    <style>
        ul {
            list-style-type: none; /* Remove default bullet point */
        }
        .circle {
            margin-right: 10px; /* Adjust margin between circles */
            text-decoration: none; /* Remove default underline */
            color: white;          /* Initial color is white */ 
            cursor: pointer;       /* Show pointer cursor on hover */
            display: inline-block; /* Allows setting width and height */
            width: 15px;           /* Example size */
            height: 15px;          /* Example size */
            border-radius: 50%;    /* Create the circle shape */
            border: 2px solid gray; /* Black border */
            text-align: center;    /* Center the text horizontally */
            vertical-align: middle; /* Align vertically with the text */
        }
        
        .circle.clicked {
            background-color: blue; /* Change background color when clicked */
        }

        li {
            vertical-align: middle; /* Align the text vertically with the circle */
            margin-bottom: 10px; /* Adjust margin between list items */
        }
    </style>
</head>

<body>
    <h1>Welcome to Another Page</h1>
    
    @if(isset($names) && $names->count() > 0)
        <p>Names:</p>
        <ul id="targetList">
            @foreach($names as $name)
                <li>
                    <a href="#" class="circle" data-target="{{ $name }}"></a> {{ $name }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No names found</p>
    @endif

  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.circle').click(function() {
            $(this).toggleClass('clicked');
            
            var targetName = $(this).data('target');
            
            // Reset sessionStorage
            sessionStorage.removeItem('selectedTargets');
            
            // Toggle selected target in session storage
            var selectedTargets = [];
            selectedTargets.push(targetName);
            sessionStorage.setItem('selectedTargets', JSON.stringify(selectedTargets));
        });
    });
</script>

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Scrollable List</title>
<style>
    .list-container {
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 5px;
    }

    .list-item {
        padding: 10px;
        border-bottom: 1px solid #eee;
    }
</style>
</head>
<body>

<div class="list-container">
    <div class="list-item">Item 1</div>
    <div class="list-item">Item 2</div>
    <div class="list-item">Item 3</div>
    <div class="list-item">Item 4</div>
    <div class="list-item">Item 5</div>
    <div class="list-item">Item 6</div>
    <div class="list-item">Item 7</div>
    <div class="list-item">Item 8</div>
    <div class="list-item">Item 9</div>
    <div class="list-item">Item 10</div>
    <!-- Add more items as needed -->
</div>

</body>
</html>
