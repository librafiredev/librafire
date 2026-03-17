<?php

function slick_stuff() {
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/inc/slick/slick.css' );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/inc/slick/slick.min.js', array( 'jquery' ), '1.6.0', true );
	wp_enqueue_script( 'slick-init', get_template_directory_uri() . '/inc/slick/slick.js', array( 'jquery' ), '1.6.0', true );
}

add_action( 'wp_enqueue_scripts', 'slick_stuff' );