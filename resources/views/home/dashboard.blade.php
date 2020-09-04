@extends('Layout.app')

@section('content')

@section('page_title')
@parent
<h1 class="page-title">Dashboard</h1>
    @section('breadcrumb')
    @parent
    <li>Dashboard</li>
    @endsection
@endsection

<!-- how it works page -->
<section class="p-5">
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
            
            <div class="contain_section">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-heading">Dashboard</h1>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-3">
                        <div class="dashboard c-1">
                            <div class="icon-number d-flex justify-content-between">
                                <div class="icon"><img src="{{asset('public/dashboard_images/d-1.png')}}"/></div>
                                <div class="number"><p>70</p></div>
                            </div>
                            <a href="#">Recently Viewed</a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="dashboard c-2">
                            <div class="icon-number d-flex justify-content-between">
                                <div class="icon"><img src="{{asset('public/dashboard_images/d-2.png')}}"/></div>
                                <div class="number"><p>70</p></div>
                            </div>
                            <a href="#">My Listing</a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="dashboard c-3">
                            <div class="icon-number d-flex justify-content-between">
                                <div class="icon"><img src="{{asset('public/dashboard_images/d-4.png')}}"/></div>
                                <div class="number"><p>02</p></div>
                            </div>
                            <a href="#">Show Request Property</a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="dashboard c-4">
                            <div class="icon-number d-flex justify-content-between">
                                <div class="icon"><img src="{{asset('public/dashboard_images/d-4.png')}}"/></div>
                                <div class="number"><p>02</p></div>
                            </div>
                            <a href="#">My Showing Request</a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="dashboard c-5">
                            <div class="icon-number d-flex justify-content-between">
                                <div class="icon"><img src="{{asset('public/dashboard_images/d-3.png')}}"/></div>
                                <div class="number"><p>70</p></div>
                            </div>
                            <a href="#">Favourites</a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="dashboard c-6">
                            <div class="icon-number d-flex justify-content-between">
                                <div class="icon"><img src="{{asset('public/dashboard_images/d-5.png')}}"/></div>
                                <div class="number"><p>70</p></div>
                            </div>
                            <a href="#">Notification</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- how it works page end -->

@endsection

