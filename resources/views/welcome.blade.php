<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBC Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('/images/welcome/wallpaper.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }
        .content-container {
            background: rgba(255, 255, 255, 0.8);
            color: black;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 100%;
            margin-top: 30px;
        }
        h1 {
            font-family: 'Roboto', sans-serif;
            margin-bottom: 20px;
            font-size: 2.5rem;
        }
        h5 {
            font-size: 1.2rem;
        }
        a {
            text-decoration: none;
            font-weight: bold;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        .logo {
            max-width: 300px; 
            display: block; 
            margin: 40px auto;
        }
    </style>
</head>
<body>
    <div>
        <img src="{{ asset('images/logo/IBClogo.png') }}" alt="IBC Games Logo" class="img-fluid logo"/>
    </div>
    <div class="content-container">
        <h1>WELCOME GAMER!</h1>
        <h5>
            <a href="{{ route('login') }}">Login</a> or 
            <a href="{{ route('register') }}">Register</a> to see more!
        </h5>
    </div>
</body>
</html>

