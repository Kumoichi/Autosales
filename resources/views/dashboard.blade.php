<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Top Bar</title>
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body class="dashboard-page">
  @include('layout.topbar')
<div class="main-menu">メインメニュー</div>
<div class="choosing">メニューを選択してください。</div>


<div class="whole-block">
    <div class="box" id="box1">IS活動</div>
    <a href="listselection"><div class="box" id="box2"><i class="far fa-list-alt"></i>リスト調達</div></a>
    <div class="box" id="box3">商談分析</div>
    <a href="targetselection"><div class="box" id="box4"><i class="fa-solid fa-envelope"></i>メール配信指示</div></a>

</div>

</body>
</html>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Button Example</title>
<style>
    .custom-button {
        height: 150px;
        width: 400px;
        background-color: #4CAF50;
        border: none;
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 36px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
    }
</style>
</head>
<body>


</body>
</html> 
