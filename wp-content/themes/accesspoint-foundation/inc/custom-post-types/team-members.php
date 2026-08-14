<?php
/**
 * Team Members Custom Post Type.
 *
 * @package accesspoint-foundation
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the Team Members Custom Post Type.
 *
 * @return void
 */
function teamMembers() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post type general name', 'accesspoint-foundation' ),
		'singular_name'         => _x( 'Team Member', 'Post type singular name', 'accesspoint-foundation' ),
		'menu_name'             => _x( 'Team Members', 'Admin menu text', 'accesspoint-foundation' ),
		'name_admin_bar'        => _x( 'Team Member', 'Add New toolbar text', 'accesspoint-foundation' ),
		'add_new'               => __( 'Add New', 'accesspoint-foundation' ),
		'add_new_item'          => __( 'Add New Team Member', 'accesspoint-foundation' ),
		'new_item'              => __( 'New Team Member', 'accesspoint-foundation' ),
		'edit_item'             => __( 'Edit Team Member', 'accesspoint-foundation' ),
		'view_item'             => __( 'View Team Member', 'accesspoint-foundation' ),
		'all_items'             => __( 'All Team Members', 'accesspoint-foundation' ),
		'search_items'          => __( 'Search Team Members', 'accesspoint-foundation' ),
		'parent_item_colon'     => __( 'Parent Team Member:', 'accesspoint-foundation' ),
		'not_found'             => __( 'No team members found.', 'accesspoint-foundation' ),
		'not_found_in_trash'    => __( 'No team members found in Trash.', 'accesspoint-foundation' ),
		'featured_image'        => __( 'Team Member Photo', 'accesspoint-foundation' ),
		'set_featured_image'    => __( 'Set team member photo', 'accesspoint-foundation' ),
		'remove_featured_image' => __( 'Remove team member photo', 'accesspoint-foundation' ),
		'use_featured_image'    => __( 'Use as team member photo', 'accesspoint-foundation' ),
		'archives'              => __( 'Team Member Archives', 'accesspoint-foundation' ),
		'insert_into_item'      => __( 'Insert into team member', 'accesspoint-foundation' ),
		'uploaded_to_this_item' => __( 'Uploaded to this team member', 'accesspoint-foundation' ),
		'filter_items_list'     => __( 'Filter team members list', 'accesspoint-foundation' ),
		'items_list_navigation' => __( 'Team members list navigation', 'accesspoint-foundation' ),
		'items_list'            => __( 'Team members list', 'accesspoint-foundation' ),
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

		// Connect the custom taxonomies to the post type.
		'taxonomies' => array(
			'team_category',
			'team_location',
		),

		// Optional archive title used in menus and admin screens.
		'description' => __( 'Team members displayed across the website.', 'accesspoint-foundation' ),
	);

	register_post_type( 'team_member', $args );
}
add_action( 'init', 'teamMembers' );

/**
 * Register the Team Role taxonomy.
 *
 * This behaves like standard WordPress categories, including support for
 * parent and child terms.
 *
 * @return void
 */
function teamMembersTaxonomy() {

	$labels = array(
		'name'              => _x( 'Team Role', 'Taxonomy general name', 'accesspoint-foundation' ),
		'singular_name'     => _x( 'Team Category', 'Taxonomy singular name', 'accesspoint-foundation' ),
		'search_items'      => __( 'Search Team Role', 'accesspoint-foundation' ),
		'all_items'         => __( 'All Team Role', 'accesspoint-foundation' ),
		'parent_item'       => __( 'Parent Team Category', 'accesspoint-foundation' ),
		'parent_item_colon' => __( 'Parent Team Category:', 'accesspoint-foundation' ),
		'edit_item'         => __( 'Edit Team Category', 'accesspoint-foundation' ),
		'update_item'       => __( 'Update Team Category', 'accesspoint-foundation' ),
		'add_new_item'      => __( 'Add New Team Category', 'accesspoint-foundation' ),
		'new_item_name'     => __( 'New Team Category Name', 'accesspoint-foundation' ),
		'menu_name'         => __( 'Team Role', 'accesspoint-foundation' ),
		'not_found'         => __( 'No Team Role found.', 'accesspoint-foundation' ),
		'back_to_items'     => __( 'Back to Team Role', 'accesspoint-foundation' ),
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

/**
 * Register the Team Locations taxonomy.
 *
 * This behaves like standard WordPress categories, including support for
 * parent and child terms.
 *
 * @return void
 */
function teamMembersLocationTaxonomy() {

	$labels = array(
		'name'              => _x( 'Team Locations', 'Taxonomy general name', 'accesspoint-foundation' ),
		'singular_name'     => _x( 'Team Location', 'Taxonomy singular name', 'accesspoint-foundation' ),
		'search_items'      => __( 'Search Team Locations', 'accesspoint-foundation' ),
		'all_items'         => __( 'All Team Locations', 'accesspoint-foundation' ),
		'parent_item'       => __( 'Parent Team Location', 'accesspoint-foundation' ),
		'parent_item_colon' => __( 'Parent Team Location:', 'accesspoint-foundation' ),
		'edit_item'         => __( 'Edit Team Location', 'accesspoint-foundation' ),
		'update_item'       => __( 'Update Team Location', 'accesspoint-foundation' ),
		'add_new_item'      => __( 'Add New Team Location', 'accesspoint-foundation' ),
		'new_item_name'     => __( 'New Team Location Name', 'accesspoint-foundation' ),
		'menu_name'         => __( 'Team Locations', 'accesspoint-foundation' ),
		'not_found'         => __( 'No team locations found.', 'accesspoint-foundation' ),
		'back_to_items'     => __( 'Back to Team Locations', 'accesspoint-foundation' ),
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
			'slug'         => 'team/location',
			'with_front'   => false,
			'hierarchical' => true,
		),

		'query_var' => true,
	);

	register_taxonomy(
		'team_location',
		array( 'team_member' ),
		$args
	);
}
add_action( 'init', 'teamMembersLocationTaxonomy' );