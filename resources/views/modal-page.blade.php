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
    height: 300px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    position: relative;
}

.modal-content-insidebox
{
    border: 1px solid black;
    height: auto;
    width: 900px;
}

.blue-box-section{
    background-color: gray;
}

.box-section-inside{
    margin-left: 50px;
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
    <div class="prefecture-modal-title">業種を選択してください</div>
    <div class="prefecture-modal-title-underline"></div>


        <span class="close" onclick="closeModal()">&times;</span>
        <input type="checkbox" id="selectAllCheckbox" onclick="toggleAllCheckboxes()">全て<br>
        <input type="checkbox" id="noneCheckbox" onclick="deselectAll()">選択しない

        <div class="modal-content-insidebox">
            <div class="blue-box-section">
                <input type="checkbox" id="selectTouhokuCheckbox" onclick="toggleCheckboxes('touhoku')">北海道、青森<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="hokkaidoCheckbox" class="region-checkbox touhoku" name="region" value="北海道" onclick="updateSelectedRegion()">
                    <label for="hokkaidoCheckbox">北海道</label><br>
                    <input type="checkbox" id="aomoriCheckbox" class="region-checkbox touhoku" name="region" value="青森" onclick="updateSelectedRegion()">
                    <label for="aomoriCheckbox">青森</label>
                </div>
            </div>

            <div class="white-box-section">
                <input type="checkbox" id="selectKantouCheckbox" onclick="toggleCheckboxes('kantou')">関東<br>
                <div class="box-section-inside">
                    <input type="checkbox" id="tokyoCheckbox" class="region-checkbox kantou" name="region" value="東京" onclick="updateSelectedRegion()">
                    <label for="tokyoCheckbox">東京</label><br>
                    <input type="checkbox" id="saitamaCheckbox" class="region-checkbox kantou" name="region" value="埼玉" onclick="updateSelectedRegion()">
                    <label for="saitamaCheckbox">埼玉</label>
                </div>
            </div>
        </div>
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

    function toggleAllCheckboxes() {
    var selectAllCheckbox = document.getElementById("selectAllCheckbox");
    var checkboxes = document.querySelectorAll(".region-checkbox");

    checkboxes.forEach(function(checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
    });
    updateSelectedRegion();
}



function toggleCheckboxes(region) {
        var selectCheckbox = document.getElementById("select" + region.charAt(0).toUpperCase() + region.slice(1) + "Checkbox");
        var checkboxes = document.querySelectorAll(".region-checkbox." + region);

        checkboxes.forEach(function(checkbox) {
            checkbox.checked = selectCheckbox.checked;
        });
        updateSelectedRegion();
    }


// 選択しないが選択されたとき
function deselectAll() {
    var checkboxes = document.querySelectorAll(".region-checkbox");

    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });

    updateSelectedRegion();
}

var selectedRegion = [];

// チェックマーク、すべて、選択しないが選択されたとき
function updateSelectedRegion() {
    var checkboxes = document.querySelectorAll(".region-checkbox");
    var selectedRegion = [];

    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            selectedRegion.push(checkbox.value);
        }
    });

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









