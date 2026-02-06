<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Commerce Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: #fff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 14px;
        }

        .form-group input:focus {
            border-color: #667eea;
        }

        .login-btn {
            width: 100%;
            background: #667eea;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        .login-btn:hover {
            background: #5a67d8;
        }

        .extra-links {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .extra-links a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }

        .brand {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #667eea;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="brand">MyShop</div>
        <h2>Login to your account</h2>

        <form action="{{route('user_validate')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>

            <div class="extra-links">
                <p>
                    <a href="#">Forgot Password?</a>
                </p>
                <p>
                    Don’t have an account?
                    <a href="#">Register</a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>
