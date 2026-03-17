<?php
/**
 * Services Template
 */
?>

<section id="our-service"><!-- Our Service -->
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'); ?>
    <div class="container-fluid ">
        <div class="row align-items-center">
            <div class="project-container">
                <?php echo file_get_contents(get_template_directory() . '/images/lines/services_1.svg'); ?>
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
            <div class="page-links">
                <?php $pages = new WP_Query();
                $get_children = $pages->query(
                    array(
                        'post_type' => 'page',
                        'posts_per_page' => '-1',
                        'order' => 'ASC',
                        'post_parent' => get_the_ID(),
                    ));
                $children = get_page_children(get_the_ID(), $get_children);
                foreach ($children as $child) : ?>
                    <a class="page-link" href="<?php echo get_the_permalink($child->ID); ?>">
                        <?php echo file_get_contents(get_template_directory() . '/images/lines/services-hover.svg'); ?>
                        <div class="row no-gutters align-items-center">
                            <h2><?php echo get_the_title($child->ID); ?></h2>
                            <div class="arrow-link col">
                               <?php echo file_get_contents(get_template_directory()."/images/arrow-down-strong.svg"); ?>
                            </div>
                        </div>
	                    <?php if ( get_post_meta( $child->ID, 'custom_page_excerpt', true ) ) : ?>
                            <p><?php echo wp_html_excerpt( get_post_meta( $child->ID, 'custom_page_excerpt', true ), 232, '...' ); ?></p>
	                    <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section><!-- End of Our Service -->