<?php

// Register project post-type
function portfolio_post_type() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post type general name', 'karauos' ),
		'singular_name'         => _x( 'Project', 'Post type singular name', 'karauos' ),
		'menu_name'             => _x( 'Projects', 'Admin Menu text', 'karauos' ),
		'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'karauos' ),
		'add_new'               => __( 'Add New', 'karauos' ),
		'add_new_item'          => __( 'Add New Project', 'karauos' ),
		'new_item'              => __( 'New Project', 'karauos' ),
		'edit_item'             => __( 'Edit Project', 'karauos' ),
		'view_item'             => __( 'View Project', 'karauos' ),
		'all_items'             => __( 'All Projects', 'karauos' ),
		'search_items'          => __( 'Search Projects', 'karauos' ),
		'parent_item_colon'     => __( 'Parent Projects:', 'karauos' ),
		'not_found'             => __( 'No Projects found.', 'karauos' ),
		'not_found_in_trash'    => __( 'No Projects found in Trash.', 'karauos' ),
		'featured_image'        => _x( 'Project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'karauos' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'karauos' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'karauos' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'karauos' ),
		'archives'              => _x( 'Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'karauos' ),
		'insert_into_item'      => _x( 'Insert into Project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'karauos' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'karauos' ),
		'filter_items_list'     => _x( 'Filter Projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'karauos' ),
		'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'karauos' ),
		'items_list'            => _x( 'Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'karauos' ),
	);
	$args = array(
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'portfolio_cat', 'portfolio_tags' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio_post_type', 0 );