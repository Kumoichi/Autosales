<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/targetselection.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/title.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bottomButton.css') }}"> 
 

    <title>Document</title>
 
</head>
<body class="selectionphase">
    <div>
        @include('layout.selection')
    </div>

    <div class="white-back">
        <p class="green-underline"><span style="color: red;">＊</span>ターゲットを選択する</p>

        <div class="centered-container">
           
        <ul id="targetList">
            <li><a href="#" class="circle"><span class="inner-circle"></span></a> ターゲットA</li>
            <li><a href="#" class="circle"><span class="inner-circle"></span></a> ターゲットB</li>
            <li><a href="#" class="circle"><span class="inner-circle"></span></a> ターゲットC</li>
            <li><a href="#" class="circle"><span class="inner-circle"></span></a> ターゲットD</li>
        </ul>

           </div>

        <form id="targetForm" action="{{ route('handle.target.selection') }}" method="post">
            @csrf 
            <input type="hidden" name="targetName" id="targetNameInput">
        </form>
    </div>

    <div class="center-bottom-buttons">
        <div class="button-wrapper">
            <a href="contentselection" class="pagemovement-button left">前へ戻る</a>
            <a href="contentselection" class="pagemovement-button under">最初から設定</a>
            <div id="openModal" onclick="submitForm()" class="pagemovement-button right">確認画面へ進む</div>
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
