<!doctype html>
<html lang="en">



<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Title -->
    <title>BloggersWorld</title>

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/elegant-font-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">

    <!-- main style -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
</head>

<body>
    <!--loading -->
    <div class="loading">
        <div class="circle"></div>
    </div>
    <!--/-->


<!-- Navigation-->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <!--logo-->
        <div class="logo">
            <a href="{{route('homepage')}}">
                {{-- <img src="{{asset('assets/img/logo-dark.png')}}" alt="" class="logo-dark">
                <img src="{{asset('assets/img/logo-white.png')}}" alt="" class="logo-white"> --}}

                <h4>BloggersWorld</h4>
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


                    @if (Route::has('login'))

                        @auth



                        <li class="nav-item dropdown" style="background-color:#f67280;
                            color:#ffffff !important;

                                           font-size:20px;
                                           border-radius:20px;
                                           padding:2px 13px;
                                           font-weight:700 !important;
                                           text-transform: capitalize;
                                           text-align:center;">
                            <a class="nav-link" href="#" data-toggle="dropdown"
                              style="

                                            color:#ffffff !important;
                                            padding:2px 13px;
                                            font-size:20px;
                                            border-radius:20px;
                                            font-weight:700 !important;
                                            text-transform: capitalize;
                                            text-align:center;
                                 "



                            >Menu</a>
                            <ul class="dropdown-menu fade-up">

                                @if (Auth::user()->user_type == 'admin')
                                    <li >
                                        <a class="dropdown-item" href="{{route('admin.dashboard')}}"> Dashboard </a>
                                    </li>
                                @else
                                    <li >
                                        <a class="dropdown-item" href="{{route('user.dashboard')}}"> Dashboard </a>
                                    </li>
                                @endif


                                <li>
                                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
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

@yield('content')

    <!--newslettre-->
    <section class="newslettre">
        <div class="container-fluid">
            <div class="newslettre-width text-center">
                <div class="newslettre-info">
                    <h5>Want to be a author in our website ? </h5>
                    <p>Sign up for free and be the author. </p>
                </div>
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth

                    @if (Auth::user()->user_type == 'admin')
                        <a href="{{route('admin.dashboard')}}" class="text-sm text-gray-700 underline"
                        style="
                        background-color:#f67280;
                                                color:#ffffff !important;
                                                padding: 13px 20px;
                                                text-align:center;
                                                font-size:24px;
                                                border-radius:20px;
                                                font-weight:700 !important;
                                                text-transform: capitalize;"
                        >Write Blogs in this website</a>
                    @else
                        <a href="{{route('user.dashboard')}}" class="text-sm text-gray-700 underline"
                        style="
                        background-color:#f67280;
                                                color:#ffffff !important;
                                                padding: 13px 20px;
                                                text-align:center;
                                                font-size:24px;
                                                border-radius:20px;
                                                font-weight:700 !important;
                                                text-transform: capitalize;"
                        >Write Blogs in this website</a>
                    @endif


                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"
                        style="
                         background-color:#f67280;
                                                color:#ffffff !important;
                                                padding: 13px 26px;
                                                text-align:center;
                                                font-size:24px;
                                                border-radius:20px;
                                                font-weight:700 !important;
                                                text-transform: capitalize;
                                                "


                        >Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline" style="
                             background-color:#f67280;
                                                color:#ffffff !important;
                                                padding: 13px 26px;
                                                text-align:center;
                                                font-size:24px;
                                                border-radius:20px;
                                                font-weight:700 !important;
                                                text-transform: capitalize;

                            ">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
                <div class="social-icones">
                    <ul class="list-inline">
                        <li>

                           <a class="nav-link" href="{{route('privacyPolicies')}}" style="font-size: 20px;"> Privacy-Policies </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('terms')}}" style="font-size: 20px;"> Terms & Conditions </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('about')}}" style="font-size: 20px;"> About Us </a>
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
                        <p>© Copyright 2021 <a href="">servicearea.com</a>, All rights reserved.</p>
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
    <script src="{{asset('assets/js/jquery-3.5.0.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

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
