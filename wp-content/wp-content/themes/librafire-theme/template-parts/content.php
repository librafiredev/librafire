<?php
/**
 * Template part for displaying posts.
 *
 * @package Starter
 */

$post_id         = get_the_ID();
$post_categories = wp_get_post_categories( $post_id );
$cat_list        = [
	'blog-item',
	'col-lg-4',
    'col-md-6',
    'col-12'
]; ?>

<article data-equal id="post-<?php the_ID(); ?>"

<?php foreach ( $post_categories as $c ) {
	$cat = get_category( $c );
	array_push( $cat_list, $cat->slug );
}
post_class( $cat_list ); ?>">
<a href="<?php the_permalink(); ?>">
	<?php $id = get_the_ID(); ?>

	<figure>
		<?php 
			if( $image = get_field('small_photo', $id) ) :
				echo wp_get_attachment_image( $image['ID'], 'blog-thumb' ); 
			else :
				echo '<img src="' . get_stylesheet_directory_uri() .'/images/post-placeholder-image.png" width="360" height="560" alt="Post placeholder image">';
			endif;
		?>
	</figure>

	<div class="blog-info">
		<h3 class="blog-title"><?php the_title(); ?></h3>
		<p><?php echo wp_html_excerpt(get_the_excerpt($id), 80, '...'); ?></p>

		<div class="blog-dc blog-date-wrapper d-flex align-items-center justify-content-between">
			<h5 class="blog-date"><?php echo get_the_date(get_option('date_format'), $id); ?></h5>
			<span class="blog-read-more">Read more<span class="blog-read-more-arrow"><?php echo file_get_contents(get_template_directory() . "/images/arrow-right-thin.svg"); ?></span></span>
		</div>
	</div>
</a>
</article><!-- #post-## -->
