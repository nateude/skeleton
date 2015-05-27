<?php

// ------------------------------------------------------
// Functions for press-release options
// ------------------------------------------------------

function clients_post() {
	$labels = array(
		'name' => __( 'Clients' ),
		'singular_name' => __( 'Client' ),
		'add_new' => __( 'New Client' ),
		'add_new_item' => __( 'Add New Client' ),
		'edit_item' => __( 'Edit Client' ),
		'new_item' => __( 'New Client' ),
		'view_item' => __( 'View Client' ),
		'search_items' => __( 'Search Clients' ),
		'not_found' =>  __( 'No Clients Found' ),
		'not_found_in_trash' => __( 'No Clients found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => 'clients',
		'public' => true,
		'hierarchical' => false,
		'exclude_from_search'  => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
		)
	);
	register_post_type( 'clients', $args );
}
add_action( 'init', 'clients_post' );