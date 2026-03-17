<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Starter
 */

get_header(); ?>

<div class="container <?php if(is_page('partners')) echo "partners-decorations"; ?>">
	<?php
	if(is_page('partners')) {
		echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); 
		echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); 
		echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); 
		echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); 
     	echo file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'); 
     	echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg');
		echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg');  
	}

	?>
    <div class="row">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>

		<?php endwhile; // End of the loop. ?>

    </div>
</div><!-- #container -->

<?php get_footer(); ?>
