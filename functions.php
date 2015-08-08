<?php
/**
 * @package WordPress
 * @subpackage discoverorg
 */

/*
	--------------------------------------------
	Theme Support Settings
	--------------------------------------------
*/

	// Featured Image Settings
	if ( function_exists( 'add_theme_support' ) ) {	add_theme_support( 'post-thumbnails' ); }

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size('thumb', 227, 162, true);
		add_image_size('resource', 400, 320, true);
		add_image_size('blog', 768, 305, true);
		add_image_size('fullwidth', 860, 640, true);
		add_image_size('fullwidth-narrow', 860, 320, true);
		add_image_size('banner', 1980, 600, true);
		add_image_size('banner-medium', 1024, 800, true);
		add_image_size('banner-small', 600, 600, true);
	}

add_action( 'wp_enqueue_scripts', 'enqueue_my_styles' );

function enqueue_my_styles() {
    global $wp_styles;
    wp_enqueue_style( 'font', "http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800italic" );
    wp_enqueue_style( 'screen', get_template_directory_uri()."/styles/screen.css", array( 'font' )  );
    wp_enqueue_style( 'screen-ie', get_template_directory_uri()."/styles/ie.css", array( 'screen' )  );
    $wp_styles->add_data( 'screen-ie', 'conditional', 'lt IE 9' );

}

	//Load JS Scripts
	function siteScriptLoad(){
		wp_register_script( 'cycle2', get_template_directory_uri().'/libs/jquery.cycle2.min.js', array( 'jquery'), null, true);
		wp_register_script( 'cycle_carousel', get_template_directory_uri().'/libs/jquery.cycle2.carousel.min.js', array( 'cycle2'), null, true);
		

		wp_enqueue_script( 'jquery' );
		if(is_front_page()){
			wp_enqueue_script( 'cycle_carousel' );
		}
		// wp_enqueue_script( 'easing' );


	 }
	add_action('wp_enqueue_scripts', 'siteScriptLoad');

	// Load CSS files


/*
	--------------------------------------------
	Includes for functions files
	--------------------------------------------
*/
	// Misc Includes
	include 'functions/taxonomies.php';

	// Post Type Includes
	include 'functions/post.post.php';
	include 'functions/post.banners.php';
	include 'functions/post.resources.php';
	include 'functions/post.placements.php';
	include 'functions/post.press-releases.php';
	//include 'functions/post.testimonials.php';
	include 'functions/post.news.php';
	include 'functions/post.blog.php';
	include 'functions/post.clients.php';
	include 'functions/post.team.php';
	include 'functions/post.jobs.php';
	include 'functions/post.cta.php';

	// Global Template Functions
	include 'functions/template.functions.php';

	// Template Editors
	include 'functions/template.front-page.php';
	include 'functions/template.page.php';
	include 'functions/template.single.php';
	include 'functions/template.resources.php';
	include 'functions/template.team.php';
	include 'functions/template.job.php';

	// Widget Includes
	include 'functions/widget.classes.php';
	include 'functions/widget.cta.php';
	include 'functions/shortcodes.php';

/*
	--------------------------------------------
	Admin Panel Settings
	--------------------------------------------
*/

	// Load custom css for Meta Boxes

	add_action('admin_head', 'custom_postmeta');

	function custom_postmeta() {
		echo '<style>
			#postbox-container-2 .postbox label {width: 15%;float: left;}
			#postbox-container-1 .postbox label {width: 100%;float: left;}
			#postbox-container-1 .postbox label.checkbox {width: auto;float: none;}
			span.hint {margin: 0 0 0 20px;font-style: italic;}
		</style>';
	}

