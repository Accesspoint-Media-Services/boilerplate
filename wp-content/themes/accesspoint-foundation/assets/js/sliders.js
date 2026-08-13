jQuery(document).ready(function ($) {

    $('.blog__related-posts--slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: false,
        dots: false,
        arrows: true,
        pauseOnHover: true,
        speed: 600,
        cssEase: 'cubic-bezier(0.4, 0, 0.2, 1)',
        appendArrows: $('.blog__related-posts--controlls'),
        prevArrow: '<button type="button" class="blog__related-posts--arrow blog__related-posts--arrow-prev"><i class="fa-solid fa-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="blog__related-posts--arrow blog__related-posts--arrow-next"><i class="fa-solid fa-arrow-right"></i></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

});