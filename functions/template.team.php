<?php

// ------------------------------------------------------
// Functions for Team options
// ------------------------------------------------------


//placement meta options array
function page_team_option_metabox() {
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);
	if($template_file == 'page-team.php'){
		$screens = array( 'page');
		foreach ( $screens as $screen ) {
			add_meta_box(
				'page_team',
				__( 'Team Options', 'sidebar_textdomain' ),
				'page_team_callback',
				$screen
			);
		}
	}
}

add_action( 'add_meta_boxes', 'page_team_option_metabox' );

function page_team_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'page_team_nonce' );

		$team_roles = get_terms( 'team_roles' );
		$selected = get_post_meta( $post->ID, 'page_team_roles', true );

		echo '<p><label for="page_team_roles">';
		_e( 'Team Role:', 'sidebar_textdomain' );
		echo '</label> ';

		echo '<select id="page_team_roles" name="page_team_roles">';

		foreach ($team_roles as $key => $value) {
			if($value->parent == 0){
				if($selected == $value->slug) {$select = "selected";}else{$select = "";}
				echo '<option value="'.$value->slug.'" '.$select.'>'.$value->name.'</option>';
			}
		}
		echo '</select></p>';
}

function page_team_option_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}
	if(isset($_POST['post_type']) && 'page' == $_POST['post_type']){if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}}
	else{ if(!current_user_can('edit_post', $post_id ) ) {return;}}

	if (isset( $_POST['page_team_nonce'] ) ) {
		// if ( ! wp_verify_nonce( $_POST['page_resources_nonce'], 'team_option_metabox' ) ) {return;}

		if (isset( $_POST['page_team_roles'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_team_roles'] );
			update_post_meta( $post_id, 'page_team_roles', $my_data );
		}
	}
}

add_action( 'save_post', 'page_team_option_save' );