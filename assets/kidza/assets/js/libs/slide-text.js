(function ($) {
    "use strict";

    $(document).ready(function() {
        var $slickElement = $('.pxl-text-slick');

        $slickElement.slick({
            centerMode: true,
            centerPadding: '190px',
            slidesToShow: 5,
            slidesToScroll: 1,
            vertical: true,
            verticalSwiping: true,
            arrows: false,
            swipeToSlide: true,
            focusOnSelect: true,
            infinite: true,
            autoplay: false,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        // Initial background image setup
        updateBackgroundImage();

        $slickElement.on('afterChange', function(event, slick, currentSlide) {
            updateBackgroundImage();
        });

        function updateBackgroundImage() {
            var $currentCenterSlide = $slickElement.find('.slick-center');
            if ($currentCenterSlide.length) {
                var bg = $currentCenterSlide.find('.pxl-bg-slider').css('background-image').replace('url(','').replace(')','').replace(/\"/gi, "");

                setTimeout(() => {
                    $('.bgr-change').css({
                        'opacity': '0',
                        'transform': 'scale(1)',
                    });
                    setTimeout(() => {
                        var img = new Image();
                        img.src = bg;
                        img.onload = function() {
                            $('.bgr-change').css('background-image', 'url(' + bg + ')');
                            $('.bgr-change').css({
                                'opacity': '1',
                                'transform': 'scale(1)',
                            });
                        };
                    }, 50);
                }, 50);
            }
        }
    });
})(jQuery);
