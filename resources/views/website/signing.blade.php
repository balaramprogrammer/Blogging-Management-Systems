<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | MyBlog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
       body {
    font-family: Arial, Helvetica, sans-serif;
    background:
        {{-- linear-gradient(
            rgba(238,241,245,0.85),
            rgba(238,241,245,0.85)
        ), --}}
        url("https://dhanlakshmi.smartwebarts.in/public/website/shashank1.png") no-repeat center center fixed;
    background-size: cover;
}


        .login-wrapper {
            min-height: 100vh;
        }

        .login-main-card {
            background: #fff;
            {{-- border-radius: 12px; --}}
            box-shadow: 0 18px 45px rgba(0,0,0,0.15);
            overflow: hidden;
            max-width: 950px;
            width: 100%;
        }

        /* LEFT FORM */
        .login-form {
            padding: 45px;
        }

        .brand-logo {
            font-size: 26px;
            font-weight: bold;
            color: #2a5298;
            margin-bottom: 10px;
        }

        .login-form h5 {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .login-form p {
            color: #777;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: #2a5298;
        }

        .input-icon input {
            padding-left: 40px;
        }

        .login-btn {
            background: #2a5298;
            border: none;
            color: #fff;
            padding: 12px;
            {{-- border-radius: 6px; --}}
            font-weight: bold;
            width: 100%;
        }

        .login-btn:hover {
            background: #1e3c72;
        }

        .extra-links {
            text-align: center;
            font-size: 14px;
            margin-top: 18px;
        }

        .extra-links a {
            color: #2a5298;
            text-decoration: none;
            font-weight: 600;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }

        /* RIGHT INFO */
        .login-info {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            padding: 50px;
            display: flex;
            align-items: center;
        }

        .login-info h3 {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .login-info p {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.9;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-info {
                display: none;
            }

            .login-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>

<div class="container login-wrapper d-flex align-items-center justify-content-center">
    <div class="login-main-card row g-0">

        <!-- LEFT FORM -->
        <div class="col-md-6">
            <div class="login-form">
               
                <h5>Admin Login</h5>
                <p>Please login to your admin account</p>

                <form action="{{ route('user_validate') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <div class="input-icon">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter admin email"
                                   required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-icon">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Enter password"
                                   required>
                        </div>
                    </div>

                    <button type="submit" class="login-btn">
                        Login
                    </button>

                    <div class="extra-links">
                        <p class="mt-3">
                            <a href="javascript:void(0)">Forgot password?</a>
                        </p>
                        <p>
                            Don’t have access?
                            <a href="javascript:void(0)">Contact Admin</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <!-- RIGHT INFO -->
        <div class="col-md-6 login-info">
            <div>
                <h3>We are more than just a blog</h3>
                <p>
                    This admin panel allows you to manage articles,
                    categories, users and content efficiently.
                    Secure access is limited to administrators only.
                </p>
            </div>
        </div>

    </div>
</div>
</body>
</html>
