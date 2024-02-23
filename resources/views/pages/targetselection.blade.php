<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sideways Triangle with Square</title>
    <style>
        .shape-container {
            display: flex;
            float:left;
        }
        .triangle {
            width: 0;
            height: 0;
            border-top: 60px solid transparent;
            border-bottom: 61px solid transparent;
            border-left: 60px solid #11A7B7;
        }
        .square {
            position: relative;
            width: 170px;
            height: 120px;
            background-color: #11A7B7;
        }

        .instruction{
            position: absolute;
            font-size: 16px;
            color: white;
            width: 150px;
            top: 50px;
            left: 80px;

        }

        .triangle-hide {
            position: absolute;
            z-index: 10;
            width: 0;
            height: 0;
            border-top: 60px solid transparent;
            border-bottom: 61px solid transparent;
            border-left: 60px solid white; /* Match the square's background color */
        }
    </style>
</head>
@include('layout.topbar')
<body>
    <div class="shape-container">
        <div class="square">
            <div class="instruction">配信条件指示</div>
            <div class="triangle-hide"></div> 
        </div>
        <div class="triangle"></div>
    </div>

    <div class="shape-container">
        <div class="square">
            <div class="triangle-hide"></div> 
        </div>
        <div class="triangle"></div>
    </div>

    <div class="shape-container">
        <div class="square">
            <div class="triangle-hide"></div> 
        </div>
        <div class="triangle"></div>
    </div>
    
</body>
</html>
