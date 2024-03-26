<!-- <!DOCTYPE html>
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

<form id="regionForm" action="{{ route('handle.modal.selection') }}" method="post">
    @csrf
    <input type="hidden" id="selectedRegionInput" name="selectedRegion">
</form>

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
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editable Box Example</title>
    <style>
        /* Set initial height for textarea */
        #editableTextarea {
            height: 100px; /* Set initial height */
            resize: none; /* Prevent user from manually resizing */
        }

        .preview{
            position: relative;
            background-color: gray;
            height: 600px;
        }


        .image-saleslab {
            position: absolute;
            top: 20%;
            right: 50%; /* Align the right of the element at 50% of the parent's width */
            transform: translate(50%, -50%); /* Move the element back by 50% of its own width and 50% of its own height */
            height: 100px;
            width: 300px;
        }

        .preview-inside {
            height: 400px;
            width: 75%;
            position: absolute;
            top: 70%; /* Align the top of the element at 50% of the parent's height */
            left: 50%; /* Align the left of the element at 50% of the parent's width */
            transform: translate(-50%, -50%); /* Move the element back by 50% of its own width and height */
            background-color: white;
        }

        .firsttext{
            width: 100%;
            height: 200px;
        }

    </style>
</head>
<body>

<div class="preview">
<div><img src="{{ asset('images/saleslab.png')}}" alt="User Icon" class="image-saleslab">
</div>
<div class="preview-inside" style="background-color: white;">
    <!-- Using a multi-line textarea for longer text -->
    <textarea class="firsttext" id="editableTextarea" oninput="autoExpand(this)">
    1
    2
    3

    </textarea>
</div>
</div>

    <script>
        function autoExpand(textarea) {
            // Reset textarea height to default to properly calculate new height
            textarea.style.height = '100px';
            // Set new height based on scrollHeight
            textarea.style.height = textarea.scrollHeight + 'px';
        }
    </script>
</body>
</html>
