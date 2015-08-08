<?php

// ------------------------------------------------------
// Functions for Posts
// ------------------------------------------------------

/*
 * Usage for a custom post type named 'movies':
 * unregister_post_type( 'movies' );
 *
 * Usage for the built in 'post' post type:
 * unregister_post_type( 'post', 'edit.php' );
*/

	function unregister_post_type( $post_type, $slug = 'post' ){

		global $wp_post_types;
		if ( isset( $wp_post_types[ $post_type ] ) ) {
			unset( $wp_post_types[ $post_type ] );
			$slug = ( !$slug ) ? 'edit.php?post_type=' . $post_type : $slug;
			remove_menu_page( $slug );
		}
	}

	// unregister_post_type( 'post' );
	// remove_menu_page( 'post' );

	function remove_menus(){
		remove_menu_page( 'edit.php' );//Posts
	}
	add_action( 'admin_menu', 'remove_menus' );
