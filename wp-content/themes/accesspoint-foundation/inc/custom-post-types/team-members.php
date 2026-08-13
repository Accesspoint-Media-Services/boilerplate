<?php
/**
 * Team Members Custom Post Type.
 *
 * @package YourTheme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the Team Members Custom Post Type.
 *
 * @return void
 */
function teamMembers() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post type general name', 'yourtheme' ),
		'singular_name'         => _x( 'Team Member', 'Post type singular name', 'yourtheme' ),
		'menu_name'             => _x( 'Team Members', 'Admin menu text', 'yourtheme' ),
		'name_admin_bar'        => _x( 'Team Member', 'Add New toolbar text', 'yourtheme' ),
		'add_new'               => __( 'Add New', 'yourtheme' ),
		'add_new_item'          => __( 'Add New Team Member', 'yourtheme' ),
		'new_item'              => __( 'New Team Member', 'yourtheme' ),
		'edit_item'             => __( 'Edit Team Member', 'yourtheme' ),
		'view_item'             => __( 'View Team Member', 'yourtheme' ),
		'all_items'             => __( 'All Team Members', 'yourtheme' ),
		'search_items'          => __( 'Search Team Members', 'yourtheme' ),
		'parent_item_colon'     => __( 'Parent Team Member:', 'yourtheme' ),
		'not_found'             => __( 'No team members found.', 'yourtheme' ),
		'not_found_in_trash'    => __( 'No team members found in Trash.', 'yourtheme' ),
		'featured_image'        => __( 'Team Member Photo', 'yourtheme' ),
		'set_featured_image'    => __( 'Set team member photo', 'yourtheme' ),
		'remove_featured_image' => __( 'Remove team member photo', 'yourtheme' ),
		'use_featured_image'    => __( 'Use as team member photo', 'yourtheme' ),
		'archives'              => __( 'Team Member Archives', 'yourtheme' ),
		'insert_into_item'      => __( 'Insert into team member', 'yourtheme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this team member', 'yourtheme' ),
		'filter_items_list'     => __( 'Filter team members list', 'yourtheme' ),
		'items_list_navigation' => __( 'Team members list navigation', 'yourtheme' ),
		'items_list'            => __( 'Team members list', 'yourtheme' ),
	);

	$args = array(
		'labels' => $labels,

		// Public visibility.
		'public'             => true,
		'publicly_queryable' => true,
		'exclude_from_search'=> false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'show_in_nav_menus'  => true,

		// Gutenberg and REST API support.
		'show_in_rest' => true,

		// Admin menu.
		'menu_position' => 20,
		'menu_icon'     => 'dashicons-groups',

		// URL and archive configuration.
		'has_archive' => 'team',
		'rewrite'     => array(
			'slug'       => 'team',
			'with_front' => false,
			'feeds'      => true,
			'pages'      => true,
		),

		// Post type behaviour.
		'hierarchical' => false,
		'query_var'    => true,
		'can_export'   => true,

		// Editor features.
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revisions',
			'custom-fields',
		),

		// Connect the custom taxonomy to the post type.
		'taxonomies' => array(
			'team_category',
		),

		// Optional archive title used in menus and admin screens.
		'description' => __( 'Team members displayed across the website.', 'yourtheme' ),
	);

	register_post_type( 'team_member', $args );
}
add_action( 'init', 'teamMembers' );

/**
 * Register the Team Categories taxonomy.
 *
 * This behaves like standard WordPress categories, including support for
 * parent and child terms.
 *
 * @return void
 */
function teamMembersTaxonomy() {

	$labels = array(
		'name'              => _x( 'Team Categories', 'Taxonomy general name', 'yourtheme' ),
		'singular_name'     => _x( 'Team Category', 'Taxonomy singular name', 'yourtheme' ),
		'search_items'      => __( 'Search Team Categories', 'yourtheme' ),
		'all_items'         => __( 'All Team Categories', 'yourtheme' ),
		'parent_item'       => __( 'Parent Team Category', 'yourtheme' ),
		'parent_item_colon' => __( 'Parent Team Category:', 'yourtheme' ),
		'edit_item'         => __( 'Edit Team Category', 'yourtheme' ),
		'update_item'       => __( 'Update Team Category', 'yourtheme' ),
		'add_new_item'      => __( 'Add New Team Category', 'yourtheme' ),
		'new_item_name'     => __( 'New Team Category Name', 'yourtheme' ),
		'menu_name'         => __( 'Team Categories', 'yourtheme' ),
		'not_found'         => __( 'No team categories found.', 'yourtheme' ),
		'back_to_items'     => __( 'Back to Team Categories', 'yourtheme' ),
	);

	$args = array(
		'labels' => $labels,

		// True makes this category-style rather than tag-style.
		'hierarchical' => true,

		'public'            => true,
		'publicly_queryable'=> true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,

		// Gutenberg and REST API support.
		'show_in_rest' => true,

		// Term URL configuration.
		'rewrite' => array(
			'slug'         => 'team/category',
			'with_front'   => false,
			'hierarchical' => true,
		),

		'query_var' => true,
	);

	register_taxonomy(
		'team_category',
		array( 'team_member' ),
		$args
	);
}
add_action( 'init', 'teamMembersTaxonomy' );