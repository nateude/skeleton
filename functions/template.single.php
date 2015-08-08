<?php

// ------------------------------------------------------
// Functions for pages options
// ------------------------------------------------------


//placement meta options array
function single_option_metabox() {
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_single_template', true);

	$hidefrom = array();//add hidden templates here
	if( !in_array($template_file, $hidefrom)){ // edit the template name
		$screens = array( 'team-member','placements','press-release','jobs','team');
		foreach ( $screens as $screen ) {
			add_meta_box(
				'single_nav_options',
				__( 'Page Sidebar Options', 'sidebar_textdomain' ),
				'single_nav_callback',
				$screen
			);
			add_meta_box(
				'single_cta',
				__( 'Custom Calls to Action', 'sidebar_textdomain' ),
				'single_cta_callback',
				$screen
			);
		}
	}
}

add_action( 'add_meta_boxes', 'single_option_metabox' );


function single_nav_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'single_nav_nonce' );


	$selected = get_post_meta( $post->ID, 'single_cta_type', true );

		echo '<p><label for="single_cta_type">';
		_e( 'Call to Action Type:', 'sidebar_textdomain' );
		echo '</label> ';

		echo '<select id="single_cta_type" name="single_cta_type">';

		$sidebars = array(
			'category' => 'Category Defualt',
			'default' => 'Site Default',
			'custom' => 'Custom',
			'none' => 'Display None'
		);

		foreach ($sidebars as $key => $value) {
			if($selected == $key) {$select = "selected";}else{$select = "";}
			echo '<option value="'.$key.'" '.$select.'>'.$value.'</option>';
		}
		echo '</select></p>';

}
function single_cta_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'single_cta_nonce' );

		echo '<h4>Custom CTA 1</h4>';
		$single_cta_1_title = get_post_meta( $post->ID, 'single_cta_1_title', true );

		echo '<p><label for="single_cta_1_title">';
		_e( 'Title', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="single_cta_1_title" name="single_cta_1_title" value="' . esc_attr( $single_cta_1_title ) . '" size="25" /></p>';

		$single_cta_1_button_text = get_post_meta( $post->ID, 'single_cta_1_button_text', true );
		echo '<p><label for="single_cta_1_button_text">';
		_e( 'Button Text', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="single_cta_1_button_text" name="single_cta_1_button_text" value="' . esc_attr( $single_cta_1_button_text ) . '" size="25" /></p>';

		$single_cta_1_url = get_post_meta( $post->ID, 'single_cta_1_url', true );
		echo '<p><label for="single_cta_1_url">';
		_e( 'URL', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="single_cta_1_url" name="single_cta_1_url" value="' . esc_attr( $single_cta_1_url ) . '" size="25" /></p>';

		$single_cta_1_class = get_post_meta( $post->ID, 'single_cta_1_class', true );
		echo '<p><label for="single_cta_1_class">';
		_e( 'Class', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="single_cta_1_class" name="single_cta_1_class" value="' . esc_attr( $single_cta_1_class ) . '" size="25" /></p>';

		echo '<hr><h4>Custom CTA 2</h4>';
		$single_cta_2_title = get_post_meta( $post->ID, 'single_cta_2_title', true );

		echo '<p><label for="single_cta_2_title">';
		_e( 'Title', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="single_cta_2_title" name="single_cta_2_title" value="' . esc_attr( $single_cta_2_title ) . '" size="25" /></p>';

		$single_cta_2_button_text = get_post_meta( $post->ID, 'single_cta_2_button_text', true );
		echo '<p><label for="single_cta_2_button_text">';
		_e( 'Button Text', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="single_cta_2_button_text" name="single_cta_2_button_text" value="' . esc_attr( $single_cta_2_button_text ) . '" size="25" /></p>';

		$single_cta_2_url = get_post_meta( $post->ID, 'single_cta_2_url', true );
		echo '<p><label for="single_cta_2_url">';
		_e( 'URL', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="single_cta_2_url" name="single_cta_2_url" value="' . esc_attr( $single_cta_2_url ) . '" size="25" /></p>';

		$single_cta_2_class = get_post_meta( $post->ID, 'single_cta_2_class', true );
		echo '<p><label for="single_cta_2_class">';
		_e( 'Class', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="single_cta_2_class" name="single_cta_2_class" value="' . esc_attr( $single_cta_2_class ) . '" size="25" /></p>';
}


function single_option_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}
	if(isset($_POST['post_type']) && 'page' == $_POST['post_type']){if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}}
	else{ if(!current_user_can('edit_post', $post_id ) ) {return;}}

	if (isset( $_POST['single_nav_nonce'] ) ) {
		// if ( ! wp_verify_nonce( $_POST['single_nav_nonce'], 'single_option_metabox' ) ) {return;}

		if (isset( $_POST['single_cta_type'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_type'] );
			update_post_meta( $post_id, 'single_cta_type', $my_data );
		}
	}

	if (isset( $_POST['single_cta_nonce'] ) ) {
		// if (!wp_verify_nonce( $_POST['single_cta_nonce'], 'single_option_metabox' ) ) {return;}

		if (isset( $_POST['single_cta_1_title'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_1_title'] );
			update_post_meta( $post_id, 'single_cta_1_title', $my_data );
		}
		if (isset( $_POST['single_cta_1_button_text'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_1_button_text'] );
			update_post_meta( $post_id, 'single_cta_1_button_text', $my_data );
		}
		if (isset( $_POST['single_cta_1_button_text'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_1_button_text'] );
			update_post_meta( $post_id, 'single_cta_1_button_text', $my_data );
		}
		if (isset( $_POST['single_cta_1_url'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_1_url'] );
			update_post_meta( $post_id, 'single_cta_1_url', $my_data );
		}
		if (isset( $_POST['single_cta_1_class'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_1_class'] );
			update_post_meta( $post_id, 'single_cta_1_class', $my_data );
		}
		if (isset( $_POST['single_cta_2_title'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_2_title'] );
			update_post_meta( $post_id, 'single_cta_2_title', $my_data );
		}
		if (isset( $_POST['single_cta_2_button_text'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_2_button_text'] );
			update_post_meta( $post_id, 'single_cta_2_button_text', $my_data );
		}
		if (isset( $_POST['single_cta_2_button_text'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_2_button_text'] );
			update_post_meta( $post_id, 'single_cta_2_button_text', $my_data );
		}
		if (isset( $_POST['single_cta_2_url'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_2_url'] );
			update_post_meta( $post_id, 'single_cta_2_url', $my_data );
		}
		if (isset( $_POST['single_cta_2_class'] ) ) {
			$my_data = sanitize_text_field( $_POST['single_cta_2_class'] );
			update_post_meta( $post_id, 'single_cta_2_class', $my_data );
		}
	}

}

add_action( 'save_post', 'single_option_save' );