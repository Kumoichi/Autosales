<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Circle Selection Button</title>
  <style>
    body {
        text-align: center; /* Center align the content */
    }

    .button-choice {
      display: inline-block; /* Align the button group to the left */
      text-align: left; /* Align the content of the button group to the left */
    }

    .circle-btn {
      width: 20px; /* Diameter of the circle */
      height: 20px; /* Diameter of the circle */
      border-radius: 50%; /* Makes it a circle */
      background-color: #007bff; /* Button background color */
      color: white; /* Text color */
      font-size: 16px; /* Text size */
      border: none; /* Removes default button border */
      cursor: pointer; /* Shows pointer cursor on hover */
      vertical-align: middle; /* Align the button vertically */
      margin-right: 5px; /* Add spacing between button and text */
    }

    .circle-btn:hover {
      background-color: #0056b3; /* Darker background color on hover */
    }

    .button-group {
      margin-bottom: 10px; /* Add space between button groups */
    }

    #showMe{
        display: none;
    }
  </style>
</head>
<body>

<div class="button-choice">
  <div class="button-group">
    <button class="circle-btn" id="circleBtn1"></button><span class="text">first button</span>
  </div>

  <div class="button-group">
    <button class="circle-btn" id="circleBtn2"></button><span class="text">second button</span>
  </div>
</div>

<div id="showMe"> @include('calendar_form')</div>

<script>
  document.getElementById('circleBtn1').addEventListener('click', function() {
    this.style.backgroundColor = 'red';
    document.getElementById('circleBtn2').style.backgroundColor = '#007bff'; // Revert color of second button
    document.getElementById('showMe').style.display = 'none'; // Hide the "show me" div
  });

  document.getElementById('circleBtn2').addEventListener('click', function() {
    this.style.backgroundColor = 'red';
    document.getElementById('circleBtn1').style.backgroundColor = '#007bff'; // Revert color of first button
    document.getElementById('showMe').style.display = 'block'; // Show the "show me" div
  });
</script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Toggle Circle Button</title>
<style>
.outer-circle {
  width: 100px;
  height: 100px;
  border: 2px solid black;
  border-radius: 50%;
  position: relative;
  cursor: pointer;
}

.inner-circle {
  width: 60px;
  height: 60px;
  background-color: red;
  border-radius: 50%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: none;
}
</style>
</head>
<body>

<div class="outer-circle" id="outerCircle" onclick="toggleInnerCircle()">
  <div class="inner-circle" id="innerCircle"></div>
</div>

<script>
function toggleInnerCircle() {
  var innerCircle = document.getElementById("innerCircle");
  innerCircle.style.display = (innerCircle.style.display === "none") ? "block" : "none";
}
</script>

</body>
</html>
