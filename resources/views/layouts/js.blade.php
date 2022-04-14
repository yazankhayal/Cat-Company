<script src="{{path()}}files/home/js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
<script src="{{path()}}files/home/js/bootstrap.min.js"></script><!-- .bootstrap script -->
<script src="{{path()}}files/home/js/jquery.srcipts.min.js"></script><!-- modernizr, retina, stellar for parallax -->
<script src="{{path()}}files/home/owl-carousel/owl.carousel.min.js"></script><!-- Carousels script -->
<script src="{{path()}}files/home/masterslider/masterslider.min.js"></script><!-- Master slider main js -->
<script src="{{path()}}files/home/js/jquery.matchHeight-min.js"></script><!-- for columns with background image -->
<script src="{{path()}}files/home/js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
<script src="{{path()}}files/home/js/include.js"></script><!-- custom js functions -->
<script>
    /* <![CDATA[ */
    jQuery(document).ready(function ($) {
        'use strict';

        function equalHeight() {
            $('.page-content.column-img-bkg *[class*="custom-col-padding"]').each(function () {
                var maxHeight = $(this).outerHeight();
                $('.page-content.column-img-bkg *[class*="img-bkg"]').height(maxHeight);
            });
        };

        $(document).ready(equalHeight);
        $(window).resize(equalHeight);

        // MASTER SLIDER START
        var slider = new MasterSlider();
        slider.setup('masterslider', {
            width: 1140, // slider standard width
            height: 854, // slider standard height
            space: 0,
            speed: 50,
            layout: "fullwidth",
            centerControls: false,
            loop: true,
            autoplay: true
            // more slider options goes here...
            // check slider options section in documentation for more options.
        });
        // adds Arrows navigation control to the slider.
        slider.control('arrows');

        // CLIENTS CAROUSEL START
        $('#client-carousel').owlCarousel({
            items: 6,
            loop: true,
            margin: 30,
            responsiveClass: true,
            mouseDrag: true,
            dots: false,
            responsive: {
                0: {
                    items: 2,
                    nav: true,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    responsiveClass: true
                },
                600: {
                    items: 3,
                    nav: true,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    responsiveClass: true
                },
                1000: {
                    items: 6,
                    nav: true,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    mouseDrag: true
                }
            }
        });

        // TESTIMONIAL CAROUSELS START
        $('#testimonial-carousel').owlCarousel({
            items: 1,
            loop: true,
            margin: 30,
            responsiveClass: true,
            mouseDrag: true,
            dots: false,
            autoheight: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    autoHeight: true
                },
                600: {
                    items: 1,
                    nav: true,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    autoHeight: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    mouseDrag: true,
                    autoHeight: true
                }
            }
        });
    });
    /* ]]> */
</script>

<script
    src="https://code.jquery.com/jquery-1.12.1.js"
    integrity="sha256-VuhDpmsr9xiKwvTIHfYWCIQ84US9WqZsLfR4P7qF6O8="
    crossorigin="anonymous"></script>
<script src="{{path()}}js/toastr.min.js"></script>
<script src="{{path()}}js/jquery.form.min.js"></script>
<script src="{{path()}}nprogress-master/nprogress.js"></script>
<script src="{{path()}}js/master.js"></script>
@if(scripts())
    @if(scripts()->js)
        {!! scripts()->js !!}
    @endif
    @if(scripts()->custom)
        {!! scripts()->custom !!}
    @endif
@endif
