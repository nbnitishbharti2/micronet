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
							<h1>{!! $page_title !!}</h1>
						</div>
						<div class="col-md-2 text-right">
							<a href="{!! route('admin.view.setting') !!}" class="btn btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
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
									<h3 class="card-title">{!! $title !!}</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form role="form" action="{{ $action }}" method="POST">
									@csrf
									<input type="hidden" name="setting_id" value="{{ $setting_id }}">
									<div class="card-body">

					                        <div class="form-group">
												<label for="email">Email</label>
												<input type="text" class="form-control" value="{{ ($email) ? $email : old('email') }}" id="email" name="email" placeholder="Enter Email">
											</div>
											@if($errors->has('email'))
												<span class="alert-notice" role="alert">
					                                <strong>{{ $errors->first('email') }}</strong>
					                            </span>
					                        @endif

					                        

					                        <div class="form-group">
												<label for="mobile">Mobile</label>
												<input type="text" class="form-control" value="{{ ($mobile) ? $mobile : old('mobile') }}" id="mobile" name="mobile" placeholder="Enter Mobile">
											</div>
											@if($errors->has('mobile'))
												<span class="alert-notice" role="alert">
					                                <strong>{{ $errors->first('mobile') }}</strong>
					                            </span>
					                        @endif

					                        <div class="form-group">
												<label for="address">Address</label>
												<input type="text" class="form-control" value="{{ ($address) ? $address : old('address') }}" id="address" name="address" placeholder="Enter Address">
											</div>
											@if($errors->has('address'))
												<span class="alert-notice" role="alert">
					                                <strong>{{ $errors->first('address') }}</strong>
					                            </span>
					                        @endif

					                        <div class="form-group">
												<label for="zip">Zip</label>
												<input type="text" class="form-control" value="{{ ($zip) ? $zip : old('zip') }}" id="zip" name="zip" placeholder="Enter Zip">
											</div>
											@if($errors->has('zip'))
												<span class="alert-notice" role="alert">
					                                <strong>{{ $errors->first('zip') }}</strong>
					                            </span>
					                        @endif


					                        <div class="form-group">
												<label for="commission">Commission</label>
												<input type="text" class="form-control" value="{{ ($commission) ? $commission : old('commission') }}" id="commission" name="commission" placeholder="Enter Commission">
											</div>
											@if($errors->has('commission'))
												<span class="alert-notice" role="alert">
					                                <strong>{{ $errors->first('commission') }}</strong>
					                            </span>
					                        @endif

					                        
											<div class="card-footer">
							                  	<button type="submit" class="btn btn-primary">Submit</button>
							                  	<button type="reset" class="btn btn-danger">Reset</button>
							                  	<a href="{{ route('admin.view.setting') }}" class="btn btn-success">Back</a>
							                </div>
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