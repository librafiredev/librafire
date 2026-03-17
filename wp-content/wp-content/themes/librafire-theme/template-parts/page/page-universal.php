<?php
/**
 * Universal page template
 */

 if(!is_page('careers') && !is_page('partners') ) {
    echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); 
    echo file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'); 
    echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); 
    echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); 

 }


if (have_rows('content')) : while (have_rows('content')) : the_row();
    if (get_row_layout() === 'one_column') :
        echo '<div class="col-12 full-width-content"><!-- Full Width content -->';
        if (!get_sub_field('content_type')) :
            if (get_sub_field('stylize_block') === 'essential') :
                echo '<div class="essential-dark-block">';
                if(is_page('ios-app-development')) {
                    echo file_get_contents(get_template_directory() . '/images/lines/app-development.svg'); 
                } else {
                    echo file_get_contents(get_template_directory() . '/images/lines/why_libra.svg');
                }
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
            echo '<div class="col-md-6">';
        elseif (get_sub_field('layout') === 'seven_five') :
            echo '<div class="col-md-7">';
        elseif (get_sub_field('layout') === 'five_seven') :
            echo '<div class="col-md-5">';
        endif;

        if (have_rows('left_side')) : while (have_rows('left_side')) : the_row();
            if (!get_sub_field('choose')) :
                the_sub_field('text');
            else :
                echo '<div class="project-container">';
                echo file_get_contents(get_template_directory() . '/images/lines/services_2.svg');
                $project_slider = get_sub_field('slider');
                if ($project_slider) :
                    echo '<div class="project-slider">';
                    foreach ($project_slider as $slide) :
                        echo '<a href="' . get_home_url() . '/portfolio/#project-' . $slide->ID . '" class="d-flex align-items-center">';
                        if( $image = get_field('portfolio_image', $slide->ID) ) :
                            echo wp_get_attachment_image( $image['ID'], 'full' ); 
                        else :
                            echo '<img src="' . get_stylesheet_directory_uri() . '/images/portfolio-placeholder-image.png" width="680" height="430" alt="Portfolio placeholder image">';
                        endif;
                        echo '</a>';
                    endforeach;
                    echo '</div>';
                endif;
                echo '</div>';
            endif;
        endwhile;
            wp_reset_postdata();
        endif;

        echo '</div>';

        if (get_sub_field('layout') === 'half') :
            echo '<div class="col-md-6">';
        elseif (get_sub_field('layout') === 'seven_five') :
            echo '<div class="col-md-5">';
        elseif (get_sub_field('layout') === 'five_seven') :
            echo '<div class="col-md-7">';
        endif;

        if (have_rows('right_side')) : while (have_rows('right_side')) : the_row();
            if (!get_sub_field('choose')) :
                the_sub_field('text');
            else :
                echo '<div class="project-container">';
                echo file_get_contents(get_template_directory() . '/images/lines/services_2.svg');
                
                $project_slider = get_sub_field('slider');
                if ($project_slider) :
                    echo '<div class="project-slider">';
                    foreach ($project_slider as $slide) :
                        echo '<a href="' . get_home_url() . '/portfolio/#project-' . $slide->ID . '" class="d-flex align-items-center">';
                        if( $image = get_field('portfolio_image', $slide->ID) ) :
                            echo wp_get_attachment_image( $image['ID'], 'full' ); 
                        else :
                            echo '<img src="' . get_stylesheet_directory_uri() . '/images/portfolio-placeholder-image.png" width="680" height="430" alt="Portfolio placeholder image">';
                        endif;
                        echo '</a>';
                    endforeach;
                    echo '</div>';
                endif;
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
        if (get_sub_field('slider_image')) :
            echo '<div class="col-lg-6 d-flex testimonial-image-container">';
            if( $image = get_sub_field('slider_image') ) :
                echo wp_get_attachment_image( $image['ID'], 'full', false, ['class' => 'testimonials-img'] ); 
            endif;
            echo '</div>';
        endif;
        echo '</div><!-- End of Page Testimonials -->';
    endif;
endwhile;
    wp_reset_postdata();
endif;
// Additional sections for certain pages
if (is_page('partners')) : ?>
    <div class="partners-section">
        <h2 class="col-12 align-center"><?php _e('Partners', 'libra'); ?></h2>
        <div class="partners-container">
            <?php if (have_rows('our_partners')) : while (have_rows('our_partners')) : the_row();
                echo '<div class="col-md-6">';
                echo '<div class="partner-item">';
                echo '<div class="logo-container d-flex align-items-center justify-content-center">';
                if( $image = get_sub_field('logo') ) :
                    echo wp_get_attachment_image( $image['ID'], 'partner' ); 
                endif;
                echo '</div>';
                echo '<div class="partner-short-info align-center">';
                echo '<h3>' . get_sub_field('name') . '</h3>';
                $url = get_sub_field('url');
                if($url) {
                    echo '<a target="_blank" href="' . $url . '">' . wp_parse_url($url)['host'] . '</a>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
            endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
<?php endif;
