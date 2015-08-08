<?php

// ------------------------------------------------------
// Functions for pages options
// ------------------------------------------------------


//placement meta options array
function page_option_metabox() {
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);

	$hidefrom = array('index.php','front-page.php','page-newsroom.php','page-resources.php','page-contact.php','page-events.php','page-grid.php','page-html.php');
	if( !in_array($template_file, $hidefrom)){ // edit the template name
		$screens = array( 'page');
		foreach ( $screens as $screen ) {
			add_meta_box(
				'page_nav_options',
				__( 'Page Sidebar Options', 'sidebar_textdomain' ),
				'page_nav_callback',
				$screen
			);
			add_meta_box(
				'page_cta',
				__( 'Custom Calls to Action', 'sidebar_textdomain' ),
				'page_cta_callback',
				$screen
			);
			if($template_file == "page-resource.php"){
				add_meta_box(
					'page_resources',
					__( 'Resouce Options', 'sidebar_textdomain' ),
					'page_resources_callback',
					$screen
				);
			}
		}
	}

	$archives = array("page-list.php","page-grid.php","page-grid-fullwidth.php");
	if(in_array($template_file, $archives)){
		$screens = array( 'page');
		foreach ( $screens as $screen ) {
			add_meta_box(
				'page_list',
				__( 'Archive Options', 'sidebar_textdomain' ),
				'page_list_callback',
				$screen
			);
		}
	}

	if($template_file == 'page-html.php'){
		$screens = array( 'page');
		foreach ( $screens as $screen ) {
			add_meta_box(
				'page_html_options',
				__( 'Sidebar HTML Field', 'sidebar_textdomain' ),
				'page_html_callback',
				$screen
			);
		}
	}
	if($template_file == 'page-contact.php'){
		$screens = array( 'page');
		foreach ( $screens as $screen ) {
			add_meta_box(
				'page_contact_options',
				__( 'Contact Page Options', 'sidebar_textdomain' ),
				'page_contact_callback',
				$screen,
				'side'
			);
		}
	}
}

add_action( 'add_meta_boxes', 'page_option_metabox' );


