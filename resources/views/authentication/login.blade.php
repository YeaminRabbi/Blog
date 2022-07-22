@extends('layouts.website_layout')

@section('content')
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
.dark .newslettre-form .form-control, .dark .widget-form .form-control, .dark .search-form input {
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.1);
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
  top:48px;
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


.form .form-group .toggle-password.active i.fa-eye {
  display:none;
}
.form .form-group  .toggle-password.active i.fa-eye-slash {
  display:inline;
}
.form .form-group  .toggle-password i.fa-eye-slash {
  display:none;
}
</style>
    
    <!--Login-->
    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>Login</h5>
                </div>
                <form action="{{route('login')}}" class="sign-form widget-form " method="post">
                    @csrf
                    <div class="form-group">
                        <input style="font-size: 18px; font-weight:bold;" type="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" id="email" placeholder="Jhon@gmail.com" name="email" required="">
                        
                        @error('email')
                        <span class="invalid-feedback is-invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <input style="font-size: 24px;" type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password*" name="password">
                        <span style="position: absolute; right:40px;transform:translate(0,0%);top:36%;cursor:pointer;">
                            <i class="far fa-eye" onclick="toggle()" id="eye" style="font-size:25px;"></i>
                        </span>
                      

                        
                       {{-- Password Error Message Start --}}
                       @error('password')
                       <span class="invalid-feedback is-invalid" role="alert">
                       <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                       {{-- Password Error Message End --}}

                    </div>
                   
                    <div class="sign-controls form-group">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                            <label class="custom-control-label" for="rememberMe">Remember Me</label>
                        </div>
                        <a href="{{route('password.request')}}" class="btn-link  ml-auto">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" value="login" class="btn-custom">Login</button>
                    </div>
                    
                    <p class="form-group text-center">Don't have an account? <a href="{{route('register')}}" class="btn-link">Create One</a> </p>
                    <div class="social-media" style="text-align: center; padding-top: 3rem;">
                        <ul class="list-inline">                           
                            
                            <li>
                                <a href="{{route('loginWithGoogle')}}" class="color-google">
                                    <i class="fab fa-google"></i>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </form>
                                
            </div> 
        </div>
    </section>        

  
    
@endsection
