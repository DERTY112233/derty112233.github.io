<?php
/**
 * Fascinate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fascinate
 */

$current_theme = wp_get_theme( 'fascinate' );

define( 'FASCINATE_VERSION', $current_theme->get( 'Version' ) );

if ( ! function_exists( 'fascinate_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fascinate_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Fascinate, use a find and replace
		 * to change 'fascinate' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fascinate', get_template_directory() . '/languages' );

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

		add_image_size( 'fascinate-thumbnail-one', 800, 450, true ); // Blog, Archive, Search Thumbnail
		add_image_size( 'fascinate-thumbnail-two', 450, 450, true ); // Related Posts

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Main Menu', 'fascinate' ),
			'menu-2' => esc_html__( 'Top Header Menu', 'fascinate' ),
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
		add_theme_support( 'custom-background', apply_filters( 'fascinate_custom_background_args', array(
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

		// Add post-formats for theme
        add_theme_support( 'post-formats', array( 'audio', 'video', 'quote', 'gallery', 'link' ) );

		// Add editor style
		add_theme_support( 'editor-styles' );
		add_editor_style( 'admin/css/editor-style.css' );

		// Add support for gutenberg
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'fascinate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fascinate_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fascinate_content_width', 640 );
}
add_action( 'after_setup_theme', 'fascinate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fascinate_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fascinate' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'fascinate' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget_title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left', 'fascinate' ),
		'id'            => 'footer-left',
		'description'   => esc_html__( 'Add widgets here.', 'fascinate' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget_title"><h3>',
		'after_title'   => '</h3></div>',

	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle', 'fascinate' ),
		'id'            => 'footer-middle',
		'description'   => esc_html__( 'Add widgets here.', 'fascinate' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget_title"><h3>',
		'after_title'   => '</h3></div>',

	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right', 'fascinate' ),
		'id'            => 'footer-right',
		'description'   => esc_html__( 'Add widgets here.', 'fascinate' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget_title"><h3>',
		'after_title'   => '</h3></div>',

	) );

	register_widget( 'Fascinate_Author_Widget' );

	register_widget( 'Fascinate_Post_Widget' );

	register_widget( 'Fascinate_Social_Widget' );
}
add_action( 'widgets_init', 'fascinate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fascinate_scripts() {

	wp_enqueue_style( 'fascinate-style', get_stylesheet_uri() );

	wp_enqueue_style( 'fascinate-google-fonts', fascinate_fonts_url() );

	wp_enqueue_style( 'fascinate-main', get_template_directory_uri() . '/assets/dist/css/main.css' );

	wp_enqueue_script( 'fascinate-bundle', get_template_directory_uri() . '/assets/dist/js/bundle.min.js', array( 'jquery' ), FASCINATE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fascinate_scripts' );


/**
 * Enqueue scripts and styles for admin.
 */
function fascinate_admin_enqueue() {

	wp_enqueue_style( 'fascinate-admin', get_template_directory_uri() . '/admin/css/admin.css' );

	wp_enqueue_script( 'media-upload' );

	wp_enqueue_media();

	wp_enqueue_script( 'fascinate-admin-script', get_template_directory_uri() . '/admin/js/admin-script.js', array( 'jquery' ), FASCINATE_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'fascinate_admin_enqueue' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/theme-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/helper-functions.php';

/**
 * Load custom fields.
 */
require get_template_directory() . '/includes/custom-fields.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/customizer/customizer.php';


/**
 * Load breadcrumbs.
 */
require get_template_directory() . '/third-party/breadcrumbs.php';

/**
 * Load TGM plugin activation.
 */
require get_template_directory() . '/third-party/class-tgm-plugin-activation.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}


/**
 * Load Post Widget.
 */
require get_template_directory() . '/widgets/fascinate-post-widget.php';

/**
 * Load Author Widget.
 */
require get_template_directory() . '/widgets/fascinate-author-widget.php';

/**
 * Load Social Links Widget.
 */
require get_template_directory() . '/widgets/fascinate-social-widget.php';