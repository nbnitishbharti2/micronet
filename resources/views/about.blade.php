@extends('Layout.app')
@section('content')

<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

@section('page_title')
@parent
<h1 class="page-title">About</h1>
    @section('breadcrumb')
    @parent
    <li>About</li>
    @endsection
@endsection

<!-- - - - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - - - -->


<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
<div id="content">    
    <div class="page-section-bg4 type4 half-bg-col">
        <div class="img-col-right">
            <div class="col-bg" data-bg="{{ asset('public/images/960x530_bg1.jpg') }}"></div>
        </div>
      
        <div class="container extra-size2">
            <div class="row">
                <div class="col-md-6">
                    <h2>Who We Are</h2>
                    <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. </p>
                    <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. </p>
                    {{-- <a href="#" class="btn btn-small">Meet Our Team</a> --}}
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <h2 class="section-title">Why Choose Us</h2>
        
            <div class="icons-box style-1">
                <div class="row flex-row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                        <div class="icons-wrap">
                            <div class="icons-item">
                                <div class="item-box">
                                    <i class="licon-hammer-wrench"></i>
                                    <h5 class="icons-box-title"><a href="#">24/7 Service, 365 days a Year</a></h5>
                                    <p>Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                        <div class="icons-wrap">
                            <div class="icons-item">
                                <div class="item-box">
                                    <i class="licon-man"></i>
                                    <h5 class="icons-box-title"><a href="#">Personalized Solutions</a></h5>
                                    <p>Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque.</p>
                                </div>
                            </div>
                        </div>              
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                        <div class="icons-wrap">
                            <div class="icons-item">
                                <div class="item-box">
                                    <i class="licon-thumbs-up"></i>
                                    <h5 class="icons-box-title"><a href="#">Done Right the First Time</a></h5>
                                    <p>Vivamus eget nibh. Etiam cursus leo vel <br> metus. Nulla facilisi. Aenean nec eros. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-section-bg2 parallax-section" data-bg="{{ asset('public/images/1920x800_bg1.jpg') }}">          
        <div class="container">
            <h2 class="section-title">Company Statistics</h2>
            <div class="row counter-wrap style-2">
                <div class="col-lg-3 col-md-3 col-xs-6">
                    <div class="counter">
                        <div class="count-item">
                            <span class="licon-users"></span>
                            <h3 class="timer count-number" data-to="380" data-speed="1500">0</h3>
                        </div>
                        <p>Professionals in Our Team</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-6">
                    <div class="counter">
                        <div class="count-item">
                            <span class="licon-medal-empty"></span>
                            <h3 class="timer count-number" data-to="60" data-speed="1500">0</h3>
                        </div>
                        <p>Years of Successful Work</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-6">
                    <div class="counter">
                        <div class="count-item">
                            <span class="licon-smile"></span>
                            <h3 class="timer count-number" data-to="1970" data-speed="1500">0</h3>
                        </div>
                        <p>Satisfied Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-6">
                    <div class="counter">
                        <div class="count-item">
                            <span class="licon-check"></span>
                            <h3 class="timer count-number" data-to="893" data-speed="1500">0</h3>
                        </div>
                        <p>Projects Done</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="team-holder">    
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <!-- team element -->
                        <div class="team-item">
                            <div class="team-member">
                                <a href="#" class="member-photo">
                                    <img src="{{ asset('public/images/360x260_img4.jpg') }}" alt="">
                                </a>
                                <div class="team-desc">
                                    <div class="member-info">
                                        <h4 class="member-name"><a href="#">Our History</a></h4>
                                        <p>Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. Mauris fermentum dictum magna. </p>
                                        <a href="#" class="info-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <!-- team element -->
                        <div class="team-item">
                            <div class="team-member">
                                <a href="#" class="member-photo">
                                    <img src="{{ asset('public/images/360x260_img5.jpg') }}" alt="">
                                </a>
                                <div class="team-desc">
                                    <div class="member-info">
                                        <h4 class="member-name"><a href="#">Vision & Purpose</a></h4>
                                        <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante.</p>
                                        <a href="#" class="info-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <!-- team element -->
                        <div class="team-item">
                            <div class="team-member">
                                <a href="#" class="member-photo">
                                    <img src="{{ asset('public/images/360x260_img6.jpg') }}" alt="">
                                </a>
                                <div class="team-desc">
                                    <div class="member-info">
                                        <h4 class="member-name"><a href="#">Our Customer Stories</a></h4>
                                        <p>Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. </p>
                                        <a href="#" class="info-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- call out-->
    <div class="call-out call-out-form">
        <div class="container">
            <div class="call-out-item">
                <span class="call-out-icon cicon-glove"></span>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <h2 class="nl-title">Schedule Service</h2>
                        <h6><span>Or Call</span> 987-654-3210</h6>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <form id="contact-form" class="form-wrap flex-row fx-col-3 style-2">
                            <div class="form-col">
                                <input type="text" name="cf-name" placeholder="Name *" required>
                            </div>
                            <div class="form-col">
                                <input type="email" name="cf-email" placeholder="Email *" required>
                            </div>
                            <div class="form-col">
                                <input type="tel" name="cf-phone" placeholder="Phone *" required>
                            </div>
                            <div class="form-col">
                                <div class="custom-select">
                                    <div class="select-title">Type of Service</div>
                                        <ul id="menu-type" class="select-list"></ul>
                                        <select class="hide" name="cf-service">
                                        <option value="menu1">Air Cleaners</option>
                                        <option value="menu2">Duct Cleaning</option>
                                        <option value="menu3">Duct Sealing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-col">
                                <textarea name="cf-message" placeholder="How Can We Help You?"></textarea>
                            </div>
                            <div class="form-col">
                                <button type="submit" data-type="submit" class="btn btn-style-5 full-width">Submit Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
@endsection