<footer id="footer" class="footer">
    <div class="main-footer" data-bg="{{ asset('public/images/1920x556_bg1.jpg') }}">
        <div class="container">
            <div class="row flex-row">
                <div class="col-md-4 col-xs-6">
                <!-- widget -->
                    <div class="widget">
                        <h5 class="widget-title">Contact Us</h5>
                        <div class="content-element3">
                            <p class="content-element1"> Patna, Bihar </p>
                            <p>
                                Mobile: +91 787 092 0448 <br>
                                E-mail: <a href="mailto:jeepintu9@gmail.com" class="link-text">jeepintu9@gmail.com</a>
                            </p>
                        </div>

                        <div class="brend-box">
                            <a href="#"><img src="{{ asset('public/images/images-brend-logo1.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('public/images/images-brend-logo2.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('public/images/images-brend-logo3.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <!-- widget -->
                    <div class="widget">
                        <h5 class="widget-title">Services</h5>
                        <ul class="info-links">     
                            <li><a href="#">Cooling</a></li>
                            <li><a href="#">Heating</a></li>
                            <li><a href="#">Furnaces</a></li>
                            <li><a href="#">Heat Pumps</a></li>
                            <li><a href="#">Plumbing</a></li>
                            <li><a href="#">Air Quality</a></li>
                            <li><a href="#">Electrical</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <!-- widget -->
                    <div class="widget">
                        <h5 class="widget-title">Quick Links</h5>
                        <ul class="info-links">   
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Our Team</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Special Offers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6">
                    <!-- widget -->
                    <div class="widget">
                        <h5 class="widget-title">Follow Us</h5>
                        <ul class="social-icons style-2">
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-gplus-3"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin-3"></i></a></li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                            <li><a href="#"><i class="icon-instagram-5"></i></a></li>
                        </ul>
                    </div>
                    <!-- widget -->
                    <div class="widget">
                        <h5 class="widget-title">We accept</h5>
                        <div class="pay-box">
                            <a href="#"><img src="{{ asset('public/images/images-pay1.jpg') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('public/images/images-pay2.jpg') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('public/images/images-pay3.jpg') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('public/images/images-pay4.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="copyright">
            <p>Copyright Bananewala © 2020. All Rights Reserved.</p>
        </div>
    </div>
<!-- </div> -->
</footer>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">

      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title text-center primecolor">Login</h3>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <div id="success-msg" class="hide">
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong>Success!</strong> Check your mail for login confirmation!!
                    </div>
                </div>
                <div class="col-md-offset-1 col-md-10">
                    <form method="POST" id="LoginForm">
                        <div class="form-group has-feedback">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="email-error"></strong>
                            </span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="password-error"></strong>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                              <button type="submit" id="submitForm" class="btn btn-primary btn-prime white btn-flat">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="registerModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title text-center primecolor">Register</h3>
            </div>
            <div class="modal-body" style="overflow: hidden;">
                <div id="success-msg" class="hide">
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong>Success!</strong> You have registered successfully!!
                    </div>
                </div>
                <div class="col-md-offset-1 col-md-10">
                    <form method="POST" id="RegisterForm">
                        <div class="row">
                            <div class="form-group has-feedback col-md-6">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
                                <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                <span class="text-danger">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>
                            <div class="form-group has-feedback col-md-6">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                                <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
                                <span class="text-danger">
                                    <strong id="email-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group has-feedback col-md-6">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
                                <span class="text-danger">
                                    <strong id="password-error"></strong>
                                </span>
                            </div>
                            <div class="form-group has-feedback col-md-6">
                                <input type="password" name="password_confirmation" class="form-control" placeholder=" Confirm Password">
                                <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
                                <span class="text-danger">
                                    <strong id="password_confirmation-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group has-feedback col-md-6">
                                <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="Mobile">
                                <!-- <span class="glyphicon glyphicon-mobile form-control-feedback"></span> -->
                                <span class="text-danger">
                                    <strong id="mobile-error"></strong>
                                </span>
                            </div>
                            <div class="form-group has-feedback col-md-6">
                                <input type="number" name="aadhar" value="{{ old('aadhar') }}" class="form-control" placeholder="Aadhar">
                                <!-- <span class="glyphicon glyphicon-mobile form-control-feedback"></span> -->
                                <span class="text-danger">
                                    <strong id="aadhar-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group has-feedback col-md-6">
                                @php  
                                    use App\Model\State;
                                    $state_list = State::getAllStateForListing();
                                @endphp
                                <select class="form-control" name="state_id" id="state_id">
                                    <option value="">Choose State</option>
                                    @foreach($state_list as $key=>$value)
                                        <option value="{!! $key !!}" {{ old("state_id") == $key ? 'selected' : '' }}>{!! $value !!}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    <strong id=state_id-error"></strong>
                                </span>
                            </div>
                            <div class="form-group has-feedback col-md-6">
                                <select class="form-control" name="city_id" id="city_id">
                                    <option value="">Choose City</option>
                                </select>
                                <span class="text-danger">
                                    <strong id=city_id-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group has-feedback col-md-6">
                                <input type="number" name="zip" value="{{ old('zip') }}" class="form-control" placeholder="Zip">
                                <!-- <span class="glyphicon glyphicon-file form-control-feedback"></span> -->
                                <span class="text-danger">
                                    <strong id="zip-error"></strong>
                                </span>
                            </div>
                            <div class="form-group has-feedback col-md-6">
                                <textarea class="form-control" rows="2" name="address" placeholder="Address">{{ old('address') }}</textarea>
                                <span class="text-danger">
                                    <strong id="address-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                              <button type="submit" id="submitRegisterForm" class="btn btn-primary btn-prime white btn-flat">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
