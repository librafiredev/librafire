<?php
/**
 * Android Dev template
 */
?>

<section id="development"><!-- About Development -->
    <div class="container">
        <div class="row">
			<?php if ( get_field( 'info_content' ) ) : ?>
                <div class="col-12 full-width-content">
					<?php the_field( 'info_content' ); ?>
                </div>
			<?php endif;
			echo '<div class="d-flex align-items-center page-testimonials-container"><!-- Page Testimonials -->';
			if ( have_rows( 'testimonial-slider' ) ) :
				echo '<div class="col-md-6">';
				echo '<div class="page-testimonials">';
				while ( have_rows( 'testimonial-slider' ) ) : the_row();
					echo '<div>';
					the_sub_field( 'text' );
					echo '</div>';
				endwhile;
				wp_reset_postdata();
				echo '</div>';
				echo '</div>';
			endif;
			if ( $image = get_field('testimonials_image') ) :
				echo '<div class="col-md-6 d-flex">';
				echo wp_get_attachment_image( $image['ID'], 'full', false, ['class' => 'testimonials-img'] ); 
				echo '</div>';
			endif;
			echo '</div><!-- End of Page Testimonials -->'; ?>
        </div>
    </div>
</section><!-- End of About Development -->
<section id="contribution"><!-- Contribution -->
    <div class="container">
        <div class="row">
			<?php if ( get_field( 'contribution_title' ) ) :
				echo '<div class="col-12">';
				echo '<h2 class="contribution-title align-center">' . get_field( 'contribution_title' ) . '</h2>';
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
			endif;
			if ( get_field( 'contribution_text' ) ) :
				echo '<div class="col-12 full-width-content">';
				the_field( 'contribution_text' );
				echo '</div>';
			endif;
			?>
        </div>
    </div>
</section><!-- End of Contribution -->
<?php if ( get_field( 'expectations' ) ) : ?>
    <section id="expectations" class="d-flex essential"><!-- Expectations -->
        <div class="essential-mask"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 expectation-container">
					<?php the_field( 'expectations' ); ?>
                </div>
            </div>
        </div>
    </section><!-- End of Expectations -->
<?php endif; ?>
<section id="what-client-said"><!-- What Clients said -->
    <div class="container">
        <div class="row align-items-center">
			<?php if ( get_field( 'service_title' ) ) : ?>
                <div class="col-md-6">
					<?php the_field( 'service_title' ); ?>
                </div>
			<?php endif; ?>
			<?php if ( have_rows( 'service_slider' ) ) :
				echo '<div class="col-md-6">';
				echo '<div class="page-testimonials">';
				while ( have_rows( 'service_slider' ) ) : the_row();
					echo '<div>';
					the_sub_field( 'text' );
					echo '</div>';
				endwhile;
				wp_reset_postdata();
				echo '</div>';
				echo '</div>';
			endif;
			if ( get_field( 'not_satisfied' ) ) :
				echo '<div class="col-12 full-width-content">';
				the_field( 'not_satisfied' );
				echo '</div>';
			endif; ?>
        </div>
    </div>
