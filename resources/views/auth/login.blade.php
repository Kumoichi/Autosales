<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>




    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h4>Login</h4>
                <hr>
                <form action="{{route('login-user')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="user_id">User ID</label> 
                        <input type="text" class="form-control" placeholder="Enter User ID" name="user_id" value="{{old('user_id')}}"> 
                        <span class="text-danger">@error('user_id') {{$message}} @enderror</span> 
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Login</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Lab Login</title>
    <style>
        /* Overall container */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center; /* Horizontally center content */
            align-items: center; /* Vertically center content */
            height: 100vh; /* Full viewport height */
            flex-direction: column; /* Stack elements vertically */
        }

        /* Logo */
        .logo {
            margin-bottom: 20px; /* Add margin below the logo */
        }

        /* Login form container */
        .login-container {
            max-width: 550px;
            padding: 0px;
            background-color: #FAFAFA;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center the text content horizontally */
            height: 400px; /* Increase the height as needed */
            display: flex; /* Use flexbox for layout */
            flex-direction: column; /* Stack elements vertically */
            align-items: center; /* Center child elements horizontally */
        }

        .top-bar {
            position: relative;
            height: 60px;
            width: 100%;
            margin-bottom: 60px;
            background-color: #11A7B7;
            border-top-left-radius: 10px; /* Only round the top-left corner */
            border-top-right-radius: 10px; /* Only round the top-right corner */
            display: flex; /* Use flexbox for layout */
            justify-content: center; /* Center the content horizontally */
            align-items: center; /* Center the content vertically */
            color: white; /* Set text color to white */
        }

        /* Input fields and login button */
        input[type="text"],
        input[type="password"],
        .login-button {
            width: 90%; /* Adjusted width for input fields and login button */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Include padding and border in the width */
        }

        /* Login button */
        .login-button {
            background-color: #0074d9;
            color: #ffffff;
            border: none;
            cursor: pointer;
            background-color: #11A7B7;
        }

        .above {
            color:gray;
            font-size:15px;
            text-align: left; /* Align text to the left */
            width: 60%; /* Adjusted width for labels */
            margin-left: 20px; /* Adjusted left margin */
        }

        p {
            margin-top: 20px;
            margin-right: 100px; /* Adjust right margin */
            margin-bottom: 20px;
            margin-left: 100px; /* Adjust left margin */
        }

        .icon {
            width: 15px;
            height: 15px;
            fill: red;
        }


    </style>
</head>
<body>

    <div class="logo">
    <img src="{{ asset('images/saleslab.png')}}" alt="User Icon"  style="height: 100px; width: 300px;">        
    </div>
    <div></div>
    <div class="login-container">
        <div class="top-bar">ログインしてください</div>
        <form action="{{ route('login-user') }}" method="post">
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <div class="above">
            <img src="{{ asset('images/user-solid.svg')}}" alt="User Icon" class="icon">
            ID</div>
            <input type="text" placeholder="ID" name="user_id" value="{{ old('user_id') }}" required>
            <span class="text-danger">@error('user_id') {{ $message }} @enderror</span>
            <div class="above">
            <img src="{{ asset('images/lock-solid.svg')}}" alt="User Icon" class="icon">
            パスワード</div>
            <input type="password" placeholder="パスワード" name="password" required>
            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            <button type="submit" class="login-button">ログイン</button>
        </form>
        <p>IDまたはパスワードをお忘れになった場合は、営業担当までお問合せお願いします。</p>
    </div>
</body>
</html>
