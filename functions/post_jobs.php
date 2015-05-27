<?php

// ------------------------------------------------------
// Functions for team options
// ------------------------------------------------------

function jobs_post() {
	$labels = array(
		'name' => __( 'Jobs' ),
		'singular_name' => __( 'Job' ),
		'add_new' => __( 'New Job' ),
		'add_new_item' => __( 'Add New Job' ),
		'edit_item' => __( 'Edit Job' ),
		'new_item' => __( 'New Job' ),
		'view_item' => __( 'View Job' ),
		'search_items' => __( 'Search Jobs' ),
		'not_found' =>  __( 'No Jobs Found' ),
		'not_found_in_trash' => __( 'No Jobs found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => 'jobs',
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
	register_post_type( 'jobs', $args );
}
add_action( 'init', 'jobs_post' );


//job meta options array
function jobs_option_metabox() {
	$screens = array( 'jobs');
	foreach ( $screens as $screen ) {
		add_meta_box(
			'jobs_option',
			__( 'Job Info', 'jobs_option_textdomain' ),
			'jobs_option_callback',
			$screen,
			'side',
         	'default'
		);
	}
}
add_action( 'add_meta_boxes', 'jobs_option_metabox' );

function jobs_option_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'jobs_option_nonce' );

	$job_title = get_post_meta( $post->ID, 'job_title', true );
	echo '<p><label for="job_title">';
	_e( 'Title', 'job_title_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="job_title" name="job_title" value="' . esc_attr( $job_title ) . '" size="25" /></p>';

	$job_location = get_post_meta( $post->ID, 'job_location', true );
	echo '<p><label for="job_location">';
	_e( 'Location', 'job_location_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="job_location" name="job_location" value="' . esc_attr( $job_location ) . '" size="25" /></p>';

	$job_type = get_post_meta( $post->ID, 'job_type', true );
	echo '<p><label for="job_type">';
	_e( 'Type', 'job_type_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="job_type" name="job_type" value="' . esc_attr( $job_type ) . '" size="25" /></p>';

	$jobs_form = get_post_meta( $post->ID, 'jobs_form', true );
}

function jobs_option_save( $post_id ) {
	if ( ! isset( $_POST['jobs_option_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['jobs_option_nonce'], 'myplugin_meta_box' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	if (isset( $_POST['job_location'] ) ) {
		$my_data = sanitize_text_field( $_POST['job_location'] );
		update_post_meta( $post_id, 'job_location', $my_data );
	}
	if (isset( $_POST['job_title'] ) ) {
		$my_data = sanitize_text_field( $_POST['job_title'] );
		update_post_meta( $post_id, 'job_title', $my_data );
	}
	if (isset( $_POST['job_type'] ) ) {
		$my_data = sanitize_text_field( $_POST['job_type'] );
		update_post_meta( $post_id, 'job_type', $my_data );
	}
}

add_action( 'save_post', 'jobs_option_save' );