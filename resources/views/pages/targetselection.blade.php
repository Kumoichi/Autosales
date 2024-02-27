<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/targetselection.css') }}"> 

    <title>Document</title>
</head>
<body class="targetselection">
<div>
    @include('layout.selection')
</div>

<p class="green-underline"><span style="color: red;">＊</span>ターゲットを選択する</p>

<ul class="target-list">
  <p>〇</p><li>ターゲットA</li>
  <li>ターゲットB</li>
  <li>ターゲットC</li>
</ul>




</body>
</html>