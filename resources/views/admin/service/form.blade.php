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
							<a href="{!! route('admin.view.service') !!}" class="btn btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
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
									<input type="hidden" name="service_id" value="{{ $service_id }}">
									<div class="card-body">
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" class="form-control" value="{{ ($name) ? $name : old('name') }}" id="name" name="name" placeholder="Enter Name">
										</div>
										@if($errors->has('name'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('name') }}</strong>
				                            </span>
				                        @endif


				                        <div class="form-group">
											<label for="type_id">Type</label>
											<select name="type_id" class="form-control">
												<option value="">Choose Type</option>
												@foreach($type_list as $type)
												{{-- dd($$type->id) --}}
													<option value="{!! $type->id !!}" {{ old("type_id",$type_id) == $type->id ? 'selected' : '' }} >{!! $type->name !!}</option>
												@endforeach
											</select>
										</div>
										@if($errors->has('type_id'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('type_id') }}</strong>
				                            </span>
				                        @endif


				                        <div class="form-group">
											<label for="category_id">Category</label>
											<select name="category_id" class="form-control">
												<option value="">Choose Category</option>
												@foreach($category_list as $category)
													<option value="{!! $category->id !!}" {{ old("category_id",$category_id) == $category->id ? 'selected' : '' }} >{!! $category->name !!}</option>
												@endforeach
											</select>
										</div>
										@if($errors->has('category_id'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('category_id') }}</strong>
				                            </span>
				                        @endif


				                        <div class="form-group">
											<label for="sub_category_id">Sub Category</label>
											<select name="sub_category_id" class="form-control">
												<option value="">Choose Sub Category</option>
												@foreach($sub_category_list as $sub_category)
													<option value="{!! $sub_category->id !!}" {{ old("sub_category_id",$sub_category_id) == $sub_category->id ? 'selected' : '' }} >{!! $sub_category->name !!}</option>
												@endforeach
											</select>
										</div>
										@if($errors->has('sub_category_id'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('sub_category_id') }}</strong>
				                            </span>
				                        @endif


				                        <div class="form-group">
											<label for="image">Image</label>
											<input type="file" class="form-control" name="image">
										</div>
										@if($errors->has('image'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('image') }}</strong>
				                            </span>
				                        @endif

				                        @if($image)
				                        <div class="form-group">
				                        <img src="{{asset('public/service_image/'.$image)}}" width="70" height="70" />
				                    	</div>
				                        @endif
										
										<div class="card-footer">
						                  	<button type="submit" class="btn btn-primary">Submit</button>
						                  	<button type="reset" class="btn btn-danger">Reset</button>
						                  	<a href="{{ route('admin.view.service') }}" class="btn btn-success">Back</a>
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