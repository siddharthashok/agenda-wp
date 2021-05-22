<?php
    // Define path and URL to the ACF plugin.
    define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
    define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

    // Include the ACF plugin.
    include_once( MY_ACF_PATH . 'acf.php' );

    // Customize the url setting to fix incorrect asset URLs.
    add_filter('acf/settings/url', 'my_acf_settings_url');
    function my_acf_settings_url( $url ) {
        return MY_ACF_URL;
    }

    // (Optional) Hide the ACF admin menu item.
    add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
    function my_acf_settings_show_admin( $show_admin ) {
        return false;
    }

    // // Include acf meta
    require get_template_directory() . '/inc/acf-meta.php';

    if( function_exists('acf_add_options_page') ) {
	
        acf_add_options_page(array(
            'page_title' 	=> 'Global Settings',
            'menu_title'	=> 'Global Settings',
            'menu_slug' 	=> 'global-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
        
    }
?>
