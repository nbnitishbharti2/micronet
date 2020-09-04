(function ($) {
    "use strict";
    
    // preloader
    function loader() {
        $('#ctn-preloader').addClass('loaded');
        $("#loading").fadeOut(500);
        // Una vez haya terminado el preloader aparezca el scroll
    
        if ($('#ctn-preloader').hasClass('loaded')) {
            // Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
            $('#preloader').delay(900).queue(function () {
                $(this).remove();
            });
        }
    }
    
    $(window).on('load', function () {
        loader();
        wowanimation();
      mainSlider();
      counterOn()
    });


    /*---------------- mobile menu close js ------------------*/
    $(document).ready(function(){
        $(".close-menu").click(function(){
            $("#collapsibleNavbar").removeClass("show");
        });
    });


    /*--------------- Owl Carousel item js ---------------------*/
    $(document).ready(function () {
        var owl = $("#owl-demo");

        owl.owlCarousel({
            items: 3, //10 items above 1000px browser width
            itemsDesktop: [1000, 5], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // betweem 900px and 601px
            itemsTablet: [600, 1], //2 items between 600 and 0
            itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
        });
        owl.trigger('owl.play', 3000);
    });

})(jQuery);