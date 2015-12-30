<?php

// ------------------------------------------------------
// Functions for HTML Sections
// ------------------------------------------------------



	$term_list = wp_get_post_terms($postid, 'content_tags', array("fields" => "names"));

	$args = array(
		'posts_per_page' => 4,
		'post_type' => 'resource',
		'tax_query' => array(
			array(
				'taxonomy' => 'content_tags',
				'field'    => 'slug',
				'terms'    => $term_list
			),
		),
	);

	$i = 1;
	$query = new WP_Query( $args );
	if (have_posts()) : while ($query->have_posts()) : $query->the_post();
	$resource_url = get_post_meta( $postid, 'resource_url', true );
	if($resource_url == false){$resource_url = get_permalink($post->ID);}

	$opts = array(
		array(
			'type' => 'image',
			'data' => array(
				'class' => 'pageImageThumb',
				'link' => $resource_url,
				'size' => 'resource'
			)
		),
		array(
			'type' => 'html',
			'data' => array(
				'class' => 'content',
				'content' => '<h2 class="title"><a href="'.$resource_url.'" >'.get_the_title().'</a></h2>',
			)
		)
	);

	echo buildPost($post->ID,$i,'',$opts);

	$i++;
	endwhile;
	endif;
	wp_reset_postdata();