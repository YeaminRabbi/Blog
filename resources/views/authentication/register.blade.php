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

    <!--register-->
    <section class="section pt-55 mb-50">
        <div class="container-fluid">
            <div class="sign widget">
                <div class="section-title">
                    <h5>Sign up</h5>
                </div>


                <form id="" method="POST" action="{{route('register')}}" class="sign-form widget-form" >
                    @csrf


                    @error('email')
                    <div class="alert alert-danger" role="alert">
                       {{$message}}
                      </div>
                     @enderror


                     @error('name')
                     <div class="alert alert-danger" role="alert">
                        {{$message}}
                       </div>
                      @enderror


                      @error('password')
                      <div class="alert alert-danger" role="alert">
                         {{$message}}
                        </div>
                       @enderror


                            <div class="form-group row">
                                    <div class="col-12 form-group mb-25">
                                        <label for="username">Full Name</label>
                                        <input style="font-size: 18px; font-weight:bold;" autocomplete="off" placeholder="Enter your Full Name" required autofocus class="form-control @error('name') is-invalid @enderror" type="text" id="name" required="" name="name" value="{{old('name')}}" >

                                    </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 form-group mb-25">
                                    <label for="emailaddress">Email address</label>
                                    <input style="font-size: 18px; font-weight:bold;" autocomplete="off" class="form-control @error('email') is-invalid @enderror" type="email" id="email"  name="email" value="{{ old('email') }}" required  placeholder="example@gmail.com" >
                                </div>

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
                                    <a href="{{route('password.request')}}" class="text-muted float-right"><small>Forgot your Password</small></a>
                                    <label for="password">Confirm Password</label>
                                    <input style="font-size: 18px; font-weight:bold;" id="password-field" autocomplete="off" id="password-confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter your password again" >
                                </div>
                            </div>

                            <div class="form-group">
                                <button name="register" id="reset" type="submit" class="btn-custom">Register</button>
                            </div>

                            <p class="form-group text-center">Have an account? <a href="{{route('login')}}" class="btn-link">Login</a> </p>

                </form>
            </div>

        </div>
    </section>

@endsection
