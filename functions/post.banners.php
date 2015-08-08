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
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array(
            'title',
            'thumbnail',
        )
    );
    register_post_type( 'banner', $args );
}
add_action( 'init', 'banner_post' );


//banner meta options array
function banner_option_metabox() {
    $screens = array( 'banner');
    foreach ( $screens as $screen ) {
        add_meta_box(
            'banner_option',
            __( 'Banner Options', 'banner_option_textdomain' ),
            'banner_option_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'banner_option_metabox' );

function banner_option_callback( $post ) {
    wp_nonce_field( 'myplugin_meta_box', 'banner_option_nonce' );

    $banner_title = get_post_meta( $post->ID, 'banner_title', true );

    echo '<p><label for="banner_title">';
    _e( 'Title', 'banner_title_textdomain' );
    echo '</label> ';
    echo '<input type="text" id="banner_title" name="banner_title" value="' . esc_attr( $banner_title ) . '" size="50" /></p>';

    $banner_subtitle = get_post_meta( $post->ID, 'banner_subtitle', true );

    echo '<p><label for="banner_subtitle">';
    _e( 'Sub Title', 'banner_subtitle_textdomain' );
    echo '</label> ';
    echo '<input type="text" id="banner_subtitle" name="banner_subtitle" value="' . esc_attr( $banner_subtitle ) . '" size="50" /></p>';

    $banner_buttontext = get_post_meta( $post->ID, 'banner_buttontext', true );

    echo '<p><label for="banner_buttontext">';
    _e( 'Button Text', 'banner_buttontext_textdomain' );
    echo '</label> ';
    echo '<input type="text" id="banner_buttontext" name="banner_buttontext" value="' . esc_attr( $banner_buttontext ) . '" size="50" /></p>';

    $banner_url = get_post_meta( $post->ID, 'banner_url', true );

    echo '<p><label for="banner_url">';
    _e( 'URL', 'banner_url_textdomain' );
    echo '</label> ';
    echo '<input type="text" id="banner_url" name="banner_url" value="' . esc_attr( $banner_url ) . '" size="50" /></p>';

    $banner_class = get_post_meta( $post->ID, 'banner_class', true );

    echo '<p><label for="banner_class">';
    _e( 'Class', 'banner_class_textdomain' );
    echo '</label> ';
    echo '<input type="text" id="banner_class" name="banner_class" value="' . esc_attr( $banner_class ) . '" size="25" /></p>';
}

function banner_option_save( $post_id ) {
    if ( ! isset( $_POST['banner_option_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['banner_option_nonce'], 'myplugin_meta_box' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    if (isset( $_POST['banner_title'] ) ) {
        $my_data = sanitize_text_field( $_POST['banner_title'] );
        update_post_meta( $post_id, 'banner_title', $my_data );
    }
    if (isset( $_POST['banner_subtitle'] ) ) {
        $my_data = sanitize_text_field( $_POST['banner_subtitle'] );
        update_post_meta( $post_id, 'banner_subtitle', $my_data );
    }
    if (isset( $_POST['banner_buttontext'] ) ) {
        $my_data = sanitize_text_field( $_POST['banner_buttontext'] );
        update_post_meta( $post_id, 'banner_buttontext', $my_data );
    }
    if (isset( $_POST['banner_url'] ) ) {
        $my_data = sanitize_text_field( $_POST['banner_url'] );
        update_post_meta( $post_id, 'banner_url', $my_data );
    }
    if (isset( $_POST['banner_class'] ) ) {
        $my_data = sanitize_text_field( $_POST['banner_class'] );
        update_post_meta( $post_id, 'banner_class', $my_data );
    }
}

add_action( 'save_post', 'banner_option_save' );