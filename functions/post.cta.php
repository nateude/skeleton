<?php

// ------------------------------------------------------
// Functions for CTAs
// ------------------------------------------------------

function cta_post() {
	$labels = array(
		'name' => __( 'Calls To Action' ),
		'singular_name' => __( 'Call To Action' ),
		'add_new' => __( 'New Call To Action' ),
		'add_new_item' => __( 'Add New Call To Action' ),
		'edit_item' => __( 'Edit Call To Action' ),
		'new_item' => __( 'New Call To Action' ),
		'view_item' => __( 'View Call To Action' ),
		'search_items' => __( 'Search Calls To Action' ),
		'not_found' =>  __( 'No Calls To Action Found' ),
		'not_found_in_trash' => __( 'No Calls To Action found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
        'menu_position' => 20,
		'has_archive' => false,
		'public' => true,
		'hierarchical' => true,
		'exclude_from_search'  => true,
        'menu_icon' => 'dashicons-star-filled',
		'supports' => array(
			'title'
		)
	);
	register_post_type( 'cta', $args );
}
add_action( 'init', 'cta_post' );

function cta_option_metabox() {
	$screens = array( 'cta');
	foreach ( $screens as $screen ) {
		add_meta_box(
			'cta_option',
			__( 'CTA Options', 'cta_option_textdomain' ),
			'cta_option_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'cta_option_metabox' );

function cta_option_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'cta_option_nonce' );

	$cta_text = get_post_meta( $post->ID, 'cta_text', true );

	echo '<p><label for="cta_text">';
	_e( 'CTA Text', 'cta_text_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="cta_text" name="cta_text" value="' . esc_attr( $cta_text ) . '" size="75" /></p>';

	$cta_url = get_post_meta( $post->ID, 'cta_url', true );

	echo '<p><label for="cta_url">';
	_e( 'CTA Url', 'cta_url_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="cta_url" name="cta_url" value="' . esc_attr( $cta_url ) . '" size="75" /></p>';

	$cta_button_text = get_post_meta( $post->ID, 'cta_button_text', true );

	echo '<p><label for="cta_button_text">';
	_e( 'Button Text', 'cta_button_text_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="cta_button_text" name="cta_button_text" value="' . esc_attr( $cta_button_text ) . '" size="75" /></p>';

	$color_selected = get_post_meta( $post->ID, 'cta_color', true );
	$color_options = array(
		'-- Color -- ',
		'green',
		'blue',
		'yellow'
		);
	echo '<p><label for="cta_color">Select Color</label> ';
	echo '<select id="cta_color" name="cta_color">';
	foreach ($color_options as $opt) {
		if($color_selected == $opt) {$select = "selected";}else{$select = "";}
		echo '<option value="'.$opt.'" '.$select.'>'.$opt.'</option>';
	}
	echo '</select></p>';
	echo '<p><label for="cta_color">Select Size</label> ';

	$size_selected = get_post_meta( $post->ID, 'cta_size', true );
	$size_options = array(
		'-- Size -- ',
		'onethird',
		'onequarter',
		'half',
		'full'
		);
	echo '<select id="cta_size" name="cta_size" >';
	foreach ($size_options as $opt) {
		if($size_selected == $opt) {$select = "selected";}else{$select = "";}
		echo '<option value="'.$opt.'" '.$select.'>'.$opt.'</option>';
	}
	echo '</select></p>';
	echo '<p><label for="cta_color">Select Alignment</label> ';

	$align_selected = get_post_meta( $post->ID, 'cta_align', true );
	$align_options = array(
		'-- Align -- ',
		'left',
		'right',
		'center'
		);

	echo '<select id="cta_align" name="cta_align">';
	foreach ($align_options as $opt) {
		if($align_selected == $opt) {$select = "selected";}else{$select = "";}
		echo '<option value="'.$opt.'" '.$select.'>'.$opt.'</option>';
	}
	echo '</select></p>';


	echo '<hr><h4>Add to Page</h4><p>Add CTA into any page or post by copying the code below and pasting it in at the desired location.</p>';
	echo '<p><code>[cta id="'.$post->ID.'" color="'.$color_selected.'" size="'.$size_selected.'"  align="'.$align_selected.'"]</code></p>';

}

function cta_option_save( $post_id ) {
	if ( ! isset( $_POST['cta_option_nonce'] ) ) {return;}
	if ( ! wp_verify_nonce( $_POST['cta_option_nonce'], 'myplugin_meta_box' ) ) {return;}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {return;}
	}
	if (isset( $_POST['cta_align'] ) ) {
		$my_data = sanitize_text_field( $_POST['cta_align'] );
		update_post_meta( $post_id, 'cta_align', $my_data );
	}
	if (isset( $_POST['cta_size'] ) ) {
		$my_data = sanitize_text_field( $_POST['cta_size'] );
		update_post_meta( $post_id, 'cta_size', $my_data );
	}
	if (isset( $_POST['cta_color'] ) ) {
		$my_data = sanitize_text_field( $_POST['cta_color'] );
		update_post_meta( $post_id, 'cta_color', $my_data );
	}
	if (isset( $_POST['cta_url'] ) ) {
		$my_data = sanitize_text_field( $_POST['cta_url'] );
		update_post_meta( $post_id, 'cta_url', $my_data );
	}
	if (isset( $_POST['cta_button_text'] ) ) {
		$my_data = sanitize_text_field( $_POST['cta_button_text'] );
		update_post_meta( $post_id, 'cta_button_text', $my_data );
	}
	if (isset( $_POST['cta_text'] ) ) {
		$my_data = sanitize_text_field( $_POST['cta_text'] );
		update_post_meta( $post_id, 'cta_text', $my_data );
	}

}
add_action( 'save_post', 'cta_option_save' );


//builds CTA from Custom Post Type
function buildCTA($id,$color,$align,$size,$ic){
	$text = get_post_meta($id, 'cta_text', true);
	$permalink = get_post_meta($id, 'cta_url', true);
	$permatext = get_post_meta($id, 'cta_button_text', true);
	$html = '<div class="cta '.$ic.' cta'.$id.' '.$color.' '.$align.' '.$size.'">';
		$html .= '<span class="text">'.$text.'</span>';
		$html .= '<a class="button" href="'.$permalink.'">'.$permatext.'</a>';
	$html .= '</div>';
	return $html;
}