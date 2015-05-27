<?php

// ------------------------------------------------------
// Add Custom Taxonomies
// ------------------------------------------------------

add_action( 'init', 'industry_taxonomy' );

function industry_taxonomy() {

	$labels = array(
		'name'              => _x( 'Industries', 'taxonomy general name' ),
		'singular_name'     => _x( 'Industry', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Industries' ),
		'all_items'         => __( 'All Industries' ),
		'parent_item'       => __( 'Parent Industry' ),
		'parent_item_colon' => __( 'Parent Industry:' ),
		'edit_item'         => __( 'Edit Industry' ),
		'update_item'       => __( 'Update Industry' ),
		'add_new_item'      => __( 'Add New Industry' ),
		'new_item_name'     => __( 'New Industry Name' ),
		'menu_name'         => __( 'Industries' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'industries' ),
	);
	register_taxonomy( 'industry', array( 'resource', 'clients', 'page' ), $args );
}


add_action( 'init', 'resources_taxonomy' );

function resources_taxonomy() {

	$labels = array(
		'name'              => _x( 'Resource Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Resource Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Resource Types' ),
		'all_items'         => __( 'All Resource Types' ),
		'parent_item'       => __( 'Parent Resource Type' ),
		'parent_item_colon' => __( 'Parent Resource Type:' ),
		'edit_item'         => __( 'Edit Resource Type' ),
		'update_item'       => __( 'Update Resource Type' ),
		'add_new_item'      => __( 'Add New Resource Type' ),
		'new_item_name'     => __( 'New Resource Type Name' ),
		'menu_name'         => __( 'Resource Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'resoures' ),
	);
	register_taxonomy( 'resoures', array( 'resource'), $args );
}