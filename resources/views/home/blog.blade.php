 @extends('Layout.app')
@section('content')
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="images/bg/bg6.jpg">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="font-28 text-white">Blog</h2>
              <ol class="breadcrumb text-center text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-white">Page Title</li>
              </ol>
            </div>
          </div>
        </div>
      </div>      
    </section>

    <section id="cd-timeline" class="cd-container mt-100 mb-100">
      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
          <img src="{{ asset('public/site/js/vertical-timeline/img/cd-icon-picture.svg')}}" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <article class="post clearfix">
            <div class="entry-header">
              <div class="post-thumb"> <img alt="" src="https://placehold.it/900x500" class="img-fullwidth img-responsive"> </div>
              <h5 class="entry-title"><a href="#">Single Image Post</a></h5>
              <ul class="list-inline font-12 mb-20 mt-10">
                <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>
                <li><span class="text-theme-colored">SEP 12,15</span></li>
              </ul>
            </div>
            <div class="entry-content">
              <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores sit nobis magni incidunt eos quasi et excepturi, animi omnis velit, deserunt ratione eum dolorem ducimus ab quidem saepe, natus earum facilis voluptate molestias quos nisi. Beatae in saepe velit nisi sapiente ullam nihil. Laboriosam repellat deleniti voluptate maiores consectetur debitis <a href="#">[...]</a></p>
              <ul class="list-inline like-comment pull-left font-12">
                <li><i class="pe-7s-comment"></i>36</li>
                <li><i class="pe-7s-like2"></i>125</li>
              </ul>
              <a class="pull-right text-gray font-13" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
            </div>
          </article>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-movie">
          <img src="{{ asset('public/site/js/vertical-timeline/img/cd-icon-movie.svg')}}" alt="Movie">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <article class="post clearfix">
            <div class="entry-header">
              <h5 class="entry-title mt-0 pt-0"><a href="#">Text Post</a></h5>
              <ul class="list-inline font-12 mb-20 mt-10">
                <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>
                <li><span class="text-theme-colored">SEP 12,15</span></li>
              </ul>
            </div>
            <div class="entry-content">
              <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores sit nobis magni incidunt eos quasi et excepturi, animi omnis velit, deserunt ratione eum dolorem ducimus ab quidem saepe, natus earum facilis voluptate molestias quos nisi. Beatae in saepe velit nisi sapiente ullam nihil. Laboriosam repellat deleniti voluptate maiores consectetur debitis <a href="#">[...]</a></p>
              <ul class="list-inline like-comment pull-left font-12">
                <li><i class="pe-7s-comment"></i>36</li>
                <li><i class="pe-7s-like2"></i>125</li>
              </ul>
              <a class="pull-right text-gray font-13" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
            </div>
          </article>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
          <img src="{{ asset('public/site/js/vertical-timeline/img/cd-icon-picture.svg')}}" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <article class="post clearfix">
            <div class="entry-header">
              <div class="post-thumb">
                <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/167425759&amp;auto_play=false&amp;hide_related=true&amp;show_comments=true&amp;show_user=false&amp;show_reposts=false&amp;visual=false"></iframe>
              </div>
              <h5 class="entry-title"><a href="#">Sound Cloud Post </a></h5>
              <ul class="list-inline font-12 mb-20 mt-10">
                <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>
                <li><span class="text-theme-colored">SEP 12,15</span></li>
              </ul>
            </div>
            <div class="entry-content">
              <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores sit nobis magni incidunt eos quasi et excepturi, animi omnis velit, deserunt ratione eum dolorem ducimus ab quidem saepe, natus earum facilis voluptate molestias quos nisi. Beatae in saepe velit nisi sapiente ullam nihil. Laboriosam repellat deleniti voluptate maiores consectetur debitis <a href="#">[...]</a></p>
              <ul class="list-inline like-comment pull-left font-12">
                <li><i class="pe-7s-comment"></i>36</li>
                <li><i class="pe-7s-like2"></i>125</li>
              </ul>
              <a class="pull-right text-gray font-13" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
            </div>
          </article>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-location">
          <img src="{{ asset('public/site/js/vertical-timeline/img/cd-icon-location.svg')}}" alt="Location">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <article class="post clearfix">
            <div class="entry-header">
              <div class="post-thumb">
                <iframe src="http://player.vimeo.com/video/114959015?title=0&amp;byline=0&amp;portrait=0" width="360" height="205" allowfullscreen>
                </iframe>
              </div>
              <h5 class="entry-title"><a href="#">Vimeo Video Post </a></h5>
              <ul class="list-inline font-12 mb-20 mt-10">
                <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>
                <li><span class="text-theme-colored">SEP 12,15</span></li>
              </ul>
            </div>
            <div class="entry-content">
              <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores sit nobis magni incidunt eos quasi et excepturi, animi omnis velit, deserunt ratione eum dolorem ducimus ab quidem saepe, natus earum facilis voluptate molestias quos nisi. Beatae in saepe velit nisi sapiente ullam nihil. Laboriosam repellat deleniti voluptate maiores consectetur debitis <a href="#">[...]</a></p>
              <ul class="list-inline like-comment pull-left font-12">
                <li><i class="pe-7s-comment"></i>36</li>
                <li><i class="pe-7s-like2"></i>125</li>
              </ul>
              <a class="pull-right text-gray font-13" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
            </div>
          </article>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-location">
          <img src="{{ asset('public/site/js/vertical-timeline/img/cd-icon-location.svg')}}" alt="Location">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <article class="post clearfix">
            <div class="entry-header">
              <div class="post-thumb">
                <iframe width="600" height="340"
                src="http://www.youtube.com/embed/oIDqz2BrVec?autoplay=0" allowfullscreen>
                </iframe>
              </div>
              <h5 class="entry-title"><a href="#">Youtube Video Post </a></h5>
              <ul class="list-inline font-12 mb-20 mt-10">
                <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>
                <li><span class="text-theme-colored">SEP 12,15</span></li>
              </ul>
            </div>
            <div class="entry-content">
              <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores sit nobis magni incidunt eos quasi et excepturi, animi omnis velit, deserunt ratione eum dolorem ducimus ab quidem saepe, natus earum facilis voluptate molestias quos nisi. Beatae in saepe velit nisi sapiente ullam nihil. Laboriosam repellat deleniti voluptate maiores consectetur debitis <a href="#">[...]</a></p>
              <ul class="list-inline like-comment pull-left font-12">
                <li><i class="pe-7s-comment"></i>36</li>
                <li><i class="pe-7s-like2"></i>125</li>
              </ul>
              <a class="pull-right text-gray font-13" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
            </div>
          </article>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-movie">
          <img src="{{ asset('public/site/js/vertical-timeline/img/cd-icon-movie.svg')}}" alt="Movie">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <article class="post clearfix">
            <div class="entry-header">
              <h5 class="entry-title mt-0 pt-0"><a href="#">Quotation Post</a></h5>
              <ul class="list-inline font-12 mb-20 mt-10">
                <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>
                <li><span class="text-theme-colored">SEP 12,15</span></li>
              </ul>
            </div>
            <div class="entry-content">
              <div class="display-block">
                <blockquote class="gray">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo eligendi quibusdam doloremque necessitatibus doloribus blanditiis, praesentium ex error aliquid? Corporis dolores consequuntur cupiditate.</p>
                          <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
              </div>
              <ul class="list-inline like-comment pull-left font-12 mt-30">
                <li><i class="pe-7s-comment"></i>36</li>
                <li><i class="pe-7s-like2"></i>125</li>
              </ul>
            </div>
          </article>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-movie">
          <img src="{{ asset('public/site/js/vertical-timeline/img/cd-icon-movie.svg')}}" alt="Movie">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <article class="post clearfix">
            <div class="entry-header">
              <div class="post-thumb">
                <div class="owl-carousel-1col">
                  <div class="item">
                    <img src="https://placehold.it/900x500" alt="">
                  </div>
                  <div class="item">
                    <img src="https://placehold.it/900x500" alt="">
                  </div>
                  <div class="item">
                    <img src="https://placehold.it/900x500'" alt="">
                  </div>
                </div>
              </div>
              <h5 class="entry-title"><a href="#">Images Carousel Post</a></h5>
              <ul class="list-inline font-12 mb-20 mt-10">
                <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>
                <li><span class="text-theme-colored">SEP 12,15</span></li>
              </ul>
            </div>
            <div class="entry-content">
              <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua <a href="#">[...]</a></p>
              <ul class="list-inline like-comment pull-left font-12">
                <li><i class="pe-7s-comment"></i>36</li>
                <li><i class="pe-7s-like2"></i>125</li>
              </ul>
              <a class="pull-right text-gray font-13" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
            </div>
          </article>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-movie">
          <img src="{{ asset('public/site/js/vertical-timeline/img/cd-icon-movie.svg')}}" alt="Movie">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <article class="post clearfix">
            <div class="entry-content">
              <div class="">
                <a class="post-link text-center text-white bg-theme-colored display-block font-20 p-30 mb-30" href="#">
                  kodesolution.com<br><span class="font-13">http://kodesolution.com</span>
                </a>
              </div>
              <ul class="list-inline like-comment pull-left font-12">
                <li><i class="pe-7s-comment"></i>36</li>
                <li><i class="pe-7s-like2"></i>125</li>
              </ul>
            </div>
          </article>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->
    </section>
  </div>
  <!-- end main-content -->
 @endsection