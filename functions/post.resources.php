<?php

// ------------------------------------------------------
// Functions for resources options
// ------------------------------------------------------

function resources_post() {
	$labels = array(
		'name' => __( 'Resources' ),
		'singular_name' => __( 'Resource' ),
		'add_new' => __( 'New Resource' ),
		'add_new_item' => __( 'Add New Resource' ),
		'edit_item' => __( 'Edit Resource' ),
		'new_item' => __( 'New Resource' ),
		'view_item' => __( 'View Resource' ),
		'search_items' => __( 'Search Resources' ),
		'not_found' =>  __( 'No Resources Found' ),
		'not_found_in_trash' => __( 'No Resources found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => 'resources',
		'public' => true,
		'hierarchical' => false,
		'exclude_from_search'  => false,
        'menu_icon' => 'dashicons-analytics',
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
		)
	);
	register_post_type( 'resource', $args );
}
add_action( 'init', 'resources_post' );


//resource meta options array
function resource_option_metabox() {
	$screens = array( 'resource');
	foreach ( $screens as $screen ) {
		add_meta_box(
			'resource_option',
			__( 'Resource Options', 'resource_option_textdomain' ),
			'resource_option_callback',
			$screen,
			'side',
         	'default'
		);
	}
}
add_action( 'add_meta_boxes', 'resource_option_metabox' );

function resource_option_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'resource_option_nonce' );

	$resource_url = get_post_meta( $post->ID, 'resource_url', true );

	echo '<p><label for="resource_url">';
	_e( 'Set Resource Url', 'resource_url_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="resource_url" name="resource_url" value="' . esc_attr( $resource_url ) . '" size="25" /></p>';

	$resource_featured = get_post_meta( $post->ID, 'resource_featured', true );
	$checked = "";
	if($resource_featured == 'featured') $checked ='checked="checked"';
	echo '<p><input type="checkbox" id="resource_featured" name="resource_featured" value="featured" '.$checked.' /><label class="checkbox" for="resource_featured">';
	_e( 'Set As Featured', 'resource_featured_textdomain' );
	echo '</label></p>';

}

function resource_option_save( $post_id ) {
	if ( ! isset( $_POST['resource_option_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['resource_option_nonce'], 'myplugin_meta_box' ) ) {
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

	if (isset( $_POST['resource_url'] ) ) {
		$my_data = sanitize_text_field( $_POST['resource_url'] );
		update_post_meta( $post_id, 'resource_url', $my_data );
	}
	if( isset( $_POST[ 'resource_featured' ] ) ) {
    	update_post_meta( $post_id, 'resource_featured', 'featured' );
	} else {
	    update_post_meta( $post_id, 'resource_featured', 'false' );
	}
}

add_action( 'save_post', 'resource_option_save' );