<?php

// ------------------------------------------------------
// Add Custom Taxonomies
// ------------------------------------------------------

add_action( 'init', 'news_taxonomy' );

function news_taxonomy() {

	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'news_categories' ),
	);
	register_taxonomy( 'news_categories', array('news'), $args );
}


add_action( 'init', 'pagecat_taxonomy' );

function pagecat_taxonomy() {

	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'page_categories' ),
	);
	register_taxonomy( 'page_categories', array('page'), $args );
}

add_action( 'init', 'content_taxonomy' );

function content_taxonomy() {

	$labels = array(
		'name'              => _x( 'Content Tags', 'taxonomy general name' ),
		'singular_name'     => _x( 'Content Tag', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Content Tags' ),
		'all_items'         => __( 'All Content Tags' ),
		'parent_item'       => __( 'Parent Content Tag' ),
		'parent_item_colon' => __( 'Parent Content Tag:' ),
		'edit_item'         => __( 'Edit Content Tag' ),
		'update_item'       => __( 'Update Content Tag' ),
		'add_new_item'      => __( 'Add New Content Tag' ),
		'new_item_name'     => __( 'New Content Tag Name' ),
		'menu_name'         => __( 'Content Tags' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'content_tags' ),
	);
	register_taxonomy( 'content_tags', array( 'resource','page', 'cta'), $args );
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
		'menu_name'         => __( 'Resource Types' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'resource_types' ),
	);
	register_taxonomy( 'resource_types', array( 'resource'), $args );
}


add_action( 'init', 'events_taxonomy' );

function events_taxonomy() {

	$labels = array(
		'name'              => _x( 'Event Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Event Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Event Types' ),
		'all_items'         => __( 'All Event Types' ),
		'parent_item'       => __( 'Parent Event Type' ),
		'parent_item_colon' => __( 'Parent Event Type:' ),
		'edit_item'         => __( 'Edit Event Type' ),
		'update_item'       => __( 'Update Event Type' ),
		'add_new_item'      => __( 'Add New Event Type' ),
		'new_item_name'     => __( 'New Event Type Name' ),
		'menu_name'         => __( 'Event Types' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event_types' ),
	);
	register_taxonomy( 'event_types', array( 'events'), $args );
}


add_action( 'init', 'team_taxonomy' );

function team_taxonomy() {

	$labels = array(
		'name'              => _x( 'Team Roles', 'taxonomy general name' ),
		'singular_name'     => _x( 'Team Role', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Team Roles' ),
		'all_items'         => __( 'All Team Roles' ),
		'parent_item'       => __( 'Parent Team Role' ),
		'parent_item_colon' => __( 'Parent Team Role:' ),
		'edit_item'         => __( 'Edit Team Role' ),
		'update_item'       => __( 'Update Team Role' ),
		'add_new_item'      => __( 'Add New Team Role' ),
		'new_item_name'     => __( 'New Team Role Name' ),
		'menu_name'         => __( 'Team Roles' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'team_roles'),
	);
	register_taxonomy( 'team_roles', array('team'), $args );
}
add_action( 'init', 'team_taxonomy' );

function job_taxonomy() {

	$labels = array(
		'name'              => _x( 'Job Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Job Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Job Types' ),
		'all_items'         => __( 'All Job Types' ),
		'parent_item'       => __( 'Parent Job Type' ),
		'parent_item_colon' => __( 'Parent Job Type:' ),
		'edit_item'         => __( 'Edit Job Type' ),
		'update_item'       => __( 'Update Job Type' ),
		'add_new_item'      => __( 'Add New Job Type' ),
		'new_item_name'     => __( 'New Job Type Name' ),
		'menu_name'         => __( 'Job Types' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'job_types'),
	);
	register_taxonomy( 'job_types', array('jobs'), $args );
}
add_action( 'init', 'job_taxonomy' );