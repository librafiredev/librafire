<?php
/**
 * Service inner template
 */
?>

<section id="inner-services"><!-- Service Inner -->

    <div class="container">
		<?php if ( have_posts() ) :
            if ( !empty( get_the_content() ) ):
                echo '<div class="row main-content-row">';
                echo '<div class="col-12 main-content">';
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                wp_reset_postdata();
                echo '</div>';
                echo '</div>';
            endif;
		endif; ?>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); ?>
                <div id="heading" class="d-flex align-items-center justify-content-center">
                    <?php echo file_get_contents(get_template_directory() . '/images/lines/web-design.svg'); ?>
                    <div class="image-holder d-flex align-items-center">
                        <?php 
                            if( $image = get_field('photo') ) :
                                echo wp_get_attachment_image( $image['ID'], 'service-bg' ); 
                            endif;
                        ?>
                    </div>
                    <?php // echo '<h2 class="fadeIn | js-observe">' . get_the_title( get_the_ID() ) . '</h2>'; ?>
                </div>
                <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'); ?>
                <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
            </div>
            <div class="col-lg-6">
                <div class="page-links">
					<?php $pages  = new WP_Query();
					$get_children = $pages->query(
						array(
							'post_type'      => 'page',
							'posts_per_page' => '-1',
							'order'          => 'ASC',
							'post_parent'    => get_the_ID()
						) );
					$children     = get_page_children( get_the_ID(), $get_children );
					foreach ( $children as $child ) : ?>
                        <a href="<?php echo get_the_permalink( $child->ID ); ?>" class="page-link">
                            <div class="row no-gutters align-items-center">
                                <h2><?php echo get_the_title( $child->ID ); ?></h2>
                                <div class="arrow-link col">
                                    <?php echo file_get_contents(get_template_directory() . '/images/arrow-right-solid.svg'); ?>
                                </div>
                            </div>
							<?php if ( get_post_meta( $child->ID, 'custom_page_excerpt', true ) ) : ?>
                                <p><?php echo get_post_meta( $child->ID, 'custom_page_excerpt', true ); ?></p>
							<?php endif; ?>
                        </a>
					<?php endforeach; ?>

                    <?php if ( have_rows('links') ) : ?>
                        <?php while( have_rows('links') ) : the_row(); ?>
                            <?php if( get_sub_field('link') ): ?>
                                <?php $link = get_sub_field('link'); ?>
                                
                                <a href="<?php echo get_permalink( $link->ID); ?>" class="page-link">
                                    <div class="row no-gutters align-items-center">
                                        <h2><?php echo $link->post_title; ?></h2>
                                        <div class="arrow-link col">
                                            <?php echo file_get_contents(get_template_directory() . '/images/arrow-right-solid.svg'); ?>
                                        </div>
                                    </div>
                                    <?php if ( get_post_meta( $link->ID, 'custom_page_excerpt', true ) ) : ?>
                                        <p><?php echo get_post_meta( $link->ID, 'custom_page_excerpt', true ); ?></p>
							        <?php endif; ?>
                                </a>
                            <?php endif; ?> 
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- End of Service Inner -->