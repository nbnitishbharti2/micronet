@extends('Layout.app')
@section('content')
<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
<!-- <div class="breadcrumbs-wrap style-2 margin-200">
    <div class="container">
        <h1 class="page-title">Contact Us</h1>
        <ul class="breadcrumbs">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Contact Us</li>
        </ul>
    </div>
</div> -->

@section('page_title')
@parent
<h1 class="page-title">Contact Us</h1>
    @section('breadcrumb')
    @parent
    <li>Contact Us</li>
    @endsection
@endsection


<!-- - - - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - - - -->

<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
<div id="content" class="page-content-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h2 class="section-title">Contact Details</h2>
                <div class="content-element4">
                    <ul class="contact-info v-type">
                        <li class="info-item">
                            <i class="licon-map-marker"></i>
                            <div class="item-info">
                                <span>Patna, Bihar</span>
                            </div>
                        </li>
                        <li class="info-item">
                            <i class="licon-telephone2"></i>
                            <div class="item-info">
                                <span>Phone:</span>
                                <a href="#">787-092-0448</a>
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
                            <i class="licon-clock3"></i>
                            <div class="item-info">
                                <span>Open 8am-5pm: <br> Monday - Saturday</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <ul class="social-icons style-2">
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin-3"></i></a></li>
                    <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                    <li><a href="#"><i class="icon-instagram-5"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-8">
                <h2>We Want to Hear From You</h2>
                <p>We&rsquo;re here to help. If you&rsquo;ve got a question, we&rsquo;d love to chat.</p>

                <form id="contact-form" class="contact-form">

                    <div class="row flex-row">
                        <div class="col-xs-6">
                            <label class="required">Name</label>
                            <input name="cf-name" type="text">
                        </div>
                        <div class="col-xs-6">
                            <label class="required">Last Name</label>
                            <input type="text" name="cf-name" required>
                        </div>
                    </div>

                    <div class="row flex-row">
                        <div class="col-xs-6">
                            <label class="required">Email</label>
                            <input name="cf-email" type="email" required>
                        </div>
                        <div class="col-xs-6">
                            <label class="required">Phone</label>
                            <input type="tel" name="cf-phone" required>
                        </div>
                    </div>

                    <div class="row flex-row">
                        <div class="col-sm-12">
                            <label class="required">City</label>
                            <input type="text" name="cf-city" required>
                        </div>
                    </div>

                    <div class="row flex-row">
                        <div class="col-sm-12">
                            <label class="required">Comments</label>
                            <textarea rows="5" name="cf-message"></textarea>
                        </div>
                    </div>
                    <div class="row flex-row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-style-5" data-type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="map col-sm-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115132.86107309221!2d85.0730023619371!3d25.608175569723404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f29937c52d4f05%3A0x831a0e05f607b270!2sPatna%2C%20Bihar!5e0!3m2!1sen!2sin!4v1589886733976!5m2!1sen!2sin" width="1450" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
@endsection