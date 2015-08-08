<?php
// ------------------------------------------------------
// Add Custom Short Codes
// ------------------------------------------------------

// [div class="section full" close="true" wrapper="true"]
function div_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'class' => 'section',
		'close' => false,
		'wrapper' => false
	), $atts );

	$div = '<div class="'.$a['class'].'">';
	if($a['wrapper'] ==  true) $div = $div.'<div class="wrapper">';
	if($a['close'] ==  true) $div = '</div>'.$div;
	return $div;
}
add_shortcode( 'div', 'div_shortcode' );

// [end count="1" comment="section"]
function end_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'count' => 1,
	), $atts );

	$end ="";
	$i = 1;
	while ($i <= $a['count']) {
		$end .= '</div>';
		$i++;
	}
	if($a['comment'] ==  true) $end = $end.'<!-- '.$a['comment'].' -->';
	return $end;
}
add_shortcode( 'end', 'end_shortcode' );

// [col width="onethird" align="left" mutli="true"]
function col_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'align' => 'left',
		'width' => 'half',
		'multi' => false
	), $atts );

	$col = '<div class="col '.$a['align'].''.$a['width'].'">';
	if($a['mulit'] ==  true) $col = '</div>'.$col;
	return $col;
}
add_shortcode( 'col', 'col_shortcode' );


function iframe_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'url' => false,
		'height' => '350',
		'width' => 'onethird'
	), $atts );
	return '<div class="iframe '.$a['width'].' right"><iframe src="'.$a['url'].'" width="100%" height="'.$a['height'].'"  frameborder="0" allowfullscreen style="border:0"></iframe></div>';
}
add_shortcode( 'iframe', 'iframe_shortcode' );


// [svg src="http://www.exari.com/wp-content/themes/exari-ws/img/process-graphic.svg" ]
function svg( $atts ) {
	$a = shortcode_atts( array(
		'class' => 'aligncenter',
		'src' => false
	), $atts );

	return '<div class="svgwrap '.$a['class'].'">'.file_get_contents($a['src' ]).'</div>';
}
add_shortcode( 'svg', 'svg' );

// [callout align="right" size="onethird" color="bluemd"]
function callout( $atts ) {
	$a = shortcode_atts( array(
		'size' => 'onethird',
		'align' => 'right',
		'color' => ''
	), $atts );

	return "<div class='callout ".$a['size' ]." ".$a['align']." ".$a['color']."'>";
}
add_shortcode( 'callout', 'callout' );

// [cta id="value" color="value" align="value" size="value"]
function ctaShortCode( $atts ) {
	$a = shortcode_atts( array(
		'id' => false,
		'color' => 'blue',
		'size' => 'half',
		'align' => 'left',
	), $atts );

	if($a['id'] != false){
		$cta = buildCTA($a['id'], $a['color'], $a['align'], $a['size'], 'incopycta');
	}else{
		$cta = "";
	}

	return $cta;
}
add_shortcode( 'cta', 'ctaShortCode' );

//[wrap] .. [/wrap]
function wrap_shortcode( $atts ) {
	return '<div class="pagewrap">';
}
add_shortcode( 'wrap', 'wrap_shortcode' );


