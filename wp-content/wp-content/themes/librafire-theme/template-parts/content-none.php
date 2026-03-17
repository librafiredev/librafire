<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Starter
 */

?>

<div class="no-results not-found">
    <header class="page-header col-12">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'libra' ); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'libra' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'libra' ); ?></p>
			<?php get_search_form(); ?>

        <?php elseif ( is_category() ) : ?>

            <p><?php esc_html_e( 'Sorry, but this category does not contain any posts.', 'libra' ); ?></p> 

		<?php else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'libra' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
    </div><!-- .page-content -->
</div><!-- .no-results -->
