<?php

// ------------------------------------------------------
// Functions for Blog
// ------------------------------------------------------

function blog_post() {
	$labels = array(
		'name' => __( 'Blog' ),
		'singular_name' => __( 'Post' ),
		'add_new' => __( 'New Post' ),
		'add_new_item' => __( 'Add New Post' ),
		'edit_item' => __( 'Edit Post' ),
		'new_item' => __( 'New Post' ),
		'view_item' => __( 'View Posts' ),
		'search_items' => __( 'Search Posts' ),
		'not_found' =>  __( 'No Posts Found' ),
		'not_found_in_trash' => __( 'No Posts found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'menu_position' => 5,
		'has_archive' => 'blog',
		'public' => true,
		'hierarchical' => false,
		'exclude_from_search'  => false,
		'taxonomies' => array('category'),
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'author',
		)
	);
	register_post_type( 'blog', $args );
}
add_action( 'init', 'blog_post' );