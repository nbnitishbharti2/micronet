@extends('layouts.default')
@section('content')


<!-- login page -->
<section class="p-0">
    <div class="login">
        <div class="container">
            <div class="shadow login-form-top">
                <div class="row">
                    <!-- <div class="col-md-6 login-form align-self-center">
                        <div class="login-content">
                            <img src="{{asset('image/login-bg.jpg')}}" class="img-fluid"/>
                        </div>
                    </div> -->

                    <div class="col-md-3"></div>

                    <div class="col-md-6 login-form align-self-center">
                        <div class="login-content">
                            <h3>{{ __('Reset Password') }}</h3>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                    
                                <div class="login-with">

                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label><!-- col-md-4 is removed -->

                                        <!-- <div class="col-md-6"> -->
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>  <!-- autofocus attribute is replaced by readonly -->

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <!-- </div> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                        <!-- col-md-4 is removed -->

                                        <!-- <div class="col-md-6"> -->
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <!-- </div> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label><!-- col-md-4 is removed -->

                                        <!-- <div class="col-md-6"> -->
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <!-- </div> -->
                                    </div>

                                </div>

                                <!-- button -->
                                <!-- <div class="form-group row mb-0"> -->
                                    <!-- <div class="col-md-6 offset-md-4"> -->
                                        <button type="submit" class="ar-btn" style="width:auto !important;">
                                            {{ __('Reset Password') }}
                                        </button>
                                    <!-- </div> -->
                                <!-- </div> -->
                                <!-- <button type="submit" class="ar-btn">{{ __('Reset Password') }}</button> -->
                            </form>
                        </div>
                    </div>



                    <div class="col-md-3"></div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- login page end -->







@endsection