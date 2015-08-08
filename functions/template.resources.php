<?php

// ------------------------------------------------------
// Functions for Resources Templates
// ------------------------------------------------------

$width_options = array(
	'full' => '1',
	'half' => '2',
	'third' => '3',
	'quarter' => '4',
	'fifth' => '5'
);

$color_options = array(
	'white' => 'White',
	'graylt' => 'Light Gray',
	'graydk' => 'Dark Gray',
	'blue' => 'Blue'
);

$resources_fields = array(

	'section_1' => array(
		'name' => 'Section 1',
		'slug' => 'section_1',
		'desc' => '',
		'fields' => array(
			array('name' => 'display', 'type' => 'checkbox', 'label'=>'Hide Section', 'value' => 'hide'),
			array('name' => 'title', 'type' => 'text', 'label'=>'Section Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'textarea', 'label'=>'Section Intro', 'rows' => '5', 'cols' => '74', 'value' => ''),
			array('name' => 'type', 'type' => 'select', 'options' => 'tax', 'tax' => 'resource_types', 'label'=>'Resource Type', 'size' => '75', 'value' => ''),
			array('name' => 'count', 'type' => 'text', 'label'=>'Display', 'size' => '5', 'value' => '3'),
			array('name' => 'class', 'type' => 'select', 'options' => $width_options, 'label'=>'Row', 'size' => '5', 'value' => 'third'),
			array('name' => 'color', 'type' => 'select', 'options' => $color_options, 'label'=>'Background Color', 'size' => '5', 'value' => ''),
		)
	),
	'section_2' => array(
		'name' => 'Section 2',
		'slug' => 'section_2',
		'desc' => '',
		'fields' => array(
			array('name' => 'display', 'type' => 'checkbox', 'label'=>'Hide Section', 'value' => 'hide'),
			array('name' => 'title', 'type' => 'text', 'label'=>'Section Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'textarea', 'label'=>'Section Intro', 'rows' => '5', 'cols' => '74', 'value' => ''),
			array('name' => 'type', 'type' => 'select', 'options' => 'tax', 'tax' => 'resource_types', 'label'=>'Resource Type', 'size' => '75', 'value' => ''),
			array('name' => 'count', 'type' => 'text', 'label'=>'Display', 'size' => '5', 'value' => '3'),
			array('name' => 'class', 'type' => 'select', 'options' => $width_options, 'label'=>'Row', 'size' => '5', 'value' => 'third'),
			array('name' => 'color', 'type' => 'select', 'options' => $color_options, 'label'=>'Background Color', 'size' => '5', 'value' => ''),
		)
	),
	'section_3' => array(
		'name' => 'Section 3',
		'slug' => 'section_3',
		'desc' => '',
		'fields' => array(
			array('name' => 'display', 'type' => 'checkbox', 'label'=>'Hide Section', 'value' => 'hide'),
			array('name' => 'title', 'type' => 'text', 'label'=>'Section Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'textarea', 'label'=>'Section Intro', 'rows' => '5', 'cols' => '74', 'value' => ''),
			array('name' => 'type', 'type' => 'select', 'options' => 'tax', 'tax' => 'resource_types', 'label'=>'Resource Type', 'size' => '75', 'value' => ''),
			array('name' => 'count', 'type' => 'text', 'label'=>'Display', 'size' => '5', 'value' => '3'),
			array('name' => 'class', 'type' => 'select', 'options' => $width_options, 'label'=>'Row', 'size' => '5', 'value' => 'third'),
			array('name' => 'color', 'type' => 'select', 'options' => $color_options, 'label'=>'Background Color', 'size' => '5', 'value' => ''),
		)
	),
	'section_4' => array(
		'name' => 'Section 4',
		'slug' => 'section_4',
		'desc' => '',
		'fields' => array(
			array('name' => 'display', 'type' => 'checkbox', 'label'=>'Hide Section', 'value' => 'hide'),
			array('name' => 'title', 'type' => 'text', 'label'=>'Section Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'textarea', 'label'=>'Section Intro', 'rows' => '5', 'cols' => '74', 'value' => ''),
			array('name' => 'type', 'type' => 'select', 'options' => 'tax', 'tax' => 'resource_types', 'label'=>'Resource Type', 'size' => '75', 'value' => ''),
			array('name' => 'count', 'type' => 'text', 'label'=>'Display', 'size' => '5', 'value' => '3'),
			array('name' => 'class', 'type' => 'select', 'options' => $width_options, 'label'=>'Row', 'size' => '5', 'value' => 'third'),
			array('name' => 'color', 'type' => 'select', 'options' => $color_options, 'label'=>'Background Color', 'size' => '5', 'value' => ''),
		)
	),
	'section_5' => array(
		'name' => 'Section 5',
		'slug' => 'section_5',
		'desc' => '',
		'fields' => array(
			array('name' => 'display', 'type' => 'checkbox', 'label'=>'Hide Section', 'value' => 'hide'),
			array('name' => 'title', 'type' => 'text', 'label'=>'Section Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'textarea', 'label'=>'Section Intro', 'rows' => '5', 'cols' => '74', 'value' => ''),
			array('name' => 'type', 'type' => 'select', 'options' => 'tax', 'tax' => 'resource_types', 'label'=>'Resource Type', 'size' => '75', 'value' => ''),
			array('name' => 'count', 'type' => 'text', 'label'=>'Display', 'size' => '5', 'value' => '3'),
			array('name' => 'class', 'type' => 'select', 'options' => $width_options, 'label'=>'Row', 'size' => '5', 'value' => 'third'),
			array('name' => 'color', 'type' => 'select', 'options' => $color_options, 'label'=>'Background Color', 'size' => '5', 'value' => ''),
		)
	),
	'section_6' => array(
		'name' => 'Section 6',
		'slug' => 'section_6',
		'desc' => '',
		'fields' => array(
			array('name' => 'display', 'type' => 'checkbox', 'label'=>'Hide Section', 'value' => 'hide'),
			array('name' => 'title', 'type' => 'text', 'label'=>'Section Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'textarea', 'label'=>'Section Intro', 'rows' => '5', 'cols' => '74', 'value' => ''),
			array('name' => 'type', 'type' => 'select', 'options' => 'tax', 'tax' => 'resource_types', 'label'=>'Resource Type', 'size' => '75', 'value' => ''),
			array('name' => 'count', 'type' => 'text', 'label'=>'Display', 'size' => '5', 'value' => '3'),
			array('name' => 'class', 'type' => 'select', 'options' => $width_options, 'label'=>'Row', 'size' => '5', 'value' => 'third'),
			array('name' => 'color', 'type' => 'select', 'options' => $color_options, 'label'=>'Background Color', 'size' => '5', 'value' => ''),
		)
	),
	'section_7' => array(
		'name' => 'Section 7',
		'slug' => 'section_7',
		'desc' => '',
		'fields' => array(
			array('name' => 'display', 'type' => 'checkbox', 'label'=>'Hide Section', 'value' => 'hide'),
			array('name' => 'title', 'type' => 'text', 'label'=>'Section Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'textarea', 'label'=>'Section Intro', 'rows' => '5', 'cols' => '74', 'value' => ''),
			array('name' => 'type', 'type' => 'select', 'options' => 'tax', 'tax' => 'resource_types', 'label'=>'Resource Type', 'size' => '75', 'value' => ''),
			array('name' => 'count', 'type' => 'text', 'label'=>'Display', 'size' => '5', 'value' => '3'),
			array('name' => 'class', 'type' => 'select', 'options' => $width_options, 'label'=>'Row', 'size' => '5', 'value' => 'third'),
			array('name' => 'color', 'type' => 'select', 'options' => $color_options, 'label'=>'Background Color', 'size' => '5', 'value' => ''),
		)
	),
	'section_8' => array(
		'name' => 'Section 8',
		'slug' => 'section_8',
		'desc' => '',
		'fields' => array(
			array('name' => 'display', 'type' => 'checkbox', 'label'=>'Hide Section', 'value' => 'hide'),
			array('name' => 'title', 'type' => 'text', 'label'=>'Section Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'textarea', 'label'=>'Section Intro', 'rows' => '5', 'cols' => '74', 'value' => ''),
			array('name' => 'type', 'type' => 'select', 'options' => 'tax', 'tax' => 'resource_types', 'label'=>'Resource Type', 'size' => '75', 'value' => ''),
			array('name' => 'count', 'type' => 'text', 'label'=>'Display', 'size' => '5', 'value' => '3'),
			array('name' => 'class', 'type' => 'select', 'options' => $width_options, 'label'=>'Row', 'size' => '5', 'value' => 'third'),
			array('name' => 'color', 'type' => 'select', 'options' => $color_options, 'label'=>'Background Color', 'size' => '5', 'value' => ''),
		)
	),
	'section_9' => array(
		'name' => 'Section 9',
		'slug' => 'section_9',
		'desc' => '',
		'fields' => array(
			array('name' => 'display', 'type' => 'checkbox', 'label'=>'Hide Section', 'value' => 'hide'),
			array('name' => 'title', 'type' => 'text', 'label'=>'Section Title', 'size' => '75', 'value' => ''),
			array('name' => 'text', 'type' => 'textarea', 'label'=>'Section Intro', 'rows' => '5', 'cols' => '74', 'value' => ''),
			array('name' => 'type', 'type' => 'select', 'options' => 'tax', 'tax' => 'resource_types', 'label'=>'Resource Type', 'size' => '75', 'value' => ''),
			array('name' => 'count', 'type' => 'text', 'label'=>'Display', 'size' => '5', 'value' => '3'),
			array('name' => 'class', 'type' => 'select', 'options' => $width_options, 'label'=>'Row', 'size' => '5', 'value' => 'third'),
			array('name' => 'color', 'type' => 'select', 'options' => $color_options, 'label'=>'Background Color', 'size' => '5', 'value' => ''),
		)
	)
);


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */


function resources_add_custom_box() {
	wp_nonce_field( 'resources_add_custom_box', 'resources_nonce' ); // Add an nonce field so we can check for it later.

	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$template = get_post_meta( $post_id, '_wp_page_template', true);

	if($template == "page-resources.php"){

		// add_meta_box('resources_settings', 'Resource Settings', 'resources_settings', 'page', 'normal', 'high');

		global $resources_fields;

		foreach ($resources_fields as $key => $value) {
			$id = 'resources_'.$value['slug'];
			$title = __( $value['name'], 'resources_textdomain' );
			add_meta_box($id, $title, $id, 'page', 'normal', 'high');
		}
	}
}
add_action( 'add_meta_boxes', 'resources_add_custom_box' );

function resources_settings($post){
	global $resources_fields;
	$array = $resources_fields['settings'];

	wp_nonce_field('resources_'.$array['slug'].'add_custom_box', 'resources_'.$array['slug'].'_nonce');

		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('resources_',$array['slug'],$value);
	}

	echo $html;
}

function resources_section_1($post){
	global $resources_fields;
	$array = $resources_fields['section_1'];

	wp_nonce_field('resources_'.$array['slug'].'add_custom_box', 'resources_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('resources_',$array['slug'],$value);
	}

	echo $html;
}
function resources_section_2($post){
	global $resources_fields;
	$array = $resources_fields['section_2'];

	wp_nonce_field('resources_'.$array['slug'].'add_custom_box', 'resources_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('resources_',$array['slug'],$value);
	}

	echo $html;
}
function resources_section_3($post){
	global $resources_fields;
	$array = $resources_fields['section_3'];

	wp_nonce_field('resources_'.$array['slug'].'add_custom_box', 'resources_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('resources_',$array['slug'],$value);
	}

	echo $html;
}
function resources_section_4($post){
	global $resources_fields;
	$array = $resources_fields['section_4'];

	wp_nonce_field('resources_'.$array['slug'].'add_custom_box', 'resources_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('resources_',$array['slug'],$value);
	}

	echo $html;
}
function resources_section_5($post){
	global $resources_fields;
	$array = $resources_fields['section_5'];

	wp_nonce_field('resources_'.$array['slug'].'add_custom_box', 'resources_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('resources_',$array['slug'],$value);
	}

	echo $html;
}
function resources_section_6($post){
	global $resources_fields;
	$array = $resources_fields['section_6'];

	wp_nonce_field('resources_'.$array['slug'].'add_custom_box', 'resources_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('resources_',$array['slug'],$value);
	}

	echo $html;
}
function resources_section_7($post){
	global $resources_fields;
	$array = $resources_fields['section_7'];

	wp_nonce_field('resources_'.$array['slug'].'add_custom_box', 'resources_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('resources_',$array['slug'],$value);
	}

	echo $html;
}
function resources_section_8($post){
	global $resources_fields;
	$array = $resources_fields['section_8'];

	wp_nonce_field('resources_'.$array['slug'].'add_custom_box', 'resources_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('resources_',$array['slug'],$value);
	}

	echo $html;
}
function resources_section_9($post){
	global $resources_fields;
	$array = $resources_fields['section_9'];

	wp_nonce_field('resources_'.$array['slug'].'add_custom_box', 'resources_'.$array['slug'].'_nonce');
		echo $array['desc'];
		$html = '';
	foreach ($array['fields'] as $field => $value) {
		$html .= fieldBuilder('resources_',$array['slug'],$value);
	}

	echo $html;
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function resources_save_postdata( $post_id ) {
	global $resources_fields;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {return;}

	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {return;}
	}else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {return;}
	}

	foreach ($resources_fields as $key => $value) {
		$slug = $value['slug'];
		//print_r($value);

		if (isset( $_POST['resources_'.$value['slug'].'_nonce'] ) ) {

			foreach($value['fields'] as $key => $value){
				$name = 'resources_'.$slug.'_'.$value['name'];
				if($value['type'] == 'checkbox'){
					if(isset($_POST[$name])){
						update_post_meta($post_id, $name, 'true');
					} else {
						update_post_meta($post_id, $name, 'false');
					}
				}elseif(isset($_POST[$name])){
					$value = sanitize_text_field($_POST[$name]);
					update_post_meta($post_id, $name, $value);
				}
			}
		}
	}
}

add_action( 'save_post', 'resources_save_postdata' );

