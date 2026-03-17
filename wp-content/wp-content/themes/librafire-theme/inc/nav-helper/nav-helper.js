// Add Fixed nav on homepage

jQuery(document).ready(function ($) {

    var $nav_container = $('<ul />'),
        $sections = $('#content section'),
        $element = $('<li />');
    $nav_container.addClass('navigation-libra');

    $sections.each(function (i, _this) {
        var id = $(this).data('slug'),
            format = id.replace('-', ' ');
        $nav_item = $element.clone();
        $nav_item.on('click', function () {
            got_to(i);
            $('.navigation-libra li').removeClass('active');
            $(this).addClass('active');
        });

        $($nav_container).append($nav_item);
        $($nav_item).append('<span>' + format + '</span>');

    });

    $('section#projects').append($nav_container);

    $('.navigation-libra li').first().addClass('active');

    function got_to(i) {
        $('body, html').animate({
            scrollTop: $('#content section').eq(i).offset().top
        }, 1200);
    }

    // Make it fixed on scroll
    var nav = $('.navigation-libra'),
        //sec_pad = $('section#projects').css('padding-top').replace(/[^-\d\.]/g, ''),
        nav_pos = nav.offset().top,
        navi = $('.navigation-libra li'),
        header = $('header .logo-menu-wrapper');

    // On init set position of navigation
    if ($(window).scrollTop() > nav_pos) {
        nav.addClass('sticky');
    } else {
        nav.removeClass('sticky');
    }

    $(window).on('scroll', function () {
        if ($(window).scrollTop() > nav_pos) {
            nav.addClass('sticky');
        } else {
            nav.removeClass('sticky');
        }

        $sections.each(function (i, _this) {
            var thisTop = $(this).offset().top - $(window).scrollTop();
            if (thisTop < ($(window).height() / 2) && (thisTop + $(this).height()) > ($(window).height() / 3)) {
                //$(this).css('background', 'red');
                if ($(this).hasClass('essential')) {
                    nav.addClass('sticky overlay');
                } else {
                    nav.removeClass('overlay');
                }
                navi.removeClass('active');
                navi.eq($(this).index()).addClass('active');
            } else {
                //$(this).css('background', 'silver');
            }
        });

    });

});