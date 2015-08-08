<?php

// ------------------------------------------------------
// Functions for Home Page
// ------------------------------------------------------

$homepage_fields = array(

	'who' => array(
		'name' => 'Who We Are',
		'slug' => 'who',
		'desc' => '',
		'fields' => array(
			array('name' => 'title', 'type' => 'text', 'label'=>'Title', 'size' => '75', 'value' => ''),
			array('name' => 'intro', 'type' => 'textarea', 'label'=>'Intro', 'cols' => '75', 'value' => '', 'rows' => '7'),
		),
	),
	'services' => array(
		'name' => 'Services',
		'slug' => 'services',
		'desc' => '',
		'fields' => array(
			array('name' => 'icon_title','type' => 'html', 'before' => '', 'after' => '', 'tag' => 'h4', 'text' => 'Section 1'),
			array('name' => 'icon_1_image', 'type' => 'image', 'label'=>'Icon 1 Image', 'size' => '60', 'value' => ''),
			array('name' => 'icon_1_alt', 'type' => 'text', 'label'=>'Icon Image Alt', 'size' => '75', 'value' => ''),
			array('name' => 'icon_1_title', 'type' => 'text', 'label'=>'Icon Title', 'size' => '75', 'value' => ''),
			array('name' => 'icon_1_class', 'type' => 'text', 'label'=>'Icon Class', 'size' => '75', 'value' => ''),
			array('name' => 'icon_1_par', 'type' => 'textarea', 'label'=>'Icon Text', 'cols' => '75', 'value' => '', 'rows' => '3'),
			array('name' => 'icon_1_url', 'type' => 'text', 'label'=>'Icon Url', 'size' => '75', 'value' => ''),
			array('name' => 'icon_title','type' => 'html', 'before' => '<hr>', 'after' => '', 'tag' => 'h4', 'text' => 'Section 2'),
			array('name' => 'icon_2_image', 'type' => 'image', 'label'=>'Icon Image', 'size' => '60', 'value' => ''),
			array('name' => 'icon_2_alt', 'type' => 'text', 'label'=>'Icon Image Alt', 'size' => '75', 'value' => ''),
			array('name' => 'icon_2_title', 'type' => 'text', 'label'=>'Icon Title', 'size' => '75', 'value' => ''),
			array('name' => 'icon_2_class', 'type' => 'text', 'label'=>'Icon Class', 'size' => '75', 'value' => ''),
			array('name' => 'icon_2_par', 'type' => 'textarea', 'label'=>'Icon Text', 'cols' => '75', 'value' => '', 'rows' => '3'),
			array('name' => 'icon_2_url', 'type' => 'text', 'label'=>'Icon Url', 'size' => '75', 'value' => ''),
			array('name' => 'icon_title','type' => 'html', 'before' => '<hr>', 'after' => '', 'tag' => 'h4', 'text' => 'Section 3'),
			array('name' => 'icon_3_image', 'type' => 'image', 'label'=>'Icon Image', 'size' => '60', 'value' => ''),
			array('name' => 'icon_3_alt', 'type' => 'text', 'label'=>'Icon Image Alt', 'size' => '75', 'value' => ''),
			array('name' => 'icon_3_title', 'type' => 'text', 'label'=>'Icon Title', 'size' => '75', 'value' => ''),
			array('name' => 'icon_3_class', 'type' => 'text', 'label'=>'Icon Class', 'size' => '75', 'value' => ''),
			array('name' => 'icon_3_par', 'type' => 'textarea', 'label'=>'Icon Text', 'cols' => '75', 'value' => '', 'rows' => '3'),
			array('name' => 'icon_3_url', 'type' => 'text', 'label'=>'Icon Url', 'size' => '75', 'value' => ''),
		),
	),
	'partners' => array(
		'name' => 'Partners',
		'slug' => 'partners',
		'desc' => '',
		'fields' => array(
			array('name' => 'title', 'type' => 'text', 'label'=>'Title', 'size' => '75', 'value' => ''),
			array('name' => 'button_text', 'type' => 'text', 'label'=>'Button Text', 'size' => '75', 'value' => ''),
			array('name' => 'button_url', 'type' => 'text', 'label'=>'Button Url', 'size' => '75', 'value' => ''),
		)
	),
	'resources' => array(
		'name' => 'Resources',
		'slug' => 'resources',
		'desc' => '',
		'fields' => array(
			array('name' => 'title', 'type' => 'text', 'label'=>'Title', 'size' => '75', 'value' => ''),
			array('name' => 'intro', 'type' => 'textarea', 'label'=>'Intro', 'cols' => '75', 'value' => '', 'rows' => '7'),
		)
	),
	'cta' => array(
		'name' => 'Call To Action',
		'slug' => 'cta',
		'desc' => '',
		'fields' => array(
			array('name' => 'title', 'type' => 'text', 'label'=>'Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'text', 'label'=>'Text', 'size' => '75', 'value' => '')
		)
	),
	'news' => array(
		'name' => 'Thought Leadership',
		'slug' => 'news',
		'desc' => '',
		'fields' => array(
			array('name' => 'title', 'type' => 'text', 'label'=>'Title', 'size' => '75', 'value' => ''),
			array('name' => 'news_button_title', 'type' => 'text', 'label'=>'News Title', 'size' => '75', 'value' => ''),
			array('name' => 'news_button_text', 'type' => 'text', 'label'=>'News Button Text', 'size' => '75', 'value' => ''),
			array('name' => 'news_button_url', 'type' => 'text', 'label'=>'News Button Url', 'size' => '75', 'value' => ''),
			array('name' => 'blog_button_title', 'type' => 'text', 'label'=>'Blog Title', 'size' => '75', 'value' => ''),
			array('name' => 'blog_button_text', 'type' => 'text', 'label'=>'Blog Button Text', 'size' => '75', 'value' => ''),
			array('name' => 'blog_button_url', 'type' => 'text', 'label'=>'Blog Button Url', 'size' => '75', 'value' => ''),
		),
	),
);

/**
 * Hide editor for specific page templates.
 *
 */
add_action( 'admin_init', 'hide_editor' );

function hide_editor() {
	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	if( !isset( $post_id ) ) return;

	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);

		if($template_file == 'front-page.php'){ // edit the template name
			remove_post_type_support('page', 'editor');
		}
}

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */


