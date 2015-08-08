<?php

// ------------------------------------------------------
// Functions for Events
// ------------------------------------------------------

function event_post() {
	$labels = array(
		'name' => __( 'Events' ),
		'singular_name' => __( 'Event' ),
		'add_new' => __( 'New Event' ),
		'add_new_item' => __( 'Add New Event' ),
		'edit_item' => __( 'Edit Event' ),
		'new_item' => __( 'New Event' ),
		'view_item' => __( 'View Event' ),
		'search_items' => __( 'Search Events' ),
		'not_found' =>  __( 'No Events Found' ),
		'not_found_in_trash' => __( 'No Events found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => false,
		'public' => true,
		'hierarchical' => false,
		'exclude_from_search'  => false,
        'menu_icon' => 'dashicons-calendar-alt',
		'supports' => array(
			'title',
			'thumbnail'
		)
	);
	register_post_type( 'events', $args );
}
add_action( 'init', 'event_post' );

function event_option_metabox() {
	$screens = array( 'events');
	foreach ( $screens as $screen ) {
		add_meta_box(
			'event_option',
			__( 'Event Options', 'event_option_textdomain' ),
			'event_option_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'event_option_metabox' );

function event_option_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'event_option_nonce' );

	$event_day = get_post_meta( $post->ID, 'event_day', true );
	echo '<p><label for="event_day">Day</label><input type="text" id="event_day" name="event_day" value="'.esc_attr( $event_day ).'" size="75" /></p>';

	$event_month = get_post_meta( $post->ID, 'event_month', true );
	echo '<p><label for="event_month">Month</label><input type="text" id="event_month" name="event_month" value="'.esc_attr( $event_month ).'" size="75" /></p>';

	$event_text = get_post_meta( $post->ID, 'event_text', true );
	echo '<p><label for="event_text">Text</label><input type="text" id="event_text" name="event_text" value="'.esc_attr( $event_text ).'" size="75" /></p>';

	$event_url = get_post_meta( $post->ID, 'event_url', true );
	echo '<p><label for="event_url">Url</label><input type="text" id="event_url" name="event_url" value="'.esc_attr( $event_url ).'" size="75" /></p>';

}

function event_option_save( $post_id ) {
	if ( ! isset( $_POST['event_option_nonce'] ) ) {return;}
	if ( ! wp_verify_nonce( $_POST['event_option_nonce'], 'myplugin_meta_box' ) ) {return;}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {return;}
	}
	if (isset( $_POST['event_month'] ) ) {
		$my_data = sanitize_text_field( $_POST['event_month'] );
		update_post_meta( $post_id, 'event_month', $my_data );
	}
	if (isset( $_POST['event_text'] ) ) {
		$my_data = sanitize_text_field( $_POST['event_text'] );
		update_post_meta( $post_id, 'event_text', $my_data );
	}
	if (isset( $_POST['event_day'] ) ) {
		$my_data = sanitize_text_field( $_POST['event_day'] );
		update_post_meta( $post_id, 'event_day', $my_data );
	}
	if (isset( $_POST['event_url'] ) ) {
		$my_data = sanitize_text_field( $_POST['event_url'] );
		update_post_meta( $post_id, 'event_url', $my_data );
	}

}
add_action( 'save_post', 'event_option_save' );
