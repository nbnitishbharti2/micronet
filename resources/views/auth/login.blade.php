@extends('layouts.default')
@section('content')


<!-- login page -->
<section class="p-0">
    <div class="login">
        <div class="container">
            <div class="shadow login-form-top">
                <div class="row">
                    <div class="col-md-6 login-form align-self-center">
                        <div class="login-content">
                            <img src="{{asset('image/login-bg.jpg')}}" class="img-fluid"/>
                        </div>
                    </div>
                    <div class="col-md-6 login-form align-self-center">
                        <div class="login-content">
                            <h3>Login</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group login-with">
                                    <label for="exampleInputEmail1">Login with your email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}">
                                        {!! $errors->login->first('email', '<span class="form__error invalid" role="alert"><strong style="color:red;">:message</strong></span>') !!}


                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        {!! $errors->login->first('password', '<span class="form__error invalid" role="alert"><strong style="color:red;">:message</strong></span>') !!}
                                </div>
                            <!-- </form> -->
                                <a class="term-cond d-block mb-3" href="{{ route('password.request') }}">Forgot Password ?</a>

                                <a class="term-cond d-block mb-3" href="{{ route('showRegister',['id' => 1]) }}">Register with us</a>
                                
                                <a href="#" class="login-fb mb-2"><img class="w-100" src="{{asset('image/sign-up-fb.png')}}"></a>
                                <a href="#" class="login-google mb-4"><img class="w-100" src="{{asset('image/sign-up-google.png')}}"></a>
                                
                                
                                <!-- button -->
                                <!-- <a href="#" class="ar-btn">login</a> -->
                                <input type="submit" class="ar-btn" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login page end -->







@endsection