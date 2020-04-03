<?php
/*
Plugin Name: Project Setup
Description: Clean up the admin dashboard
Version: 1.0.0
Author: Blake Lundquist
Author URI: https://github.com/BlakeEric
License: GPLv2
*/

/** ////////////////////////////////////////////////////////
*    CUSTOMIZE THE ADMIN DASHBOARD
** ///////////////////////////////////////////////////////*/


/* Rename "Posts" */

// function myprefix_change_post_label() {
//     global $menu;
//     global $submenu;
//     $menu[5][0] = 'Properties';
//     $submenu['edit.php'][5][0] = 'Properties';
//     $submenu['edit.php'][10][0] = 'Add Property';
//     $submenu['edit.php'][16][0] = 'Property Tags';
// }
// function myprefix_change_post_object() {
//     global $wp_post_types;
//     $labels = &$wp_post_types['post']->labels;
//     $labels->name = 'Properties';
//     $labels->singular_name = 'Property';
//     $labels->add_new = 'Add Property';
//     $labels->add_new_item = 'Add Property';
//     $labels->edit_item = 'Edit Property';
//     $labels->new_item = 'Property';
//     $labels->view_item = 'View Property';
//     $labels->search_items = 'Search Properties';
//     $labels->not_found = 'No Properties found';
//     $labels->not_found_in_trash = 'No Properties found in Trash';
//     $labels->all_items = 'All Properties';
//     $labels->menu_name = 'Properties';
//     $labels->name_admin_bar = 'Properties';
//}

// add_action( 'admin_menu', 'myprefix_change_post_label' );
// add_action( 'init', 'myprefix_change_post_object' );

/******* Disable Comments *********/
// function myprefix_disable_comment_options() {
//   $comment_options = array(
//     'default_comment_status' => 'closed',
//     'close_comments_for_old_posts' => 1,
//     'close_comments_days_old' => 0
//   );
//
//   foreach ( array_keys($comment_options) as $key ) {
//     if (get_option($key)) {
//       update_option( $key, $comment_options[$key]);
//     }
//   }
// }
//
// add_action( 'init', 'myprefix_disable_comment_options' );

/* Remove comment meta boxes from all post types */
// function myprefix_remove_comment_fields() {
//     $post_types = get_post_types();
//     foreach ($post_types as $type) {
//         remove_meta_box( 'commentstatusdiv' , $type , 'normal' ); //removes comments status
//         remove_meta_box( 'commentsdiv' , $type , 'normal' ); //removes comments
//     }
//
// }
// add_action( 'admin_menu' , 'myprefix_remove_comment_fields' );

/* Remove Comment menu items */
// function myprefix_disable_comment_menu_items() {
//   remove_menu_page( 'edit-comments.php' );
//   remove_submenu_page( 'options-general.php', 'options-discussion.php' );
// }
//
// add_action( 'admin_menu', 'myprefix_disable_comment_menu_items' );
