<?php

// ------------------------------------------------------
// Functions for partnerss options
// ------------------------------------------------------

function partner_post() {
	$labels = array(
		'name' => __( 'Partners' ),
		'singular_name' => __( 'Partner' ),
		'add_new' => __( 'New Partner' ),
		'add_new_item' => __( 'Add New Partner' ),
		'edit_item' => __( 'Edit Partner' ),
		'new_item' => __( 'New Partner' ),
		'view_item' => __( 'View Partner' ),
		'search_items' => __( 'Search Partners' ),
		'not_found' =>  __( 'No Partners Found' ),
		'not_found_in_trash' => __( 'No Partnerss found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => 'partners',
		'public' => true,
		'hierarchical' => false,
		'exclude_from_search'  => false,
        'menu_icon' => 'dashicons-groups',
		'supports' => array(
			'title',
			'thumbnail',
		)
	);
	register_post_type( 'partners', $args );
}
add_action( 'init', 'partner_post' );


//partners meta options array
function partners_option_metabox() {
	$screens = array( 'partners');
	foreach ( $screens as $screen ) {
		add_meta_box(
			'partners_option',
			__( 'partners Options', 'partners_option_textdomain' ),
			'partners_option_callback',
			$screen,
			'side',
         	'default'
		);
	}
}
add_action( 'add_meta_boxes', 'partners_option_metabox' );

function partners_option_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'partners_option_nonce' );

	$partners_form = get_post_meta( $post->ID, 'partners_form', true );

	$partners_featured = get_post_meta( $post->ID, 'partners_featured', true );
	$checked = "";
	if($partners_featured == 'featured') $checked ='checked="checked"';
	echo '<p><input type="checkbox" id="partners_featured" name="partners_featured" value="featured" '.$checked.' /><label class="checkbox" for="partners_featured">';
	_e( 'Set As Featured', 'partners_featured_textdomain' );
	echo '</label></p>';
}

function partners_option_save( $post_id ) {
	if ( ! isset( $_POST['partners_option_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['partners_option_nonce'], 'myplugin_meta_box' ) ) {
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

	if( isset( $_POST[ 'partners_featured' ] ) ) {
    	update_post_meta( $post_id, 'partners_featured', 'featured' );
	} else {
	    update_post_meta( $post_id, 'partners_featured', 'false' );
	}
}

add_action( 'save_post', 'partners_option_save' );