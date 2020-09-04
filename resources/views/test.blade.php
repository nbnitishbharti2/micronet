@extends('Layout.app')
@section('content')
<!-- Slider Area Start Here -->
        <div class="slider-area slider-layout1 mg-t--100">
            <div class="bend niceties preview-1">
                <div id="ensign-nivoslider-1" class="slides">
                    <img src="{{ asset('public/images/images-1920x635_slide1.jpg') }}" alt="slider" title="#slider-direction-1" />
                    <img src="{{ asset('public/images/images-1920x765_slide2.jpg') }}" alt="slider" title="#slider-direction-2" />
                    <img src="{{ asset('public/images/images-1920x635_slide3.jpg') }}" alt="slider" title="#slider-direction-3" />
                </div>
                <div id="slider-direction-1" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-1">
                        <div class="text-left title-container s-tb-c">
                            <div class="container">
                                <div class="slider-sub-text">The Best Way To Grow Your Business online</div>
                                <div class="slider-big-text">website design</div>
                                <div class="slider-paragraph1">websofto is one of the best web designing company in  New Delhi, Guwahati Assam, Itanagar Arunachal Pradesh, Patna Bihar. IT is slowly becoming the fastest growing trend in order to get your business online.</div>
                                <div class="slider-btn-area">
                                    <a href="#" class="item-btn-accent">Read more
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider-direction-2" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-2">
                        <div class="text-left title-container s-tb-c">
                            <div class="container">
                                <div class="slider-sub-text">we built best Software</div>
                                <div class="slider-big-text">Software Development</div>
                                <div class="slider-paragraph1">websofto is a software development company in New Delhi, Guwahati Assam, Itanagar Arunachal Pradesh, Patna Bihar which specializes in web development and custom development.</div>
                                <div class="slider-btn-area">
                                    <a href="#" class="item-btn-accent">Read more
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider-direction-3" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-3">
                        <div class="text-left title-container s-tb-c">
                            <div class="container">
                                <div class="slider-sub-text">The Best Way To Grow Your Business</div>
                                <div class="slider-big-text">Digital Marketing </div>
                                <div class="slider-paragraph1">Digital marketing is important not just because it helps you to get found online, but also because it can change the way your business is perceived by potential customers.</div>
                                <div class="slider-btn-area">
                                    <a href="#" class="item-btn-accent">Read more
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Area End Here -->
        @endsection