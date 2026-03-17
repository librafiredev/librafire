<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Starter
 */

get_header(); ?>


<section class="error-404 not-found">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
				<?php the_field( 'error_page_text', 'option' ); ?>

                <a class="btn-link" href="<?php echo home_url(); ?>"><?php _e( 'Back to home', 'libra' ); ?></a>
            </div>
            <div class="col-md-8">
                <img src="<?php echo get_template_directory_uri() ?>/images/404.png" alt="Page Not Found" width="553" height="289" />
            </div>
        </div>
    </div><!-- #primary -->
</section><!-- .error-404 -->

<?php get_footer(); ?>
