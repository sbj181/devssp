<?php
/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 */

if ( ! function_exists( 'wp_bootstrap_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_bootstrap_starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
	 * to change 'wp-bootstrap-starter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-bootstrap-starter', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'wp-bootstrap-starter' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wp_bootstrap_starter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

		function wp_boostrap_starter_add_editor_styles() {
				add_editor_style( 'custom-editor-style.css' );
		}
		add_action( 'admin_init', 'wp_boostrap_starter_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'wp_bootstrap_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_bootstrap_starter_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array( //BLOG SIDEBAR
		'name'          => esc_html__( 'Blog Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array( //PEOPLE SIDEBAR
		'name'          => esc_html__( 'People Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-people',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array( //SSPTV SIDEBAR
		'name'          => esc_html__( 'SSPTV Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-ssptv',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array( //PRESS SIDEBAR
		'name'          => esc_html__( 'Press Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-press',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array( //SERVICE SIDEBAR
		'name'          => esc_html__( 'Service Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-service',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array( //DOWNLOAD SIDEBAR
		'name'          => esc_html__( 'Download Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-download',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array( //SOLUTION SIDEBAR
		'name'          => esc_html__( 'Solutions Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-solution',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array( //EVENT SIDEBAR
		'name'          => esc_html__( 'Events Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-event',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array( //EVENT SIDEBAR
		'name'          => esc_html__( 'Job Opening Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-job_opening',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
		register_sidebar( array(
				'name'          => esc_html__( 'Footer 1', 'wp-bootstrap-starter' ),
				'id'            => 'footer-1',
				'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
		) );
		register_sidebar( array(
				'name'          => esc_html__( 'Footer 2', 'wp-bootstrap-starter' ),
				'id'            => 'footer-2',
				'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
		) );
}
add_action( 'widgets_init', 'wp_bootstrap_starter_widgets_init' );

/**
 * ACF Google Map API key
 */

function my_acf_init() {

		acf_update_setting('google_api_key', 'AIzaSyAISA2vVmLtnlQKyPhm4eI7jE0MQV9mGMs');
}

add_action('acf/init', 'my_acf_init');

/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_starter_scripts() {

	// load bootstrap css
	wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	// load bootstrap css
	wp_enqueue_style( 'wp-bootstrap-starter-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.1.0' );
	// load AItheme styles
	// load WP Bootstrap Starter styles
	wp_enqueue_style( 'wp-bootstrap-starter-style', get_stylesheet_uri(), false, '1.1.3', 'all' );
	wp_enqueue_script('jquery');

	// Internet Explorer HTML5 support
	wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/js/html5.js', array(), '3.7.0', false );
	wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
	wp_enqueue_script('wp-bootstrap-starter-tether', get_template_directory_uri() . '/js/tether.min.js', array() );
	wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array() );
	wp_enqueue_script('wp-bootstrap-starter-themejs', get_template_directory_uri() . '/js/theme-script.js', array() );

	wp_enqueue_script('countup.js', get_template_directory_uri() . '/js/countUp.js', array() );

	// load slick.js
//	wp_enqueue_script('slickjs', get_template_directory_uri() . '/js/slick.min.js', array() );
//	wp_enqueue_script('slickjs-init', get_template_directory_uri() . '/js/slick-init.js', array() );
//	wp_enqueue_style('slickcss', get_template_directory_uri() . '/css/slick.css', array() );
//	wp_enqueue_style('slickcsstheme', get_template_directory_uri() . '/css/slick-theme.css', array() );

	wp_enqueue_script( 'wp-bootstrap-starter-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_scripts' );


function wp_bootstrap_starter_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		<div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "wp-bootstrap-starter" ) . '</div>
		<div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "wp-bootstrap-starter" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "wp-bootstrap-starter" ) . '" class="btn btn-primary"/></div>
		</form>';
		return $o;
}
add_filter( 'the_password_form', 'wp_bootstrap_starter_password_form' );

/**
 * Added Image Sizes
 */
function pw_add_image_sizes() {
	add_image_size( 'inset-image-crop', '250', '200', array( "1", "") );
}
add_action( 'init', 'pw_add_image_sizes' );

function pw_show_image_sizes($sizes) {
		$sizes['inset-image-crop'] = __( 'Small Crop', 'pippin' );

		return $sizes;
}
add_filter('image_size_names_choose', 'pw_show_image_sizes');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
		require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}