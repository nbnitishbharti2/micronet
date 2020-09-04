@extends('layouts.default')
@section('content')
<section class="p-0">
	<div class="login">
		<div class="container">
			<div class="row">
                <div class="col-md-12 login-form">
				    <form method="POST" action="{{ route('serviceProviderRegister') }}">
				        @csrf
				        <div class="login-content p-0 mt-4">
				            <h3>Sign Up</h3>
				            <div class="form-group login-with">
				                <div class="row">
				                	<div class="col-md-4">
				                		<div class="form-group">
				                			<input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Name"  autocomplete="first_name" autofocus>
						                    @error('first_name')
						                        <span class="invalid-feedback" role="alert">
						                            <strong>{{ $message }}</strong>
						                        </span>
						                    @enderror
				                		</div>
				                	</div>
				                	<div class="col-md-4">
				                		<div class="form-group">
				                			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email">
						                    @error('email')
						                        <span class="invalid-feedback" role="alert">
						                            <strong>{{ $message }}</strong>
						                        </span>
						                    @enderror
				                		</div>
				                	</div>
				                	<div class="col-md-4">
				                		<div class="form-group">
				                			<input type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{ old('phone') }}" />
						                    @error('phone')
						                        <span class="invalid-feedback" role="alert">
						                            <strong>{{ $message }}</strong>
						                        </span>
						                    @enderror 
				                		</div>
				                	</div>
				                	<div class="col-md-4">
				                		<div class="form-group">
				                			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"  autocomplete="new-password">
						                    @error('password')
						                        <span class="invalid-feedback" role="alert">
						                            <strong>{{ $message }}</strong>
						                        </span>
						                    @enderror
				                		</div>
				                	</div>
				                	<div class="col-md-4">
				                		<div class="form-group">
				                			<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"  autocomplete="password_confirmation">
						                	@error('password_confirmation')
						                        <span class="invalid-feedback" role="alert">
						                            <strong>{{ $message }}</strong>
						                        </span>
						                    @enderror 
				                		</div>
				                	</div>
									<div class="w-100"></div>
				                	@php
				                	use App\Model\Service;
				                	$services=App\Model\Service::getAllServiceName();
	        						//dd($services);
				                	@endphp
					                @foreach($services as $key=>$value)
					                {{-- dd($service->name) --}}
				                	<div class="col-md-4">
				                		<div class="form-group">
				                			<label for="service_id" class="mb-0">{{ $value }}</label>
											<input type="text" name="service_id[{{$key}}]" class="form-control" id="service_id" placeholder="Enter Price" value="{{ old('service_id[$key]' ) }}"> 
					                	</div>
					                </div>
									@endforeach
									@error('service_id')
				                        <span class="invalid-feedback" role="alert">
				                            <strong>{{ $message }}</strong>
				                        </span>
				                    @enderror 

				                	
				                </div>
				                   
				            </div>
				            <!-- <div class="custom-control custom-checkbox mr-sm-2">
				            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
				            <label class="custom-control-label" for="customControlAutosizing">
				            <p class="term-cond mb-3">By proceeding, I agree to the <a href="#">Conditions of use</a> and <a href="#">Privacy policy</a></p>
				            </label>
				            </div> -->
				            <!-- <a href="{{ url('/login/facebook') }}" class="login-fb mb-2"><img class="w-100" src="{{asset('image/login-with-fb.png')}}"></a>
				            <a href="{{ url('/login/google') }}" class="login-google mb-4"><img class="w-100" src="{{asset('image/login-with-google.png')}}"></a> -->
				            
				            <!-- button -->
				            <button type="submit" class="ar-btn mt-4 mb-4">signup</button>
				        </div>
				    </form>
				</div>

			</div>
		</div>
	</div>
</section>

@endsection
