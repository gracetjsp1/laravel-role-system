<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Role Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            max-width: 700px;
        }

        h1 {
            font-size: 50px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.8;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            margin: 10px;
            transition: 0.3s;
        }

        .login-btn {
            background: #ff4b2b;
            color: white;
        }

        .register-btn {
            background: white;
            color: #333;
        }

        .btn:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome to Role System</h1>
    <p>Secure multi-role authentication system with Admin, Staff and Client dashboards.</p>

    <a href="{{ route('login') }}" class="btn login-btn">Login</a>
    <a href="{{ route('register') }}" class="btn register-btn">Register</a>
</div>

</body>
</html>