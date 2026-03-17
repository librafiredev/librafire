<?php
/**
 * Single Wiki's content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
		<?php
		if ( have_rows( 'content' ) ) : while ( have_rows( 'content' ) ) : the_row();
			if ( get_row_layout() === 'one_column' ) :
				echo '<div class="col-12 full-width-content"><!-- Full Width content -->';
				if ( ! get_sub_field( 'content_type' ) ) :
					if ( get_sub_field( 'stylize_block' ) === 'essential' ) :
						echo '<div class="essential-dark-block">';
						echo '</div>';
						echo '<div class="row justify-content-center dark-box-content">';
						echo '<div class="col-md-8">';
						the_sub_field( 'text' );
						echo '</div>';
						echo '</div>';
                    elseif ( get_sub_field( 'stylize_block' ) === 'dark' ) :
						echo '<div class="dark-box">';
						echo '<div class="col-12">';
						the_sub_field( 'text' );
						echo '</div>';
						echo '</div>';
					else :
						the_sub_field( 'text' );
					endif;
				else :
					echo '<div class="full-image-centered align-center">';
					echo '<img src="' . get_sub_field( 'image' )['url'] . '"/>';
					if ( get_sub_field( 'link' ) && in_array( 'yes', get_sub_field( 'link' ) ) ) :
						echo '<a class="portfolio-link" href="' . get_sub_field( 'url' )['url'] . '">' . get_sub_field( 'url' )['title'] . '</a>';
					endif;
					echo '</div>';
				endif;
				echo '</div><!-- End of Full Width Content -->';
            elseif ( get_row_layout() === 'two_columns' ) :
				echo '<div class="d-flex align-items-center two-mixed-columns"><!-- Mixed Content -->';
				if ( get_sub_field( 'layout' ) === 'half' ) :
					echo '<div class="col-lg-6">';
                elseif ( get_sub_field( 'layout' ) === 'seven_five' ) :
					echo '<div class="col-lg-7">';
                elseif ( get_sub_field( 'layout' ) === 'five_seven' ) :
					echo '<div class="col-lg-5">';
				endif;

				if ( have_rows( 'left_side' ) ) : while ( have_rows( 'left_side' ) ) : the_row();
					if ( ! get_sub_field( 'choose' ) ) :
						the_sub_field( 'text' );
					else :
						echo '<div class="image-bg-mask d-flex">';
						echo '<div class="dark-bg-mask d-flex justify-content-center align-items-center">';
						if ( get_sub_field( 'image_position' ) && in_array( 'yes', get_sub_field( 'image_position' ) ) ) :
							echo '<img class="outside-pos" src="' . get_sub_field( 'image' )['url'] . '"/>';
						else :
							echo '<img src="' . get_sub_field( 'image' )['url'] . '"/>';
						endif;
						if ( get_sub_field( 'link' ) && in_array( 'yes', get_sub_field( 'link' ) ) ) :
							echo '<a class="portfolio-link" href="' . get_sub_field( 'url' )['url'] . '">' . get_sub_field( 'url' )['title'] . '</a>';
						endif;
						echo '</div>';
						echo '</div>';
					endif;
				endwhile;
					wp_reset_postdata();
				endif;

				echo '</div>';

				if ( get_sub_field( 'layout' ) === 'half' ) :
					echo '<div class="col-lg-6">';
                elseif ( get_sub_field( 'layout' ) === 'seven_five' ) :
					echo '<div class="col-lg-5">';
                elseif ( get_sub_field( 'layout' ) === 'five_seven' ) :
					echo '<div class="col-lg-7">';
				endif;

				if ( have_rows( 'right_side' ) ) : while ( have_rows( 'right_side' ) ) : the_row();
					if ( ! get_sub_field( 'choose' ) ) :
						the_sub_field( 'text' );
					else :
						echo '<div class="image-bg-mask d-flex">';
						echo '<div class="dark-bg-mask d-flex justify-content-center align-items-center">';
						if ( get_sub_field( 'image_position' ) && in_array( 'yes', get_sub_field( 'image_position' ) ) ) :
							echo '<img class="outside-pos" src="' . get_sub_field( 'image' )['url'] . '"/>';
						else :
							echo '<img src="' . get_sub_field( 'image' )['url'] . '"/>';
						endif;
						if ( get_sub_field( 'link' ) && in_array( 'yes', get_sub_field( 'link' ) ) ) :
							echo '<a class="portfolio-link" href="' . get_sub_field( 'url' )['url'] . '">' . get_sub_field( 'url' )['title'] . '</a>';
						endif;
						echo '</div>';
						echo '</div>';
					endif;
				endwhile;
					wp_reset_postdata();
				endif;

				echo '</div>';

				echo '</div><!-- End of Mixed Content -->';
            elseif ( get_row_layout() === 'testimonials' ) :
				echo '<div class="d-flex align-items-center page-testimonials-container"><!-- Page Testimonials -->';
				if ( have_rows( 'slider' ) ) :
					echo '<div class="col-lg-6">';
					echo '<div class="page-testimonials">';
					while ( have_rows( 'slider' ) ) : the_row();
						echo '<div>';
						the_sub_field( 'text' );
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

