<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vertical Divs with Heading on the Right</title>
<style>
    .container {
        display: flex;
        position: relative;
    }
    
    .left {
        width: 50%;
    }

    .right {
        width: 80%; /* Adjusted width */
        position: absolute;
        left: 10%; /* Positioning */
        display: flex;
        flex-direction: column;
        align-items: center; /* Center horizontally */
        justify-content: center;
    }
    
    .box {
        background-color: #f0f0f0;
        padding: 20px;
        margin: 10px;
    }
</style>
</head>
<body>

<div class="container">
    <div class="left">
        <div class="box">
            <h2>Div 1</h2>
            <p>This is the content of the first div.</p>
        </div>
        <div class="box">
            <h2>Div 2</h2>
            <p>This is the content of the second div.</p>
        </div>
    </div>
    <div class="right">
        <h1>Hello</h1>
        <h2>This is a subheading</h2>
    </div>
</div>

</body>
</html>
