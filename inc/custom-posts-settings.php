<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: Organisations.
	 */

	$labels = [
		"name" => __( "Organisations", "custom-post-type-ui" ),
		"singular_name" => __( "Organisation", "custom-post-type-ui" ),
		"menu_name" => __( "Organisations", "custom-post-type-ui" ),
		"all_items" => __( "All Organisations", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Organisation", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Organisation", "custom-post-type-ui" ),
		"new_item" => __( "New Organisation", "custom-post-type-ui" ),
		"view_item" => __( "View Organisation", "custom-post-type-ui" ),
		"view_items" => __( "View Organisations", "custom-post-type-ui" ),
		"search_items" => __( "Search Organisations", "custom-post-type-ui" ),
		"not_found" => __( "No Organisations found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Organisations found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Organisation:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Organisation", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Organisation", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Organisation", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Organisation", "custom-post-type-ui" ),
		"archives" => __( "Organisation archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Organisation", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Organisation", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Organisations list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Organisations list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Organisations list", "custom-post-type-ui" ),
		"attributes" => __( "Organisations attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Organisation", "custom-post-type-ui" ),
		"item_published" => __( "Organisation published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Organisation published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Organisation reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Organisation scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Organisation updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Organisation:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Organisations", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "organisations", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-groups",
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "organisation_category" ],
	];

	register_post_type( "organisations", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Event Tags.
	 */

	$labels = [
		"name" => __( "Event Tags", "custom-post-type-ui" ),
		"singular_name" => __( "Event Tag", "custom-post-type-ui" ),
		"menu_name" => __( "Event Tags", "custom-post-type-ui" ),
		"all_items" => __( "All Event Tags", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Event Tag", "custom-post-type-ui" ),
		"view_item" => __( "View Event Tag", "custom-post-type-ui" ),
		"update_item" => __( "Update Event Tag name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Event Tag", "custom-post-type-ui" ),
		"new_item_name" => __( "New Event Tag name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Event Tag", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Event Tag:", "custom-post-type-ui" ),
		"search_items" => __( "Search Event Tags", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Event Tags", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Event Tags with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Event Tags", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Event Tags", "custom-post-type-ui" ),
		"not_found" => __( "No Event Tags found", "custom-post-type-ui" ),
		"no_terms" => __( "No Event Tags", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Event Tags list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Event Tags list", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Event Tags", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'event_tags', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "event_tags",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "event_tags", [ "event_listing" ], $args );

	/**
	 * Taxonomy: Categories.
	 */

	$labels = [
		"name" => __( "Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Category", "custom-post-type-ui" ),
		"menu_name" => __( "Categories", "custom-post-type-ui" ),
		"all_items" => __( "All Categories", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Category", "custom-post-type-ui" ),
		"view_item" => __( "View Category", "custom-post-type-ui" ),
		"update_item" => __( "Update Category name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Category", "custom-post-type-ui" ),
		"new_item_name" => __( "New Category name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Category", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Category:", "custom-post-type-ui" ),
		"search_items" => __( "Search Categories", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Categories", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Categories with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Categories", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Categories", "custom-post-type-ui" ),
		"not_found" => __( "No Categories found", "custom-post-type-ui" ),
		"no_terms" => __( "No Categories", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Categories list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Categories list", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'event_categories', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "event_categories",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "event_categories", [ "event_listing" ], $args );

	/**
	 * Taxonomy: Organisation Categories.
	 */

	$labels = [
		"name" => __( "Organisation Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Organisation Category", "custom-post-type-ui" ),
		"menu_name" => __( "Organisation Categories", "custom-post-type-ui" ),
		"all_items" => __( "All Organisation Categories", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Organisation Category", "custom-post-type-ui" ),
		"view_item" => __( "View Organisation Category", "custom-post-type-ui" ),
		"update_item" => __( "Update Organisation Category name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Organisation Category", "custom-post-type-ui" ),
		"new_item_name" => __( "New Organisation Category name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Organisation Category", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Organisation Category:", "custom-post-type-ui" ),
		"search_items" => __( "Search Organisation Categories", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Organisation Categories", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Organisation Categories with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Organisation Categories", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Organisation Categories", "custom-post-type-ui" ),
		"not_found" => __( "No Organisation Categories found", "custom-post-type-ui" ),
		"no_terms" => __( "No Organisation Categories", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Organisation Categories list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Organisation Categories list", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Organisation Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'organisation_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "organisation_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "organisation_category", [ "organisations" ], $args );

	/**
	 * Taxonomy: Availabilities.
	 */

	$labels = [
		"name" => __( "Availabilities", "custom-post-type-ui" ),
		"singular_name" => __( "Availability", "custom-post-type-ui" ),
		"menu_name" => __( "Availabilities", "custom-post-type-ui" ),
		"all_items" => __( "All Availabilities", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Availability", "custom-post-type-ui" ),
		"view_item" => __( "View Availability", "custom-post-type-ui" ),
		"update_item" => __( "Update Availability name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Availability", "custom-post-type-ui" ),
		"new_item_name" => __( "New Availability name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Availability", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Availability:", "custom-post-type-ui" ),
		"search_items" => __( "Search Availabilities", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Availabilities", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Availabilities with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Availabilities", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Availabilities", "custom-post-type-ui" ),
		"not_found" => __( "No Availabilities found", "custom-post-type-ui" ),
		"no_terms" => __( "No Availabilities", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Availabilities list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Availabilities list", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Availabilities", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'availability', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "availability",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "availability", [ "event_listing" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
