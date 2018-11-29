$(document).ready(function () {
    // calculate the height        
    var carouselBottom = $('div.carousel-item').offset().top + $('div.carousel-item').outerHeight(true);
    
    $(window).on('scroll', function () {
                // scroll position
                var stop = $(window).scrollTop();
                // changing navbar from transparent to a solid colour after we scroll past the carousel for better visibility
                if (stop >= carouselBottom) {
                    $('nav').addClass('scrolledNav');
                }
                else {
                    $('nav').removeClass('scrolledNav');
                }

            });
});