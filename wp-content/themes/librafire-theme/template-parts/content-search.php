<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-resoults-section col-md-4' ); ?>>
    <a href="<?php the_permalink(); ?>">
		<?php $id = get_the_ID(); ?>
        <header class="entry-header">
	        <?php echo '<img src="'. get_field( 'small_photo', $id)['sizes']['blog'] .'"/>'; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <h3><?php the_title(); ?></h3>
			<?php echo '<p>' . wp_html_excerpt( get_the_excerpt( $id ), 112, '[...]' ) . '</p>';
			echo '<h5 class="blog-date">' . get_the_date( get_option( 'date_format' ), $id ) . '</h5>';

			the_content( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'libra' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'libra' ),
				'after'  => '</div>',
			) );
			?>
        </div><!-- .entry-content -->
    </a>
</article><!-- #post-## -->

