<?php

// Register Custom portfolio cat Taxonomy
function portfolio_cat()  {

	$labels = array(
		'name'                       => __( 'Project Categories', 'karauos' ),
		'singular_name'              => __( 'Project Category', 'karauos' ),
		'menu_name'                  => __( 'Project Categories', 'karauos' ),
		'edit_item'                  => __( 'Edit Project Category', 'karauos' ),
		'update_item'                => __( 'Update Project Category', 'karauos' ),
		'add_new_item'               => __( 'Add New Project Category', 'karauos' ),
		'new_item_name'              => __( 'New Project Category Name', 'karauos' ),
		'parent_item'                => __( 'Parent Project Category', 'karauos' ),
		'parent_item_colon'          => __( 'Parent Project Category:', 'karauos' ),
		'all_items'                  => __( 'All Project Categories', 'karauos' ),
		'search_items'               => __( 'Search Project Categories', 'karauos' ),
		'popular_items'              => __( 'Popular Project Categories', 'karauos' ),
		'separate_items_with_commas' => __( 'Separate Project categories with commas', 'karauos' ),
		'add_or_remove_items'        => __( 'Add or remove Project categories', 'karauos' ),
		'choose_from_most_used'      => __( 'Choose from the most used Project categories', 'karauos' ),
		'not_found'                  => __( 'No Project categories found.', 'karauos' ),
		'items_list_navigation'      => __( 'Project categories list navigation', 'karauos' ),
		'items_list'                 => __( 'Project categories list', 'karauos' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
        'show_in_rest'               => true,
	);
	register_taxonomy( 'portfolio_cat', 'portfolio', $args );
}


// Hook into the 'init' action
add_action( 'init', 'portfolio_cat', 0 );


// Register Custom Taxonomy
function portfolio_tags() {

	$labels = array(
		'name'                       => __( 'Project Tags', 'karauos' ),
		'singular_name'              => __( 'Project Tag', 'karauos' ),
		'menu_name'                  => __( 'Project Tags', 'karauos' ),
		'edit_item'                  => __( 'Edit Project Tag', 'karauos' ),
		'update_item'                => __( 'Update Project Tag', 'karauos' ),
		'add_new_item'               => __( 'Add New Project Tag', 'karauos' ),
		'new_item_name'              => __( 'New Project Tag Name', 'karauos' ),
		'parent_item'                => __( 'Parent Project Tag', 'karauos' ),
		'parent_item_colon'          => __( 'Parent Project Tag:', 'karauos' ),
		'all_items'                  => __( 'All Project Tags', 'karauos' ),
		'search_items'               => __( 'Search Project Tags', 'karauos' ),
		'popular_items'              => __( 'Popular Project Tags', 'karauos' ),
		'separate_items_with_commas' => __( 'Separate Project tags with commas', 'karauos' ),
		'add_or_remove_items'        => __( 'Add or remove Project tags', 'karauos' ),
		'choose_from_most_used'      => __( 'Choose from the most used Project tags', 'karauos' ),
		'not_found'                  => __( 'No Project tags found.', 'karauos' ),
		'items_list_navigation'      => __( 'Project tags list navigation', 'karauos' ),
		'items_list'                 => __( 'Project tags list', 'karauos' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
        'show_in_rest'               => true,
	);
	register_taxonomy( 'portfolio_tags', array( 'portfolio' ), $args );

}
add_action( 'init', 'portfolio_tags', 0 );