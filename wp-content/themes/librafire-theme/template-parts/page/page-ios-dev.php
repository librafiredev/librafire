<?php
/**
 * iOS Dev template
 */
?>

<section id="development"><!-- About Development -->
    <div class="container">
        <div class="row">
			<?php if ( get_field( 'info_content' ) ) : ?>
                <div class="col-12 full-width-content">
					<?php the_field( 'info_content' ); ?>
                </div>
			<?php endif; ?>
        </div>
    </div>
</section><!-- End of About Development -->
<?php if ( get_field( 'expectation_title' ) && get_field( 'expectations_content' ) ) : ?>
    <section id="ios-expectation" class="essential"><!-- Expectation -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <h2><?php the_field( 'expectation_title' ); ?></h2>
                    <a class="portfolio-link text-uppercase"
                       href="<?php echo get_page_link( 9 ) ?>"><?php _e( 'View our portfolio', 'libra' ); ?></a>
                </div>
                <div class="col-lg-8 expectation-container">
					<?php the_field( 'expectations_content' ); ?>
                </div>
            </div>
        </div>
    </section><!-- End of Expectation -->
<?php endif; ?>
<section id="contribution" class="ios-contribution"><!-- Contribution -->
    <div class="container">
        <div class="row">
			<?php
			if ( get_field( 'contribution_text' ) ) :
				echo '<div class="col-12 full-width-content" style="padding-top: 0; padding-bottom: 18px;">';
				the_field( 'contribution_text' );
				echo '</div>';
			endif;
			if ( get_field( 'contribution_title' ) ) :
				echo '<div class="col-12">';
				echo '<h2 class="contribution-title ios-contribution">' . get_field( 'contribution_title' ) . '</h2>';
				echo '</div>';
			endif;
			if ( have_rows( 'contribution_items' ) ) :
				while ( have_rows( 'contribution_items' ) ) : the_row();
					echo '<div class="col-md-6 col-lg-3 contribution-item-container">';
					echo '<div class="contribution-item">';
					echo '<div class="counter-item">';
					if ( count( get_field( 'contribution_items' ) ) < 10 ) :
						echo '<span>0' . get_row_index() . '</span>';
						echo '/0' . count( get_field( 'contribution_items' ) );
					else :
						echo '<span>' . get_row_index() . '</span>';
						echo '/' . count( get_field( 'contribution_items' ) );
					endif;
					echo '</div>';
					the_sub_field( 'text' );
					echo '</div>';
					echo '</div>';
				endwhile;
				wp_reset_postdata();
			endif; ?>
        </div>
    </div>
</section><!-- End of Contribution -->
<section id="testimonials" class="ios-testimonials essential"><!-- Testimonials -->
    <div class="container">
		<?php if ( get_field( 'testimonials_title' ) ) : ?>
            <div class="col-12 full-width-content">
                <h2><?php the_field( 'testimonials_title' ); ?></h2>
            </div>
		<?php endif; ?>
        <div class="row align-items-center no-gutters">
            <div class="col col-md-4 align-right">
                <h1><?php _e( 'Testimonials', 'libra' ); ?></h1>
            </div>
            <div class="col col-md-8 align-left">
				<?php if ( have_rows( 'testimonials_slider' ) ) :
					echo '<div class="testimonials-slider">';
					while ( have_rows( 'testimonials_slider' ) ) : the_row();
						echo '<div>';
						the_sub_field( 'text' );
						echo '</div>';
					endwhile;
					wp_reset_postdata();
					echo '</div>';
				endif; ?>
            </div>
        </div>
    </div>
</section><!-- End of Testimonials -->
<section id="ios-what-client-said"><!-- What Client Said -->
    <div class="container">
        <div class="row">
			<?php if ( get_field( 'not_satisfied' ) ) : ?>
                <div class="col-12 full-width-content">
					<?php the_field( 'not_satisfied' ); ?>
                </div>
			<?php endif;
			if ( get_field( 'important_notice' ) ) : ?>
                <div class="col-12 full-width-content">
                    <div class="dark-box">
						<?php the_field( 'important_notice' ); ?>
                    </div>
                </div>
			<?php endif; ?>
        </div>
    </div>