/*
	--------------------------------------------
	Registrar Template Parts
	--------------------------------------------
*/

	// Register Menu Locations
	function register_my_menus() {

		$cat = get_terms( 'page_categories', array('orderby' => 'id', 'hide_empty'=> false));
		$menulist = array(
			'main-menu'    => __( 'Main' ),
			'footer-menu'  => __( 'Footer' ),
			'page-sidebar' => __( 'Page Sidebar' ),
			'sitemap' => __( 'Site Map' )
		);

		foreach ($cat as $key => $value) {
			$menulist[$value->slug] = $value->name;
		}

		register_nav_menus($menulist);
	}
	add_action( 'init', 'register_my_menus' );


	// Register Sidebar Locations
	function register_my_sidebars() {
		$sidebars = array(
			'Masthead',
			'Footer Widgets',
			'Page Default Sidebar',
			'Blog Sidebar',
			'Post Default Sidebar',
			'Press Releases',
			'Placements',
			'Jobs',
			'Team Members',
		);

		$cat = get_terms( 'page_categories', array('orderby' => 'id', 'hide_empty'=> false));
		foreach ($cat as $key => $value) {
			$sidebars[] = $value->name;
		}

		if ( function_exists('register_sidebar') ){

			foreach ($sidebars as $sidebar) {
				register_sidebar(
					array(
						'name'          => $sidebar,
						'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
						'after_widget'  => '</div>', // Removes </li>
						'before_title'  => '', // Replaces <h2>
						'after_title'   => '', // Replaces </h2>
					)
				);
			}
		}
	}
	add_action( 'init', 'register_my_sidebars' );

/*
	--------------------------------------------
	Global Functions
	--------------------------------------------
*/

	// global html builder for CTAs
	function ctaBuilder($data){
		// $data = array('id' => 'var','title' => 'var','button_text' => 'var','url' => 'var','class' => 'var',);
		if(!isset($data['id'])) $data['id'] = 1;
		$html  = '<div class="'.$data['class'].' cta cta'.$data['id'].'">';
		$html .= '<h2><a href="'.$data['url'].'">'.$data['title'].'</a></h2>';
		$html .= '<a class="button" href="'.$data['url'].'" target="'.$data['target'].'">'.$data['button_text'].'</a>';
		$html .= '</div>';

		return $html;
	}

	// getTagged($tag,$count,$build);
	function getTagged($tags,$count,$build){
	// $tag = array of matching tags
	// $count = how many to return
	// $build = if true returns html | false returns data array

		$args = array(
			'posts_per_page' => $count,
			'post_type' => 'cta',
			'tax_query' => array(
				array(
					'taxonomy' => 'content_tags',
					'field'    => 'slug',
					'terms'    => $tags,
				),
			),
		);

		$ctas = array();

		$query = new WP_Query( $args );
		if (have_posts()) : while ($query->have_posts()) : $query->the_post();
			$ctameta = get_post_meta(get_the_ID());
			$ctas[] = array(
				'title'       => $ctameta['cta_text'][0],
				'button_text' => $ctameta['cta_button_text'][0],
				'url'         => $ctameta['cta_url'][0],
				'class'       => 'widget widget_cta '.$ctameta['cta_color'][0]
			);

		endwhile;
		endif;
		wp_reset_postdata();

		if($build == true){
			$html = "";

			foreach ($ctas as $cta) {
				$html .= ctaBuilder($cta);
			}

			return $html;
		}else{
			return $ctas;
		}
	}

		function custom_excerpt_more( $more ) {
			return '';
		}
		add_filter( 'excerpt_more', 'custom_excerpt_more' );


	/********************************* custom menu class **************************/

	add_filter('custom_menu_css_classes', 'custom_menu_classes_extra');

function custom_menu_classes_extra($classes)
{
    $classes[] = array(
        'name' => __('orange', 'custom-menu-class'),
        'class' => 'orange coloredbutton'
    );

    return $classes;
}


function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<div class='custom-pagination'>";
      echo $paginate_links;
    echo "</div>";
  }

}

function add_twitter_contactmethod( $contactmethods ) {
	 if ( !isset( $contactmethods['googleplus'] ) )
		$contactmethods['googleplus'] = 'Goolge +';
	 if ( !isset( $contactmethods['twitter'] ) )
		$contactmethods['twitter'] = 'Twitter';
	 if ( !isset( $contactmethods['facebook'] ) )
		$contactmethods['facebook'] = 'Facebook';
	 if ( !isset( $contactmethods['linkedin'] ) )
		$contactmethods['linkedin'] = 'LinkedIn';
	 if ( !isset( $contactmethods['youtube'] ) )
		$contactmethods['youtube'] = 'YouTube';
	// Remove Yahoo IM
	if ( isset( $contactmethods['yim'] ) )
		unset( $contactmethods['yim'] );

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_twitter_contactmethod', 10, 1 );

function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'blog'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );





