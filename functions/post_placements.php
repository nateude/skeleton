<?php

// ------------------------------------------------------
// Functions for placements options
// ------------------------------------------------------

function placements_post() {
	$labels = array(
		'name' => __( 'Placements' ),
		'singular_name' => __( 'Placement' ),
		'add_new' => __( 'New Placement' ),
		'add_new_item' => __( 'Add New Placement' ),
		'edit_item' => __( 'Edit Placement' ),
		'new_item' => __( 'New Placement' ),
		'view_item' => __( 'View Placement' ),
		'search_items' => __( 'Search Placements' ),
		'not_found' =>  __( 'No Placements Found' ),
		'not_found_in_trash' => __( 'No Placements found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => 'placements',
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
	register_post_type( 'placements', $args );
}
add_action( 'init', 'placements_post' );


//placement meta options array
function placement_option_metabox() {
	$screens = array( 'placements');
	foreach ( $screens as $screen ) {
		add_meta_box(
			'placement_option',
			__( 'placement Options', 'placement_option_textdomain' ),
			'placement_option_callback',
			$screen,
			'side',
         	'default'
		);
	}
}
add_action( 'add_meta_boxes', 'placement_option_metabox' );

function placement_option_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'placement_option_nonce' );

	$placement_url = get_post_meta( $post->ID, 'placement_url', true );

	echo '<p><label for="placement_url">';
	_e( 'Placement Url', 'placement_url_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="placement_url" name="placement_url" value="' . esc_attr( $placement_url ) . '" size="25" /></p>';

	$placement_form = get_post_meta( $post->ID, 'placement_form', true );
}

function placement_option_save( $post_id ) {
	if ( ! isset( $_POST['placement_option_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['placement_option_nonce'], 'myplugin_meta_box' ) ) {
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

	if (isset( $_POST['placement_url'] ) ) {
		$my_data = sanitize_text_field( $_POST['placement_url'] );
		update_post_meta( $post_id, 'placement_url', $my_data );
	}
}

add_action( 'save_post', 'placement_option_save' );