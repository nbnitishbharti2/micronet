<!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

          <nav id="mobile-advanced" class="mobile-advanced"></nav>
          <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
          <header id="header" class="header style-2 sticky-header"><!-- pre-header -->
            <div class="pre-header">
                <div class="container extra-width-2">
                    <div class="flex-row flex-justify">
                        <p>Your Commercial and Residential Service Experts since 2016</p>
                        <ul class="menu-list"><li>
                            <a href="#">Resources</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Free Quote</a></li>
                            <li><a href="#">Schedule Service</a></li>
                            <li><a href="#">Coupons</a></li>
                        </ul>
                    </div>  
                </div>
      		</div>

      		<!-- top-header -->

      		<!-- <div class="top-header">
      			<div class="container extra-width-2">
      				<ul class="contact-info flex-justify flex-center">
                        <li class="info-item">
                            <i class="licon-clock3"></i>
                            <div class="item-info">
                                <span>Open 8am-5pm: <br> Monday - Saturday</span>
                            </div>
                        </li>
                        <li class="info-item">
                            <i class="licon-map-marker"></i>
                            <div class="item-info">
                                <span>Patna, Bihar</span>
                            </div>
                        </li>
                        <li class="info-item">
                            <i class="licon-at-sign"></i>
                            <div class="item-info">
                                <span>E-mail:</span>
                                <a href="mailto:jeepintu9@gmail.com">jeepintu9@gmail.com</a>
                            </div>
                        </li>  

                        <li class="info-item">
                            <i class="licon-group-work"></i>
                            <div class="item-info">
                                <span>Get Social:</span>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-linkedin-3"></i></a></li>
                                    <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                                    <li><a href="#"><i class="icon-instagram-5"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="info-item">
                            <i class="licon-telephone2"></i>
                            <div class="item-info">
                                <span>24/7 Emergency Service</span>
                                <h4>787-092-0448</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> -->

      			<!-- - - - - - - - - - - - / Mobile Menu - - - - - - - - - - - - - -->

      			<!--main menu-->

      			<div class="menu-holder">
      				<div class="menu-wrap">
      					<div class="container extra-width-2">
      						<div class="flex-row flex-center flex-justify">
      							<!-- logo -->

      							<div class="logo-wrap">
                                    <a href="{{ url('/') }}" class="logo"><img src="{{ asset('public/images/b-logo.png') }}" alt="Logo"></a>
      							</div>
      							<div class="nav-item flex-row flex-center">
      								<!-- - - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - - - -->
      								<nav id="main-navigation" class="main-navigation">
                                        <ul id="menu" class="clearfix">
                                            <li class="current">
                                                <a href="{{ url('/') }}">Home</a>
                                            </li>
      									    <li class="dropdown">
                                                <a href="#">About</a>
                                                <!--sub menu-->
                                                <div class="sub-menu-wrap">
                                                    <ul>
                                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                                                        <li><a href="{{ route('maintenance') }}">Maintenance Programs</a></li>
                                                    </ul>
                                                </div>
      										</li>
      										<li class="dropdown has-megamenu">
                                                <a href="#">Services</a>
      											<!--sub menu-->
      											<div class="sub-menu-wrap mega-menu flex-row">
      												<div class="mega-submenu">
      													<h5 class="mega-title"><span class="cicon-heating"></span>Heating</h5>
      													<ul>
                                                            <li><a href="#">Heater Installation/Replacement</a></li>
      														<li><a href="#">Heater Repair/Maintenance</a></li>
      														<li><a href="#">Furnace Installation/Replacement</a></li>
      														<li><a href="#">Furnace Repair/Maintenance</a></li>
      														<li><a href="#">Heat Pump Services</a></li>
      														<li><a href="#">Boiler Repair</a></li>
      														<li><a href="#">Geothermal Heating</a></li>
                                                          </ul>
                                                    </div>
                                                    <div class="mega-submenu">
                                                        <h5 class="mega-title"><span class="cicon-cooling"></span>Cooling</h5>
                                                        <ul>
                                                            <li><a href="#">AC Installation/Replacement</a></li>
                                                            <li><a href="#">AC Repair/Maintenance</a></li>
                                                            <li><a href="#">AC Filter Replacements</a></li>
                                                            <li><a href="#">Air Handler Services</a></li>
                                                            <li><a href="#">Ductless Mini Split AC Systems</a></li>
                                                            <li><a href="#">Refrigerant Leak Repair</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="mega-submenu">
                                                        <h5 class="mega-title"><span class="cicon-plumbing"></span>Plumbing</h5>
                                                        <ul>
                                                            <li><a href="#">Emergency Plumbing</a></li>
                                                            <li><a href="#">Whole House Repiping</a></li>
                                                            <li><a href="#">Gap Piping</a></li>
                                                            <li><a href="#">Drain Cleaning</a></li>
                                                            <li><a href="#">Grease Traps</a></li>
                                                            <li><a href="#">Sump Pumps</a></li>
                                                            <li><a href="#">Leak Detection</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="mega-submenu">
                                                        <h5 class="mega-title"><span class="cicon-air-quality"></span>Air Quality</h5>
                                                        <ul>
                                                            <li><a href="#">Air Cleaners</a></li>
                                                            <li><a href="#">Humidifiers/Dehumidifiers</a></li>
                                                            <li><a href="#">Duct Cleaning</a></li>
                                                            <li><a href="#">Duct Sealing</a></li>
                                                            <li><a href="#">Duct Repair/Replacement</a></li>
                                                            <li><a href="#">Ductwork</a></li>
                                                            <li><a href="#">Insulation</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="mega-submenu">
                                                        <h5 class="mega-title"><span class="cicon-electircal"></span>Electical</h5>
                                                        <ul>
                                                            <li><a href="#">Generators</a></li>
                                                            <li><a href="#">Surge Protection</a></li>
                                                            <li><a href="#">Lighting</a></li>
                                                            <li><a href="#">Smoke Detectors</a></li>
                                                            <li><a href="#">Ceiling Fans</a></li>
                                                            <li><a href="#">Circuits and Wiring</a></li>
                                                            <li><a href="#">Main Electrical Panel</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#">Gallery</a>
                                                <!--sub menu-->
                                                <div class="sub-menu-wrap">
                                                    <ul>
                                                        <li><a href="#">Sortable Grid - 2 Columns</a></li>
                                                        <li><a href="#">Sortable Masonry - 3 Columns</a></li>
                                                        <li><a href="#">Grid With Popup - 4 Columns</a></li>
                                                        <li><a href="#">Instagram Gallery - 3 Columns</a></li>
                                                        <li><a href="#">Single Gallery Post</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#">Blog</a>
                                                <!--sub menu-->
                                                <div class="sub-menu-wrap">
                                                    <ul>
                                                        <li><a href="#">Small Thumbnails With Sidebar</a></li>
                                                        <li><a href="#">Big Thumbnails With Sidebar</a></li>
                                                        <li><a href="#">3 Columns</a></li>
                                                        <li><a href="#">Single Blog Post</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#">Contact</a>
                                                <!--sub menu-->
                                                <div class="sub-menu-wrap">
                                                    <ul>
                                                        <li><a href="#">Schedule an Appointment</a></li>
                                                        <li><a href="#">Get an Estimate</a></li>
                                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                                    </ul>
                                                </div>
                                            </li>

                                            <!-- <a href="#" class="btn btn-style-5">request an appointment </a> -->
                                            @if(Auth::check())
                                            <li class="dropdown">
                                                <a href="#"><i class="fa fa-user"></i>
                                                    {{Auth::user()->name}} </a>
                                                <!--sub menu-->
                                                <div class="sub-menu-wrap">
                                                    <ul>
                                                        <li>
                                                            <a class="dropdown-item {{ (Route::currentRouteName()=='dashboard')?'active':''}}" href="{{route('dashboard')}}">Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item {{ (Route::currentRouteName()=='editProfile')?'active':''}}" href="{{route('editProfile')}}">Profile</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="ti-power-off"></span> Logout </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            @else
                                            <li class="dropdown">
                                                <!-- <a href="{{-- route('showRegister') --}}">Register</a> -->
                                                <a href="#">Register</a>
                                                <!--sub menu-->
                                                <div class="sub-menu-wrap">
                                                    <ul>
                                                        <li>
                                                            <a href="#" data-toggle="modal" data-target="#registerModal">Register</a>
                                                        </li>
                                                        <li>
                                                            <!-- <button type="button" class="btn btn-style-5 btn-info btn-sm" data-toggle="modal" data-target="#myModal">Login</button> -->
                                                            <a href="#" data-toggle="modal" data-target="#myModal">Login</a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </li>
                                            @endauth

                                        </ul>
                                    </nav>
                                    <!-- - - - - - - - - - - - - end Navigation - - - - - - - - - - - - - - - -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>