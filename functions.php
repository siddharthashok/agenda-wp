<?php
/**
 * agenda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package agenda
 */

if ( ! function_exists( 'agenda_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function agenda_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on agenda, use a find and replace
		 * to change 'agenda' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'agenda', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Top Main Menu', 'agenda' ),
			'footer-menu-one' => esc_html__( 'Footer Menu One', 'agenda' ),
			'footer-menu-two' => esc_html__( 'Footer Menu Two', 'agenda' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'agenda_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_theme_support( 'event-manager-templates' );
	}
endif;
add_action( 'after_setup_theme', 'agenda_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agenda_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'agenda_content_width', 640 );
}
add_action( 'after_setup_theme', 'agenda_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agenda_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'agenda' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'agenda' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'agenda_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function agenda_scripts() {
	wp_enqueue_style( 'agenda-style', get_stylesheet_uri(), null, null, null );

	wp_enqueue_script( 'agenda-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'agenda-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'agenda_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Filter
 */
require get_template_directory() . '/inc/custom-filter.php';

/**
*
* AJAX
*/
require get_template_directory() . '/inc/ajax.php';


/**
 * Custom posts type settings
 */
require get_template_directory() . '/inc/custom-posts-settings.php';

/**
 * ACF settings
 */
require get_template_directory() . '/inc/acf-settings.php';


// add_filter( 'use_block_editor_for_post', '__return_false' );

function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyBt1Y1nlJX0S0KTjan_ly14IUmY94tnmC0';
    return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// function organisation_check_list_to_radio_button( $args ) {
//     if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'organisation' /* <== Change to your required taxonomy */ ) {
//         if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) { // Don't override 3rd party walkers.
//             if ( ! class_exists( 'Organisation_Check_List_To_Radio_Button' ) ) {
//                 /**
//                  * Custom walker for switching checkbox inputs to radio.
//                  *
//                  * @see Walker_Category_Checklist
//                  */
//                 class Organisation_Check_List_To_Radio_Button extends Walker_Category_Checklist {
//                     function walk( $elements, $max_depth, ...$args ) {
// 						$output = parent::walk( $elements, $max_depth, ...$args );
//                         $output = str_replace(
//                             array( 'type="checkbox"', "type='checkbox'" ),
//                             array( 'type="radio"', "type='radio'" ),
//                             $output
//                         );

//                         return $output;
//                     }
//                 }
//             }

//             $args['walker'] = new Organisation_Check_List_To_Radio_Button;
//         }
//     }

//     return $args;
// }

// add_filter( 'wp_terms_checklist_args', 'organisation_check_list_to_radio_button' );

// add_action( 'admin_enqueue_scripts','agenda_enqueue_admin_script');

// function agenda_enqueue_admin_script()
// {
// 	if ( ! $screen = get_current_screen() ) {
// 		return;
// 	}

// 	$post_types = [ 'post', 'events' ];
// 	if ( in_array( $screen->id, $post_types ) ) {
// 		// Make certain `wp-editor` is added as a dependency.
// 		wp_enqueue_script( 'my-terms-selector', get_template_directory_uri()."/js/inputTypeCustomizer.js", [ 'wp-editor' ] );
// 	}
// }

// print_r(organisation_filter(array("category-one")));
