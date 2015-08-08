<?php

// ------------------------------------------------------
// Functions for Job options
// ------------------------------------------------------


//placement meta options array
function page_job_option_metabox() {
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);
	if($template_file == 'page-jobs.php'){
		$screens = array( 'page');
		foreach ( $screens as $screen ) {
			add_meta_box(
				'page_job',
				__( 'Job Options', 'sidebar_textdomain' ),
				'page_job_callback',
				$screen
			);
		}
	}
}

// add_action( 'add_meta_boxes', 'page_job_option_metabox' );

function page_job_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'page_job_nonce' );

	$job_type = get_terms( 'job_types' );
	$selected = get_post_meta( $post->ID, 'page_job_type', true );

	echo '<p><label for="page_job_type">';
	_e( 'Job Type:', 'sidebar_textdomain' );
	echo '</label> ';

	echo '<select id="page_job_type" name="page_job_type"><option value="all"> All Types </option>';

	foreach ($job_type as $key => $value) {
		if($value->parent == 0){
			if($selected == $value->slug) {$select = "selected";}else{$select = "";}
			echo '<option value="'.$value->slug.'" '.$select.'>'.$value->name.'</option>';
		}
	}
	echo '</select></p>';
}

function page_job_option_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}
	if(isset($_POST['post_type']) && 'page' == $_POST['post_type']){if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}}
	else{ if(!current_user_can('edit_post', $post_id ) ) {return;}}

	if (isset( $_POST['page_job_nonce'] ) ) {
		// if ( ! wp_verify_nonce( $_POST['page_resources_nonce'], 'job_option_metabox' ) ) {return;}

		if (isset( $_POST['page_job_type'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_job_type'] );
			update_post_meta( $post_id, 'page_job_type', $my_data );
		}
	}
}

add_action( 'save_post', 'page_job_option_save' );