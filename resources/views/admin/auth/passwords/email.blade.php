@extends('admin.layouts.app')
@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
       <div class="login-logo auth-messge">  
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i>{{ session('success') }}
            </div>  
            @endif
            @if(session('error'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-exclamation-triangle"></i>{{ session('error') }}
            </div>  
            @endif
        </div>
      <div class="login-logo">
        <label>Micronet Services</label>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Forget Password</p>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('admin.auth.forgotpasswordrequest') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
              </div>
          </div>
          @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">Reqest New Password</button>
    </div>
    <!-- /.col -->
</div>
</form>

<p class="mt-3 mb-1">
    <a href="{{ route('admin.auth.login') }}">Login</a>
</p>

</div>
<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->


@endsection
