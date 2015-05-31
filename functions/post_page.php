<?php

// ------------------------------------------------------
// Functions for pages options
// ------------------------------------------------------


//placement meta options array
function page_option_metabox() {
	$screens = array( 'page');
	foreach ( $screens as $screen ) {
		add_meta_box(
			'page_option',
			__( 'Page Options', 'page_option_textdomain' ),
			'page_option_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'page_option_metabox' );

function page_option_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'page_option_nonce' );


	$selected = get_post_meta( $post->ID, 'industry_type', true );


		echo '<p><label for="industry_type">';
		_e( 'Select Industry Areas', 'industry_type_textdomain' );
		echo '</label> ';

		echo '<select id="industry_type" name="industry_type">';

		$industry = get_terms( 'industry' );

		foreach ($industry as $key => $value) {
			if($selected == $opt) {$select = "selected";}else{$select = "";}
			echo '<option value="'.$value->slug.'" '.$select.'>'.$value->name.'</option>';
		}
		echo '</select></p>';



	$display_resources = get_post_meta( $post->ID, 'display_resources', true );
		$checked = "";
		if($display_resources == 'display') $checked ='checked="checked"';
		echo '<p><input type="checkbox" id="display_resources" name="display_resources" value="display" '.$checked.' /><label for="display_resources">';
		_e( 'Display Resources', 'client_featured_textdomain' );
		echo '</label></p>';

	$selected = get_post_meta( $post->ID, 'resource_type', true );

		echo '<p><label for="resource_type">';
		_e( 'Select Resource Type', 'resource_type_textdomain' );
		echo '</label> ';

		echo '<select id="resource_type" name="resource_type">';

		$resources = get_terms( 'resoures' );

		foreach ($resources as $key => $value) {
			if($selected == $opt) {$select = "selected";}else{$select = "";}
			echo '<option value="'.$value->slug.'" '.$select.'>'.$value->name.'</option>';
		}
		echo '</select></p>';

	$display_clients = get_post_meta( $post->ID, 'display_clients', true );
		$checked = "";
		if($display_clients == 'display') $checked ='checked="checked"';
		echo '<p><input type="checkbox" id="display_clients" name="display_clients" value="display" '.$checked.' /><label for="display_clients">';
		_e( 'Display Resources', 'client_featured_textdomain' );
		echo '</label></p>';

	$selected = get_post_meta( $post->ID, 'resource_type', true );

		echo '<p><label for="resource_type">';
		_e( 'Select Resource Type', 'resource_type_textdomain' );
		echo '</label> ';

		echo '<select id="resource_type" name="resource_type">';

		$resources = get_terms( 'resoures' );

		foreach ($resources as $key => $value) {
			if($selected == $opt) {$select = "selected";}else{$select = "";}
			echo '<option value="'.$value->slug.'" '.$select.'>'.$value->name.'</option>';
		}
		echo '</select></p>';



	$page_url = get_post_meta( $post->ID, 'page_url', true );


	echo '<p><label for="page_url">';
	_e( 'Pa Url', 'page_url_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="page_url" name="page_url" value="' . esc_attr( $page_url ) . '" size="25" /></p>';

	$page_form = get_post_meta( $post->ID, 'page_form', true );
}

function page_option_save( $post_id ) {
	if ( ! isset( $_POST['page_option_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['page_option_nonce'], 'myplugin_meta_box' ) ) {
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

	if (isset( $_POST['page_url'] ) ) {
		$my_data = sanitize_text_field( $_POST['page_url'] );
		update_post_meta( $post_id, 'page_url', $my_data );
	}
}

add_action( 'save_post', 'page_option_save' );