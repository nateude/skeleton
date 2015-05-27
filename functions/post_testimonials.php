<?php

// ------------------------------------------------------
// Functions for press-release options
// ------------------------------------------------------

function testimonials_post() {
	$labels = array(
		'name' => __( 'Testimonials' ),
		'singular_name' => __( 'Testimonial' ),
		'add_new' => __( 'New Testimonial' ),
		'add_new_item' => __( 'Add New Testimonial' ),
		'edit_item' => __( 'Edit Testimonial' ),
		'new_item' => __( 'New Testimonial' ),
		'view_item' => __( 'View Testimonial' ),
		'search_items' => __( 'Search Testimonials' ),
		'not_found' =>  __( 'No Testimonials Found' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => 'testimonials',
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
	register_post_type( 'testimonials', $args );
}
add_action( 'init', 'testimonials_post' );