<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link href="{{ asset('assets/css/User/login.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
	<title>Login</title>
</head>
<body>
    <div class="login-bg-bg">
        <div class="login-bg">
            <div class="login-img">
                <img width="420px" src="https://i.pinimg.com/564x/84/65/ce/8465ce7dc68dc5d736a0ea1b655478e1.jpg">
            </div>
            <div class="wrapper">
                <div class="form-wrapper">
                    <h1>Welcome to CURNON</h1>
                    <h2>Sign In to Continue</h1>
                        @if (session('create_success'))
                            <div class="py-2 bg-green-200 rounded-sm px-4 text-green-800 mb-2"><p>{{ session('create_success') }}</p></div>
                        @else
                            <div class="register-link">
                                <p>Don't have an account?
                                    <a href="./Register/Giaodiendangky.html">Create a account</a>
                                </p>
                                <p>It takes less than a minute.</p>
                            </div>
                        @endif
                        @if (session('login_error'))
                            <div class="py-2 bg-red-100 rounded-sm px-4 text-red-800 mb-2"><p>{{ session('login_error') }}</p></div>
                        @endif
                    <form method="POST" action={{route('user.post.login')}}>
                       
                            @csrf
                     
                        <div class="form-control">
                            <div class="input-box">
                                <input id="email" name="email" type="text" value="{{old('email')}}" placeholder="Email" autocomplete="{{old('email')}}">
                                <i class='bx bxs-user' ></i>
                            </div>

                            @if($errors->has('email'))
                                <p class="text-xs py-2 text-red-500">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-control">
                            <div class="input-box">
                                <input id="password" name="password" type="password" placeholder="Password" value="{{old('password')}}"  required>
                                <i class='bx bxs-lock-alt' ></i>
                            </div>
                            @if($errors->has('password'))
                                <p class="text-xs py-2 text-red-500">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="form-control">
                            <div class="remember-forgot">
                                <label><input type="checkbox">Remember me</label>
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>
                        <button type="submit" class="login-button">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
	
</body>
</html>