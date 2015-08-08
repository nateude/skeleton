<?php

// ------------------------------------------------------
// Functions for press-release options
// ------------------------------------------------------

function press_post() {
	$labels = array(
		'name' => __( 'Press Releases' ),
		'singular_name' => __( 'Press Release' ),
		'add_new' => __( 'New Press Release' ),
		'add_new_item' => __( 'Add New Press Release' ),
		'edit_item' => __( 'Edit Press Release' ),
		'new_item' => __( 'New Press Release' ),
		'view_item' => __( 'View Press Release' ),
		'search_items' => __( 'Search Press Releases' ),
		'not_found' =>  __( 'No Press Releases Found' ),
		'not_found_in_trash' => __( 'No Press Releases found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => 'press-releases',
		'public' => true,
		'hierarchical' => false,
		'exclude_from_search'  => false,
        'menu_icon' => 'dashicons-media-text',
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail'
		)
	);
	register_post_type( 'press-release', $args );
}
add_action( 'init', 'press_post' );