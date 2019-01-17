<?php
   /*
   Plugin Name: Stubben Products
   Plugin URI: http://peytongregory.com
   description: Display Stubben Products that are not available for sale online.
   Version: 1.0
   Author: peytongregory
   Author URI: http://peytongregory.com
   License: GPL2
   */



// Register Custom Post Type
function stubben_prod_post_type() {

	$labels = array(
		'name'                  => _x( 'Display Products', 'Post Type General Name', 'stubben-products' ),
		'singular_name'         => _x( 'Display Product', 'Post Type Singular Name', 'stubben-products' ),
		'menu_name'             => __( 'Display Products', 'stubben-products' ),
		'name_admin_bar'        => __( 'Display Product', 'stubben-products' ),
		'archives'              => __( 'Display Products', 'stubben-products' ),
		'attributes'            => __( 'Display Product Attributes', 'stubben-products' ),
		'parent_item_colon'     => __( 'Parent Display Product:', 'stubben-products' ),
		'all_items'             => __( 'All Display Products', 'stubben-products' ),
		'add_new_item'          => __( 'Add New Display Product', 'stubben-products' ),
		'add_new'               => __( 'Add New', 'stubben-products' ),
		'new_item'              => __( 'New Display Product', 'stubben-products' ),
		'edit_item'             => __( 'Edit Display Product', 'stubben-products' ),
		'update_item'           => __( 'Update Display Product', 'stubben-products' ),
		'view_item'             => __( 'View Display Product', 'stubben-products' ),
		'view_items'            => __( 'View Display Products', 'stubben-products' ),
		'search_items'          => __( 'Search Display Product', 'stubben-products' ),
		'not_found'             => __( 'Not found', 'stubben-products' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'stubben-products' ),
		'featured_image'        => __( 'Display Product Featured Image', 'stubben-products' ),
		'set_featured_image'    => __( 'Set Display Product featured image', 'stubben-products' ),
		'remove_featured_image' => __( 'Remove Display Product featured image', 'stubben-products' ),
		'use_featured_image'    => __( 'Use as Display Product featured image', 'stubben-products' ),
		'insert_into_item'      => __( 'Insert into Display Product', 'stubben-products' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Display Product', 'stubben-products' ),
		'items_list'            => __( 'Display Products list', 'stubben-products' ),
		'items_list_navigation' => __( 'Display Products list navigation', 'stubben-products' ),
		'filter_items_list'     => __( 'Filter Display Products list', 'stubben-products' ),
	);
	$rewrite = array(
		'slug'                  => 'd-product',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Display Product', 'stubben-products' ),
		'description'           => __( 'Display Only Products', 'stubben-products' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'stubben_prod_cat', ' stubben_prod_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-carrot',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'stubben_prod', $args );

}
add_action( 'init', 'stubben_prod_post_type', 0 );

// Register Custom Taxonomy
function stubben_prod_cat_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'stubben-products' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'stubben-products' ),
		'menu_name'                  => __( 'Category', 'stubben-products' ),
		'all_items'                  => __( 'All Categories', 'stubben-products' ),
		'parent_item'                => __( 'Parent Category', 'stubben-products' ),
		'parent_item_colon'          => __( 'Parent Category', 'stubben-products' ),
		'new_item_name'              => __( 'New Display Product Category', 'stubben-products' ),
		'add_new_item'               => __( 'Add New Category', 'stubben-products' ),
		'edit_item'                  => __( 'Edit Category', 'stubben-products' ),
		'update_item'                => __( 'Update Category', 'stubben-products' ),
		'view_item'                  => __( 'View Category', 'stubben-products' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'stubben-products' ),
		'add_or_remove_items'        => __( 'Add or remove Categories', 'stubben-products' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'stubben-products' ),
		'popular_items'              => __( 'Popular Categories', 'stubben-products' ),
		'search_items'               => __( 'SearchCategories', 'stubben-products' ),
		'not_found'                  => __( 'Not Found', 'stubben-products' ),
		'no_terms'                   => __( 'No Categories', 'stubben-products' ),
		'items_list'                 => __( 'Categories list', 'stubben-products' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'stubben-products' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'stubben_prod_cat', array( 'stubben_prod' ), $args );

}
add_action( 'init', 'stubben_prod_cat_taxonomy', 0 );

// Register Custom Taxonomy
function stubben_prod_tag_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tags', 'Taxonomy General Name', 'stubben-products' ),
		'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'stubben-products' ),
		'menu_name'                  => __( 'Tags', 'stubben-products' ),
		'all_items'                  => __( 'All Tags', 'stubben-products' ),
		'parent_item'                => __( 'Parent Tag', 'stubben-products' ),
		'parent_item_colon'          => __( 'Parent Tag:', 'stubben-products' ),
		'new_item_name'              => __( 'New Product Tag', 'stubben-products' ),
		'add_new_item'               => __( 'Add New Tag', 'stubben-products' ),
		'edit_item'                  => __( 'Edit Tag', 'stubben-products' ),
		'update_item'                => __( 'Update Tag', 'stubben-products' ),
		'view_item'                  => __( 'View Tag', 'stubben-products' ),
		'separate_items_with_commas' => __( 'Separate Tags with commas', 'stubben-products' ),
		'add_or_remove_items'        => __( 'Add or remove Tags', 'stubben-products' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'stubben-products' ),
		'popular_items'              => __( 'Popular Tags', 'stubben-products' ),
		'search_items'               => __( 'Search Tags', 'stubben-products' ),
		'not_found'                  => __( 'Not Found', 'stubben-products' ),
		'no_terms'                   => __( 'No Categories', 'stubben-products' ),
		'items_list'                 => __( 'Tag list', 'stubben-products' ),
		'items_list_navigation'      => __( 'Tags list navigation', 'stubben-products' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'stubben_prod_tag', array( 'stubben_prod' ), $args );

}
add_action( 'init', 'stubben_prod_tag_taxonomy', 0 );


?>