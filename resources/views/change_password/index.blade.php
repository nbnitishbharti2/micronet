
@extends('Layout.app')

@section('content')

<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

@section('page_title')
@parent
<h1 class="page-title">Change Password</h1>
    @section('breadcrumb')
    @parent
    <li>Change Password</li>
    @endsection
@endsection


<!-- - - - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - - - -->

<!-- how it works page -->
<section class="p-0">
    <div class="container">
        <div class="overview-menu">
            <div class="filters">
                <div class="school-title">
                    <a href="{{ url('/') }}" class="logo"><img src="{{ asset('public/images/b-logo.png') }}" alt="Logo"></a>
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
                        <form method="POST" action="{{ $action }}">
                        @csrf
                            <div class="mid_steps">
                                <!--inner heading-->
                                <div class="form-heading">
                                    <h4>{{ $title }}</h4>
                                </div>
                                <!--form-->
                                <!-- <form role="form"> -->
    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                                            <div class="form-group">
                                                <label>Old Password<sup>*</sup></label>
                                                <input id="old_password" type="password" class="form-control" name="old_password" placeholder="Old Password">

                                                @error('old_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>New Password<sup>*</sup></label>
                                                <input id="newpassword" type="password" class="form-control" name="newpassword" placeholder="New Password">

                                                @error('newpassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Confirm Password<sup>*</sup></label>
                                                <input id="newpassword_confirmation" type="password" class="form-control" name="newpassword_confirmation" placeholder="New Password Confirmation" />

                                                @error('newpassword_confirmation')
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

