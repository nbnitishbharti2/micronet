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
							<a href="{!! route('admin.view.partner') !!}" class="btn btn-success"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
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
								<form class="form-horizontal" role="form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="partner_id" value="{{ $partner_id }}">
									<div class="card-body">
										<div class="form-group row">
											<div class="col-sm-4 form-group">
												<label for="name">Name</label>
												<input type="text" class="form-control" value="{{ ($name) ? $name : old('name') }}" id="name" name="name" placeholder="Enter Name">
												@if($errors->has('name'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('name') }}</strong>
						                            </span>
						                        @endif
											</div>

					                        <div class=" col-sm-4 form-group">
												<label for="email">Email</label>
												<input type="email" class="form-control" value="{{ ($email) ? $email : old('email') }}" id="email" name="email" placeholder="Enter Email">
												@if($errors->has('email'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('email') }}</strong>
						                            </span>
						                        @endif
											</div>

					                        <div class="col-sm-4 form-group">
												<label for="mobile">Mobile</label>
												<input type="text" class="form-control" value="{{ ($mobile) ? $mobile : old('mobile') }}" id="mobile" name="mobile" placeholder="Enter Mobile">
												@if($errors->has('mobile'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('mobile') }}</strong>
						                            </span>
						                        @endif
											</div>

					                        <div class="col-sm-4 form-group">
												<label for="state_id">State</label>
												<select name="state_id" class="form-control" id="state_id">
													<option>Choose State</option>
													@foreach($state_list as $key=>$value)
														<option value="{!! $key !!}" {{ old("state_id",$state_id) == $key ? 'selected' : '' }}>{!! $value !!}</option>
													
													@endforeach
												</select>
												@if($errors->has('state_id'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('state_id') }}</strong>
						                            </span>
						                        @endif
											</div>

					                        <div class="col-sm-4 form-group">
												<label for="city_id">City</label>
												<select name="city_id" class="form-control" id="city_id">
													<option>Choose City</option>
												</select>
												@if($errors->has('city_id'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('city_id') }}</strong>
						                            </span>
						                        @endif
											</div>

					                        <div class="col-sm-4 form-group">
												<label for="zip">Zip</label>
												<input type="text" class="form-control" value="{{ ($zip) ? $zip : old('zip') }}" id="zip" name="zip" placeholder="Enter Zip">
												@if($errors->has('zip'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('zip') }}</strong>
						                            </span>
						                        @endif
											</div>

					                        <div class="col-sm-4 form-group">
												<label for="address">Address</label>
												<input type="text" class="form-control" value="{{ ($address) ? $address : old('address') }}" id="address" name="address" placeholder="Enter Address">
												@if($errors->has('address'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('address') }}</strong>
						                            </span>
						                        @endif
											</div>

					                        <div class="col-sm-4 form-group">
												<label for="aadhar">Aadhar</label>
												<input type="text" class="form-control" value="{{ ($aadhar) ? $aadhar : old('aadhar') }}" id="aadhar" name="aadhar" placeholder="Enter Aadhar">
												@if($errors->has('aadhar'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('aadhar') }}</strong>
						                            </span>
						                        @endif
											</div>

					                        <div class="col-sm-4 form-group">
												<label for="image">Image</label>
												<input type="file" class="form-control" name="image">
												@if($errors->has('image'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('image') }}</strong>
						                            </span>
						                        @endif
											</div>

					                        <div class="col-sm-4 form-group">
												<label for="password">Password</label>
												<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
												@if($errors->has('password'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('password') }}</strong>
						                            </span>
						                        @endif
											</div>

					                        <div class="col-sm-4 form-group">
												<label for="confirm_password">Confirm Password</label>
												<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password">
												@if($errors->has('password_confirmation'))
													<span class="alert-notice" role="alert">
						                                <strong>{{ $errors->first('password_confirmation') }}</strong>
						                            </span>
						                        @endif
											</div>

	
					                        <div class="form-group col-sm-12 service_id">
												<label for="service_ids">Services</label>
											 
												<div class="row form-group service_id"> 
													@foreach($service_list as $service_id => $value)
													<div class="icheck-primary col-sm-3">
														<input type="checkbox" value="{{$service_id}}" name="service_ids[]" class="service_ids" id="service_id{{$service_id}}" {{ (in_array($service_id,$service_ids))?'checked':'' }} @php if(in_array($service_id,old('service_ids',array()))){ echo "checked";}@endphp>
														<label for="service_id{{$service_id}}">{{$value}}</label>
													</div>
													@endforeach

													@if($errors->has('service_ids'))
													<span class="//alert-notice" role="//alert">
														<strong>{{ $errors->first('service_ids') }}</strong>
													</span>
													@endif

												</div>
											</div>
	

					                        @if($image)
					                        <div class="form-group col-sm-12">
					                        	<img src="{{asset('public/partner_image/'.$image)}}" width="70" height="70" />
					                    	</div>
					                        @endif
					                        
											
											<div class="card-footer">
							                  	<button type="submit" class="btn btn-primary">Submit</button>
							                  	<button type="reset" class="btn btn-danger">Reset</button>
							                  	<a href="{{ route('admin.view.partner') }}" class="btn btn-success">Back</a>
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

<script>
$(window).on('load',function() {

	if($('#state_id').val())
    {
        var state_id = $('#state_id').val();
     
        var form_data = new FormData();
        form_data.append('state_id',state_id);
        form_data.append('_token', '{{csrf_token()}}');

        var old_city_id='{{ old('city_id') ? old('city_id') : $city_id  }}';

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
		
});        
      
</script>

@endsection