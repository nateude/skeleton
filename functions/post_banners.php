<?php


function banner_post() {
    $labels = array(
        'name' => __( 'Banners' ),
        'singular_name' => __( 'Banner' ),
        'add_new' => __( 'New Banner' ),
        'add_new_item' => __( 'Add New Banner' ),
        'edit_item' => __( 'Edit Banner' ),
        'new_item' => __( 'New Banner' ),
        'view_item' => __( 'View Banner' ),
        'search_items' => __( 'Search Banners' ),
        'not_found' =>  __( 'No Banners Found' ),
        'not_found_in_trash' => __( 'No Banners found in Trash' ),
    );
    $args = array(
        'labels' => $labels,
        'has_archive' => false,
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search'  => true,
        'supports' => array(
            'title',
            'excerpt',
            'thumbnail',
        )
    );
    register_post_type( 'banner', $args );
}
add_action( 'init', 'banner_post' );