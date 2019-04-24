<?php
/**
 * vtest functions and definitions
 *
 * @package vtest
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'vtest_setup' ) ):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vtest_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on vtest, use a find and replace
		 * to change 'vtest' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'vtest', get_template_directory().'/languages' );

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
		register_nav_menus( [
			'menu-1' => esc_html__( 'Primary', 'vtest' )
		] );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		] );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'vtest_custom_background_args', [
			'default-color' => 'ffffff',
			'default-image' => ''
		] ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', [
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true
		] );
	}

endif;
add_action( 'after_setup_theme', 'vtest_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vtest_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'vtest_content_width', 640 );
}

add_action( 'after_setup_theme', 'vtest_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vtest_widgets_init() {
	register_sidebar( [
		'name'          => esc_html__( 'Sidebar', 'vtest' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vtest' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	] );
}

add_action( 'widgets_init', 'vtest_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vtest_scripts() {
	wp_enqueue_style( 'vtest-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'vtest-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'vtest-skip-link-focus-fix', get_template_directory_uri().'/js/skip-link-focus-fix.js', [], '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Add Material scripts and styles
	// if ( ! is_admin() ) {
	// 	wp_deregister_script( 'jquery' );
	// 	wp_enqueue_script( 'material-jquery', 'http://code.jquery.com/jquery-2.1.3.min.js', [], '1.0', false );

	// }
	wp_enqueue_style( 'material-style', get_template_directory_uri().'/css/materialize.css' );
	wp_enqueue_script( 'material-script', get_template_directory_uri().'/js/bin/materialize.js', ['jquery'], '1.0', false );
  wp_enqueue_script( 'material-custom', get_template_directory_uri().'/js/material-custom-scripts.js', ['jquery'], '1.0', false );
  
  wp_enqueue_script( 'my-ajax-script', get_template_directory_uri().'/js/my-ajax-script.js', ['jquery'] );
  wp_localize_script( 'my-ajax-script', 'myAjax', [ 'ajaxurl' => admin_url( 'admin-ajax.php' ) ] );        
}

add_action( 'wp_enqueue_scripts', 'vtest_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory().'/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory().'/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory().'/inc/jetpack.php';
}

/**
 * My Ajax stuff
 */
add_action("wp_ajax_my_hs_users", "my_hs_users");
add_action("wp_ajax_nopriv_my_hs_users", "my_hs_users");

function my_hs_users() {

  if ( !wp_verify_nonce( $_REQUEST['nonce'], "my_hs_user_nonce")) {
    exit("No naughty business please");
  }   

  $api_key = '51b7d93f-fd45-4d33-ac0d-d3deb6c29604';
  $all_contacts_url = 'https://api.hubapi.com/contacts/v1/lists/all/contacts/all?hapikey=';

  $request = wp_remote_get( $all_contacts_url.$api_key );

  if( is_wp_error( $request ) ) {
    return false; // Bail early
  }

  $body = wp_remote_retrieve_body( $request );
  // $data = json_decode( $body );

  if( $body ) {
    echo $body;
  }

  die();
}
