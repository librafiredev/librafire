/**
 * Popup init
 */

jQuery(document).ready(function ($) {
    //append mask for close popup
    $('.portfolio-item .portfolio-full').append('<div class="popup-mask"></div>');

    // Popup init
    Boxgrid.init();

    // Scroll to filtered project on mobile
    function scroll_to_project() {
        if ($(window).width() < 768) {
            $('#portfolio .portfolio-cat li').on('click', function () {
                $("html, body").animate({scrollTop: $('.portofolio-items').offset().top - 300}, 300);
            });
        }
    }

    scroll_to_project();
    
    // $(window).on('resize', function () {
    //     scroll_to_project();
    // });

});