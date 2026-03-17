<?php
/**
 * Template part for displaying single posts.
 *
 * @package Starter
 */

?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">
            <?php
            if (have_rows('content')) : while (have_rows('content')) : the_row();
                if (get_row_layout() === 'one_column') :
                    echo '<div class="col-12 full-width-content"><!-- Full Width content -->';
                    if (!get_sub_field('content_type')) :
                        if (get_sub_field('stylize_block') === 'essential') :
                            echo '<div class="essential-dark-block">';
                            echo '</div>';
                            echo '<div class="row justify-content-center dark-box-content">';
                            echo '<div class="col-md-8">';
                            the_sub_field('text');
                            echo '</div>';
                            echo '</div>';
                        elseif (get_sub_field('stylize_block') === 'dark') :
                            echo '<div class="dark-box">';
                            echo '<div class="col-12">';
                            the_sub_field('text');
                            echo '</div>';
                            echo '</div>';
                        else :
                            the_sub_field('text');
                        endif;
                    else :
                        echo '<div class="full-image-centered align-center">';
                        echo '<img src="' . get_sub_field('image')['url'] . '"/>';
                        if (get_sub_field('link') && in_array('yes', get_sub_field('link'))) :
                            echo '<a class="portfolio-link" href="' . get_sub_field('url')['url'] . '">' . get_sub_field('url')['title'] . '</a>';
                        endif;
                        echo '</div>';
                    endif;
                    echo '</div><!-- End of Full Width Content -->';
                elseif (get_row_layout() === 'two_columns') :
                    if (get_sub_field('row_align')) :
                        if (get_sub_field('order_on_smaller_devices')) :
                            echo '<div class="d-flex two-mixed-columns left-first"><!-- Mixed Content -->';
                        else :
                            echo '<div class="d-flex two-mixed-columns right-first"><!-- Mixed Content -->';
                        endif;
                    else :
                        if (get_sub_field('order_on_smaller_devices')) :
                            echo '<div class="d-flex align-items-center two-mixed-columns left-first"><!-- Mixed Content -->';
                        else :
                            echo '<div class="d-flex align-items-center two-mixed-columns right-first"><!-- Mixed Content -->';
                        endif;
                    endif;
                    if (get_sub_field('layout') === 'half') :
                        echo '<div class="col-lg-6">';
                    elseif (get_sub_field('layout') === 'seven_five') :
                        echo '<div class="col-lg-7">';
                    elseif (get_sub_field('layout') === 'five_seven') :
                        echo '<div class="col-lg-5">';
                    endif;

                    if (have_rows('left_side')) : while (have_rows('left_side')) : the_row();
                        if (!get_sub_field('choose')) :
                            the_sub_field('text');
                        else :
                            echo '<div class="project-container">';
                            echo '<div class="project-mask">';
                            $project_slider = get_sub_field('slider');
                            if ($project_slider) :
                                echo '<div class="project-slider">';
                                foreach ($project_slider as $slide) :
                                    echo '<div class="d-flex align-items-center">';
                                    echo '<a href="' . get_home_url() . '/portfolio/#project-' . $slide->ID . '">';
                                    if( $image = get_field('portfolio_image', $slide->ID) ) :
                                        echo wp_get_attachment_image( $image['ID'], 'full' ); 
                                    else :
                                        echo '<img src="' . get_stylesheet_directory_uri() . '/images/portfolio-placeholder-image.png" width="680" height="430" alt="Portfolio placeholder image">';
                                    endif;
                                    echo '</a>';
                                    echo '</div>';
                                endforeach;
                                echo '</div>';
                            endif;
                            echo '</div>';
                            echo '</div>';
                        endif;
                    endwhile;
                        wp_reset_postdata();
                    endif;

                    echo '</div>';

                    if (get_sub_field('layout') === 'half') :
                        echo '<div class="col-lg-6">';
                    elseif (get_sub_field('layout') === 'seven_five') :
                        echo '<div class="col-lg-5">';
                    elseif (get_sub_field('layout') === 'five_seven') :
                        echo '<div class="col-lg-7">';
                    endif;

                    if (have_rows('right_side')) : while (have_rows('right_side')) : the_row();
                        if (!get_sub_field('choose')) :
                            the_sub_field('text');
                        else :
                            echo '<div class="project-container">';
                            // echo file_get_contents(get_template_directory() . '/images/lines/services_1.svg');
                            echo '<div class="project-mask">';
                            $project_slider = get_sub_field('slider');
                            if ($project_slider) :
                                echo '<div class="project-slider">';
                                foreach ($project_slider as $slide) :
                                    echo '<div class="d-flex align-items-center">';
                                    echo '<a href="' . get_home_url() . '/portfolio/#project-' . $slide->ID . '">';
                                    if( $image = get_field('portfolio_image', $slide->ID) ) :
                                        echo wp_get_attachment_image( $image['ID'], 'full' ); 
                                    else :
                                        echo '<img src="' . get_stylesheet_directory_uri() . '/images/portfolio-placeholder-image.png" width="680" height="430" alt="Portfolio placeholder image">';
                                    endif;
                                    echo '</a>';
                                    echo '</div>';
                                endforeach;
                                echo '</div>';
                            endif;
                            echo '</div>';
                            echo '</div>';
                        endif;
                    endwhile;
                        wp_reset_postdata();
                    endif;

                    echo '</div>';

                    echo '</div><!-- End of Mixed Content -->';
                elseif (get_row_layout() === 'testimonials') :
                    echo '<div class="d-flex align-items-center page-testimonials-container"><!-- Page Testimonials -->';
                    if (have_rows('slider')) :
                        echo '<div class="col-lg-6">';
                        echo '<div class="page-testimonials">';
                        while (have_rows('slider')) : the_row();
                            echo '<div>';
                            the_sub_field('text');
                            echo '</div>';
                        endwhile;
                        wp_reset_postdata();
                        echo '</div>';
                        echo '</div>';
                    endif;
                    if ( $image = get_sub_field('slider_image') ) :
                        echo '<div class="col-lg-6 d-flex testimonial-image-container">';
                        echo wp_get_attachment_image( $image['ID'], 'full', false, ['class' => 'testimonials-img'] );
                        echo '</div>';
                    endif;
                    echo '</div><!-- End of Page Testimonials -->';
                endif;
            endwhile;
                wp_reset_postdata();
            endif; ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php starter_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-## -->

