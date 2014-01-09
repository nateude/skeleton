<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 */

//thumbnail support and image sizes
if ( function_exists( 'add_theme_support' ) ) {	add_theme_support( 'post-thumbnails' ); }

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'thumb', 275, 162, true );
	add_image_size( 'desktop', 1600, 600, true );
	add_image_size( 'tablet', 1024, 384, true );
	add_image_size( 'mobile', 460, 173, true ); //(cropped)
}

//load scripts
function siteScriptLoad(){
	wp_register_script( 'cycle2', get_template_directory_uri().'/libs/jquery.cycle2.min.js', array( 'jquery'), null, true);
	wp_register_script( 'cycle_carousel', get_template_directory_uri().'/libs/jquery.cycle2.carousel.min.js', array( 'cycle2'), null, true);
	// wp_register_script( 'easing', get_template_directory_uri().'/libs/jquery.easing.1.3.js', array( 'cycle2'), null, true);

 	wp_enqueue_script( 'cycle_carousel' );
 	// wp_enqueue_script( 'easing' );
 }
add_action('wp_enqueue_scripts', 'siteScriptLoad');

function register_my_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top Menu' ),
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Page Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
));
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Post Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
));
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Footer Widget',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
));

//set special content tags
function coltwo( $content ){return str_replace('[col-2]','</div><div class="right">', $content );}	add_filter( "the_content", "coltwo", 2);

?>