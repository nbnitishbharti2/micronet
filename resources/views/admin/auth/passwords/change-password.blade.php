@extends('admin.layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		{{-- Include Header --}}  
		@include('admin.layouts.navbar')
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-md-10">
							<h1>Change Password</h1>
						</div>
						<div class="col-md-2 text-right">
							<a href="{!! route('admin.view.state') !!}" class="btn btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3"></div>
						<!-- left column -->
						<div class="col-md-6">
							<!-- general form elements -->
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Change Password</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form role="form" action="{{ route('admin.auth.changepasswordrequest') }}" method="POST">
									@csrf
									<input type="hidden" name="state_id" value="">
									<div class="card-body">
										<div class="form-group">
											<label for="name">Current Password</label>
											<input id="password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{ $current_password ?? old('current_password') }}"autocomplete="password" autofocus>
										</div>
										@if($errors->has('current_password'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('current_password') }}</strong>
				                            </span>
				                        @endif
				                        <div class="form-group">
											<label for="name">New Password</label>
											<input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password"  autocomplete="new-password">
										</div>
										@if($errors->has('new_password'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('new_password') }}</strong>
				                            </span>
				                        @endif
										<div class="form-group">
											<label for="name">Confirm Password</label>
											 <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror"  name="confirm_password"  autocomplete="new-password">
										</div>
										@if($errors->has('confirm_password'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('confirm_password') }}</strong>
				                            </span>
				                        @endif
										
										<div class="card-footer">
						                  	<button type="submit" class="btn btn-primary">Submit</button>
						                  	<button type="reset" class="btn btn-danger">Reset</button>
						                  	<a href="{{ route('admin.view.state') }}" class="btn btn-success">Back</a>
						                </div>
									</div>
									<!-- /.card-body -->
								</form>
							</div>
						</div>
						{{-- End form column --}}
						<div class="col-md-3"></div>
					</div>
				</div>
			</section>
		</div>
		@include('admin.layouts.footer')
	</div>
@endsection
@section('script') 
	<script src="{{ asset('public/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		  	bsCustomFileInput.init();
		});
	</script>
@endsection