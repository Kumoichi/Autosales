<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .inner-box {
            width: 350px; 
            height: 50px;
            background-color: white;
            margin: 10px;
        }

        .nested-div-description {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .nested-div-choice {
            border: solid 1px gray;
            width: 100%;
            position: relative; 
            height: 40px;
            padding: 10px;
            box-sizing: border-box;
            cursor: pointer;
            background-color: white;
        }

        .down-arrow {
            position: absolute; 
            right: 10px; 
            top: 50%; 
            transform: translateY(-50%); 
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="inner-box">
    <div class="nested-div-description">地域：</div>
    <div class="nested-div-choice" onclick="openModal()">地域を選択してください<div class="down-arrow">&#9660;</div></div>
    <div class="underline"></div>
</div>

<!-- make modal window here -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <input type="checkbox" id="hokkaidoCheckbox" name="region" value="北海道" onclick ="updateSelectedRegion()">
        <label id="hokkaidoCheckbox">北海道</label><br>
        <input type="checkbox" id="aomoriCheckbox" name="region" value="青森" onclick ="updateSelectedRegion()">
        <label id="aomoriCheckbox">青森</label>
    </div>
</div>

<!-- make form here -->
<form id="regionForm" action="{{ route('handle.modal.selection') }}" method="POST">
    @csrf
    <input type="hidden" id="selectedRegionInput" name="selectedRegion">
</form>

<!-- make submit button here -->
<button onclick="submitForm()">Submit</button>
<script>

    // Make openModal function
    function openModal(){
        document.getElementById("myModal").style.display = "block";
    }

    // Make closeModal function
    function closeModal(){
        document.getElementById("myModal").style.display = "none";
    }

    // Make window clickable and disappear the modal window if other place is selected
    window.onclick = function(event) {
        var modal = document.getElementById("myModal");
        if(event.target == modal) {
            modal.style.display = "none";
        }
    }
// Initialize selectedRegion as an empty array
var selectedRegion = [];

// Make updateSelectedRegion() to pass the check box value to the nested-div-choice
// get hokkaido and aomori check box value, make an array, store values there and then submit
function updateSelectedRegion() {
    var hokkaidoCheckbox = document.getElementById("hokkaidoCheckbox");
    var aomoriCheckbox = document.getElementById("aomoriCheckbox");

    selectedRegion = [];

    if(hokkaidoCheckbox.checked)
    {
        selectedRegion.push(hokkaidoCheckbox.value);
    }
    // even if you are not pressing at that time, if the state is check this if statement is executed.
    if(aomoriCheckbox.checked)
    {
        selectedRegion.push(aomoriCheckbox.value);
    }

    document.querySelector(".nested-div-choice").innerText = selectedRegion.join(",");

    document.getElementById("selectedRegionInput").value = JSON.stringify(selectedRegion);
}

function submitForm()
    {
        document.getElementById("regionForm").submit();
    }

</script>
</body>
</html>
