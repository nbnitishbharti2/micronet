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

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                    
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                    
                                <div class="login-with">
                        
                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label> <!-- col-md-4 is removed -->

                                        <!-- <div class="col-md-6"> -->
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" required autocomplete="email" autofocus>  

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <!-- </div> -->
                                    </div>

                                </div>

                                <!-- button -->
                                <!-- <div class="form-group row mb-0"> -->
                                    <!-- <div class="col-md-6 offset-md-4"> -->
                                        <button type="submit" class="ar-btn" style="width:auto !important;">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    <!-- </div> -->
                                <!-- </div> -->

                                <!-- <button type="submit" class="ar-btn">{{ __('Send Password Reset Link') }}</button> -->
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