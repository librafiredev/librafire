/**
 * isotope init
 */

jQuery(document).ready(function ($) {

    // Add more posts with load more btn
    var container = $('#blog-page .btn-link').siblings('.blog-list');

    // Remove load more if number of posts are equal or less then default posts per page
    //console.log('posts_per_page: ' + site.posts + ' | total_posts: ' + site.count + ' | articles: ' + container.find('article').length);
    if (container.find('article').length >= site.count) {
        $('#blog-page .btn-link').hide();
    }

    $('#blog-page .btn-link').on('click', function (e) {
        var post = container.find('article'),
        offset = post.length,
        cat = $('#blog-page select').val();
        var count = $('#blog-page select option:selected').data('count');

        e.preventDefault();
        $.ajax({
            method: "POST",
            url: site.ajax,
            dataType: 'HTML',
            data: {
                action: 'load_libra_more_posts',
                posts_offset: offset,
                cat: cat
            },
            beforeSend: function () {
                $('.btn-link .loading').fadeIn(200);
            }
        })
            .done(function (data) {
                $('.btn-link .loading').fadeOut(200);
                var items = $(data);
                container.append(items);

                setTimeout(function() {
                    $(window).trigger('load');
                }, 200);
               
            })
            .always(function (data) {
                
                var elements = container.find('article').length;

                if (elements == site.count) {
                    $('#blog-page .btn-link').fadeOut(500);
                }

                if (elements == count) {
                    $('#blog-page .btn-link').hide();
                }
                else {
                    $('#blog-page .btn-link').show();
                } 

            });
    });
    // Change/add post on select input
    $('#blog-page select').on('change', function (e) {

        var post = container.find('article');
        var cat = this.value;
        var count = parseInt(this.options[this.selectedIndex].dataset.count);

        $.ajax({
            method: "POST",
            url: site.ajax,
            dataType: 'HTML',
            data: {
                action: 'load_libra_posts',
                cat: cat
            },
            beforeSend: function () {
                setTimeout(function () {
                    $('#blog-page .btn-link').fadeIn(200);
                }, 500);
            }
        }).done(function (data) {
            var items = $(data);
            container.html("");
            container.append(items);
            setTimeout(function() {
                $(window).trigger('load');
            }, 200);
            

        }).always(function (data) {

           
            var elements = container.find('article').length;
            if (elements == count) {
                $('#blog-page .btn-link').hide();
            }
            else {
                $('#blog-page .btn-link').show();
            } 
            if (cat === '*' && elements < site.count) {
                $('#blog-page .btn-link').show();
            }
           
            if (data.trim() == '') {
                $('#blog-page .btn-link').fadeOut(500);
            }
        });
    });

    // Wiki layout
    $('.wiki-sorting').isotope({
        layoutMode: 'packery',
        itemSelector: '.single-letter-wrapper'
    });

});