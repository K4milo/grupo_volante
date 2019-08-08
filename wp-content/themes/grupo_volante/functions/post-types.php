<?php

// Custom post types creation
function create_posttype() {

	 ////////////////////
	// POST TYPES
	///////////////////

	//Post Type servicios

	register_post_type( 'servicios',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Productos' ),
				'singular_name' => __( 'Producto')
			),
			'rewrite' => array('slug' => 'producto'),
			'supports' => array( 'title', 'thumbnail', 'editor', 'custom-fields','excerpt'),
			'public' => true,
			'hierarchical'        => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post'
		)
	);

	//Post Type Partners

	register_post_type( 'partners',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Partners' ),
				'singular_name' => __( 'Partner')
			),
			'rewrite' => array('slug' => 'partner'),
			'supports' => array( 'title', 'thumbnail'),
			'public' => true,
			'hierarchical'        => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 7,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post'
		)
	);
}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );