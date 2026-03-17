<?php

function magnific_stuff() {
	if ( is_page_template( 'tpl-portfolio.php' ) ) :
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/inc/popup/modernizr.custom.js', array(), '2.6.2', false );
		wp_enqueue_style( 'boxgrid-component', get_template_directory_uri() . '/inc/popup/component.css' );
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), '1.8.3', true );
		wp_enqueue_script( 'boxgrid', get_template_directory_uri() . '/inc/popup/boxgrid.js', array( 'jquery' ), 'v1.1.0', true );
		wp_enqueue_script( 'popup-init', get_template_directory_uri() . '/inc/popup/popup.js', array( 'jquery' ), '1.0', true );
	endif;
}

add_action( 'wp_enqueue_scripts', 'magnific_stuff' );