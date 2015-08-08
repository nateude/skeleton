<?php
	$page_cat = get_the_terms($post->ID,'page_categories')[0]->slug;
	$page_tags = get_the_terms($post->ID,'content_tags')[0]->slug;

	switch ($meta['page_cta_type'][0]) {
		case 'category':
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($page_cat) ) {}
		break;
		case 'tagged':
			$tagged = getTagged($page_tags,'2',true);

			print_r($tagged);
		break;
		case 'custom':
			$i = 1;
			while ( $i < 3) {
				if($meta['page_cta_'.$i.'_title'][0]){
				echo ctaBuilder(array(
						'title' => $meta['page_cta_'.$i.'_title'][0],
						'button_text' => $meta['page_cta_'.$i.'_button_text'][0],
						'url' => $meta['page_cta_'.$i.'_url'][0],
						'class' => 'widget widget_cta '.$meta['page_cta_'.$i.'_class'][0],
						'target' => $meta['page_cta_'.$i.'_target'][0],
						'id' => $i
					)
				);
				}
				$i++;
			}
		break;
		case 'default':
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Default Sidebar') ) {}
		break;
	}
	// add widget widget_nav_menu
	switch ($meta['page_catnav_type'][0]) {
		case 'category':
			$page_cat = get_the_terms($post->ID,'page_categories')[0]->slug;
			if(has_nav_menu($page_cat)){wp_nav_menu(array('menu' => $page_cat));}
		break;
		case 'default':
			if(has_nav_menu('page-sidebar')){wp_nav_menu( array('theme_location' => 'page-sidebar') ); }
		break;
	}

