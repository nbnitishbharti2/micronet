
@extends('Layout.app')

@section('content')

<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

@section('page_title')
@parent
<h1 class="page-title">Edit Profile</h1>
    @section('breadcrumb')
    @parent
    <li>Edit Profile</li>
    @endsection
@endsection


<!-- - - - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - - - -->

<!-- how it works page -->
<section class="p-0">
    <div class="container">
        <div class="overview-menu">
            <div class="filters">
                <div class="school-title">
                    <!-- <div class="school-logo">
                        <a href="{{ route('home') }}"><img src="{{asset('image/dashboard-logo.png')}}" /></a>
                    </div> -->
                    <a href="{{ url('/') }}" class="logo"><img src="{{ asset('public/images/b-logo.png') }}" alt="Logo"></a>
                    <!-- <h3>Sellby MLS</h3> -->
                </div>
                @include('elements.dashboard_left_menu')
            </div>
            
            
            <!-- Edit Profile starts here -->
            <div class="contain_section">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-heading">{{ $page_title }}</h1>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                        @csrf
                            <div class="mid_steps">
                                <!--inner heading-->
                                <div class="form-heading">
                                    <h4>{{ $title }}</h4>
                                </div>
                                <!--form-->
                                <!-- <form role="form"> -->
                                    @if($image)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{asset('public/user_image/'.$image)}}" width="120" height="120">
                                        </div>
                                    </div>
                                    @endif
                                    <br/>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                                            <div class="form-group">
                                                <label>Name<sup>*</sup></label>
                                                <input id="name" type="text" class="form-control" name="name" value="{{ ($name) ? $name : old('name') }}" placeholder="Name">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email<sup>*</sup></label>
                                                <input id="email" type="email" class="form-control" name="email" value="{{ ($email) ? $email : old('email') }}" placeholder="Email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile<sup>*</sup></label>
                                                <input type="number" class="form-control" placeholder="Mobile" name="mobile" value="{{ ($mobile) ? $mobile : old('mobile') }}" />

                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State<sup>*</sup></label>
                                                @php  
                                                    use App\Model\State;
                                                    $state_list = State::getAllStateForListing();
                                                @endphp
                                                <select class="form-control" name="state_id" id="state_id">
                                                    <option value="">Choose State</option>
                                                    @foreach($state_list as $key=>$value)
                                                        <option value="{!! $key !!}" {{ old("state_id",$state_id) == $key ? 'selected' : '' }}>{!! $value !!}</option>
                                                    @endforeach
                                                </select>

                                                @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City<sup>*</sup></label>
                                                 @php  
                                                    use App\Model\City;
                                                    $city_list = City::getAllCityForListing($state_id);
                                                @endphp
                                                <select class="form-control" name="city_id" id="city_id">
                                                    <option value="">Choose City</option>
                                                    @foreach($city_list as $key=>$value)
                                                        <option value="{!! $key !!}" {{ old("city_id",$city_id) == $key ? 'selected' : '' }}>{!! $value !!}</option>
                                                    @endforeach
                                                </select>

                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror  
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Zip<sup>*</sup></label>
                                                <input id="zip" type="text" class="form-control" name="zip" value="{{ ($zip) ? $zip : old('zip') }}" placeholder="Zip">

                                                @error('zip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Address<sup>*</sup></label>
                                                <textarea class="form-control mt-0" name="address" placeholder="Address">{{ ($address) ? $address : old('address') }}</textarea><!-- mt-0 self added -->

                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Aadhar<sup>*</sup></label>
                                                <input id="aadhar" type="text" class="form-control" name="aadhar" value="{{ ($aadhar) ? $aadhar : old('aadhar') }}" placeholder="Aadhar">

                                                @error('aadhar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Image<sup>*</sup></label>
                                                <input type="file" class="form-control" name="image">

                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>


                                    </div>
                                <!-- </form> -->
                            </div>

                            <div class="col-md-12">
                                <!--buttons-->
                                <div class="buttons"> <!-- mt-5 removed by myself -->
                                    <!-- <a href="#" class="btn_border float-right">SAVE</a> -->
                                    <input type="submit" class="btn_border mt-5 float-right" value="Update"> <!-- mt-5 added by myself -->
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
            
            <!-- Edit Profile ends here -->


        </div>
    </div>
</section>
<!-- how it works page end -->

@endsection

