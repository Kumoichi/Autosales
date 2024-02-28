<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Another Page</title>
</head>
<body>
    <h1>Welcome to Another Page</h1>
    
    @if(isset($name))
        <p>Hello, {{ $name }}!</p>
    @else
        <p>Hello, Guest!</p>
    @endif
</body>
</html>
