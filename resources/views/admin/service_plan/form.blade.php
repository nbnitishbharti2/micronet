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
							<a href="{!! route('admin.view.service-plan') !!}" class="btn btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
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
									<input type="hidden" name="service_plan_id" value="{{ $service_plan_id }}">
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
											<select name="category_id" class="form-control" id ="category_id">
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
											<label for="sub category">Sub Category</label>
											<select name="sub_category_id" class="form-control" id="sub_category_id">
												<option value="">Choose Sub Category</option>
											</select>
										</div>
										@if($errors->has('sub_category_id'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('sub_category_id') }}</strong>
				                            </span>
				                        @endif


				                        <div class="form-group">
											<label for="service">Service</label>
											<select name="service_id" class="form-control" id="service_id">
												<option value="">Choose Service</option>
											</select>
										</div>
										@if($errors->has('service_id'))
											<span class="alert-notice" role="alert">
				                                <strong>{{ $errors->first('service_id') }}</strong>
				                            </span>
				                        @endif

										
										<div class="card-footer">
						                  	<button type="submit" class="btn btn-primary">Submit</button>
						                  	<button type="reset" class="btn btn-danger">Reset</button>
						                  	<a href="{{ route('admin.view.service-plan') }}" class="btn btn-success">Back</a>
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

<script>
$(window).on('load',function() {

		if($('#category_id').val())
        {
	        var category_id = $('#category_id').val();
	       
	        var form_data = new FormData();
	        form_data.append('category_id',category_id);
	        form_data.append('_token', '{{csrf_token()}}');
	       
	        var old_sub_category_id='{{ $sub_category_id }}'; 

	        if(old_sub_category_id == 0) {
	        	$('#sub_category_id').html('<option>Choose Sub Category</option>');
	        }
	        else {
		        $.ajax({
		            url: "{{route('get-sub-category-from-sub-category')}}",
		            data: form_data,
		            type: 'POST',
		            dataType: "json",
		            contentType: false,
		            processData: false,
		            success:function(data) { 
		            	$('#sub_category_id option').remove();
			            $('select[name="sub_category_id"]').append('<option>Choose Sub Category</option>');
			            $.each(data, function(key, value) {
			                var select='';
			                if(old_sub_category_id==key){select='selected';}
			                $('select[name="sub_category_id"]').append('<option value="'+ key +'" "'+select+'" >'+ value +'</option>');
			            });
			            $("#sub_category_id").val(old_sub_category_id);
		            }
		        });
	        }
	    }
        if(old_sub_category_id)  /*   $('#sub_category_id').val() ||  */
        { 
	        //var sub_category_id = ($('#sub_category_id').val())?$('#sub_category_id').val():old_sub_category_id;
	        var sub_category_id = old_sub_category_id; 
	        var category_id =$('#category_id').val(); 
	      
	        var form_data = new FormData();
	        form_data.append('category_id',category_id);
	        form_data.append('sub_category_id',sub_category_id);
	        form_data.append('_token', '{{csrf_token()}}');
	       
	        var old_service_id='{{ $service_id }}'; 
	        if(old_service_id == 0) {
	        	$('#service_id').html('<option>Choose Service</option>');
	        }
	        else {
		        $.ajax({
		            url: "{{route('get-service-from-service')}}",
		            data: form_data,
		            type: 'POST',
		            dataType: "json",
		            contentType: false,
		            processData: false,
		            success:function(data) { 
		            	$('#service_id option').remove();
			            $('select[name="service_id"]').append('<option>Choose Service</option>');
			            $.each(data, function(key, value) {
			                var select='';
			                if(old_service_id==key){select='selected';}
			                $('select[name="service_id"]').append('<option value="'+ key +'" "'+select+'" >'+ value +'</option>');
			            });
			            $("#service_id").val(old_service_id);
		            }
		        });
	        }
	    }
	});
	        
      
 

	$(document).ready(function(){
		$('#category_id').on('change', function(){
			var category_id = $(this).val();  
			var form_data = new FormData();
            form_data.append('category_id',category_id);
            form_data.append('_token', '{{csrf_token()}}');

            $.ajax({
                url: "{{route('get-sub-category-from-sub-category')}}",
                data: form_data,
                type: 'POST',
                dataType: "json",
                contentType: false,
                processData: false,
                success:function(data) { 
                	//console.log(data);
	                $('#sub_category_id option').remove();
	                $('select[name="sub_category_id"]').append('<option value="" >Choose Sub Category</option>');
	                $.each(data, function(key, value) {
	                    $('select[name="sub_category_id"]').append('<option value="'+ key +'"  >'+ value +'</option>');
	                });
                }
            });
		});

		$('#sub_category_id').on('change', function(){
			var sub_category_id = $(this).val(); 
			var category_id =$('#category_id').val();  
	        var form_data = new FormData();
	        form_data.append('category_id',category_id);
            form_data.append('sub_category_id',sub_category_id);
            form_data.append('_token', '{{csrf_token()}}');

            $.ajax({
                url: "{{route('get-service-from-service')}}",
                data: form_data,
                type: 'POST',
                dataType: "json",
                contentType: false,
                processData: false,
                success:function(data) { 
	                $('#service_id option').remove();
	                $('select[name="service_id"]').append('<option value="">Choose Service</option>');
	                $.each(data, function(key, value) {
	                    $('select[name="service_id"]').append('<option value="'+ key +'">'+ value +'</option>');
	                });
                }
            });
		});
	});
</script>
@endsection