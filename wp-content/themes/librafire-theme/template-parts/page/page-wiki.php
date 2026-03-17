<?php
/**
 * Wiki template
 */

$wiki_array = array();
$wiki       = get_posts( array(
	'post_type'      => 'wiki',
	'posts_per_page' => - 1,
	'orderby'        => 'title',
	'order'          => 'ASC'
) );

foreach ( $wiki as $wi ) :
	$wiki_alphabet = substr( $wi->post_title, 0, 1 );

	$wiki_array[ $wiki_alphabet ][] = array(
		'title' => $wi->post_title,
		'link'  => get_permalink( $wi )
	);
endforeach; ?>
<?php foreach ( $wiki_array as $key => $wiki_single ) { ?>
    <div class="single-letter-wrapper col-md-4">
        <h2><?php echo strtoupper( $key ); ?></h2>
        <div class="single-letter-words-wrapper">
            <ul>
				<?php
				foreach ( $wiki_single as $word ) {
					echo "<li class='active'><a href='" . $word['link'] . "'>" . $word['title'] . "</a></li>";
				}
				?>
            </ul>
        </div>
    </div>
	<?php
}
