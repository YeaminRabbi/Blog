<!doctype html>
<html lang="en">



<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="assets/img/favicon.png">

    <!-- Title -->
    <title>  - Personal Blog HTML Template </title>
    
    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    
    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/elegant-font-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    
    <!-- main style -->
 <!-- main style -->
 <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
 <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<style>
    .form .form-element .password-policies {
  position:relative;
  top:0px;
  left:50%;
  transform:translateX(-50%);
  width:90%;
  padding:0px;
  height:0px;
  background:#64C5B1;
  border-radius:5px;
  color: black;
  margin-top:10px;
  box-sizing:border-box;
  opacity:0;
  overflow:hidden;
  transition: height 300ms ease-in-out,
              opacity 300ms ease-in-out;
}
.form .form-element .password-policies.active {
  opacity:1;
  padding:10px;
  height:180px;
}
.form .form-element .password-policies > div {
  margin:15px 10px;
  font-weight:600;
  color:#888;
  transition:all 300ms ease-in-out;
}
.form .form-element .password-policies > div.active {
  color:#111;
}

.form .form-element .toggle-password {
  position:absolute;
  color: green;
  width:67px;
  height:40px;
  top:3s8px;
  right:2px;
  border-radius:50%;
  text-align:center;
  line-height:35px;
  font-size:20px;
  cursor:pointer;
}

i.fas.fa-user.username {
    position: absolute;
    color: green;
    width: 67px;
    height: 40px;
    top: 48px;
    right: 2px;
    border-radius: 50%;
    text-align: center;
    line-height: 35px;
    font-size: 20px;
    cursor: pointer;
}
i.far.fa-envelope.email_address{
    position: absolute;
    color: green;
    width: 67px;
    height: 40px;
    top: 48px;
    right: 2px;
    border-radius: 50%;
    text-align: center;
    line-height: 35px;
    font-size: 20px;
    cursor: pointer;
}


.form .form-element .toggle-password.active i.fa-eye {
  display:none;
}
.form .form-element .toggle-password.active i.fa-eye-slash {
  display:inline;
}
.form .form-element .toggle-password i.fa-eye-slash {
  display:none;
}

.dark .newslettre-form .form-control, .dark .widget-form .form-control, .dark .search-form input {
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.1);
}
</style>

