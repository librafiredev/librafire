<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="entry-content">
      <?php
      if(is_page('careers'))  echo "<span class='careers-dec6'>". file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'). "</span>"; 
      ?>
	    <?php get_template_part('template-parts/page/page', 'universal'); ?>
    </section><!-- .entry-content -->

    <footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'libra' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

