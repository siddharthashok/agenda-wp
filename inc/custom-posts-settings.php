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
		"taxonomies" => [ "category", "post_tag" ],
	];

	register_post_type( "organisations", $args );

	/**
	 * Post Type: Events.
	 */

	$labels = [
		"name" => __( "Events", "custom-post-type-ui" ),
		"singular_name" => __( "Event", "custom-post-type-ui" ),
		"menu_name" => __( "Events", "custom-post-type-ui" ),
		"all_items" => __( "All Events", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Event", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Event", "custom-post-type-ui" ),
		"new_item" => __( "New Event", "custom-post-type-ui" ),
		"view_item" => __( "View Event", "custom-post-type-ui" ),
		"view_items" => __( "View Events", "custom-post-type-ui" ),
		"search_items" => __( "Search Events", "custom-post-type-ui" ),
		"not_found" => __( "No Events found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Events found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Event:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Event", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Event", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Event", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Event", "custom-post-type-ui" ),
		"archives" => __( "Event archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Event", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Event", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Events list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Events list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Events list", "custom-post-type-ui" ),
		"attributes" => __( "Events attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Event", "custom-post-type-ui" ),
		"item_published" => __( "Event published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Event published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Event reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Event scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Event updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Event:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Events", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "event", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "category", "post_tag", "availability" ],
	];

	register_post_type( "event", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {

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
	register_taxonomy( "availability", [ "event" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
