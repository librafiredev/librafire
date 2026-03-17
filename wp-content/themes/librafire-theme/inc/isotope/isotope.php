<?php

function isotope_reg() {
	if ( is_home() || is_page_template( 'tpl-wiki.php' ) ) :
		wp_enqueue_script( 'isotope-js', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array( 'jquery' ), '3.0.4', true );
		wp_enqueue_script( 'isotope-packery-mode', '//unpkg.com/isotope-packery@2/packery-mode.pkgd.js', array( 'jquery' ), '2.0.0', true );
		wp_enqueue_script( 'isotope-init-js', get_template_directory_uri() . '/inc/isotope/isotope.js', array( 'jquery' ), '1.1.0', true );
		wp_localize_script( 'isotope-init-js', 'site', array(
			'ajax'  => admin_url( 'admin-ajax.php' ),
			'posts' => get_option( 'posts_per_page' ),
			'count' => wp_count_posts()->publish
		) );
	endif;
}

add_action( 'wp_enqueue_scripts', 'isotope_reg' );