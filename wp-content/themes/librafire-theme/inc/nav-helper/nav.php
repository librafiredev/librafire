<?php

function nav_helper() {
	if ( is_front_page() ) :
		wp_enqueue_script( 'nav-helper', get_template_directory_uri() . '/inc/nav-helper/nav-helper.js', array( 'jquery' ), '0.1', true );
	endif;
}

add_action( 'wp_enqueue_scripts', 'nav_helper' );