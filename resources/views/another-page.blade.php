<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Another Page</title>
</head>
<body>
    <h1>Welcome to Another Pag</h1>
    
    @if(isset($name))
        <p>Testing, {{ $name }}!</p>
    @else
        <p>Test fail</p>
    @endif
</body>
</html>
