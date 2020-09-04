@extends('Layout.app')
@section('content')

<!-- - - - - - - - - - - - - - Revolution Slider - - - - - - - - - - - - - - - - -->
<!--Rev Slider Wrapper Column-->
<div class="rev_slider_wrapper bannercontainer">
    <div id="slider1" class="rev_slider"  data-version="5.0">
        <ul>
            <li data-index="rs-1" data-transition="fade"> 
                <!-- MAIN IMAGE --> 
                <img src="{{ asset('public/images/images-1920x635_slide1.jpg') }}" alt=""  width="1920" height="635"> 
                <!-- LAYER NR. 1 -->
        
                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizeme scaption-dark-large"
                    data-x="['left','left','left','left']" data-hoffset="30"
                    data-y="['middle','middle','middle','middle']" data-voffset="-55"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":150,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" >Reliable Air Conditioning
                </div>
                
                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme scaption-dark-medium"
                    data-x="['left','left','left','left']" data-hoffset="30"
                    data-y="['middle','middle','middle','middle']" data-voffset="10"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":450,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" >Installation, Services & Repair
                </div>
                
                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme scaption-dark-small"
                    data-x="['left','left','left','left']" data-hoffset="30"
                    data-y="['middle','middle','middle','middle']" data-voffset="65"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":450,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" ><p>100% Satisfaction Guarantee With Everything We Do!</p>
                </div>
    
                <!-- LAYER NR. 4 -->
                <div class="tp-caption tp-resizeme"
                    data-x="['left','left','left','left']" data-hoffset="30"
                    data-y="['middle','middle','middle','middle']" data-voffset="135"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":750,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" ><a href="#" class="btn btn-style-2 btn-big">Get an Estimate</a>
                </div>
            </li>
            <!-- SLIDE  -->
            <li data-index="rs-2" data-transition="slideup">  
                <!-- MAIN IMAGE --> 
                <img src="{{ asset('public/images/images-1920x765_slide2.jpg') }}" alt=""  width="1920" height="635"> 
                
                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizeme scaption-white-large2"
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="-5"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":150,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" >Get Your Project Done
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme scaption-white-medium2"
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="70"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":450,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" >Quickly, On Time, Within Budget!
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme"
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                    data-y="['middle','middle','middle','middle']" data-voffset="155"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":750,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" ><a href="#" class="btn btn-style-2 btn-big">Request Service</a>
                </div>
            </li>
          
            <!-- SLIDE  -->
            <li data-index="rs-3" data-transition="slideup"> 
            
                <!-- MAIN IMAGE --> 
                <img src="{{ asset('public/images/images-1920x635_slide3.jpg') }}" alt=""  width="1920" height="635"> 
            
                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizeme scaption-dark-large"
                    data-x="['right','right','right','right']" data-hoffset="30"
                    data-y="['middle','middle','middle','middle']" data-voffset="-55"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":150,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" >Fast & Reliable Residental
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme scaption-dark-medium"
                    data-x="['right','right','right','right']" data-hoffset="30"
                    data-y="['middle','middle','middle','middle']" data-voffset="10"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":450,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" >Heating, Cooling & Plumbing Services
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme scaption-dark-small"
                    data-x="['right','right','right','right']" data-hoffset="30"
                    data-y="['middle','middle','middle','middle']" data-voffset="65"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":450,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" ><p>100% Satisfaction Guarantee With Everything We Do!</p>
                </div>
        
                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme"
                    data-x="['right','right','right','right']" data-hoffset="30"
                    data-y="['middle','middle','middle','middle']" data-voffset="135"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":750,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" ><a href="#" class="btn btn-style-2 btn-big">Get an Estimate</a>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- - - - - - - - - - - - - - End of Slider - - - - - - - - - - - - - - - - -->

<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

