<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Starter
 */

get_header(); ?>

<section id="blog-page">
	<?php echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
	<?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
    <div class="container">
		<?php $cats = get_categories( array( 'post_type' => 'post', 'hide_empty' => true ) ); ?>
        <div class="category-selector d-flex justify-content-end">
            <div class="category-row">
				<?php if ( $cats ) : ?>
                    <select name="select-blog">
                        <option data-count="<?php echo wp_count_posts('post')->publish;  ?>" value="*"><?php _e( 'Categories', 'libra' ); ?></option>
						<?php foreach ( $cats as $cat ) : ?>
                            <option data-count="<?php echo $cat->count; ?>" value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
						<?php endforeach; ?>
                    </select>
				<?php endif; ?>
            </div>
        </div>
        <div class="categories-load">Categories</div>
        <div class="row blog-list">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() ); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

        </div>
        <a class="btn-link" href="#">
            <div class="loading"><?php _e( 'Loading...', 'libra' ); ?></div>
			<?php _e( 'Load More', 'libra' ); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>
