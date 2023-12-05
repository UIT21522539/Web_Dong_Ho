<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link href="{{ asset('assets/css/User/login.css') }}" rel="stylesheet">
	<title>Login</title>
</head>
<body>
    <div class="login-bg-bg">
    <div class="login-bg">
        <div class="login-img">
            <img width="420px" src="https://i.pinimg.com/564x/84/65/ce/8465ce7dc68dc5d736a0ea1b655478e1.jpg">
        </div>
        <div class="wrapper">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Welcome to CURNON</h1>
                <h2>Sign In to Continue</h1>
                <div class="register-link">
                    <p>Don't have an account?
                        <a href="./Register/Giaodiendangky.html">Create a account</a>
                    </p>
                    <p>It takes less than a minute.</p>
                </div>
                <div class="input-box">
                    <input type="text" name="email" placeholder="Username" required>
                    <i class='bx bxs-user' ></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot password?</a>
                </div >
                <button type="submit" class="login-button">Login</button>
                
            </form>
        </div>
        </div>
    </div>
	
	
</body>
</html>