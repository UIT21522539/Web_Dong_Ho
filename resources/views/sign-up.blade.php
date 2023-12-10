<!doctype html>
<html>
<head>
<title>Official Signup Form </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<!-- /fonts -->
<!-- css -->
<link href="{{ asset('assets/css/User/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('assets/css/User/sign-up.css') }}" rel='stylesheet' type='text/css' media="all" />
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
                <form action="#" method="post">
                    <div> 
                        <input type="text" id="firstname" name="firstname" placeholder="First Name" title="Please enter your First Name" required="">
                    </div>

                    <div>	
                        <input type="email" id="email" name="email" placeholder="mail@example.com" title="Please enter a valid email" required="">
                    </div>

                    <div class="form-control agileinfo">	
                        <input type="password" class="lock" name="password" placeholder="Password" id="password1" required="">
                    </div>	

                    <div class="form-control agileinfo">	
                        <input type="password" class="lock" name="confirm-password" placeholder="Confirm Password" id="password2" required="">
                    </div>			
                    
                    <input type="submit" class="register" value="Register">
                </form>
                <script type="text/javascript">
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
                </script>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</body>
</html>