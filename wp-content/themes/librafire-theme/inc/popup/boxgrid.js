/*
* debouncedresize: special jQuery event that happens once after a window resize
*
* latest version and complete README available on Github:
* https://github.com/louisremi/jquery-smartresize/blob/master/jquery.debouncedresize.js
*
* Copyright 2011 @louis_remi
* Licensed under the MIT license.
*/
var $event = $.event,
    $special,
    resizeTimeout;

$special = $event.special.debouncedresize = {
    setup: function () {
        $(this).on("resize", $special.handler);
    },
    teardown: function () {
        $(this).off("resize", $special.handler);
    },
    handler: function (event, execAsap) {
        // Save the context
        var context = this,
            args = arguments,
            dispatch = function () {
                // set correct event type
                event.type = "debouncedresize";
                $event.dispatch.apply(context, args);
            };

        if (resizeTimeout) {
            clearTimeout(resizeTimeout);
        }

        execAsap ?
            dispatch() :
            resizeTimeout = setTimeout(dispatch, $special.threshold);
    },
    threshold: 50
};

var Boxgrid = (function () {

    var $items = $('.portofolio-items .portfolio-item-wrapper > .portfolio-item'),
        transEndEventNames = {
            'WebkitTransition': 'webkitTransitionEnd',
            'MozTransition': 'transitionend',
            'OTransition': 'oTransitionEnd',
            'msTransition': 'MSTransitionEnd',
            'transition': 'transitionend'
        },
        // transition end event name
        transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
        // window and body elements
        $window = $(window),
        $body = $('body'),
        // transitions support
        supportTransitions = Modernizr.csstransitions,
        // current item's index
        current = -1,
        // window width and height
        winsize = getWindowSize();

    function init(options) {
        initEvents();
    }

    function initEvents() {

        $items.each(function () {

            var $item = $(this),
                $close = $item.find('span.rb-close'),
                $overlay = $item.children('div.rb-overlay');

            $item.on('click', function () {

                window.location.hash = $item.data('slug');
                $('body').addClass('portfolio-full-open');

                if ($item.data('isExpanded')) {
                    return false;
                }
                $item.data('isExpanded', true);
                // save current item's index
                current = $item.index();

                var layoutProp = getItemLayoutProp($item),
                    clipPropFirst = 'rect(' + layoutProp.top + 'px ' + (layoutProp.left + layoutProp.width) + 'px ' + (layoutProp.top + layoutProp.height) + 'px ' + layoutProp.left + 'px)',
                    // clipPropLast = 'rect(0px ' + winsize.width + 'px ' + winsize.height + 'px 0px)';
                    // clipPropFirst = 'rect(' + layoutProp.top + 'px ' + (layoutProp.left + layoutProp.width) + 'px 100vh ' + layoutProp.left + 'px)',
                    clipPropLast = 'rect(0px ' + winsize.width + 'px 100vh 0px)';

                $overlay.css({
                    clip: supportTransitions ? clipPropFirst : clipPropLast,
                    opacity: 1,
                    zIndex: 9999,
                    pointerEvents: 'auto',
                    position: 'fixed'
                });

                //$item[0].style="transform:none";

                if (supportTransitions) {
                    $overlay.on(transEndEventName, function () {

                        $overlay.off(transEndEventName);
                        setTimeout(function () {
                            $overlay.css('clip', clipPropLast).on(transEndEventName, function () {
                                $overlay.off(transEndEventName);
                                //$body.css('overflow-y', 'hidden');
                                $body.removeClass('loaded');
                            });
                        }, 25);

                    });
                }
                else {
                    $body.css('overflow-y', 'hidden');
                }

            });

            if (window.location.hash) {
                var hash = $("[data-slug='" + window.location.hash.replace("#", "") + "']").data('slug');
                if ($item.data('slug') === hash) {

                    $('body').addClass('portfolio-full-open');

                    if ($item.data('isExpanded')) {
                        return false;
                    }
                    $item.data('isExpanded', true);
                    // save current item's index
                    current = $item.index();

                    var layoutProp = getItemLayoutProp($item),
                        clipPropFirst = 'rect(' + layoutProp.top + 'px ' + (layoutProp.left + layoutProp.width) + 'px ' + (layoutProp.top + layoutProp.height) + 'px ' + layoutProp.left + 'px)',
                        // clipPropLast = 'rect(0px ' + winsize.width + 'px ' + winsize.height + 'px 0px)';

                        // clipPropFirst = 'rect(' + layoutProp.top + 'px ' + (layoutProp.left + layoutProp.width) + 'px 100vh ' + layoutProp.left + 'px)',
                        clipPropLast = 'rect(0px ' + winsize.width + 'px 100vh 0px)';

                    $overlay.css({
                        clip: supportTransitions ? clipPropFirst : clipPropLast,
                        opacity: 1,
                        zIndex: 9999,
                        pointerEvents: 'auto',
                        position: 'fixed'
                    });

                    if (supportTransitions) {
                        $overlay.on(transEndEventName, function () {

                            $overlay.off(transEndEventName);

                            setTimeout(function () {
                                $overlay.css('clip', clipPropLast).on(transEndEventName, function () {
                                    $overlay.off(transEndEventName);
                                    //$body.css('overflow-y', 'hidden');
                                    $body.removeClass('loaded');
                                });
                            }, 25);

                        });
                    }
                    else {
                        $body.css('overflow-y', 'hidden');
                    }

                    window.location.hash = hash;
                }
            }

            // $('.portfolio-item .popup-mask').on('click', function () {
            //     history.pushState("", document.title, window.location.pathname);
            //
            //     var layoutProp = getItemLayoutProp($item),
            //         clipPropFirst = 'rect(' + layoutProp.top + 'px ' + (layoutProp.left + layoutProp.width) + 'px ' + (layoutProp.top + layoutProp.height) + 'px ' + layoutProp.left + 'px)',
            //         clipPropLast = 'auto';
            //
            //     // reset current
            //     current = -1;
            //
            //     $overlay.css({
            //         clip: supportTransitions ? clipPropFirst : clipPropLast,
            //         opacity: supportTransitions ? 1 : 0,
            //         pointerEvents: 'none'
            //     });
            //
            //     if (supportTransitions) {
            //         $overlay.on(transEndEventName, function () {
            //
            //             $overlay.off(transEndEventName);
            //             setTimeout(function () {
            //                 $overlay.css('opacity', 0).on(transEndEventName, function () {
            //                     $overlay.off(transEndEventName).css({clip: clipPropLast, zIndex: -1});
            //                     $item.data('isExpanded', false);
            //                 });
            //                 $body.addClass('loaded');
            //             }, 25);
            //
            //         });
            //     }
            //     else {
            //         $overlay.css('z-index', -1);
            //         $item.data('isExpanded', false);
            //         $body.addClass('loaded');
            //     }
            //
            //     return false;
            // });

            $close.on('click', function () {

                history.pushState("", document.title, window.location.pathname);
                $('body').removeClass('portfolio-full-open');

                var layoutProp = getItemLayoutProp($item),
                    clipPropFirst = 'rect(' + layoutProp.top + 'px ' + (layoutProp.left + layoutProp.width) + 'px ' + (layoutProp.top + layoutProp.height) + 'px ' + layoutProp.left + 'px)',
                    // clipPropFirst = 'rect(' + layoutProp.top + 'px ' + (layoutProp.left + layoutProp.width) + 'px 100vh ' + layoutProp.left + 'px)', clipPropLast = 'auto';

                // reset current
                current = -1;

                $overlay.css({
                    clip: supportTransitions ? clipPropFirst : clipPropLast,
                    opacity: supportTransitions ? 1 : 0,
                    pointerEvents: 'none'
                });

                if (supportTransitions) {
                    $overlay.on(transEndEventName, function () {

                        $overlay.off(transEndEventName);
                        setTimeout(function () {
                            $overlay.css('opacity', 0).on(transEndEventName, function () {
                                $overlay.off(transEndEventName).css({clip: clipPropLast, zIndex: -1});
                                $item.data('isExpanded', false);
                                // window.pfGrid.isotope('layout');

                            });
                            $body.addClass('loaded');
                            $('body').removeClass('portfolio-full-open');
                        }, 25);

                    });
                }
                else {
                    $overlay.css('z-index', -1);
                    $item.data('isExpanded', false);
                    $body.addClass('loaded');
                }

                return false;

            });

            // $(document).keyup(function (e) {
            //     if (e.keyCode === 27) {
            //         history.pushState("", document.title, window.location.pathname);
            //
            //         var layoutProp = getItemLayoutProp($item),
            //             clipPropFirst = 'rect(' + layoutProp.top + 'px ' + (layoutProp.left + layoutProp.width) + 'px ' + (layoutProp.top + layoutProp.height) + 'px ' + layoutProp.left + 'px)',
            //             clipPropLast = 'auto';
            //
            //         // reset current
            //         current = -1;
            //
            //         $overlay.css({
            //             clip: supportTransitions ? clipPropFirst : clipPropLast,
            //             opacity: supportTransitions ? 1 : 0,
            //             pointerEvents: 'none'
            //         });
            //
            //         if (supportTransitions) {
            //             $overlay.on(transEndEventName, function () {
            //
            //                 $overlay.off(transEndEventName);
            //                 setTimeout(function () {
            //                     $overlay.css('opacity', 0).on(transEndEventName, function () {
            //                         $overlay.off(transEndEventName).css({clip: clipPropLast, zIndex: -1});
            //                         $item.data('isExpanded', false);
            //                         $body.addClass('loaded');
            //                         // window.pfGrid.isotope('layout');
            //
            //                     });
            //                 }, 25);
            //
            //             });
            //         }
            //         else {
            //             $overlay.css('z-index', -1);
            //             $item.data('isExpanded', false);
            //             $body.addClass('loaded');
            //         }
            //
            //         return false;
            //     }
            // });

        });

        $(window).on('debouncedresize', function () {
            winsize = getWindowSize();

            console.log(winsize.width);

            // todo : cache the current item
            if (current !== -1) {
                $items.eq(current).children('div.rb-overlay').css('clip', 'rect(0px ' + winsize.width + 'px 100vh 0px)');
            }
        });

    }

    function getItemLayoutProp($item) {

        var scrollT = $window.scrollTop(),
            scrollL = $window.scrollLeft(),
            itemOffset = $item.offset();

        return {
            left: itemOffset.left - scrollL,
            top: itemOffset.top - scrollT,
            width: $item.outerWidth(),
            height: $item.outerHeight()
        };

    }

    function getWindowSize() {
        //$body.css('overflow-y', 'hidden');
        var w = $window.width(), h = $window.height();
        if (current === -1) {
            if ($(window).width() < 992) {
                //$body.css('overflow-y', 'auto');
            }
        }
        return {width: w, height: h};
    }

    return {init: init};

})();
