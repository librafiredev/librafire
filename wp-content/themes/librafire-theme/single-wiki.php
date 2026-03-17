<?php
/**
 * Template displaying content of single wiki
 */
get_header(); ?>

<div id="primary" class="container">
	<div class="row">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single-wiki' ); ?>


		<?php endwhile; // End of the loop. ?>
	</div>
</div><!-- #container -->

<?php get_footer(); ?>
