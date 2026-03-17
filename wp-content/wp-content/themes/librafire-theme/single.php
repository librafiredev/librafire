<?php
/**
 * The template for displaying all single posts.
 *
 * @package Starter
 */

get_header(); ?>

<section id="primary" class="container">
    <div class="row">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
			<?php get_template_part( 'template-parts/post', 'author' ); ?>
		<?php endwhile; // End of the loop. ?>
    </div>
</section><!-- #container -->

<?php get_footer(); ?>
