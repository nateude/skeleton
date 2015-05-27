<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 */

//thumbnail support and image sizes
if ( function_exists( 'add_theme_support' ) ) {	add_theme_support( 'post-thumbnails' ); }

if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'thumb', 275, 162, true );
  add_image_size( 'logo', 300, 300, true );
  add_image_size( 'fullwidth', 860, 640, true );
  add_image_size( 'fullwidth-narrow', 860, 320, true );
  add_image_size( 'banner', 1600, 1200, true );
  add_image_size( 'banner-medium', 1024, 800, true );
  add_image_size( 'banner-small', 600, 600, true );
}

//load scripts
function siteScriptLoad(){
  wp_register_script( 'cycle2', get_template_directory_uri().'/libs/jquery.cycle2.min.js', array( 'jquery'), null, true);
  wp_register_script( 'cycle_carousel', get_template_directory_uri().'/libs/jquery.cycle2.carousel.min.js', array( 'cycle2'), null, true);
  wp_register_script( 'waypoints', get_template_directory_uri().'/libs/waypoints.min.js', array( 'jquery'), null, true);
  wp_register_script( 'countup', get_template_directory_uri().'/libs/jquery.counterup.min.js', array( 'waypoints'), null, true);

  if(is_front_page()){
    wp_enqueue_script( 'cycle_carousel' );
    wp_enqueue_script( 'waypoints' );
    wp_enqueue_script( 'countup' );
  }else{
    wp_enqueue_script( 'jquery' );
  }
  // wp_enqueue_script( 'easing' );
 }
add_action('wp_enqueue_scripts', 'siteScriptLoad');


function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main' ),
      'footer-menu' => __( 'Footer' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


//includes for functions files
include 'functions/post_banners.php';
include 'functions/post_resources.php';
include 'functions/post_team.php';
include 'functions/post_placements.php';
include 'functions/post_press-releases.php';
include 'functions/post_clients.php';
include 'functions/post_testimonials.php';
include 'functions/post_jobs.php';

include 'functions/widgets.php';
include 'functions/categorynav.php';
include 'functions/taxonomies.php';