<body>  
   

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!--logo-->
            <div class="logo">
                <a href="{{route('homepage')}}">
                    <img src="assets/img/logo-dark.png" alt="" class="logo-dark">
                    <img src="assets/img/logo-white.png" alt="" class="logo-white">
                </a>
            </div>
            <!--/-->
    
            <!--navbar-collapse-->
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ml-auto mr-auto">
                   
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('startups')}}"> Startups </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('lifestyle')}}"> Lifestyle </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('review')}}"> Review </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}"> Contact </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> More Categories</a>
                        <ul class="dropdown-menu fade-up">
                            <li>
                                <a class="dropdown-item" href="{{route('howto')}}"> How To</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('brandstories')}}">Brand Stories</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('food')}}"> Food </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('travel')}}"> Travel </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('career')}}"> Career </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('education')}}"> Education </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('health')}}"> Health & Wellness </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('law')}}"> Law </a>
                            </li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
            <!--/-->
    
            <!--navbar-right-->
            <div class="navbar-right ml-auto">
                <div class="theme-switch-wrapper">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox" />
                        <div class="slider round"></div>
                    </label>
                </div>
                
                <div class="social-icones">
                    <ul class="list-inline">
                       
                        <li>
                            <a href="#">
                                <i class="fas fa-bell" style="font-size: 20px;"></i>
                            </a>
                        </li>
                        @if (Route::has('login'))
                       
                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"
                                  style="
                                       background-color:#f67280;
                                                color:#ffffff !important;
                                                padding: 5px 32px;
                                                text-align:center;
                                                font-size:20px;
                                                border-radius:20px;
                                                font-weight:700 !important;
                                                text-transform: capitalize;
                                     "
                                
                                
                                
                                >Menu</a>
                                <ul class="dropdown-menu fade-up">
                                    <li >
                                        <a class="dropdown-item" href="{{route('user.dashboard')}}"> Dashboard </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline" >Log in</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                       
                    @endif
                        
              
                       
                    </ul>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
    <!--/-->

    <!--Login-->
    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>Reset Password</h5>
                </div>
                <form action="{{route('password.update')}}" class="sign-form widget-form " method="post">
                    @csrf
                    <input type="hidden" name="token" id="" value="{{$request->route('token')}}">
                    <div class="form-group">
                        <input value="{{$request->email}}" style="font-size: 18px; font-weight:bold;" type="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" id="email" placeholder="Jhon@gmail.com" name="email" required="">
                        
                        @error('email')
                        <span class="invalid-feedback is-invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group row form">
                                
                        <div class="col-12 form-element mb-25">
                          
                            <label for="password">Password</label>
                            <input style="font-size: 18px; font-weight:bold;" id="password-field" autocomplete="off" class="form-control @error('password') is-invalid @enderror" type="password" id="password"  name="password" required autocomplete="new-password" placeholder="Type your password" >
                        
                         



                            <div class="toggle-password">
                                <i class="fa fa-eye"></i>
                                <i class="fa fa-eye-slash"></i>
                            </div>
                           
                            <div class="password-policies">
                                <div class="policy-length">
                                  8 Characters
                                </div>
                                <div class="policy-number">
                                  Contains Number
                                </div>
                                <div class="policy-uppercase">
                                  Contains Uppercase
                                </div>
                                <div class="policy-special">
                                  Contains Special Characters
                                </div>
                             </div>
                         </div>

                          
                    </div>



                    <div class="form-group row">
                        <div class="col-12 form-group mb-25">
                            
                            <label for="password">Confirm Password</label>
                            <input style="font-size: 18px; font-weight:bold;" id="password-field" autocomplete="off" id="password-confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter your password again" >
                        </div>
                    </div>    





                    
                   
                    <div class="sign-controls form-group">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                            <label class="custom-control-label" for="rememberMe">Remember Me</label>
                        </div>
                        <a href="#" class="btn-link  ml-auto">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" value="login" class="btn-custom">Login</button>
                    </div>
                    
                    <p class="form-group text-center">Don't have an account? <a href="register.html" class="btn-link">Create One</a> </p>

                </form>
                                <div class="social-media" style="text-align: center; padding-top: 3rem;">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#" class="color-facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="color-instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="color-twitter">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="color-youtube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="color-pinterest">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="color-google">
                                              <i class="fas fa-envelope"></i>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </div>
            </div> 
        </div>
    </section>        

    <!--newslettre-->
    <section class="newslettre">
        <div class="container-fluid">
            <div class="newslettre-width text-center">
                <div class="newslettre-info">
                    <h5>Subscribe to our Newslatter</h5>
                    <p> Sign up for free and be the first to get notified about new posts. </p>
                </div>
                <form action="#" class="newslettre-form">
                    <div class="form-flex">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your email adress" required="required">
                        </div>
                        <button class="submit-btn" type="submit">Subscribe</button>
                    </div>
                </form>
                <div class="social-icones">
                    <ul class="list-inline">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>Facebook</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>Twitter </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>Instagram </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-youtube"></i>Youtube</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!--footer-->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                        <p>© Copyright 2021 <a href="#">AssiaGroupe</a>, All rights reserved.</p>
                    </div>
                    <div class="back">
                        <a href="#" class="back-top">
                            <i class="arrow_up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--Search-form-->
    <div class="search">
        <div class="container-fluid">
            <div class="search-width  text-center">
                <button type="button" class="close">
                    <i class="icon_close"></i>
                </button>
                <form class="search-form" action="#">
                    <input type="search" value="" placeholder="What are you looking for?">
                    <button type="submit" class="search-btn">search</button>
                </form>
            </div>
        </div>
    </div>
    <!--/-->
  
  
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.5.0.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- JS Plugins  -->
    <script src="{{asset('assets/js/ajax-contact.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/switch.js')}}"></script>
    
    <!-- JS main  -->
    <script src="{{asset('assets/js/main.js')}}"></script>


    <script>
        var state = false;
        function toggle(){
            if(state){
                document.getElementById("password").setAttribute("type","password");
                // document.getElementById("eye").style.color='red';
                state=false;
            }
            else{
                document.getElementById("password").setAttribute("type","text");
                document.getElementById("eye").style.color='';
                state=true;
            }
        }
            </script>


<script>
    function _id(name){
  return document.getElementById(name);
}
function _class(name){
  return document.getElementsByClassName(name);
}
_class("toggle-password")[0].addEventListener("click",function(){
  _class("toggle-password")[0].classList.toggle("active");
  if(_id("password-field").getAttribute("type") == "password"){
    _id("password-field").setAttribute("type","text");
  } else {
    _id("password-field").setAttribute("type","password");
  }
});

_id("password-field").addEventListener("focus",function(){
  _class("password-policies")[0].classList.add("active");
});
_id("password-field").addEventListener("blur",function(){
  _class("password-policies")[0].classList.remove("active");
});

_id("password-field").addEventListener("keyup",function(){
  let password = _id("password-field").value;
  
  if(/[A-Z]/.test(password)){
    _class("policy-uppercase")[0].classList.add("active");
  } else {
    _class("policy-uppercase")[0].classList.remove("active");
  }
  
  if(/[0-9]/.test(password)){
    _class("policy-number")[0].classList.add("active");
  } else {
    _class("policy-number")[0].classList.remove("active");
  }
  
  if(/[^A-Za-z0-9]/.test(password)){
    _class("policy-special")[0].classList.add("active");
  } else {
    _class("policy-special")[0].classList.remove("active");
  }
  
  if(password.length > 7){
    _class("policy-length")[0].classList.add("active");
  } else {
    _class("policy-length")[0].classList.remove("active");
  }
});
</script>



</body>


</html>