</section><!-- End of What Clients said -->
<section id="benefits" class="dark-mask"><!-- Benefits -->
    <div class="container">
        <div class="row">
			<?php if ( get_field( 'benefits_title' ) ) :
				echo '<div class="col-12 full-width-content">';
				echo '<h2 class="benefits-title align-center">' . get_field( 'benefits_title' ) . '</h2>';
				echo '</div>';
			endif; ?>
        </div>
        <div class="row">
			<?php if ( have_rows( 'benefits_list' ) ) :
				while ( have_rows( 'benefits_list' ) ) : the_row();
					if ( get_row_index() === 4 ) :
						echo '<div class="col-md-4 benefits-list-item" style="margin-left: 16.6667%">';
					else :
						echo '<div class="col-md-4 benefits-list-item">';
					endif;
					echo '<div class="benefits-item align-center">';
					if ( get_sub_field( 'icon' ) === 'decoration' ) :
						echo '<img src="' . get_template_directory_uri() . '/images/special-icons/decoration.png" alt="Decoration" width="48" height="63" />';
                    elseif ( get_sub_field( 'icon' ) === 'people' ) :
						echo '<img src="' . get_template_directory_uri() . '/images/special-icons/people.png" alt="People" width="83" height="47" />';
                    elseif ( get_sub_field( 'icon' ) === 'label' ) :
						echo '<img src="' . get_template_directory_uri() . '/images/special-icons/label.png" alt="label" width="40" height="56" />';
                    elseif ( get_sub_field( 'icon' ) === 'relation' ) :
						echo '<img src="' . get_template_directory_uri() . '/images/special-icons/people_connect.png" alt="Connection" width="70" height="48" />';
                    elseif ( get_sub_field( 'icon' ) === 'support' ) :
						echo '<img src="' . get_template_directory_uri() . '/images/special-icons/support_time.png" alt="Support" width="62" height="62" />';
					endif;
					echo '<div class="benefits-content">';
					echo get_sub_field( 'benefit_content' );
					echo '</div>';
					echo '</div>';
					echo '</div>';
				endwhile;
				wp_reset_postdata();
			endif; ?>
        </div>
        <div class="row">
			<?php if ( get_field( 'main_benefits_text' ) ) :
				echo '<div class="col-12 full-width-content main-benefits-text">';
				echo get_field( 'main_benefits_text' );
				echo '</div>';
			endif; ?>
        </div>
    </div>
</section><!-- End of Benefits -->
<?php if ( get_field( 'why_android_title' ) ) : ?>
	<section id="why-android"><!-- Android Benefits -->
		<div class="container">
			<div class="row">
				<?php if ( get_field( 'why_android_title' ) ) :
					echo '<div class="col-12 full-width-content">';
					echo '<h2 class="why-android-title align-center">' . get_field( 'why_android_title' ) . '</h2>';
					echo '</div>';
				endif; ?>
			</div>
			<div class="row align-items-center">
				<?php if ( get_field( 'left_side' ) ) :
					echo '<div class="col-md-6">';
					echo get_field( 'left_side' );
					echo '</div>';
				endif;
				if ( get_field( 'right_side' ) ) :
					echo '<div class="col-md-6">';
					echo '<div class="dark-bg-mask pull-right d-flex align-items-center">';
					echo '<img src="' . get_field( 'right_side' )['url'] . '" />';
					echo '<a class="portfolio-link" href="' . get_page_link( 9 ) . '">' . __( 'View portfolio', 'libra' ) . '</a>';
					echo '</div>';
					echo '</div>';
				endif;
				?>
			</div>
		</div>
	</section><!-- End of Android Benefits -->
<?php endif; ?>
<section id="why-us"><!-- Why us -->
    <div class="container">
        <div class="row">
			<?php if ( get_field( 'why_us_title' ) ) :
				echo '<div class="col-12 full-width-content">';
				echo '<h2 class="why-us-title">' . get_field( 'why_us_title' ) . '</h2>';
				echo '</div>';
			endif; ?>
        </div>
        <div class="row">
			<?php if ( have_rows( 'why_slider' ) ) :
				echo '<div class="why-us-slider">';
				while ( have_rows( 'why_slider' ) ) : the_row();
					echo '<div class="col-lg-3 col-md-2">';
					echo '<div class="choose-item" data-equal="choose-boxes">';
					if ( count( get_field( 'why_slider' ) ) < 10 ) :
						echo '<div class="count-slide">';
						echo '<span>0' . get_row_index() . '</span>';
						echo '/0' . count( get_field( 'why_slider' ) );
						echo '</div>';
					else :
						echo '<div class="count-slide">';
						echo '<span>' . get_row_index() . '</span>';
						echo '/' . count( get_field( 'why_slider' ) );
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
    </div>
</section><!-- End of Why Us -->
<section id="working-process"><!-- Working Process -->
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