<?php
$post_id = get_the_ID();
$set = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post__not_in' => array($post_id),
    'order' => 'DESC',
    'orderby' => 'date'
);

$blog_posts = new WP_Query($set);

if ($blog_posts->have_posts()) :
    echo '<div class="recent-posts">';
    echo '<h2 class="col-12">' . __('Recent Posts', 'libra') . '</h2>';
    while ($blog_posts->have_posts()) : $blog_posts->the_post();
        echo '<div class="col-md-4">';
        echo '<a class="post-item" href="' . get_the_permalink(get_the_ID()) . '">';
        echo '<figure>';
        if( $image = get_field('small_photo') ) :
            echo wp_get_attachment_image( $image['ID'], 'blog-thumb' ); 
        else :
            echo '<img src="' . get_stylesheet_directory_uri() .'/images/post-placeholder-image.png" width="360" height="560" alt="Post placeholder image">';
        endif;
        echo '</figure>';
        echo '<div class="blog-info">';
        echo '<h3 class="blog-title">' . get_the_title(get_the_ID()) . '</h3>';
        echo '<p>' . wp_html_excerpt(get_the_excerpt(get_the_ID()), 80, '...') . '</p>';
        echo '<div class="blog-dc blog-date-wrapper d-flex align-items-center justify-content-between">';
        echo '<h5 class="blog-date">' . get_the_date(get_option('date_format'), get_the_ID()) . '</h5>';
        echo '<span class="blog-read-more">Read more<span class="blog-read-more-arrow">' .  file_get_contents(get_template_directory() . "/images/arrow-right-thin.svg") . '</span></span>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    endwhile;
    wp_reset_postdata();
    echo '</div>';
endif;

