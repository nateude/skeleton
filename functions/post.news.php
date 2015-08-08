<?php

// ------------------------------------------------------
// Functions for News
// ------------------------------------------------------

function news_post() {
	$labels = array(
		'name' => __( 'News Items' ),
		'singular_name' => __( 'New News Item' ),
		'add_new' => __( 'New News Item' ),
		'add_new_item' => __( 'Add New News Item' ),
		'edit_item' => __( 'Edit News Item' ),
		'new_item' => __( 'New News Item' ),
		'view_item' => __( 'View News Items' ),
		'search_items' => __( 'Search New Items' ),
		'not_found' =>  __( 'No News Items Found' ),
		'not_found_in_trash' => __( 'No News Items found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => 'news',
		'public' => true,
		'hierarchical' => false,
		'exclude_from_search'  => false,
		'taxonomies' => array('news_categories'),
        'menu_icon' => 'dashicons-welcome-widgets-menus',
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'author',
		)
	);
	register_post_type( 'news', $args );
}
add_action( 'init', 'news_post' );