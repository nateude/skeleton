<?php

// ------------------------------------------------------
// Functions for team options
// ------------------------------------------------------

function team_post() {
	$labels = array(
		'name' => __( 'Team Members' ),
		'singular_name' => __( 'Team Member' ),
		'add_new' => __( 'New Team Member' ),
		'add_new_item' => __( 'Add New Team Member' ),
		'edit_item' => __( 'Edit Team Member' ),
		'new_item' => __( 'New Team Member' ),
		'view_item' => __( 'View Team Member' ),
		'search_items' => __( 'Search Team Members' ),
		'not_found' =>  __( 'No Team Members Found' ),
		'not_found_in_trash' => __( 'No Team Members found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => 'team',
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
	register_post_type( 'team', $args );
}
add_action( 'init', 'team_post' );


//team meta options array
function team_option_metabox() {
	$screens = array( 'team');
	foreach ( $screens as $screen ) {
		add_meta_box(
			'team_option',
			__( 'Team Member Info', 'team_option_textdomain' ),
			'team_option_callback',
			$screen,
			'side',
         	'default'
		);
	}
}
add_action( 'add_meta_boxes', 'team_option_metabox' );

function team_option_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'team_option_nonce' );

	$team_title = get_post_meta( $post->ID, 'team_title', true );
	echo '<p><label for="team_title">';
	_e( 'Title', 'team_title_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="team_title" name="team_title" value="' . esc_attr( $team_title ) . '" size="25" /></p>';

	$team_email = get_post_meta( $post->ID, 'team_email', true );
	echo '<p><label for="team_email">';
	_e( 'Email', 'team_email_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="team_email" name="team_email" value="' . esc_attr( $team_email ) . '" size="25" /></p>';

	$team_phone = get_post_meta( $post->ID, 'team_phone', true );
	echo '<p><label for="team_phone">';
	_e( 'Phone', 'team_phone_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="team_phone" name="team_phone" value="' . esc_attr( $team_phone ) . '" size="25" /></p>';

	$team_form = get_post_meta( $post->ID, 'team_form', true );
}

function team_option_save( $post_id ) {
	if ( ! isset( $_POST['team_option_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['team_option_nonce'], 'myplugin_meta_box' ) ) {
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

	if (isset( $_POST['team_title'] ) ) {
		$my_data = sanitize_text_field( $_POST['team_title'] );
		update_post_meta( $post_id, 'team_title', $my_data );
	}
	if (isset( $_POST['team_email'] ) ) {
		$my_data = sanitize_text_field( $_POST['team_email'] );
		update_post_meta( $post_id, 'team_email', $my_data );
	}
	if (isset( $_POST['team_phone'] ) ) {
		$my_data = sanitize_text_field( $_POST['team_phone'] );
		update_post_meta( $post_id, 'team_phone', $my_data );
	}
}

add_action( 'save_post', 'team_option_save' );