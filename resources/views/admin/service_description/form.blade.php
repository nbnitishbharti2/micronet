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
							<a href="{!! route('admin.view.service-description') !!}" class="btn btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
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
								<form role="form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="service_description_id" value="{{ $service_description_id }}">
									<div class="card-body">
				                        <div class="form-group">
											<label for="service_id">Service</label>
											<select name="service_id" class="form-control">
												<option>Choose Service</option> 
												@foreach($service_list as $service =>$value)
													<option value="{!! $service !!}" {{ old("service_id",$service_id) == $service ? 'selected' : '' }}>{!! $value !!}</option>
												@endforeach
											</select>
										</div>
										@if($errors->has('service_id'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('service_id') }}</strong>
				                            </span>
				                        @endif

				                        <div class="form-group">
											<label for="description">Description</label>
											<textarea row="3" class="form-control" name="description" placeholder="Enter Description">{{ ($description) ? $description : old('description') }}</textarea>
										</div>
										@if($errors->has('description'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('description') }}</strong>
				                            </span>
				                        @endif

				                        <div class="form-group">
											<label for="availability">Availability</label>
											<select class="form-control" name="availability">
												<option value="">Choose Availability</option>
												@foreach($availability_list as $key=>$value)
													<option value="{!! $value !!}" {{ old("availability",$availability) == $key ? 'selected' : '' }}>{!! $value !!}</option>
												@endforeach
											</select>
										</div>
										@if($errors->has('availability'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('availability') }}</strong>
				                            </span>
				                        @endif
				                        
										<div class="card-footer">
						                  	<button type="submit" class="btn btn-primary">Submit</button>
						                  	<button type="reset" class="btn btn-danger">Reset</button>
						                  	<a href="{{ route('admin.view.service-description') }}" class="btn btn-success">Back</a>
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