<?php

// ------------------------------------------------------
// Functions for Testomoinals & Options
// ------------------------------------------------------

	// Define Custom Post Type
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
			'has_archive' => false,
			'public' => true,
			'hierarchical' => false,
			'exclude_from_search'  => true,
        	'menu_icon' => 'dashicons-format-chat',
			'supports' => array(
				'title',
				'thumbnail'
			)
		);

		register_post_type( 'testimonials', $args );
	}

	add_action( 'init', 'testimonials_post' );

	// Define Custom Meta Box
	function testimonial_option_metabox() {
		$screens = array( 'testimonials');
		foreach ( $screens as $screen ) {
			add_meta_box(
				'event_option',
				__( 'Testimonial Options', 'testimonial_option_textdomain' ),
				'testimonial_option_callback',
				$screen
			);
		}
	}
	add_action( 'add_meta_boxes', 'testimonial_option_metabox' );

	function testimonial_option_callback( $post ) {
		wp_nonce_field( 'myplugin_meta_box', 'testimonial_option_nonce' );

		$testimonial_name = get_post_meta( $post->ID, 'testimonial_name', true );
		echo '<p><label for="testimonial_name">Name</label><input type="text" id="testimonial_name" name="testimonial_name" value="' . esc_attr( $testimonial_name ) . '" size="75" /></p>';

		$testimonial_title = get_post_meta( $post->ID, 'testimonial_title', true );
		echo '<p><label for="testimonial_title">Title</label><input type="text" id="testimonial_title" name="testimonial_title" value="' . esc_attr( $testimonial_title ) . '" size="75" /></p>';

		$testimonial_company = get_post_meta( $post->ID, 'testimonial_company', true );
		echo '<p><label for="testimonial_company">Company</label><input type="text" id="testimonial_company" name="testimonial_company" value="' . esc_attr( $testimonial_company ) . '" size="75" /></p>';

		$testimonial_headline = get_post_meta( $post->ID, 'testimonial_headline', true );
		echo '<p><label for="testimonial_headline">Headline</label><input type="text" id="testimonial_headline" name="testimonial_headline" value="' . esc_attr( $testimonial_headline ) . '" size="75" /></p>';

		$testimonial_text = get_post_meta( $post->ID, 'testimonial_text', true );
		echo '<p><label for="testimonial_text">Text</label><input type="text" id="testimonial_text" name="testimonial_text" value="' . esc_attr( $testimonial_text ) . '" size="75" /></p>';

		$testimonial_url = get_post_meta( $post->ID, 'testimonial_url', true );
		echo '<p><label for="testimonial_url">Url</label><input type="text" id="testimonial_url" name="testimonial_url" value="' . esc_attr( $testimonial_url ) . '" size="75" /></p>';

	}

	function testimonials_option_save( $post_id ) {
		if ( ! isset( $_POST['testimonial_option_nonce'] ) ) {return;}
		if ( ! wp_verify_nonce( $_POST['testimonial_option_nonce'], 'myplugin_meta_box' ) ) {return;}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}
		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {return;}
		}
		if (isset( $_POST['testimonial_title'] ) ) {
			$my_data = sanitize_text_field( $_POST['testimonial_title'] );
			update_post_meta( $post_id, 'testimonial_title', $my_data );
		}
		if (isset( $_POST['testimonial_text'] ) ) {
			$my_data = sanitize_text_field( $_POST['testimonial_text'] );
			update_post_meta( $post_id, 'testimonial_text', $my_data );
		}
		if (isset( $_POST['testimonial_name'] ) ) {
			$my_data = sanitize_text_field( $_POST['testimonial_name'] );
			update_post_meta( $post_id, 'testimonial_name', $my_data );
		}
		if (isset( $_POST['testimonial_url'] ) ) {
			$my_data = sanitize_text_field( $_POST['testimonial_url'] );
			update_post_meta( $post_id, 'testimonial_url', $my_data );
		}
		if (isset( $_POST['testimonial_company'] ) ) {
			$my_data = sanitize_text_field( $_POST['testimonial_company'] );
			update_post_meta( $post_id, 'testimonial_company', $my_data );
		}
		if (isset( $_POST['testimonial_headline'] ) ) {
			$my_data = sanitize_text_field( $_POST['testimonial_headline'] );
			update_post_meta( $post_id, 'testimonial_headline', $my_data );
		}
	}

	add_action( 'save_post', 'testimonials_option_save' );
