

jQuery(document).ready(function ($) {
    var theme_globals = {
        home_slider_speed: 7000
    };

    setTimeout(function() { 
        $(".project-container").css("opacity", "1");
    }, 1000); 

    // Home slider
    $('.home-slider').on('init', function (event, slick, currentSlide, nextSlide) {
        $('.header-company-description .container').append('<h1></h1>');
        var heading = $('.home-slider .slick-current .main-title').text(),
            main_slide = $('.header-company-description h1');
        main_slide.text(heading);
        $(this).append('<div id="slide-number"><div class="slide-status"></div></div>');
        $(this).append('<a href="#projects" class="go-down d-flex align-items-center justify-content-center"></a>');
        var i = (currentSlide ? currentSlide : 0) + 1;
        if (slick.slideCount < 10) {
            $('.home-slider #slide-number .slide-status').html('<span>0' + i + '</span>' + '/0' + slick.slideCount);
        } else {
            $('.home-slider #slide-number .slide-status').html('<span>' + i + '</span>' + '/' + slick.slideCount);
        }

        // Scroll to section
        $('.home-slider .go-down').on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 1200);
        });
    });

    $('.home-slider').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        var i = (currentSlide ? currentSlide : 0) + 1,
            heading = $('.home-slider .slick-current .main-title').text(),
            main_slide = $('.header-company-description h1');
        main_slide.text(heading);
        main_slide.fadeIn(500);
        $('.home-slider .home-slide h2').fadeIn('slow');
        if (slick.slideCount < 10) {
            $('.home-slider #slide-number .slide-status').html('<span>0' + i + '</span>' + '/0' + slick.slideCount);
        } else {
            $('.home-slider #slide-number .slide-status').html('<span>' + i + '</span>' + '/' + slick.slideCount);
        }
    });
    //
    $('.home-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        $('.home-slider .slick-dots li.slick-active').removeClass('start-anim').delay(100).queue(function (next) {
            $(this).addClass('start-anim');
            next();
        });
        $('.header-company-description h1').fadeOut(500);
        $('.home-slider .home-slide h2').fadeOut('slow');
    });

    $(window).on('lf-loaded', function () {
        $('.home-slider').slick({
            infinite: true,
            autoplay: true,
            fade: true,
            autoplaySpeed: theme_globals.home_slider_speed,
            pauseOnHover: false,
            pauseOnFocus: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            adaptiveHeight: false,
            centerMode: true,
            centerPadding: 0,
            arrows: false,
            customPaging: function (slick, index) {
                return '';
            }
        });

        $('.home-slider .slick-dots li').addClass('start-anim');
        $(".home-slider").slick('slickGoTo', 0);
    });

    //Project slider
    $('.project-slider').on('init', function (event, slick, currentSlide, nextSlide) {
        //var stHeight = $('.project-slider .slick-track').height();
        //$('.project-slider .slick-slide').css('height', stHeight + 'px');
        $('.project-slider .slick-dots li').addClass('col');
        $(this).append('<div id="slide-number"><div class="slide-status"></div></div>');
        var i = (currentSlide ? currentSlide : 0) + 1;
        if (slick.slideCount < 10) {
            $('.project-slider #slide-number .slide-status').html('<span>0' + i + '</span>' + '/0' + slick.slideCount);
        } else {
            $('.project-slider #slide-number .slide-status').html('<span>' + i + '</span>' + '/' + slick.slideCount);
        }
    });

    $('.project-slider').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        var i = (currentSlide ? currentSlide : 0) + 1;
        if (slick.slideCount < 10) {
            $('.project-slider #slide-number .slide-status').html('<span>0' + i + '</span>' + '/0' + slick.slideCount);
        } else {
            $('.project-slider #slide-number .slide-status').html('<span>' + i + '</span>' + '/' + slick.slideCount);
        }
    });

    $('.project-slider').slick({
        infinite: true,
        autoplay: false,
        autoplaySpeed: 3000,
        pauseOnHover: false,
        pauseOnFocus: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: false,
        centerMode: true,
        centerPadding: 0,
        arrows: true,
        nextArrow: '<div class="slick-next"><span>Next Project</span><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i><span>Previous project</span></div>',
        customPaging: function (slick, index) {
            return '';
        },
        fade: true,
        cssEase: 'linear',
        speed: 800
    });

    //Testimonials slider
    $('.testimonials-slider').on('init', function (event, slick, currentSlide, nextSlide) {
        $('.testimonials-slider .slick-dots li').addClass('col');
        $(this).append('<div id="slide-number"><div class="slide-status"></div></div>');
        var i = (currentSlide ? currentSlide : 0) + 1;
        if (slick.slideCount < 10) {
            $('.testimonials-slider #slide-number .slide-status').html('<span>0' + i + '</span>' + '/0' + slick.slideCount);
        } else {
            $('.testimonials-slider #slide-number .slide-status').html('<span>' + i + '</span>' + '/' + slick.slideCount);
        }
    });

    $('.testimonials-slider').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        var i = (currentSlide ? currentSlide : 0) + 1;
        if (slick.slideCount < 10) {
            $('.testimonials-slider #slide-number .slide-status').html('<span>0' + i + '</span>' + '/0' + slick.slideCount);
        } else {
            $('.testimonials-slider #slide-number .slide-status').html('<span>' + i + '</span>' + '/' + slick.slideCount);
        }
    });

    $('.testimonials-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: false,
        pauseOnFocus: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: false,
        centerMode: true,
        centerPadding: 0,
        arrows: true,
        nextArrow: '<div class="slick-next"><span>Next</span><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i><span>Previous</span></div>',
        customPaging: function (slick, index) {
            return '';
        },
        fade: true,
        cssEase: 'linear',
        speed: 600
    });

    //Page testimonials slider
    $('.page-testimonials').on('init', function (event, slick, currentSlide, nextSlide) {
        $(this).append('<div id="slide-number"><div class="slide-status"></div></div>');
        var i = (currentSlide ? currentSlide : 0) + 1;
        if (slick.slideCount < 10) {
            $('.page-testimonials #slide-number .slide-status').html('<span>0' + i + '</span>' + '/0' + slick.slideCount);
        } else {
            $('.page-testimonials #slide-number .slide-status').html('<span>' + i + '</span>' + '/' + slick.slideCount);
        }
    });

    $('.page-testimonials').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        var i = (currentSlide ? currentSlide : 0) + 1;
        if (slick.slideCount < 10) {
            $('.page-testimonials #slide-number .slide-status').html('<span>0' + i + '</span>' + '/0' + slick.slideCount);
        } else {
            $('.page-testimonials #slide-number .slide-status').html('<span>' + i + '</span>' + '/' + slick.slideCount);
        }
    });
    $('.page-testimonials').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 10000,
        pauseOnHover: false,
        pauseOnFocus: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: false,
        centerMode: true,
        centerPadding: 0,
        arrows: false,
        nextArrow: '<div class="slick-next"><span>Next</span><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i><span>Previous</span></div>',
        customPaging: function (slick, index) {
            return '';
        },
        fade: true,
        cssEase: 'linear',
        speed: 1000
    });

    $('.blog-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: true,
        arrows: true,
        nextArrow: '<div class="nav-right d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></div>',
        prevArrow: '<div class="nav-left d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></div>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    adaptiveHeight: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    adaptiveHeight: false,
                    //arrows: false
                }
            }
        ]
    });

    $('.why-us-slider').slick({
        infinite: true,
        //autoplay: true,
        autoplaySpeed: 7000,
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: false,
        arrows: true,
        nextArrow: '<div class="nav-right d-flex align-items-center pull-right text-uppercase"><span>View more</span><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
        prevArrow: '',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,
                    adaptiveHeight: false,
                    arrows: false
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    adaptiveHeight: false,
                    arrows: false
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    adaptiveHeight: false,
                    arrows: false
                }
            }
        ]
    });

});