function homepage_add_custom_box() {
	wp_nonce_field( 'homepage_add_custom_box', 'homepage_nonce' ); // Add an nonce field so we can check for it later.

	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$template = get_post_meta( $post_id, '_wp_page_template', true);

	if($template == "front-page.php"){

		global $homepage_fields;

		foreach ($homepage_fields as $key => $value) {
			$id = 'homepage_'.$value['slug'];
			$title = __( $value['name'], 'homepage_textdomain' );
			add_meta_box($id, $title, $id, 'page', 'normal', 'high');
		}

		// add_meta_box('homepage_test', 'Testing', 'homepage_test', 'page', 'normal', 'high');

	}
}
add_action( 'add_meta_boxes', 'homepage_add_custom_box' );

function homepage_who($post){
	global $homepage_fields;
	$array = $homepage_fields['who'];

	wp_nonce_field('homepage_'.$array['slug'].'add_custom_box', 'homepage_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('homepage_',$array['slug'],$value);
	}

	echo $html;
	// echo '<hr>';
	// print_r($array);
}

function homepage_services($post){
	global $homepage_fields;
	$array = $homepage_fields['services'];

	wp_nonce_field('homepage_'.$array['slug'].'add_custom_box', 'homepage_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('homepage_',$array['slug'],$value);
	}

	echo $html;
	// echo '<hr>';
	// print_r($array);
}

function homepage_partners($post){
	global $homepage_fields;
	$array = $homepage_fields['partners'];

	wp_nonce_field('homepage_'.$array['slug'].'add_custom_box', 'homepage_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('homepage_',$array['slug'],$value);
	}
	echo $html;
	// echo '<hr>';
	// print_r($array);
}

function homepage_resources($post){
	global $homepage_fields;
	$array = $homepage_fields['resources'];

	wp_nonce_field('homepage_'.$array['slug'].'add_custom_box', 'homepage_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('homepage_',$array['slug'],$value);
	}
	echo $html;
	// echo '<hr>';
	// print_r($array);
}
function homepage_cta($post){
	global $homepage_fields;
	$array = $homepage_fields['cta'];

	wp_nonce_field('homepage_'.$array['slug'].'add_custom_box', 'homepage_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('homepage_',$array['slug'],$value);
	}
	echo $html;
	// echo '<hr>';
	// print_r($array);
}

function homepage_news($post){
	global $homepage_fields;
	$array = $homepage_fields['news'];

	wp_nonce_field('homepage_'.$array['slug'].'add_custom_box', 'homepage_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('homepage_',$array['slug'],$value);
	}
	echo $html;
	// echo '<hr>';
	// print_r($array);
}



/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function homepage_save_postdata( $post_id ) {
	global $homepage_fields;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}

	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}
	}else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {return;}
	}

	foreach ($homepage_fields as $key => $value) {
		$slug = $value['slug'];
		//print_r($value);

		if (isset( $_POST['homepage_'.$value['slug'].'_nonce'] ) ) {

			foreach($value['fields'] as $key => $value){
				$name = 'homepage_'.$slug.'_'.$value['name'];
				if(isset($_POST[$name])){
					$value = sanitize_text_field($_POST[$name]);
					update_post_meta($post_id, $name, $value);
				}
			}
		}
	}
}

add_action( 'save_post', 'homepage_save_postdata' );

