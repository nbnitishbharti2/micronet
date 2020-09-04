@php
use App\Model\State;
use App\Model\Category;
$state_list = State::getAllStateForListing();
$category_list = Category::getAllCategoryForListing();
@endphp


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
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<h1>View Price By City</h1>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 right-align">
							<a href="{{ url('/') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<!-- left column -->
						<div class="col-12">
							<!-- general form elements -->
							<div class="card">
								<!-- /.card-header -->
								<div class="card-body">
									<div class="table-responsive">
										<form action="{{ route('admin.view.price-by-city') }}" method="POST">
											@csrf
										<div class="row">

											<div class="short_by new-filter col-sm-2"> 
												<label>State</label>
												<select name="state_id" class="form-control" id="state_id">
													<option>Choose State</option>
													@foreach($state_list as $key=>$value)
														<option value="{!! $key !!}" {{ ( $key == (($state_id) ? $state_id : old('state_id')) ) ? 'selected' : '' }}>{!! $value !!}</option>
													@endforeach
												</select>
											</div>

											<div class="short_by new-filter col-sm-2"> 
												<label>City</label>
												<select name="city_id" class="form-control" id="city_id">
													<option>Choose City</option>
												</select>
											</div>

											<div class="short_by new-filter col-sm-2"> 
												<label>Category</label>
												<select name="category_id" class="form-control" id="category_id">
													<option>Choose Category</option>
													@foreach($category_list as $key => $value)
														<option value="{!! $value->id !!}" {{ ($value->id == (($category_id) ? $category_id : old('category_id')) ) ? 'selected' : '' }}>{!! $value->name !!}</option>
													@endforeach
												</select>
											</div>

											<div class="short_by new-filter col-sm-2"> 
												<label>Sub Category</label>
												<select name="sub_category_id" class="form-control" id="sub_category_id">
													<option>Choose Sub Category</option>
												</select>
											</div>

											<div class="short_by new-filter col-sm-2"> 
												<label>Service</label>
												<select name="service_id" class="form-control" id="service_id">
													<option>Choose Service</option>
												</select>
											</div>

											<input type="submit"  class="btn btn-primary" name="submit" value="Submit" style="margin-top:32px;height:36px;" />

										</div>
									</form>

										<table id="table" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>Serial No</th>
													<th>Service Plan</th>
													<th>Amount</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="tbody">
												@php $i = 0; @endphp
												@foreach($service_plan as $key=>$value)
													<tr>
														<form action="{{route('admin.update.price-by-city')}}" method="post" >
														@csrf
														<td>{!! ++$i !!}</td>
														<td>{!! $value !!}
															<input type="hidden" name="state_id" value="{{$state_id}}">
															<input type="hidden" name="city_id" value="{{$city_id}}">

															<input type="hidden" name="category_id" value="{!! $category_id !!}">
															<input type="hidden" name="sub_category_id" value="{!! $sub_category_id !!}">
															
															<input type="hidden" name="service_id" value="{{$service_id}}">
															<input type="hidden" name="service_plan_id" value="{!! $key !!}">
		

														</td>
														<td><input type="text" name="amount" value="{{(array_key_exists($key,$price_by_city)) ? $price_by_city[$key] : ''}}" /></td>
														<td>
															
															<button type="submit"  title="Edit" class="btn-sm btn btn-primary"><i class="fa fa-edit"></i>  </button>
														</td>
													</form>
													</tr>
												@endforeach
												
												
											</tbody>
										</table>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- /.content-wrapper -->
		<!--@include('admin.layouts.footer')-->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	@endsection


@section('script') 

<script>
$(window).on('load',function() {

	if($('#state_id').val())
    {
        var state_id = $('#state_id').val();
     
        var form_data = new FormData();
        form_data.append('state_id',state_id);
        form_data.append('_token', '{{csrf_token()}}');

        var old_city_id='{{ $city_id  }}';

        if(old_city_id == 0) {
        	$('#city_id').html('<option>Choose City</option>');
        }
        else {
	        $.ajax({
	            url: "{{route('get-city-from-city')}}",
	            data: form_data,
	            type: 'POST',
	            dataType: "json",
	            contentType: false,
	            processData: false,
	            success:function(data) { 
	            	$('#city_id option').remove();
		            $('select[name="city_id"]').append('<option>Choose City</option>');
		            $.each(data, function(key, value) {
		                var select='';
		                if(old_city_id==key){select='selected';}
		                $('select[name="city_id"]').append('<option value="'+ key +'" "'+select+'" >'+ value +'</option>');
		            });
		            $("#city_id").val(old_city_id);
	            }
	        });
        }
    }

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
    if(old_sub_category_id)  
    { 
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

	$('#state_id').on('change', function(){
		var state_id = $(this).val();

		var form_data = new FormData();
        form_data.append('state_id',state_id);
        form_data.append('_token', '{{csrf_token()}}');

        $.ajax({
            url: "{{route('get-city-from-city')}}",
            data: form_data,
            type: 'POST',
            dataType: "json",
            contentType: false,
            processData: false,
            success:function(data) { 
            	console.log(data);
                $('#city_id option').remove();
                $('select[name="city_id"]').append('<option value="" >Choose City</option>');
                $.each(data, function(key, value) {
                    $('select[name="city_id"]').append('<option value="'+ key +'"  >'+ value +'</option>');
                });
            }
        });
	});

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


	// subcategory script starts here
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
	//subcategory script ends here
		
});        
      
</script>

@endsection

