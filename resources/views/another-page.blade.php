<!DOCTYPE html>
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

function validateForm() {
        var allInnerCircles = document.querySelectorAll('.inner-circle');
        var selectedValues = [];
        
        
        allInnerCircles.forEach(function(circle) {
            if (circle.style.display === "block") {
                selectedValues.push(circle.parentElement.nextElementSibling.innerText.trim());
            }
        });

        // Validate text inputs
        var textInputs = document.querySelectorAll('input[type="text"]');
        textInputs.forEach(function(input) {
            if (input.value.trim() === "") {
                alert("Please fill in all text inputs.");
                return false;
            }
        });

        // Check if any circle or text input is empty
        if (selectedValues.length < 3 || textInputs.length < 2) {
            alert("Please select values for all circles and fill in all text inputs.");
            return false;
        }

        // Set value for hidden input
        document.getElementById('jigyoukubunsho-input').value = selectedValues.join(',');
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

    document.getElementById('submit-btn').addEventListener('click',function(event){
        event.preventDefault(); // Prevent default form submission behavior
        document.getElementById('data-form').submit();
    });
</script>
</body>

</html>
