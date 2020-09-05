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
							<a href="{!! route('admin.view.services') !!}" class="btn btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						 
						<!-- left column -->
						<div class="col-md-12">
							<!-- general form elements -->
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">{!! $title !!}</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form role="form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="category_id" value="{{ $category_id }}">
									<div class="card-body">
										<div class="form-group row">
										<div class="col-sm-6 form-group">
											<label for="name">Name</label>
											<input type="text" class="form-control" value="{{ ($name) ? $name : old('name') }}" id="name" name="name" placeholder="Enter Name">
										
										@if($errors->has('name'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('name') }}</strong>
				                            </span>
				                        @endif
				                        </div>
				                        <div class="col-sm-6 form-group">
											<label for="name">Price</label>
											<input type="number" class="form-control" value="{{ ($price) ? $price : old('price') }}" id="price" name="price" placeholder="Enter Price">
										
										@if($errors->has('price'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('price') }}</strong>
				                            </span>
				                        @endif
				                        </div>
				                        <div class="col-sm-6 form-group">
											<label for="name">Discount</label>
											<input type="number" class="form-control" value="{{ ($discount) ? $discount : old('discount') }}" id="discount" name="discount" placeholder="Enter Discount">
										
										@if($errors->has('discount'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('discount') }}</strong>
				                            </span>
				                        @endif
				                        </div>
				                        <div class="col-sm-6 form-group">
											<label for="name">New Price</label>
											<input type="number" class="form-control" value="{{ ($new_price) ? $new_price : old('new_price') }}" id="new_price" name="new_price" placeholder="Enter New Price">
										
										@if($errors->has('new_price'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('new_price') }}</strong>
				                            </span>
				                        @endif
				                        </div>
				                        <div class="col-sm-6 form-group">
											<label for="name">Short Description</label>
											<textarea rows="10" class="form-control" id="short_description" name="short_description" placeholder="Enter Short Description">{{ ($short_description) ? $short_description : old('short_description') }}</textarea>
											 
										
										@if($errors->has('short_description'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('short_description') }}</strong>
				                            </span>
				                        @endif
				                        </div>
				                        <div class="col-sm-6 form-group">
											<label for="name">Description</label>
											<textarea rows="10" class="form-control" id="description" name="description" placeholder="Enter Description">{{ ($description) ? $description : old('description') }}</textarea>
											  
										@if($errors->has('description'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('description') }}</strong>
				                            </span>
				                        @endif
				                    </div>
				                        <div class="col-sm-6 form-group">
											<label for="image">Image</label>
											<input type="file" class="form-control" name="image">
										
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
										</div>
										<div class="col-sm-12 card-footer">
						                  	<button type="submit" class="btn btn-primary">Submit</button>
						                  	<button type="reset" class="btn btn-danger">Reset</button>
						                  	<a href="{{ route('admin.view.services') }}" class="btn btn-success">Back</a>
						                </div>
						            </div>
									</div>
									<!-- /.card-body -->
								</form>
							</div>
						</div>
						{{-- End form column --}} 
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
		$(document).ready(function() {
			 $('#discount').change(function () {
			 	var price=parseInt($("#price").val());
			 	var discount=parseInt($("#discount").val());
			 	var new_price=price-((price*discount)/100);
			 	$("#new_price").val(new_price);

			 })
		});
	</script>
@endsection