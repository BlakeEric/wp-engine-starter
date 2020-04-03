<?php
/*
Plugin Name: Custom Post Types
Description: Create custom post types used by this project
Version: 1.0.0
Author: Blake Lundquist
Author URI: https://github.com/BlakeEric
License: GPLv2
*/

/** ////////////////////////////////////////////////////////
*    CUSTOM POST TYPES AND TAXONOMIES
** ///////////////////////////////////////////////////////*/

/*
 Uncomment change options below to register a custom post type
*/

// function myprefix_custom_post_types() {
  // $labels = array(
  // 	'name'               => _x( 'Team', 'post type general name', 'myprefix' ),
  // 	'singular_name'      => _x( 'Team Member', 'post type singular name', 'myprefix' ),
  // 	'menu_name'          => _x( 'Team', 'admin menu', 'myprefix' ),
  // 	'name_admin_bar'     => _x( 'Team', 'add new on admin bar', 'myprefix' ),
  // 	'add_new'            => _x( 'Add New', 'Member', 'myprefix' ),
  // 	'add_new_item'       => __( 'Add New Member', 'myprefix' ),
  // 	'new_item'           => __( 'New Member', 'myprefix' ),
  // 	'edit_item'          => __( 'Edit Member', 'myprefix' ),
  // 	'view_item'          => __( 'View Member', 'myprefix' ),
  // 	'all_items'          => __( 'All Members', 'myprefix' ),
  // 	'search_items'       => __( 'Search Team', 'myprefix' ),
  // 	'not_found'          => __( 'No Members found.', 'myprefix' ),
  // 	'not_found_in_trash' => __( 'No Members found in Trash.', 'myprefix' )
  // );

  // $args = array(
  // 	'labels'             => $labels,
  //  'description'        => __( 'Team Members', 'myprefix' ),
  // 	'public'             => true,
  //  'exclude_from_search'=> true,
  //  'show_in_admin_bar'  => true,
  //  'show_in_nav_menus'  => true,
  //  'publicly_queryable' => false,
  //  'query_var'          => false,
  // 	'show_ui'            => true,
  // 	'show_in_menu'       => true,
  // 	'capability_type'    => 'post',
  // 	'has_archive'        => false,
  // 	'hierarchical'       => false,
  //  'menu_icon'          => 'dashicons-groups',
  // 	'menu_position'      => 5,
  // 	'supports'           => array( 'title', 'editor' )
  // );
  // register_post_type( 'team', $args );

// }
// add_action( 'init', 'myprefix_custom_post_types' );


/*
 Uncomment and customize to register a custom taxonomy
 Example for creating a "Team" custom post type
*/

//function myprefix_custom_taxonomies() {
//	$labels = array(
//		'name'              => _x( 'Category', 'taxonomy general name', 'myprefix' ),
//		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'myprefix' ),
//		'search_items'      => __( 'Search Categories', 'myprefix' ),
//		'all_items'         => __( 'All Categories', 'myprefix' ),
//		'parent_item'       => __( 'Parent Categories', 'myprefix' ),
//		'parent_item_colon' => __( 'Parent Categories:', 'myprefix' ),
//		'edit_item'         => __( 'Edit Category', 'myprefix' ),
//		'update_item'       => __( 'Update Category', 'myprefix' ),
//		'add_new_item'      => __( 'Add New Category', 'myprefix' ),
//		'new_item_name'     => __( 'New Category', 'myprefix' ),
//		'menu_name'         => __( 'Categories', 'myprefix' ),
//	);
//
//	$args = array(
//		'hierarchical'      => false,
//		'labels'            => $labels,
//		'show_ui'           => true,
//		'show_admin_column' => true,
//		'query_var'         => true,
//		'rewrite'           => array( 'slug' => 'category' ),
//	);
//
//	register_taxonomy( 'press_category', array( 'press' ), $args );
//}
//
//add_action( 'init', 'myprefix_custom_taxonomies', 0 );
