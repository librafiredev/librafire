<?php
/**
 * About content
 */

$technologies = get_posts([
    'post_type'         => 'technology',
    'posts_per_page'    => -1
]);
?>

<?php if ( get_field( 'about_content' ) ) : ?>
    <section id="about-info"><!-- About Us -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                <?php  echo "<span class='about-dec4'>". file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'). "</span>"; ?>
                <?php  echo "<span class='about-dec5'>". file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'). "</span>"; ?>
					<?php the_field( 'about_content' ); ?>
                </div>
            </div>
        </div>
    </section><!-- End of About Us -->
<?php endif; ?>
<section id="our-team" class="essential"><!-- Our team -->
    <div class="container">
        <div class="top-content">
            <div class="dark-side"></div>
			<?php if ( have_rows( 'our_team' ) ) : while ( have_rows( 'our_team' ) ) :
				the_row(); ?>
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <?php 
                            if( $image = get_sub_field('image') ) :
                                echo wp_get_attachment_image( $image['ID'], 'service-bg' ); 
                            endif;
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <?php echo file_get_contents(get_template_directory() . '/images/lines/our-story.svg'); ?>
						<?php the_sub_field( 'content' ); ?>
                    </div>
                </div>
			<?php endwhile;
				wp_reset_postdata();
			endif; ?>
        </div>
    </div>
</section><!-- End of Our team -->
<?php if(get_sub_field( 'bottom_content' ) !=''): ?>
<section id="our-team-more">
    <div class="container">
	    <?php if ( have_rows( 'our_team' ) ) : while ( have_rows( 'our_team' ) ) :
		    the_row(); ?>
            <div class="row bottom-content">
                <div class="col-12">
				    <?php the_sub_field( 'bottom_content' ); ?>
                </div>
            </div>
	    <?php endwhile;
		    wp_reset_postdata();
	    endif; ?>
    </div>
</section>
<?php endif; ?>
<section id="our-technology" class="essential"><!-- Our technology -->
    <div class="container">
        <div class="row">
			<?php if ( have_rows( 'our_technologies' ) ) : while ( have_rows( 'our_technologies' ) ) :
				the_row(); ?>
                <div class="col-12">
                    <h1><?php the_sub_field( 'main_title' ); ?></h1>
                </div>
                <div class="logo-container row">
					<?php $technologies = get_sub_field( 'technologies' );
					foreach ( $technologies as $technology ) :
                        $post = $technology;
                        setup_postdata($technology);
						echo '<div class="col-md-3 logo-item">';
						echo get_the_post_thumbnail($post, 'thumbnail');
						echo '<h5>' . get_the_title() . '</h5>';
						echo '</div>';
					endforeach; ?>
                </div>
			<?php endwhile;
				wp_reset_postdata();
			endif; ?>
        </div>
    </div>
</section><!-- End of Our technology -->

<?php return; ?>
<section id="our-place"><!-- Our place -->
    <div class="dark-side"></div>
    <div class="container">
        <div class="row align-items-center">
			<?php  while ( have_rows( 'our_location' ) ) :
				the_row(); ?>
                <div class="col-lg-6">
					<?php the_sub_field( 'content' ); ?>
                </div>
                <div class="col-lg-6">
                    <div class="heading">
                        <img src="<?php echo get_sub_field( 'image' )['sizes']['service-bg']; ?>"
                             alt="<?php echo get_sub_field( 'image' )['alt']; ?>"/>
                    </div>
                </div>
			<?php endwhile;
				wp_reset_postdata();
			?>
        </div>
    </div>
</section><!-- End of Our place -->
