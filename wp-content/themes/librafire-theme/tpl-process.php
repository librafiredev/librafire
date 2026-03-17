<?php
/**
 * Template name: Our Process
 */
get_header(); ?>

    <section id="about-process"><!-- About Process -->
        <div class="container">
            <div class="row">
				<?php if ( get_field( 'process_content' ) ) : ?>
                    <div class="col-12 full-width-content">
						<?php the_field( 'process_content' ); ?>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </section><!-- End of About Process -->
<?php if ( get_field( 'quote_title' ) && get_field( 'quote_box_image' ) ) : ?>
    <section id="quote-section" class="essential"><!-- Expectation -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <?php the_field( 'quote_title' ); ?>
                    <a class="portfolio-link text-uppercase"
                       href="<?php echo get_page_link( 15 ) ?>"><?php echo  get_the_title( 15 );?></a>
                </div>
                <div class="col-lg-8 quote-dark-box">
                    <div class="img-holder d-flex">
						<?php 
							if( $image = get_field('quote_box_image') ) :
								echo wp_get_attachment_image( $image['ID'], 'full' ); 
							endif;
						?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End of Expectation -->
<?php endif; ?>
    <section id="working-process" class="ios-process step-process"><!-- Working Process -->
		
        <div class="container">
		<?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
		<?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
		<?php echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); ?>
		<?php echo file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'); ?>
		<?php echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); ?>
		<?php echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); ?>
		<?php echo file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'); ?>
		<?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>

            <div class="row">
				<?php if ( get_field( 'step_title' ) ) :
					echo '<div class="col-12 full-width-content">';
					echo '<h2 class="process-title align-center">' . get_field( 'step_title' ) . '</h2>';
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
						echo '<div class="align-center step-icon">';
						if( $image = get_sub_field('step_icon') ) :
							echo wp_get_attachment_image( $image['ID'], 'full' ); 
						endif;
						echo '</div>';
						the_sub_field( 'step_contetn' );
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

<?php get_footer();
