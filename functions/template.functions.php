<?php

// ------------------------------------------------------
// Global Functions for Templates
// ------------------------------------------------------

function tax_options($type){
	$res_types = get_terms( $type, array('hide_empty'=> false));
	$res_options = array('none' => "- Select Type -");
	foreach ($res_types as $value) {
		$res_options[$value->slug] = $value->name;
	}
	if($type == 'resource_types') $res_options['blog'] = 'Blog Posts';
	if($type == 'resource_types') $res_options['webinar'] = 'Webinars';
	return $res_options;
}

//build all fields
function printFields($section,$data){
	// sample array('name' => 'button_1_title', 'type' => 'text', 'label'=>'Button 1 Title' )
	$html = '';
	foreach ($data['fields'] as $field => $value) {
		$html .= printFields($section,$value);
	}
	return $html;
}

function field_html($name,$value,$data){
	return $data['before'].'<'.$data['tag'].'>'.$data['text'].'</'.$data['tag'].'>'.$data['after'];
}
function field_checkbox($name,$value,$data){
	$checked = '';
	if($value == 'true') $checked ='checked="checked"';
	return '<p><label>'.$data['label'].'</label><input type="checkbox" name="'.$name.'" value="true" '.$checked.'/></p>';
}
function field_image($name,$value,$data){
	return '<p><label>'.$data['label'].'</label><input type="text" id="'.$name.'" name="'.$name.'" value="'.$value.'" size="'.$data['size'].'"/><input type="button" id="'.$name.'-button" class="button" value="Select Image" /></p> <script>jQuery(document).ready(function(e){var t;e("#'.$name.'-button").click(function(a){return a.preventDefault(),t?void t.open():(t=wp.media.frames.meta_image_frame=wp.media({title:"Choose or Upload an Image",button:{text:"Use this Image"},library:{type:"image"}}),t.on("select",function(){var a=t.state().get("selection").first().toJSON();e("#'.$name.'").val(a.url)}),void t.open())})});</script>';
}
function field_text($name,$value,$data){
	return '<p><label>'.$data['label'].'</label><input type="text" name="'.$name.'" value="'.$value.'" size="'.$data['size'].'"/></p>';
}
function field_select($name,$value,$data){

	if($data['options'] == 'tax') $data['options'] = tax_options($data['tax']);

	$html ='<p><label>'.$data['label'].'</label>';
	$html .='<select type="text" name="'.$name.'">';
		foreach ($data['options'] as $key => $val) {
			$select = '';
			if($key == $value) $select = 'selected="selected"';
			$html .= '<option value="'.$key.'" '.$select.'>'.$val.'</option>';
		}
	$html .='</select>';
	$html .='</p> ';

	return $html;
}
function field_textarea($name,$value,$data){
	return '<p><label>'.$data['label'].'</label></p><p><textarea  name="'.$name.'" rows="'.$data['rows'].'" cols="'.$data['cols'].'"/>'.$value.'</textarea></p> ';
}

//build individual field
function fieldBuilder($id,$section,$data){
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	$field_name = $id.$section.'_'.$data['name'];
	$value = get_post_meta( $post_id, $field_name, true );
	if(empty($value) && $data['type'] != 'checkbox' ) $value = $data['value'];

	$function = "field_".$data['type'];
	return $function($field_name, $value, $data);
}