<div id="content">
    <!-- page section -->
    <div class="page-section">
        <div class="container extra-width-2">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <h5 class="section-sub-title">Welcome!</h5>
                    <h1 class="section-title">We're Here To Keep You Comfy!</h1>
                    <p class="text-size-medium">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis.</p>
                    <p class="text-size-medium">Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. </p>
                    <a href="#" class="btn btn-small">More About Us</a>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="icons-box style-3 icons-bg">
                        <div class="flex-row fx-col-3">
                            <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                            <div class="icons-wrap">
                                <div class="icons-item">
                                    <div class="item-box">
                                        <i class="licon-wrench"></i>
                                        <h3 class="icons-box-title"><a href="#">Schedule Service</a></h3>
                                        <p>Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis unde omnis iste natus error sit. </p>
                                        <a href="#" class="btn btn-small btn-style-5">Get Service Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                            <div class="icons-wrap">
                                <div class="icons-item">
                                    <div class="item-box">
                                        <i class="licon-calculator"></i>
                                        <h3 class="icons-box-title"><a href="#">Request Estimate</a></h3>
                                        <p>Donec sagittis euismod purus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
                                        <a href="#" class="btn btn-small btn-style-5">Get an Estimate</a>
                                    </div>
                                </div>
                            </div>
                            <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                            <div class="icons-wrap">
                                <div class="icons-item">
                                    <div class="item-box">
                                        <i class="licon-wallet"></i>
                                        <h3 class="icons-box-title"><a href="#">Financing Options</a></h3>
                                        <p>Doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</p>
                                        <a href="#" class="btn btn-small btn-style-5">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- page section -->
    <div class="page-section-bg">
        <div class="container extra-width-2">
            <div class="content-element4 align-center">
                <h5 class="section-sub-title">what we offer</h5>
                <h2 class="section-title">Home Comfort Services Overview</h2>
            </div>
            <!-- - - - - - - - - - - - - Owl-Carousel - - - - - - - - - - - - - - - -->
            <div class="carousel-type-3">
                <div class="owl-carousel dot-style-2" data-max-items="1">
                    <!-- Slide -->                  
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <div class="icons-box style-4">
                            <div class="flex-row fx-col-3">
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-furnace-installation"></i>
                                            <h5 class="icons-box-title"><a href="#">Furnace Installation</a></h5>
                                            <p>Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, cursus eleifend, elit. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-heat-pump-installation"></i>
                                            <h5 class="icons-box-title"><a href="#">Heat Pump Installation</a></h5>
                                            <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Integer rutrum ante eu lacus. Vestibulum libero nisl.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-central-air-installation"></i>
                                            <h5 class="icons-box-title"><a href="#">Central Air Installation</a></h5>
                                            <p>Vestibulum libero nisl, porta vel, scelerisque eget, neque. Vivamus eget nibh. Etiam cursus leo vel metus.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-water-filtration"></i>
                                            <h5 class="icons-box-title"><a href="#">Water Filtration</a></h5>
                                            <p>Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-plumbing-repair"></i>
                                            <h5 class="icons-box-title"><a href="#">Plumbing Repair</a></h5>
                                            <p>Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna, endrerit sit amet, tincidunt ac.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-plumbing"></i>
                                            <h5 class="icons-box-title"><a href="#">Drain Clearing</a></h5>
                                            <p>Quisque diam lorem, interdum vitae, dapibus ac, scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Slide -->

                    <!-- Slide -->                  
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <div class="icons-box style-4">
                            <div class="flex-row fx-col-3">
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-furnace-installation"></i>
                                            <h5 class="icons-box-title"><a href="#">Furnace Installation</a></h5>
                                            <p>Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, cursus eleifend, elit. </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-heat-pump-installation"></i>
                                            <h5 class="icons-box-title"><a href="#">Heat Pump Installation</a></h5>
                                            <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Integer rutrum ante eu lacus. Vestibulum libero nisl.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-central-air-installation"></i>
                                            <h5 class="icons-box-title"><a href="#">Central Air Installation</a></h5>
                                            <p>Vestibulum libero nisl, porta vel, scelerisque eget, neque. Vivamus eget nibh. Etiam cursus leo vel metus.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-water-filtration"></i>
                                            <h5 class="icons-box-title"><a href="#">Water Filtration</a></h5>
                                            <p>Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-plumbing-repair"></i>
                                            <h5 class="icons-box-title"><a href="#">Plumbing Repair</a></h5>
                                            <p>Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna, endrerit sit amet, tincidunt ac.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-plumbing"></i>
                                            <h5 class="icons-box-title"><a href="#">Drain Clearing</a></h5>
                                            <p>Quisque diam lorem, interdum vitae, dapibus ac, scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Slide -->

                    <!-- Slide -->                  
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <div class="icons-box style-4">
                            <div class="flex-row fx-col-3">
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-furnace-installation"></i>
                                            <h5 class="icons-box-title"><a href="#">Furnace Installation</a></h5>
                                            <p>Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, cursus eleifend, elit. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-heat-pump-installation"></i>
                                            <h5 class="icons-box-title"><a href="#">Heat Pump Installation</a></h5>
                                            <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Integer rutrum ante eu lacus. Vestibulum libero nisl.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-central-air-installation"></i>
                                            <h5 class="icons-box-title"><a href="#">Central Air Installation</a></h5>
                                            <p>Vestibulum libero nisl, porta vel, scelerisque eget, neque. Vivamus eget nibh. Etiam cursus leo vel metus.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-water-filtration"></i>
                                            <h5 class="icons-box-title"><a href="#">Water Filtration</a></h5>
                                            <p>Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-plumbing-repair"></i>
                                            <h5 class="icons-box-title"><a href="#">Plumbing Repair</a></h5>
                                            <p>Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna, endrerit sit amet, tincidunt ac.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="cicon-plumbing"></i>
                                            <h5 class="icons-box-title"><a href="#">Drain Clearing</a></h5>
                                            <p>Quisque diam lorem, interdum vitae, dapibus ac, scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Slide -->
                </div>
            </div>
        </div>
    </div>
    <!-- call out -->
    <div class="call-out type1">
        <div class="container">
            <div class="align-center">
                <h2>Need Emergency Service? Call Us at 610-926-4200</h2>
                <h4>24 Hours, 7 Days a Week, 365 Days a Year!</h4>
            </div>
        </div>
    </div>
    <!-- page section -->
    <div class="testimonial-holder page-section with-bg-img" data-bg="{{ asset('public/images/1920x1000_bg2.jpg') }}">
        <div class="container">
            <div class="content-element4 align-center">
                <h5 class="section-sub-title">Testimonials</h5>
                <h2 class="section-title">Our Customer Stories</h2>
            </div>
            <!-- - - - - - - - - - - - - Owl-Carousel - - - - - - - - - - - - - - - -->
            <div class="carousel-type-1">
                <div class="owl-carousel" data-max-items="2" data-item-margin="30" data-autoplay="true">
                    <!-- Slide -->                  
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <!-- - - - - - - - - - - - - - Testimonial - - - - - - - - - - - - - - - - -->
                        <div class="testimonial">
                            <div class="testimonial-holder">
                                <blockquote>
                                    <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet.</p>
                                </blockquote>
                                <div class="author-info">
                                    <h6 class="author-name">IVANA WONG, LOS ANGELES</h6>
                                </div>
                            </div>
                        </div>
                        <!-- /Carousel Item --> 
                    </div>
                    <!-- /Slide -->

                    <!-- Slide -->                  
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <!-- - - - - - - - - - - - - - Testimonial - - - - - - - - - - - - - - - - -->
                        <div class="testimonial">
                            <div class="testimonial-holder">
                                <blockquote>
                                    <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet.</p>
                                </blockquote>
                                <div class="author-info">
                                    <h6 class="author-name">Adam Smith, New York</h6>
                                </div>
                            </div>
                        </div>
                        <!-- /Carousel Item --> 
                    </div>
                    <!-- /Slide -->

                    <!-- Slide -->                  
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <!-- - - - - - - - - - - - - - Testimonial - - - - - - - - - - - - - - - - -->
                        <div class="testimonial">
                            <div class="testimonial-holder">
                                <blockquote>
                                    <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet.</p>
                                </blockquote>
                                <div class="author-info">
                                    <h6 class="author-name">IVANA WONG, LOS ANGELES</h6>
                                </div>
                            </div>
                        </div>
                        <!-- /Carousel Item --> 
                    </div>
                    <!-- /Slide -->

                    <!-- Slide -->                  
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <!-- - - - - - - - - - - - - - Testimonial - - - - - - - - - - - - - - - - -->
                        <div class="testimonial">
                            <div class="testimonial-holder">
                                <blockquote>
                                    <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet.</p>
                                </blockquote>
                                <div class="author-info">
                                    <h6 class="author-name">Adam Smith, New York</h6>
                                </div>
                            </div>
                        </div>
                        <!-- /Carousel Item --> 
                    </div>
                    <!-- /Slide -->

                    <!-- Slide -->                  
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <!-- - - - - - - - - - - - - - Testimonial - - - - - - - - - - - - - - - - -->
                        <div class="testimonial">
                            <div class="testimonial-holder">
                                <blockquote>
                                    <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet.</p>
                                </blockquote>
                                <div class="author-info">
                                    <h6 class="author-name">IVANA WONG, LOS ANGELES</h6>
                                </div>
                            </div>
                        </div>
                        <!-- /Carousel Item --> 
                    </div>
                    <!-- /Slide -->

                    <!-- Slide -->                  
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <!-- - - - - - - - - - - - - - Testimonial - - - - - - - - - - - - - - - - -->
                        <div class="testimonial">
                            <div class="testimonial-holder">
                                <blockquote>
                                    <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet.</p>
                                </blockquote>
                                <div class="author-info">
                                    <h6 class="author-name">Adam Smith, New York</h6>
                                </div>
                            </div>
                        </div>
                        <!-- /Carousel Item --> 
                    </div>
                    <!-- /Slide -->
                </div>

                <div class="align-center">
                    <a href="#" class="btn btn-small">More testimonials</a>
                </div>
            </div>
        </div>
    </div>

    <!-- page section -->
    <div class="container">
        <div class="row flex-row">
            <div class="col-md-8">
                <div class="page-section">
                    <div class="content-element4 align-center">
                        <h5 class="section-sub-title">Our Key values</h5>
                        <h2 class="section-title">Other Reason Why to Choose Us</h2>
                    </div>

                    <div class="icons-box style-1">
                        <div class="row flex-row">
                            <div class="col-md-6 col-xs-6">
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
                            <div class="col-md-6 col-xs-6">
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="licon-man"></i>
                                            <h5 class="icons-box-title"><a href="#">Personalized Solutions</a></h5>
                                            <p>Duis ac turpis. Integer rutrum ante eu lacus.Vestibulum libero nisl, porta vel, eget.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-xs-6">
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="licon-medal-empty"></i>
                                            <h5 class="icons-box-title"><a href="#">Proudly Serving for over 60 Years</a></h5>
                                            <p>Elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->        
                                <div class="icons-wrap">
                                    <div class="icons-item">
                                        <div class="item-box">
                                            <i class="licon-thumbs-up"></i>
                                            <h5 class="icons-box-title"><a href="#">Done Right the First Time</a></h5>
                                            <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-full-right page-section">
                    <span class="cicon-glove"></span>
                    <div class="content-element4 align-center">
                        <h5 class="section-sub-title">Need Help?</h5>
                        <h2 class="section-title">Schedule a Service</h2>
                    </div>
                    <form id="contact-form" class="form-wrap flex-row style-2">
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
                                <ul id="menu-type" class="select-list"> </ul>
                                <select class="hide" name="cf-service">
                                    <option value="menu1">Air Cleaners</option>
                                    <option value="menu2">Duct Cleaning</option>
                                    <option value="menu3">Duct Sealing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-col">
                            <textarea name="cf-message" placeholder="How Can We Help You?" rows="2"></textarea>
                        </div>
                        <div class="form-col">
                            <button type="submit" data-type="submit" class="btn btn-style-5 full-width">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- gallery -->
    <div class="flex-row fx-col-5">
        <!-- gallery item -->
        <div class="item">
            <!-- - - - - - - - - - - - - - Project - - - - - - - - - - - - - - - - -->
            <div class="project">
                <!-- - - - - - - - - - - - - - Project Image - - - - - - - - - - - - - - - - -->
                <div class="project-image">
                    <img src="{{ asset('public/images/images-384x300_img1.jpg') }}" alt="">
                    <a href="{{ asset('public/images/images-384x300_img1.jpg') }}" class="project-link" data-fancybox="group"></a>
                </div>
                <!-- - - - - - - - - - - - - - End of Project Image - - - - - - - - - - - - - - - - -->
            </div>
            <!-- - - - - - - - - - - - - - End of Project - - - - - - - - - - - - - - - - -->
        </div>

        <!-- gallery item -->
        <div class="item">
            <!-- - - - - - - - - - - - - - Project - - - - - - - - - - - - - - - - -->
            <div class="project">
                <!-- - - - - - - - - - - - - - Project Image - - - - - - - - - - - - - - - - -->
                <div class="project-image">
                    <img src="{{ asset('public/images/images-384x300_img2.jpg') }}" alt="">
                    <a href="{{ asset('public/images/images-384x300_img2.jpg') }}" class="project-link" data-fancybox="group"></a>
                </div>
                <!-- - - - - - - - - - - - - - End of Project Image - - - - - - - - - - - - - - - - -->
            </div>
            <!-- - - - - - - - - - - - - - End of Project - - - - - - - - - - - - - - - - -->
        </div>

        <!-- gallery item -->
        <div class="item">
            <!-- - - - - - - - - - - - - - Project - - - - - - - - - - - - - - - - -->
            <div class="project">
                <!-- - - - - - - - - - - - - - Project Image - - - - - - - - - - - - - - - - -->
                <div class="project-image">
                    <img src="{{ asset('public/images/images-384x300_img3.jpg') }}" alt="">
                    <a href="{{ asset('public/images/images-384x300_img3.jpg') }}" class="project-link" data-fancybox="group"></a>
                </div>
                <!-- - - - - - - - - - - - - - End of Project Image - - - - - - - - - - - - - - - - -->
            </div>
            <!-- - - - - - - - - - - - - - End of Project - - - - - - - - - - - - - - - - -->
        </div>

        <!-- gallery item -->
        <div class="item">
            <!-- - - - - - - - - - - - - - Project - - - - - - - - - - - - - - - - -->
            <div class="project">
                <!-- - - - - - - - - - - - - - Project Image - - - - - - - - - - - - - - - - -->
                <div class="project-image">
                    <img src="{{ asset('public/images/images-384x300_img4.jpg') }}" alt="">
                    <a href="{{ asset('public/images/images-384x300_img4.jpg') }}" class="project-link" data-fancybox="group"></a>
                </div>
                <!-- - - - - - - - - - - - - - End of Project Image - - - - - - - - - - - - - - - - -->
            </div>
            <!-- - - - - - - - - - - - - - End of Project - - - - - - - - - - - - - - - - -->
        </div>

        <!-- gallery item -->
        <div class="item">
            <!-- - - - - - - - - - - - - - Project - - - - - - - - - - - - - - - - -->
            <div class="project">
                <!-- - - - - - - - - - - - - - Project Image - - - - - - - - - - - - - - - - -->
                <div class="project-image">
                    <img src="{{ asset('public/images/images-384x300_img5.jpg') }}" alt="">
                    <a href="{{ asset('public/images/images-384x300_img5.jpg') }}" class="project-link" data-fancybox="group"></a>
                </div>
                <!-- - - - - - - - - - - - - - End of Project Image - - - - - - - - - - - - - - - - -->
            </div>
            <!-- - - - - - - - - - - - - - End of Project - - - - - - - - - - - - - - - - -->
        </div>
    </div>
        
    <!-- page section -->
    <div class="page-section-bg">
        <div class="container">
            <div class="content-element4 align-center">
                <h5 class="section-sub-title">Coupons</h5>
                <h2 class="section-title">Special Online Offers</h2>
            </div>

            <div class="content-element5">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="#" class="coupon">
                            <div class="inner">
                                <h2 class="price-title"><span>$</span>25 OFF</h2>
                                <div class="disc-for">ON ANY REPAIR</div>
                                <div class="btn btn-style-3 btn-small">Click to print</div>
                                <p>Must be presented at the time of service. Can not be combined with any other offer.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="coupon">
                            <div class="inner">
                                <h2 class="price-title"><span>$</span>75 OFF</h2>
                                <div class="disc-for">ON system analysis</div>
                                <div class="btn btn-style-3 btn-small">Click to print</div>
                                <p>Must be presented at the time of service. Can not be combined with any other offer.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="coupon">
                            <div class="inner">
                                <h2 class="price-title"><span>$</span>15 OFF</h2>
                                <div class="disc-for">ON Drain Clearing</div>
                                <div class="btn btn-style-3 btn-small">Click to print</div>
                                <p>Must be presented at the time of service. Can not be combined with any other offer.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="align-center">
                <a href="#" class="btn btn-small">More Coupons</a>
            </div>
        </div>
    </div>

    <!-- page section -->
    <div class="page-section type2">
        <div class="container">
            <div class="carousel-type-2">
                <div class="owl-carousel" data-item-margin="30" data-max-items="6" data-autoplay="true">
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <a href="#"><img src="{{ asset('public/images/images-165x120_brend1.jpg') }}" alt=""></a>
                        <!-- /Carousel Item -->
                    </div>
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <a href="#"><img src="{{ asset('public/images/images-165x120_brend2.jpg') }}" alt=""></a>
                        <!-- /Carousel Item -->
                    </div>
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <a href="#"><img src="{{ asset('public/images/images-165x120_brend3.jpg') }}" alt=""></a>
                        <!-- /Carousel Item -->
                    </div>
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <a href="#"><img src="{{ asset('public/images/images-165x120_brend4.jpg') }}" alt=""></a>
                        <!-- /Carousel Item -->
                    </div>
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <a href="#"><img src="{{ asset('public/images/images-165x120_brend5.jpg') }}" alt=""></a>
                        <!-- /Carousel Item -->
                    </div>
                    <div class="item-carousel">
                        <!-- Carousel Item -->                  
                        <a href="#"><img src="{{ asset('public/images/images-165x120_brend6.jpg') }}" alt=""></a>
                        <!-- /Carousel Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- newsletter -->
<div class="call-out-form">
    <div class="container">
      <div class="newsletter-wrap">
        <span class="call-out-icon licon-paper-plane"></span>
        <div class="nl-col">
            <h2 class="nl-title">Newsletter <br> Sign Up!</h2>
        </div>
        <div class="nl-col">
            <p>Join our mailing list today and receive our latest newsletter delivered straight to your inbox!</p>
            <form id="newsletter" class="style-2">
                <button type="submit" class="btn-email btn btn-style-5 f-right" data-type="submit">Sign Me Up!</button>
                <div class="wrapper">
                    <input type="email" placeholder="Enter your email address" name="newsletter-email">
                </div> 
            </form>
        </div>
      </div>
    </div>
  </div>
<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->

@endsection