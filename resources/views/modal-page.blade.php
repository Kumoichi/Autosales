<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="{{ asset('js/modal-page.js') }}"></script> -->
    <style>
        
.inner-box {
    width: 350px; 
    height: 50px;
    background-color: white;
    margin: 10px;
}

.nested-div-description {
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
        <input type="checkbox" id="selectAllCheckbox" onclick="toggleAllCheckboxes()">全て<br>
        <input type="checkbox" id="hokkaidoCheckbox" name="region" value="北海道" onclick="updateSelectedRegion()">
        <label for="hokkaidoCheckbox">北海道</label><br>
        <input type="checkbox" id="aomoriCheckbox" name="region" value="青森" onclick="updateSelectedRegion()">
        <label for="aomoriCheckbox">青森</label>
        <input type="checkbox" id="noneCheckbox" onclick="deselectAll()">選択しない
    </div>
</div>


<!-- make form here -->
<form id="regionForm" action="{{ route('handle.modal.selection') }}" method="POST">
    @csrf
    <input type="hidden" id="selectedRegionInput" name="selectedRegion">
</form>

<!-- make submit button here -->
<button onclick="submitForm()">Submit</button>


<a href="/getsession-page">jump to another page</a>
<script>




function toggleAllCheckboxes() {
    var selectAllCheckbox = document.getElementById("selectAllCheckbox");
    var hokkaidoCheckbox = document.getElementById("hokkaidoCheckbox");
    var aomoriCheckbox = document.getElementById("aomoriCheckbox");

    if (selectAllCheckbox.checked) {
        hokkaidoCheckbox.checked = true;
        aomoriCheckbox.checked = true;
    } else {
        hokkaidoCheckbox.checked = false;
        aomoriCheckbox.checked = false;
    }

    // Update the selected regions accordingly
    updateSelectedRegion();
}


function deselectAll() {
    var selectAllCheckbox = document.getElementById("selectAllCheckbox");
    var hokkaidoCheckbox = document.getElementById("hokkaidoCheckbox");
    var aomoriCheckbox = document.getElementById("aomoriCheckbox");
    var noneCheckbox = document.getElementById("noneCheckbox");

    // Deselect all checkboxes
    hokkaidoCheckbox.checked = false;
    aomoriCheckbox.checked = false;
    selectAllCheckbox.checked = false;

    // Update the selected regions accordingly
    updateSelectedRegion();
}

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
// Make updateSelectedRegion() to pass the checkbox value to the nested-div-choice
function updateSelectedRegion() {
    var hokkaidoCheckbox = document.getElementById("hokkaidoCheckbox");
    var aomoriCheckbox = document.getElementById("aomoriCheckbox");

    selectedRegion = [];

    if(hokkaidoCheckbox.checked) {
        selectedRegion.push(1); // Push 1 for 北海道
    }
    if(aomoriCheckbox.checked) {
        selectedRegion.push(2); // Push 2 for 青森
    }

    // Display the selected regions in the nested-div-choice
    var selectedRegionsText = [];
    if (selectedRegion.includes(1)) {
        selectedRegionsText.push("北海道");
    }
    if (selectedRegion.includes(2)) {
        selectedRegionsText.push("青森");
    }
    document.querySelector(".nested-div-choice").innerText = selectedRegionsText.join(",");

    // Store selected regions as integers in the hidden input
    document.getElementById("selectedRegionInput").value = JSON.stringify(selectedRegion);
}


function submitForm()
    {
        document.getElementById("regionForm").submit();
    }

</script>
</body>
</html>









