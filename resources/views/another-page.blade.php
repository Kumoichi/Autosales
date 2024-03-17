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
<!-- here getting targetname from controller, and then printing that data everytime-->
<!-- $name value is passed as data-target -->
<div class="centered-container">
  @if(isset($names) && $names->count() > 0)
    <ul id="targetList">
      @foreach($names as $name)
        <li>
          <a href="#" class="circle" data-target="{{ $name }}"></a> {{ $name }}
        </li>
      @endforeach
    </ul>
</div>

        <!-- Form to submit the selected target name -->
        <form id="targetForm" action="{{ route('handle.target.selection') }}" method="post">
            @csrf <!-- CSRF token for security -->
            <input type="hidden" name="targetName" id="targetNameInput">
        </form>

        <div class="center-container">
            <a href="dashboard" class="pagemovement-button">前へもどる</a>
            <!-- Submit the form when the button is clicked -->
          <a href="#" onclick="submitForm();" class="pagemovement-button">コンテンツを選択</div>
    </div>

    <script>
        // make submitForm function, targetName 
        function submitForm() {
          var targetName = document.querySelector('.circle.active').nextSibling.textContent.trim();
          document.getElementById('targetNameInput').value = targetName;
          document.getElementById('targetForm').submit();
        }

        //circles are loaded and parsed
        document.addEventListener('DOMContentLoaded', function () {
            // This line of JavaScript code selects all HTML elements with the class
            //  circle and stores them in the circles variable
            var circles = document.querySelectorAll('.circle');
            circles.forEach(function (circle) {
                circle.addEventListener('click', function (event) {
                    circles.forEach(function (c) {
                        c.classList.remove('active');
                    });
                    // Add active class to the clicked circle
                    event.target.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>
<!-- 

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
</html> -->
