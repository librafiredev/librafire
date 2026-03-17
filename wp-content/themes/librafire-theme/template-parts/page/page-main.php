<?php
/**
 * Homepage template
 */
if(get_locale() == 'nl_NL'){
    $projects_id = 'projecten';
    $services_id = 'Diensten';
    $about_us_id = 'over-ons';
    $testimonials_id = 'testimonials';
    $blog_id = 'blog';
    $meet_us = 'Ons verhaal';
}else{
    $projects_id = 'projects';
    $services_id = 'services';
    $about_us_id = 'about-us';
    $testimonials_id = 'testimonials';
    $blog_id = 'blog';
    $meet_us = 'Meet us';
}
?>

<section id="projects" data-slug="<?php echo $projects_id; ?>"><!-- Projects -->
    <div class="container">
        <div class="row align-items-center">
            <?php if (get_field('project_content')) : ?>
                <div class="col col-lg-5">
                    <?php the_field('project_content'); ?>
                    <a class="btn-link"
                       href="<?php echo get_page_uri(9) ?>"><?php _e('View portfolio', 'libra'); ?></a>
                </div>
            <?php endif; ?>
            <div class="col col-lg-7 project-container">
            <?php echo file_get_contents(get_template_directory() . '/images/lines/portfolio.svg'); ?>
                <div class="project-mask">
                    <?php $project_slider = get_field('slides');

                    if ($project_slider) :
                        echo '<div class="project-slider">';
                        foreach ($project_slider as $slide) :
                            echo '<div>';
                            echo '<a class="d-flex align-items-center" href="' . get_home_url() . '/portfolio/#project-' . $slide->ID . '">';
                            if( $image = get_field('portfolio_image', $slide->ID) ) :
                                echo wp_get_attachment_image( $image['ID'], 'full' );
                            else :
                                echo '<img src="' . get_stylesheet_directory_uri() . '/images/portfolio-placeholder-image.png" width="680" height="430" alt="Portfolio placeholder image">';
                            endif;
                            echo '</a>';
                            echo '</div>';
                        endforeach;
                        echo '</div>';
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- End of Projects -->
<section id="services" class="dark-mask" data-slug="<?php echo $services_id; ?>"><!-- Services -->
    <div class="service-container d-flex">
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'); ?>
        <div class="dark-side">
            <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec1.svg'); ?>
            <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec2.svg'); ?>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div id="heading" class="d-flex align-items-center justify-content-center">
                <?php echo file_get_contents(get_template_directory() . '/images/lines/services.svg'); ?>
                    <div class="image-holder d-flex align-items-center">
                        <?php 
                            if( $image = get_field('section_service_image') ) :
                                echo wp_get_attachment_image( $image['ID'], 'service-bg' ); 
                            endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php $pages = get_field('service_pages');
                foreach ($pages as $page) : ?>
                    <a class="project-item" href="<?php echo get_the_permalink($page->ID); ?>">
                        <?php echo file_get_contents(get_template_directory() . '/images/lines/project-item.svg'); ?>
                        <div class="row no-gutters align-items-center">
                            <h2><?php echo get_the_title($page->ID); ?></h2>
                            <div class="col">
                                <img src="<?php echo get_template_directory_uri() . '/images/arrow-down-strong.svg' ?>"
                                     alt="Service Link"/>
                            </div>
                        </div>
                        <?php if ( wp_html_excerpt(get_post_meta($page->ID, 'custom_page_excerpt', true), 232, '...') != '' ) : ?>
                            <p><?php echo wp_html_excerpt(get_post_meta($page->ID, 'custom_page_excerpt', true), 232, '...'); ?></p>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section><!-- End of Services -->
<section id="about-us" data-slug="<?php echo $about_us_id; ?>" ><!-- About Us -->
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); ?>
    <div class="container-fluid">
        <div class="row align-items-center">
            <?php if (get_field('about_content')) : ?>
                <div class="col-xl-7 col-lg-5 about-content">
                    <?php the_field('about_content'); ?>
                    <a class="btn-link" href="<?php echo get_page_uri(7) ?>"><?php echo $meet_us; ?></a>
                </div>
            <?php endif;
            if (get_field('section_image')) : ?>
                <div class="col-xl-5 col-lg-7 about-image">
                    <div class="img-wrap">
                        <div class="section-block">
                            <div class="line-wrapper">
                                <div class="section-mask">
                                    <?php echo file_get_contents(get_template_directory() . '/images/lines/about-us.svg'); ?>
                                </div>
                            </div>
                        </div>
                        <?php 
                            if( $image = get_field('section_image') ) :
                                echo wp_get_attachment_image( $image['ID'], 'full' ); 
                            endif;
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section><!-- End of About Us -->
<section id="testimonials" class="essential" data-slug="<?php echo $testimonials_id; ?>"><!-- Testimonials -->
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec1.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec2.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec7.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec8.svg'); ?>
    <div class="container">
        <div class="row align-items-center no-gutters">
            <div class="col col-md-4 align-right">
                <h2><?php _e('Testimonials', 'libra'); ?></h2>
            </div>
            <div class="col col-md-8 align-left">
                <?php echo file_get_contents(get_template_directory() . '/images/lines/testimonials.svg'); ?>
                <?php if (have_rows('testimonial_slider')) :
                    echo '<div class="testimonials-slider">';
                    while (have_rows('testimonial_slider')) : the_row();
                        echo '<div>';
                        the_sub_field('slide_content');
                        echo '<h5>' . get_sub_field('slide_title') . '</h5>';
                        echo '</div>';
                    endwhile;
                    wp_reset_postdata();
                    echo '</div>';
                endif; ?>
            </div>
        </div>
    </div>
</section><!-- End of Testimonials -->
<section id="blog" data-slug="<?php echo $blog_id; ?>"><!-- Blog -->
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); ?>

    <div class="container">
        <div class="row no-gutters">
            <h2><?php _e('Our Blog', 'libra'); ?></h2>
            <?php $blogs = get_field('blogs');
            if ($blogs) :
                echo '<div class="blog-slider col-md-12">';
                foreach ($blogs as $blog) :
                    echo '<div>';
                    echo '<a class="post-item" href="' . get_the_permalink($blog->ID) . '" data-equal="post-boxes">';
                    echo '<figure>';
                    if( $image = get_field('small_photo', $blog->ID) ) :
                        echo wp_get_attachment_image( $image['ID'], 'blog-thumb' ); 
                    else :
                        echo '<img src="' . get_stylesheet_directory_uri() .'/images/post-placeholder-image.png" width="360" height="560" alt="Post placeholder image">';
                    endif;
                    echo '</figure>';
                    echo '<div class="blog-info">';
                    echo '<h3 class="blog-title">' . get_the_title($blog->ID) . '</h3>';
                    echo '<p>' . wp_html_excerpt(get_the_excerpt($blog->ID), 80, '...') . '</p>';
                    echo '<div class="blog-dc blog-date-wrapper d-flex align-items-center justify-content-between">';
                    echo '<h4 class="blog-date bbb">' . get_the_date(get_option('date_format'), $blog->ID) . '</h4>';
                    echo '<span class="blog-read-more">Read more<span class="blog-read-more-arrow">' .  file_get_contents(get_template_directory() . "/images/arrow-right-thin.svg") . '</span></span>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                endforeach;
                echo '</div>';
            endif; ?>
        </div>
    </div>
</section><!-- End of Blog -->