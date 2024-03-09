<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/timeselection.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bottomButton.css') }}" rel="stylesheet">
        
    <title>Document</title>
</head>
<body class="timeselection">
<div>
    @include('layout.selection')

    <p class="green-underline">配信タイミングの指定</p>

    <p class="underwords">必須項目は（<span style="color: red;">＊</span>）すべて選択してください</p>
    @include('calendar_form')

    <div class="center-container">
        <div class="button-wrapper">
            <a href="targetselection" class="pagemovement-button">前のページ</a>
            <a href="#" id="openModal" class="pagemovement-button">案件コードの入力</a>
        </div>
        <a href="targetselection" class="firstpage-button">最初から設定</a>
    </div>
<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="selectedDateTime"></p>
        <p id="selectedFrequency"></p>
        

        <div style="text-align: center;">
            <p style="display:inline; color:gray; margin-right:20px;">案件コード</p>
            <input type="text" id="anken_box" name="selected_anken" class="styled-input">
        </div>


        <div style="margin-top:20px; text-align: center; display: flex; justify-content: space-around;">
            <button class="back-button"id="backButton">戻る</button>
            <button class="confirm-button" id="confirmButton">確認</button>
        </div>
    </div>
</div>





<script>

var ankenBox = document.getElementById('anken_box');
var confirmButton = document.getElementById('confirmButton');


    ankenBox.addEventListener('input', function() {

        if (ankenBox.value.trim() !== '') {
            confirmButton.style.backgroundColor = '#11A7B7'; 
        } else {
            confirmButton.style.backgroundColor = 'gray'; 
        }
    });


    var modal = document.getElementById('myModal');
    var link = document.getElementById("openModal");
    var span = document.getElementsByClassName("close")[0];
    var modalForm = document.getElementById('modalForm');
    var confirmButton = document.getElementById('confirmButton');

    link.onclick = function () {
        
        modal.style.display = "block";
        confirmButton.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    //いったん保留
    confirmButton.onclick = function () {
        var selectedDate = document.getElementById('selected_date_with_day').value;
        var selectedTime = document.getElementById('selected_time').value;
        var selectedFrequency = document.getElementById('selected_frequency').value;

        document.getElementById('selected_date_modal').value = selectedDate;
        document.getElementById('selected_time_modal').value = selectedTime;
        document.getElementById('selected_frequency_modal').value = selectedFrequency;

        document.getElementById('selectedDateTime').textContent = "Date: " + selectedDate + ", Time: " + selectedTime;
        document.getElementById('selectedFrequency').textContent = "Frequency: " + selectedFrequency;

        modal.style.display = "block";
    }

    modalForm.addEventListener('submit', function (event) {
        modalForm.submit();
    });
</script>