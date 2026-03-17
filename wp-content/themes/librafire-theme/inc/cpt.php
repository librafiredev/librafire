<?php
/**
 * CPT init
 */

// Register project CPT
function projects() {
	$labels = array(
		'name'               => __( 'Projects', 'post type general name', 'libra' ),
		'singular_name'      => __( 'project', 'post type singular name', 'libra' ),
		'menu_name'          => __( 'Projects', 'admin menu', 'libra' ),
		'name_admin_bar'     => __( 'project', 'add new on admin bar', 'libra' ),
		'add_new'            => __( 'Add new', 'project', 'libra' ),
		'add_new_item'       => __( 'Add new project', 'libra' ),
		'new_item'           => __( 'New project', 'libra' ),
		'edit_item'          => __( 'Edit project', 'libra' ),
		'view_item'          => __( 'View project', 'libra' ),
		'all_items'          => __( 'All projects', 'libra' ),
		'search_items'       => __( 'Search projects', 'libra' ),
		'parent_item_colon'  => __( 'Parent projects:', 'libra' ),
		'not_found'          => __( 'Not found projects.', 'libra' ),
		'not_found_in_trash' => __( 'Not found project in trash.', 'libra' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Our Projects.', 'libra' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'menu_icon'          => 'dashicons-screenoptions',
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'can_export'         => true,
		'menu_position'      => 22,
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	);

	register_post_type( 'project', $args );
}

add_action( 'init', 'projects' );

// Register wiki CPT
function wiki() {
	$labels = array(
		'name'               => __( 'Wiki\'s', 'post type general name', 'libra' ),
		'singular_name'      => __( 'wiki', 'post type singular name', 'libra' ),
		'menu_name'          => __( 'Wiki\'s', 'admin menu', 'libra' ),
		'name_admin_bar'     => __( 'wiki', 'add new on admin bar', 'libra' ),
		'add_new'            => __( 'Add new', 'wiki', 'libra' ),
		'add_new_item'       => __( 'Add new wiki', 'libra' ),
		'new_item'           => __( 'New wiki', 'libra' ),
		'edit_item'          => __( 'Edit wiki', 'libra' ),
		'view_item'          => __( 'View wiki', 'libra' ),
		'all_items'          => __( 'All wiki\'s', 'libra' ),
		'search_items'       => __( 'Search wiki\'s', 'libra' ),
		'parent_item_colon'  => __( 'Parent wiki\'s:', 'libra' ),
		'not_found'          => __( 'Not found wiki\'s.', 'libra' ),
		'not_found_in_trash' => __( 'Not found wiki in trash.', 'libra' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Our Wiki\'s.', 'libra' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'menu_icon'          => 'dashicons-admin-links',
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'wiki' ),
		'capability_type'    => 'page',
		'has_archive'        => false,
		'can_export'         => true,
		'menu_position'      => 23,
		'supports'           => array( 'title','thumbnail' )
	);

	register_post_type( 'wiki', $args );
}

add_action( 'init', 'wiki' );

function my_rewrite_flush() {
	projects();
	wiki();
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'my_rewrite_flush' );

//Create taxonomy Year for realizations
function types() {
	register_taxonomy(
		'project_category',
		'project',
		array(
			'label'             => __( 'Category', 'libra' ),
			'rewrite'           => false,
			'hierarchical'      => true,
			'show_admin_column' => true,
		)
	);
}

add_action( 'init', 'types' );



// Register technologies CPT
function technologies() {
	$labels = array(
		'name'               => __( 'Technologies', 'post type general name', 'libra' ),
		'singular_name'      => __( 'technology', 'post type singular name', 'libra' ),
		'menu_name'          => __( 'Technologies', 'admin menu', 'libra' ),
		'name_admin_bar'     => __( 'technology', 'add new on admin bar', 'libra' ),
		'add_new'            => __( 'Add new', 'technology', 'libra' ),
		'add_new_item'       => __( 'Add new technology', 'libra' ),
		'new_item'           => __( 'New technology', 'libra' ),
		'edit_item'          => __( 'Edit technology', 'libra' ),
		'view_item'          => __( 'View technology', 'libra' ),
		'all_items'          => __( 'All technologies', 'libra' ),
		'search_items'       => __( 'Search technologies', 'libra' ),
		'parent_item_colon'  => __( 'Parent technologies:', 'libra' ),
		'not_found'          => __( 'Not found technologies.', 'libra' ),
		'not_found_in_trash' => __( 'Not found technology in trash.', 'libra' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Our Technologies.', 'libra' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'menu_icon'          => 'dashicons-screenoptions',
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'technology' ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'can_export'         => true,
		'menu_position'      => 22,
		'supports'           => array( 'title', 'thumbnail')
	);

	register_post_type( 'technology', $args );
}

add_action( 'init', 'technologies');