function page_nav_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'page_nav_nonce' );

	$selected = get_post_meta( $post->ID, 'page_catnav_type', true );

		echo '<p><label for="page_catnav_type">';
		_e( 'Category Nav Type:', 'sidebar_textdomain' );
		echo '</label> ';

		echo '<select id="page_catnav_type" name="page_catnav_type">';

		$sidebars = array(
			'category' => 'Category Default',
			'default' => 'Global Default ',
			'none' => "Display None"
		);

		foreach ($sidebars as $key => $value) {
			if($selected == $key) {$select = "selected";}else{$select = "";}
			echo '<option value="'.$key.'" '.$select.'>'.$value.'</option>';
		}
		echo '</select></p>';

	$selected = get_post_meta( $post->ID, 'page_cta_type', true );

		echo '<p><label for="page_cta_type">';
		_e( 'Call to Action Type:', 'sidebar_textdomain' );
		echo '</label> ';

		echo '<select id="page_cta_type" name="page_cta_type">';

		$sidebars = array(
			'category' => 'Category Default',
			'tagged' => 'Industry Tags',
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
function page_cta_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'page_cta_nonce' );

		echo '<h4>Custom CTA 1</h4>';
		$page_cta_1_title = get_post_meta( $post->ID, 'page_cta_1_title', true );

		echo '<p><label for="page_cta_1_title">';
		_e( 'Title', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_cta_1_title" name="page_cta_1_title" value="' . esc_attr( $page_cta_1_title ) . '" size="25" /></p>';

		$page_cta_1_button_text = get_post_meta( $post->ID, 'page_cta_1_button_text', true );
		echo '<p><label for="page_cta_1_button_text">';
		_e( 'Button Text', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_cta_1_button_text" name="page_cta_1_button_text" value="' . esc_attr( $page_cta_1_button_text ) . '" size="25" /></p>';

		$page_cta_1_url = get_post_meta( $post->ID, 'page_cta_1_url', true );
		echo '<p><label for="page_cta_1_url">';
		_e( 'URL', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_cta_1_url" name="page_cta_1_url" value="' . esc_attr( $page_cta_1_url ) . '" size="25" /></p>';

		$page_cta_1_class = get_post_meta( $post->ID, 'page_cta_1_class', true );
		echo '<p><label for="page_cta_1_class">';
		_e( 'Class', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_cta_1_class" name="page_cta_1_class" value="' . esc_attr( $page_cta_1_class ) . '" size="25" /></p>';

		$selected = get_post_meta( $post->ID, 'page_cta_1_target', true );

		echo '<p><label for="page_cta_1_target">';
		_e( 'Link Target:', 'sidebar_textdomain' );
		echo '</label> ';

		echo '<select id="page_cta_1_target" name="page_cta_1_target">';

		$options = array(
			'' => 'Default',
			'_blank' => 'New Window'
		);

		foreach ($options as $key => $value) {
			if($selected == $key) {$select = "selected";}else{$select = "";}
			echo '<option value="'.$key.'" '.$select.'>'.$value.'</option>';
		}
		echo '</select></p>';


		echo '<hr><h4>Custom CTA 2</h4>';
		$page_cta_2_title = get_post_meta( $post->ID, 'page_cta_2_title', true );

		echo '<p><label for="page_cta_2_title">';
		_e( 'Title', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_cta_2_title" name="page_cta_2_title" value="' . esc_attr( $page_cta_2_title ) . '" size="25" /></p>';

		$page_cta_2_button_text = get_post_meta( $post->ID, 'page_cta_2_button_text', true );
		echo '<p><label for="page_cta_2_button_text">';
		_e( 'Button Text', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_cta_2_button_text" name="page_cta_2_button_text" value="' . esc_attr( $page_cta_2_button_text ) . '" size="25" /></p>';

		$page_cta_2_url = get_post_meta( $post->ID, 'page_cta_2_url', true );
		echo '<p><label for="page_cta_2_url">';
		_e( 'URL', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_cta_2_url" name="page_cta_2_url" value="' . esc_attr( $page_cta_2_url ) . '" size="25" /></p>';

		$page_cta_2_class = get_post_meta( $post->ID, 'page_cta_2_class', true );
		echo '<p><label for="page_cta_2_class">';
		_e( 'Class', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_cta_2_class" name="page_cta_2_class" value="' . esc_attr( $page_cta_2_class ) . '" size="25" /></p>';

		$selected = get_post_meta( $post->ID, 'page_cta_2_target', true );

		echo '<p><label for="page_cta_2_target">';
		_e( 'Link Target:', 'sidebar_textdomain' );
		echo '</label> ';

		echo '<select id="page_cta_2_target" name="page_cta_2_target">';

		$options = array(
			'' => 'Default',
			'_blank' => 'New Window'
		);

		foreach ($options as $key => $value) {
			if($selected == $key) {$select = "selected";}else{$select = "";}
			echo '<option value="'.$key.'" '.$select.'>'.$value.'</option>';
		}
		echo '</select></p>';
}

function page_resources_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'page_resources_nonce' );

		$selected = get_post_meta( $post->ID, 'industry_type', true );

		echo '<p><label for="page_resources_tag">';
		_e( 'Content Tags', 'sidebar_textdomain' );
		echo '</label> ';

		echo '<select id="page_resources_tag" name="page_resources_tag">';

		$content_tags = get_terms( 'resource_types' );

		foreach ($content_tags as $key => $value) {
			if($selected == $value->slug) {$select = "selected";}else{$select = "";}
			echo '<option value="'.$value->slug.'" '.$select.'>'.$value->name.'</option>';
		}
		echo '</select></p>';

		$page_resource_button_text = get_post_meta( $post->ID, 'page_resource_button_text', true );
		echo '<p><label for="page_resource_button_text">';
		_e( 'Button Text', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_resource_button_text" name="page_resource_button_text" value="' . esc_attr( $page_resource_button_text ) . '" size="25" /></p>';


		$page_resource_button_url = get_post_meta( $post->ID, 'page_resource_button_url', true );
		echo '<p><label for="page_resource_button_url">';
		_e( 'Button URL', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_resource_button_url" name="page_resource_button_url" value="' . esc_attr( $page_resource_button_url ) . '" size="25" /></p>';
}
function page_list_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'page_list_nonce' );

		$list_type = get_post_meta( $post->ID, 'page_list_type', true );

		echo '<p><label for="page_list_type">';
		_e( 'Archive Type', 'sidebar_textdomain' );
		echo '</label> ';

		echo '<select id="page_list_type" name="page_list_type">';

		$options = array(
			'resource' => "Resources",
			'team'=> 'Team Members',
			'placements' => 'Placements',
			'press-release' => "Press Releases",
			'testimonials' => "Testimonials",
			'jobs' => "Jobs",
			'events' => "Events"
		);

		foreach ($options as $key => $value) {
			if($list_type == $key) {$select = "selected";}else{$select = "";}
			echo '<option value="'.$key.'" '.$select.'>'.$value.'</option>';
		}
		echo '</select></p>';

		if($list_type != false){

			switch ($list_type) {
				case 'resource': $type = "resource_types"; break;
				case 'team': $type = "team_roles"; break;
				case 'events': $type = "event_types"; break;
			}
			$selected = get_post_meta( $post->ID, 'page_list_tag', true );

			echo '<p><label for="page_list_tag">';
			_e( 'Tag Type', 'sidebar_textdomain' );
			echo '</label> ';

			echo '<select id="page_list_tag" name="page_list_tag"><option value="false">-- None --</option>';

			$content_tags = get_terms( $type, array('hide_empty' => 0) );

			foreach ($content_tags as $key => $value) {
				if($selected == $value->slug) {$select = "selected";}else{$select = "";}
				echo '<option value="'.$value->slug.'" '.$select.'>'.$value->name.'</option>';
			}
			echo '</select></p>';
		}

		$page_list_ppp = get_post_meta( $post->ID, 'page_list_ppp', true );
		echo '<p><label for="page_list_ppp">';
		_e( 'Posts Per Page', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_list_ppp" name="page_list_ppp" value="' . esc_attr( $page_list_ppp ) . '" size="25" /><span class="hint">Set to -1 to disable pagination</span></p>';

		$page_list_button = get_post_meta( $post->ID, 'page_list_button', true );
		echo '<p><label for="page_list_button">';
		_e( 'Read More Label', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_list_button" name="page_list_button" value="' . esc_attr( $page_list_button ) . '" size="25" /></p>';

		$page_list_none = get_post_meta( $post->ID, 'page_list_none', true );
		echo '<p><label for="page_list_none">';
		_e( 'If No Posts:', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_list_none" name="page_list_none" value="' . esc_attr( $page_list_none ) . '" size="75" /></p>';

		$page_list_aftertext = get_post_meta( $post->ID, 'page_list_aftertext', true );
		echo '<p><label for="page_list_aftertext">';
		_e( 'Text After (HTML)', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<textarea type="text" id="page_list_aftertext" name="page_list_aftertext"  rows="5" cols="70">'.$page_list_aftertext.'</textarea></p>';


}
function page_contact_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'page_contact_nonce' );

		$page_contact_form = get_post_meta( $post->ID, 'page_contact_form', true );
		echo '<p><label for="page_contact_form">';
		_e( 'Contact Form ShortCode', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="page_contact_form" name="page_contact_form" value="' . esc_attr( $page_contact_form ) . '" size="25" /></p>';
}
function page_html_callback( $post ) {
	wp_nonce_field( 'myplugin_meta_box', 'page_html_nonce' );

		$page_html_script = get_post_meta( $post->ID, 'page_html_script', true );
		echo '<p><label for="page_html_script">';
		_e( 'Sidebar HTML', 'sidebar_textdomain' );
		echo '</label> ';
		echo '<textarea type="text" id="page_html_script" name="page_html_script" rows="5" cols="70">'.esc_attr($page_html_script).'</textarea>';
}

function page_option_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}
	if(isset($_POST['post_type']) && 'page' == $_POST['post_type']){if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}}
	else{ if(!current_user_can('edit_post', $post_id ) ) {return;}}

	if (isset( $_POST['page_nav_nonce'] ) ) {
		// if ( ! wp_verify_nonce( $_POST['page_nav_nonce'], 'page_option_metabox' ) ) {return;}

		if (isset( $_POST['page_catnav_type'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_catnav_type'] );
			update_post_meta( $post_id, 'page_catnav_type', $my_data );
		}
		if (isset( $_POST['page_cta_type'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_type'] );
			update_post_meta( $post_id, 'page_cta_type', $my_data );
		}
	}

	if (isset( $_POST['page_cta_nonce'] ) ) {
		// if (!wp_verify_nonce( $_POST['page_cta_nonce'], 'page_option_metabox' ) ) {return;}


		if (isset( $_POST['page_cta_1_title'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_1_title'] );
			update_post_meta( $post_id, 'page_cta_1_title', $my_data );
		}
		if (isset( $_POST['page_cta_1_button_text'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_1_button_text'] );
			update_post_meta( $post_id, 'page_cta_1_button_text', $my_data );
		}
		if (isset( $_POST['page_cta_1_button_text'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_1_button_text'] );
			update_post_meta( $post_id, 'page_cta_1_button_text', $my_data );
		}
		if (isset( $_POST['page_cta_1_url'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_1_url'] );
			update_post_meta( $post_id, 'page_cta_1_url', $my_data );
		}
		if (isset( $_POST['page_cta_1_class'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_1_class'] );
			update_post_meta( $post_id, 'page_cta_1_class', $my_data );
		}
		if (isset( $_POST['page_cta_1_target'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_1_target'] );
			update_post_meta( $post_id, 'page_cta_1_target', $my_data );
		}
		if (isset( $_POST['page_cta_2_title'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_2_title'] );
			update_post_meta( $post_id, 'page_cta_2_title', $my_data );
		}
		if (isset( $_POST['page_cta_2_button_text'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_2_button_text'] );
			update_post_meta( $post_id, 'page_cta_2_button_text', $my_data );
		}
		if (isset( $_POST['page_cta_2_button_text'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_2_button_text'] );
			update_post_meta( $post_id, 'page_cta_2_button_text', $my_data );
		}
		if (isset( $_POST['page_cta_2_url'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_2_url'] );
			update_post_meta( $post_id, 'page_cta_2_url', $my_data );
		}
		if (isset( $_POST['page_cta_2_class'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_2_class'] );
			update_post_meta( $post_id, 'page_cta_2_class', $my_data );
		}
		if (isset( $_POST['page_cta_2_target'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_cta_2_target'] );
			update_post_meta( $post_id, 'page_cta_2_target', $my_data );
		}
	}

	if (isset( $_POST['page_resources_nonce'] ) ) {
		// if ( ! wp_verify_nonce( $_POST['page_resources_nonce'], 'page_option_metabox' ) ) {return;}

		if (isset( $_POST['page_resource_button_text'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_resource_button_text'] );
			update_post_meta( $post_id, 'page_resource_button_text', $my_data );
		}
		if (isset( $_POST['page_resource_button_url'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_resource_button_url'] );
			update_post_meta( $post_id, 'page_resource_button_url', $my_data );
		}
		if (isset( $_POST['page_resources_tag'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_resources_tag'] );
			update_post_meta( $post_id, 'page_resources_tag', $my_data );
		}
	}
	if (isset( $_POST['page_list_nonce'] ) ) {
		// if ( ! wp_verify_nonce( $_POST['page_resources_nonce'], 'page_option_metabox' ) ) {return;}

		if (isset( $_POST['page_list_type'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_list_type'] );
			update_post_meta( $post_id, 'page_list_type', $my_data );
		}
		if (isset( $_POST['page_list_tag'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_list_tag'] );
			update_post_meta( $post_id, 'page_list_tag', $my_data );
		}
		if (isset( $_POST['page_list_ppp'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_list_ppp'] );
			update_post_meta( $post_id, 'page_list_ppp', $my_data );
		}
		if (isset( $_POST['page_list_button'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_list_button'] );
			update_post_meta( $post_id, 'page_list_button', $my_data );
		}
		if (isset( $_POST['page_list_none'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_list_none'] );
			update_post_meta( $post_id, 'page_list_none', $my_data );
		}
		if (isset( $_POST['page_list_aftertext'] ) ) {
			$my_data = $_POST['page_list_aftertext'];
			update_post_meta( $post_id, 'page_list_aftertext', $my_data );
		}
	}
	if (isset( $_POST['page_contact_nonce'] ) ) {
		// if ( ! wp_verify_nonce( $_POST['page_resources_nonce'], 'page_option_metabox' ) ) {return;}

		if (isset( $_POST['page_contact_form'] ) ) {
			$my_data = sanitize_text_field( $_POST['page_contact_form'] );
			update_post_meta( $post_id, 'page_contact_form', $my_data );
		}
	}
	if (isset( $_POST['page_html_nonce'] ) ) {
		// if ( ! wp_verify_nonce( $_POST['page_resources_nonce'], 'page_option_metabox' ) ) {return;}

		if (isset( $_POST['page_html_script'] ) ) {
			//$my_data = sanitize_text_field( $_POST['page_html_script'] );
			update_post_meta( $post_id, 'page_html_script', $_POST['page_html_script'] );
		}
	}
}

add_action( 'save_post', 'page_option_save' );