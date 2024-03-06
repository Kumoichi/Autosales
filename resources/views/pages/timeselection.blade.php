<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/timeselection.css') }}" rel="stylesheet">

    <title>Document</title>
</head>
<body class="timeselection">
<div>
    @include('layout.selection')
    
    @include('calendar_form')
</div>
</body>
</html>