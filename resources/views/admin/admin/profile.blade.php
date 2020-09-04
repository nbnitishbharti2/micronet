@extends('admin.layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		{{-- Include Header --}}  
		@include('admin.layouts.navbar')
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			 Content Header (Page header) 
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Profile</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
								<li class="breadcrumb-item active">Admin Profile</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<!-- left column -->
						<div class="col-md-6">
							<!-- general form elements -->
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Admin Profile</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form role="form" action="{{ route('admin.updateProfile') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="card-body">
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" class="form-control" value="{{ Auth::user()->name }}" id="name" name="name" placeholder="Enter Name">

										</div>
										@if($errors->has('name'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('name') }}</strong>
				                            </span>
				                        @endif
										<div class="form-group">
											<label for="email">Email address</label>
											<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ Auth::user()->email }}">
											@if($errors->has('email'))
												<span class="alert-notice" role="alert">
					                                <strong>{{ $errors->first('email') }}</strong>
					                            </span>
					                        @endif
										</div>
										<div class="form-group">
											<label for="exampleInputFile">Profile Image</label>
											<input type="file" class="form-control"  name="image">
											<!-- <div class="input-group"> 
												<div class="custom-file"> 
													<input type="file" class="custom-file-input" id="exampleInputFile" name="image"> 
													<label class="custom-file-label" for="exampleInputFile">Choose file</label> 
												</div>
											</div> -->
											@if($errors->has('image'))
												<span class="alert-notice" role="alert">
					                                <strong>{{ $errors->first('image') }}</strong>
					                            </span>
					                        @endif
										</div>
										<div class="card-footer">
						                  	<button type="submit" class="btn btn-primary">Submit</button>
						                </div>
									</div>
									<!-- /.card-body -->
								</form>
							</div>
						</div>
						<div class="col-md-6">
							<div class="user-image" style="padding: 35px 70px 50px 20%;">
								@if(Auth::user()->image)
									<img class="img img-responsive img-thumbnail" src="{{ asset('public/admin_image/'.Auth::user()->image) }}" width="250">
								@else
									<img class="img img-responsive img-thumbnail" src="{{ asset('public/admin/dist/img/user-avatar.jpg') }}" width="250">
								@endif
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		@include('admin.layouts.footer')
	</div>
@endsection
@section('script')
	<script src="{{ asset('public/js/common-function.js') }}"></script>
	<script src="{{ asset('public/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		  	bsCustomFileInput.init();
		});
	</script>
@endsection