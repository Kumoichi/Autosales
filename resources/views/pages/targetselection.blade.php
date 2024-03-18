<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/targetselection.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/title.css') }}"> 

    <title>Document</title>
</head>
<body class="selectionphase">
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

        <form id="targetForm" action="{{ route('handle.target.selection') }}" method="post">
            @csrf 
            <input type="hidden" name="targetName" id="targetNameInput">
        </form>

        <div class="center-container">
            <a href="dashboard" class="pagemovement-button">前へもどる</a>
            <a href="#" onclick="submitForm();" class="pagemovement-button">コンテンツを選択</a>
        </div>
    </div>

    <script>
        function submitForm() {
            var targetName = document.querySelector('.circle.active').nextSibling.textContent.trim();
            document.getElementById('targetNameInput').value = targetName;
            document.getElementById('targetForm').submit();
        }

        document.addEventListener('DOMContentLoaded', function () {
            var circles = document.querySelectorAll('.circle');
            circles.forEach(function (circle) {
                circle.addEventListener('click', function (event) {
                    circles.forEach(function (c) {
                        c.classList.remove('active');
                    });
                    event.target.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>