</section><!-- End of What Client Said -->
<section id="why-us" class="ios-why-us"><!-- Why us -->
    <div class="container">
        <div class="row">
			<?php if ( get_field( 'service_title' ) ) :
				echo '<div class="col-12 full-width-content">';
				echo '<h2 class="why-us-title">' . get_field( 'service_title' ) . '</h2>';
				echo '</div>';
			endif; ?>
        </div>
        <div class="row">
			<?php if ( have_rows( 'service_slider' ) ) :
				echo '<div class="why-us-slider">';
				while ( have_rows( 'service_slider' ) ) : the_row();
					echo '<div class="col">';
					echo '<div class="choose-item" data-equal="choose-boxes">';
					if ( count( get_field( 'service_slider' ) ) < 10 ) :
						echo '<div class="count-slide">';
						echo '<span>0' . get_row_index() . '</span>';
						echo '/0' . count( get_field( 'service_slider' ) );
						echo '</div>';
					else :
						echo '<div class="count-slide">';
						echo '<span>' . get_row_index() . '</span>';
						echo '/' . count( get_field( 'service_slider' ) );
						echo '</div>';
					endif;
					the_sub_field( 'text' );
					echo '</div>';
					echo '</div>';
				endwhile;
				wp_reset_postdata();
				echo '</div>';
			endif; ?>
        </div>
        <div class="row">
			<?php if ( get_field( 'below_text' ) ) :
				echo '<div class="col-12 full-width-content">';
				the_field( 'below_text' );
				echo '</div>';
			endif; ?>
        </div>
    </div>
</section><!-- End of Why Us -->
<section id="ios-benefits"><!-- Benefits -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dark-box">
					<?php if ( get_field( 'benefits_title' ) ) :
						echo '<h2 class="benefits-title">' . get_field( 'benefits_title' ) . '</h2>';
						the_field( 'benefits_content' );
						echo '<div class="full-width-content">';
						the_field( 'beneftis_content_full' );
						echo '</div>';
					endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- End of Benefits -->
<section id="our-advantage"><!-- Our Advantage -->
    <div class="container">
        <div class="row">
			<?php if ( get_field( 'why_us_title' ) ) :
				echo '<div class="col-12 full-width-content">';
				echo '<h2 class="advantage-title">' . get_field( 'why_us_title' ) . '</h2>';
				echo '</div>';
			endif; ?>
        </div>
        <div class="row">
			<?php if ( have_rows( 'why_slider' ) ) :
				while ( have_rows( 'why_slider' ) ) : the_row();
					echo '<div class="col-md-6 advantage-list-item">';
					echo '<div class="advantage-item d-flex align-items-center" data-equal="advantage-boxes">';
					echo '<div>';
					the_sub_field( 'text' );
					echo '</div>';
					echo '</div>';
					echo '</div>';
				endwhile;
				wp_reset_postdata();
				echo '</div>';
			endif; ?>
        </div>
    </div>
</section><!-- End of Our Advantage -->
<section id="working-process" class="ios-process"><!-- Working Process -->
    <div class="container">
        <div class="row">
			<?php if ( get_field( 'process_title' ) ) :
				echo '<div class="col-12 full-width-content">';
				echo '<h2 class="process-title align-center">' . get_field( 'process_title' ) . '</h2>';
				echo '</div>';
			endif;
			if ( have_rows( 'steps' ) ) :
				echo '<div class="steps">';
				while ( have_rows( 'steps' ) ) : the_row();
					if ( get_row_index() % 2 === 0 ) :
						echo '<div class="row flex-row-reverse">';
					else :
						echo '<div class="row">';
					endif;
					echo '<div class="col-md-6">';
					echo '<div class="step-item d-flex align-items-center" data-equal="step-boxes">';
					echo '<div>';
					the_sub_field( 'content' );
					echo '</div>';
					echo '<div class="step-counter d-flex justify-content-center align-items-center">' . get_row_index() . '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				endwhile;
				wp_reset_postdata();
				echo '</div>';
			endif; ?>
        </div>
    </div>
</section><!-- End of Working Process -->
