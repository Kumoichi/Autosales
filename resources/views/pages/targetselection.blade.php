<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/targetselection.css') }}"> 

    <title>Document</title>
</head>
<body class="targetselection">
<div>
    @include('layout.selection')
</div>

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
</html>
