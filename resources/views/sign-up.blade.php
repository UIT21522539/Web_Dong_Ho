<!doctype html>
<html>
<head>
<title>Official Signup Form </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

{{-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> --}}
<!-- fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<!-- /fonts -->
<!-- css -->
<link href="{{ asset('assets/css/User/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('assets/css/User/sign-up.css') }}" rel='stylesheet' type='text/css' media="all" />
<script src="https://cdn.tailwindcss.com"></script>
<!-- /css -->
</head>
<body>
    <div class="sign-up-bg">
        <div class="content-w3ls">
            <div class="content-agile1">
                <h2 class="agileits1">Member <br> Signup</h2>
                <div class="agileits-div">
                    <img src="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}">
                    <p class="agileits2">Customers are important, customers will be followed by customers.</p>
                </div>
            </div>
            <div class="content-agile2">
                <div class="form-wrapper flex items-center justify-center">
                    <form method="post" action="{{ route('user.post.register') }}" class="mx-auto lg:w-96">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="form-control"> 
                            <input type="text" id="firstname" name="firstname" placeholder="First Name" title="Please enter your First Name" value="{{old('firstname')}}" >
                       
                            @if($errors->has('lastname'))
                                <p class="text-xs py-2 text-red-500">{{ $errors->first('firstname') }}</p>
                            @endif
                        </div>
                    
                        <div class="form-control"> 
                            <input type="text" id="firstname" name="lastname" placeholder="Last Name" title="Please enter your First Name" value="{{old('lastname')}}">
                            @if($errors->has('lastname'))
                                <p class="text-xs py-2 text-red-500">{{ $errors->first('lastname') }}</p>
                            @endif
                        </div>

                        <div class="form-control"> 
                            <input type="email" id="email" name="email" placeholder="mail@example.com" title="Please enter a valid email" value="{{old('email')}}">
                            @if($errors->has('email'))
                                <p class="text-xs py-2 text-red-500">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="form-control">	
                            <input type="password" class="lock" name="password" placeholder="Password" id="password1" value="{{old('password')}}">
                            @if($errors->has('password'))
                                <p class="text-xs py-2 text-red-500">{{ $errors->first('password') }}</p>
                            @endif
                        </div>	

                        <div class="form-control">	
                            <input type="password" class="lock" name="confirm_password" placeholder="Confirm Password" id="password2" value="{{old('confirm_password')}}">
                            @if($errors->has('confirm_password'))
                                <p class="text-xs py-2 text-red-500">{{ $errors->first('confirm_password') }}</p>
                            @endif
                        </div>			
                        
                        <input type="submit" class="register" value="Register">
                    </form>
                </div>
                {{-- <script type="text/javascript">
                    window.onload = function () {
                        document.getElementById("password1").onchange = validatePassword;
                        document.getElementById("password2").onchange = validatePassword;
                    }
                    function validatePassword(){
                        var pass2=document.getElementById("password2").value;
                        var pass1=document.getElementById("password1").value;
                        if(pass1!=pass2)
                            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                        else
                            document.getElementById("password2").setCustomValidity('');	 
                            //empty string means no validation error
                    }
                </script> --}}
            </div>
            <div class="clear"></div>
        </div>
    </div>
</body>
</html>