<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/targetselection.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/title.css') }}"> 

    <title>Document</title>
</head>
<body class="targetselection">
    <div>
        @include('layout.selection')
    </div>

    <div class="white-back">
        <p class="green-underline"><span style="color: red;">＊</span>ターゲットを選択する</p>

        <div class="centered-container">
            @if(isset($names) && $names->count() > 0)
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
        </div>

        <div class="center-container">
            <a href="dashboard" class="pagemovement-button">前へもどる</a>
            <a href="contentselection" class="pagemovement-button">コンテンツを選択</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize selectedTargets array from sessionStorage
            var selectedTargets = JSON.parse(sessionStorage.getItem('selectedTargets')) || [];

            $('.circle').click(function() {
                $(this).toggleClass('clicked');
                
                var targetName = $(this).data('target');
                
                // Check if the targetName is already in the selectedTargets array
                if (selectedTargets.indexOf(targetName) === -1) {
                    // If not present, push it to the array and update sessionStorage
                    selectedTargets.push(targetName);
                    sessionStorage.setItem('selectedTargets', JSON.stringify(selectedTargets));
                }
            });
        });
    </script>
</body>
</html>
