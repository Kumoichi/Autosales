<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Clickable Circle</title>
<style>
.outer-circle {
    border: solid 1px black;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    cursor: pointer;
    position: relative;
}
.inner-circle {
    display: none;
    width: 15px;
    height: 15px;
    background-color: rgba(231, 76, 60, 0.7);
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    line-height: 10px;
}


.three-circle-selection-container{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
}


.circle-selection-container{
  display: flex;
  flex-direction: row;
  align-items: center;
}


</style>
</head>
<body>

<form id="data-form" action="{{ route('handle.list.selection') }}" method="POST">
        @csrf
                <div class="inner-box">
                <div class="nested-div-description">設立年：</div>
                <div class="horizontal-box">
                    <input type="text" name="value1" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;">
                    <span class="divider">~</span>
                    <input type="text" name="value2" placeholder="設立年" class="inner-box hori" style="padding-left: 8px;">
                </div>
                </div>
            </div>
            
     

<div id="three-circle-selection-container">

<div class="circle-selection-container">
    <div class="outer-circle" onclick="showInnerCircle(1)">
        <div class="inner-circle" id="inner-circle-1"></div>
    </div>

    <div>データ</div>
    <div id="selected-data-1" style="display:none">1</div>

</div>

<div class="circle-selection-container">
    <div class="outer-circle" onclick="showInnerCircle(2)">
        <div class="inner-circle" id="inner-circle-2"></div>
    </div>

    <div>データ値</div>
    <div id="selected-data-2" style="display:none">2</div>
</div>

<div class="circle-selection-container">
    <div class="outer-circle" onclick="showInnerCircle(3)">
        <div class="inner-circle" id="inner-circle-3"></div>
    </div>

    <div>データ値</div>
    <div id="selected-data-3" style="display:none">3</div>

    
        <input id="jigyoukubunsho-input" type="hidden" name="data">
        <button type="submit" id="submit-btn">Submit</button>
    </form>
</div>
</div>


<script>
    //make value1, value2, jigyoukubunsho-input value
    //check whether they are empty, it empty return false, if not return ture.
    function validateForm()
    {
        var value1 = document.querySelector('input[name="value1"]').value.trim();
        var value2 = document.querySelector('input[name="value2"]').value.trim();
        var selectedValue = document.getElementById('jigyoukubunsho-input').value.trim();

        if(value1 === '' || value2 === '')
        {
            alert('Please fill in both establishment year filds.');
            return false;
        }

        if(selectedValue === '')
        {
            alert('please select a data value');
            return false;
        }

        return true;
    }

    function showInnerCircle(circleNumber) {
        var innerCircle = document.getElementById("inner-circle-" + circleNumber);
        var outerCircle = innerCircle.parentElement;
        var selectedValue = document.getElementById("selected-data-" + circleNumber).innerText.trim();

        // Hide all inner circles and reset border colors
        var allInnerCircles = document.querySelectorAll('.inner-circle');
        var allOuterCircles = document.querySelectorAll('.outer-circle');
        allInnerCircles.forEach(function(circle) {
            circle.style.display = "none";
        });
        allOuterCircles.forEach(function(circle) {
            circle.style.borderColor = "black";
        });

        // Show inner circle and set border color for the selected circle
        innerCircle.style.display = "block";
        outerCircle.style.borderColor = "red";
        document.getElementById('jigyoukubunsho-input').value = selectedValue;
    }

    document.getElementById('submit-btn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default form submission behavior
        
        // Validate the form before submitting
        if (validateForm()) {
            document.getElementById('data-form').submit();
        }
    });
</script>

</body>

</html> -->



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
    
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <input type="checkbox" id="hokkaidoCheckbox" name="region" value="北海道" onclick="updateSelectedRegion()">
        <label for="hokkaidoCheckbox">北海道</label><br>
        <input type="checkbox" id="aomoriCheckbox" name="region" value="青森" onclick="updateSelectedRegion()">
        <label for="aomoriCheckbox">青森</label>
    </div>
</div>

<!-- Hidden form to send selectedRegion value -->
<form id="regionForm" action="{{ route('handle.modal.selection') }}" method="post">
    @csrf
    <input type="hidden" id="selectedRegionInput" name="selectedRegion">
</form>

<!-- Submit button -->
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
function updateSelectedRegion() {
    // Get references to the checkboxes
    var hokkaidoCheckbox = document.getElementById("hokkaidoCheckbox");
    var aomoriCheckbox = document.getElementById("aomoriCheckbox");
    
    // Reset the selectedRegion array
    selectedRegion = [];

    // Check each checkbox and add its value to the selectedRegion array if checked
    if (hokkaidoCheckbox.checked) {
        selectedRegion.push(hokkaidoCheckbox.value);
    }
    if (aomoriCheckbox.checked) {
        selectedRegion.push(aomoriCheckbox.value);
    }
    
    // Display selected regions in nested-div-choice
    document.querySelector(".nested-div-choice").innerText = selectedRegion.join(", ");

    // Update the hidden input value with the selected regions array
    document.getElementById("selectedRegionInput").value = JSON.stringify(selectedRegion);
}


    // Function to submit the form
    function submitForm() {
        document.getElementById("regionForm").submit();
    }
</script>

</body>
</html>
