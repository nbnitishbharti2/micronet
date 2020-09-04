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


<!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('public/site/images/bg/bg6.jpg') }}">
      <div class="container pt-90 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row"> 
            <div class="col-md-12">
              <h3 class="title text-white">About</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
    <!-- Section: About -->
    <section id="about">
      <div class="container pb-70">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 col-sm-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <h2 class="text-uppercase text-center mt-0">Welcome To <span class="text-theme-color-2">  Micronet Services </span></h2>
              <p class="lead text-center pl-100 pr-100">We are leading Computer, Laptop and Printer service provider in Patna. We are giving on site reapiring services on reasonable price.</p>
              <div class="row mt-40">
                <div class="col-md-4 wow fadeInUp" data-wow-duration="1s">
                  <div class="mb-sm-30">
                    <img class="img-fullwidth" src="{{ asset('public/site/images/about/7.jpg') }}" alt="">
                    <h4 class="letter-space-1 mt-10">Low Cost<span class="text-theme-color-2"> Diagnostics </span></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, magnam dolore tempore.</p>
                    <a href="#" class="btn btn-sm btn-theme-colored">Read more</a>
                  </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-duration="1.2s">
                  <div class="mb-sm-30">
                    <img class="img-fullwidth" src="{{ asset('public/site/images/about/8.jpg') }}" alt="">
                    <h4 class=" letter-space-1 mt-10">Online<span class="text-theme-color-2"> Help</span></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, magnam dolore tempore.</p>
                    <a href="#" class="btn btn-sm btn-theme-colored">Read more</a>
                  </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-duration="1.2s">
                  <div class="mb-sm-30">
                    <img class="img-fullwidth" src="{{ asset('public/site/images/about/9.jpg') }}" alt="">
                    <h4 class=" letter-space-1 mt-10">100 Days<span class="text-theme-color-2"> Warranty</span></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, magnam dolore tempore.</p>
                    <a href="#" class="btn btn-sm btn-theme-colored">Read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Section: What Clients Say ? -->
    <section class="bg-lighter">
      <div class="container pt-40 pb-60">
        <div class="section-content">
          <div class="row">
            <div class="col-md-7 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="pr-40">
                <h3 class="text-uppercase title line-bottom">Why <span class="text-theme-color-2 font-weight-700">Choose Us ?</span></h3>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="icon-box p-0 mb-40">
                     <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip mr-10">
                      <i class="pe-7s-scissors text-white"></i>
                     </a>
                     <div class="icon-box-details ml-sm-0">
                      <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Less CSS</h5>
                      <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                     </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="icon-box p-0 mb-40">
                     <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip mr-10">
                      <i class="pe-7s-pen text-white"></i>
                     </a>
                     <div class="icon-box-details ml-sm-0">
                      <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Special ShortCode</h5>
                      <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                     </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="icon-box p-0 mb-40">
                     <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip mr-10">
                      <i class="pe-7s-tools text-white"></i>
                     </a>
                     <div class="icon-box-details ml-sm-0">
                      <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Easy Customiz</h5>
                      <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                     </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="icon-box p-0 mb-40">
                     <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip mr-10">
                      <i class="pe-7s-phone text-white"></i>
                     </a>
                     <div class="icon-box-details ml-sm-0">
                      <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Responsive</h5>
                      <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                     </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="icon-box p-0 mb-30">
                     <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip mr-10">
                      <i class="pe-7s-vector text-white"></i>
                     </a>
                     <div class="icon-box-details ml-sm-0">
                      <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">W3 validation</h5>
                      <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                     </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="icon-box p-0 mb-30">
                     <a href="#" class="icon bg-theme-colored pull-left sm-pull-none flip mr-10">
                      <i class="pe-7s-light text-white"></i>
                     </a>
                     <div class="icon-box-details ml-sm-0">
                      <h5 class="icon-box-title mt-15 text-uppercase letter-space-1 font-weight-600 mb-5">Retina Ready</h5>
                      <p class="text-gray">Lorem ipsum dolor sit amet, consectetur.</p>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="text-uppercase title line-bottom">What <span class="text-theme-color-2 font-weight-700">Clients Say ?</span></h3>
              <div class="bxslider bx-nav-top">
                <div class="testimonial bg-theme-colored border-radius-10px p-20 mb-15">
                  <div class="comment">
                   <p class="text-white"><em>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui.</em></p>
                  </div>
                  <div class="content mt-20">
                    <div class="thumb pull-left flip">
                      <img width="64" src="{{ asset('public/site/images/testimonials/1.jpg') }}" alt="" class="img-circle">
                    </div>
                    <div class="testimonials-details pull-left flip ml-20">
                      <h5 class="author text-theme-color-2 mt-0 mb-0 font-weight-600">Jonathan Smith</h5>
                      <h6 class="title font-14 m-0 mt-5 mb-5 text-gray-darkgray">cici inc.</h6>
                      <ul class="review_text list-inline">
                        <li>
                          <div class="star-rating" title="Rated 4.50 out of 5"><span data-width="90%">4.50</span></div>
                        </li>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div class="testimonial bg-theme-colored border-radius-10px p-20 mb-15">
                  <div class="comment">
                   <p class="text-white"><em>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui.</em></p>
                  </div>
                  <div class="content mt-20">
                    <div class="thumb pull-left flip">
                      <img width="64" src="{{ asset('public/site/images/testimonials/2.jpg') }}" alt="" class="img-circle">
                    </div>
                    <div class="testimonials-details pull-left flip ml-20">
                      <h5 class="author text-theme-color-2 mt-0 mb-0 font-weight-600">Jonathan Smith</h5>
                      <h6 class="title font-14 m-0 mt-5 mb-5 text-gray-darkgray">cici inc.</h6>
                      <ul class="review_text list-inline">
                        <li>
                          <div class="star-rating" title="Rated 4.50 out of 5"><span data-width="90%">4.50</span></div>
                        </li>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div class="testimonial bg-theme-colored border-radius-10px p-20 mb-15">
                  <div class="comment">
                   <p class="text-white"><em>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui.</em></p>
                  </div>
                  <div class="content mt-20">
                    <div class="thumb pull-left flip">
                      <img width="64" src="{{ asset('public/site/images/testimonials/3.jpg') }}" alt="" class="img-circle">
                    </div>
                    <div class="testimonials-details pull-left flip ml-20">
                      <h5 class="author text-theme-color-2 mt-0 mb-0 font-weight-600">Jonathan Smith</h5>
                      <h6 class="title font-14 m-0 mt-5 mb-5 text-gray-darkgray">cici inc.</h6>
                      <ul class="review_text list-inline">
                        <li>
                          <div class="star-rating" title="Rated 4.50 out of 5"><span data-width="90%">4.50</span></div>
                        </li>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Reservation Form -->
    <section>
      <div class="container pt-20 pb-0">
        <div class="row">
          <div class="col-md-7">
            <div class="p-40 pl-0">
              <!-- Reservation Form Start-->
              <form id="reservation_form" name="reservation_form" class="reservation-form" method="post" action="http://html.kodesolution.live/m/repairpro/v3.0/demo/includes/reservation.php"><h3 class="mt-0 line-bottom text-theme-colored mb-40">Get A Free Service<span class="text-theme-color-2"> Now!</span></h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group mb-30">
                      <input placeholder="Enter Name" type="text" id="reservation_name" name="reservation_name" required="" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <input placeholder="Email" type="text" id="reservation_email" name="reservation_email" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <input placeholder="Phone" type="text" id="reservation_phone" name="reservation_phone" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <div class="styled-select">
                        <select id="car_select" name="car_select" class="form-control" required="">
                          <option value="">- Select Your Computer Model -</option>
                          <option value="Toyota">Toyota</option>
                          <option value="Jeep">Jeep</option>
                          <option value="Audi">Audi</option>
                          <option value="Truck">Truck</option>
                          <option value="Land Rover">Land Rover</option>
                          <option value="Lexus">Lexus</option>
                          <option value="Mazda">Mazda</option>
                          <option value="Mercedes - Benz">Mercedes - Benz</option>
                          <option value="Nissan">Nissan</option>
                          <option value="Mitsubishi">Mitsubishi</option>
                          <option value="Saab">Saab</option>
                          <option value="Renault">Renault</option>
                          <option value="Mercury">Mercury</option>
                          <option value="Pontiac Porsche">Pontiac Porsche</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <input name="reservation_date" class="form-control required date-picker" type="text" placeholder="Reservation Date" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-0 mt-0">
                      <input name="form_botcheck" class="form-control" type="hidden" value="">
                      <button type="submit" class="btn btn-colored btn-theme-colored btn-lg btn-flat border-left-theme-color-2-4px" data-loading-text="Please wait...">Submit Now</button>
                    </div>
                  </div>
                </div>
              </form>
              <!-- Reservation Form End-->

              <!-- Reservation Form Validation Start-->
              <script type="text/javascript">
                $("#reservation_form").validate({
                  submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = '#form-result';
                    $(form_result_div).remove();
                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                    var form_btn_old_msg = form_btn.html();
                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                    $(form).ajaxSubmit({
                      dataType:  'json',
                      success: function(data) {
                        if( data.status == 'true' ) {
                          $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                      }
                    });
                  }
                });
              </script>
              <!-- Reservation Form Validation Start -->
            </div>
          </div>
          <div class="col-md-5">
            <img src="{{ asset('public/site/images/about/6.png') }}" alt="">
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Clients -->
    <section class="clients bg-theme-colored">
      <div class="container pt-10 pb-0 pt-sm-0 pb-sm-0">
        <div class="row">
          <div class="col-md-12">
            <!-- Section: Clients -->
            <div class="owl-carousel-6col transparent text-center owl-nav-top">
              <div class="item"> <a href="#"><img src="{{ asset('public/site/images/clients/w1.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('public/site/images/clients/w2.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('public/site/images/clients/w3.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('public/site/images/clients/w4.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('public/site/images/clients/w5.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('public/site/images/clients/w6.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('public/site/images/clients/w3.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('public/site/images/clients/w4.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('public/site/images/clients/w5.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('public/site/images/clients/w6.png') }}" alt=""></a></div>
            </div>
          </div>
        </div>
      </div>
    </section> 

  </div>
  <!-- end main-content -->
@endsection