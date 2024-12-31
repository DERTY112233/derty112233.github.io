<?php
/**
 * Fascinate Theme Customizer
 *
 * @package Fascinate
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fascinate_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Load custom customizer control for radio image control
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-radio-image-control.php';

	/**
	 * Load custom customizer control for toggle control
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-toggle-control.php';

	/**
	 * Load custom customizer control for slider control
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-slider-control.php';

	/**
	 * Load customizer functions for intializing theme upsell
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-pro.php';

	$wp_customize->register_section_type( 'Fascinate_Pro' );

	$wp_customize->add_section(
		new Fascinate_Pro( $wp_customize, 'facinate_pro', array(
			'title'       	=> esc_html__( 'Fascinate Pro', 'fascinate' ),
			'button_text' 	=> esc_html__( 'Go Pro',        'fascinate' ),
			'button_url'  	=> 'https://themebeez.com/themes/fascinate-pro/?ref=upsell-btn',
			'priority'		=> 1,
		) )
	);

	/**
	 * Load customizer functions for sanitization of input values of contol fields
	 */
	require get_template_directory() . '/customizer/functions/sanitize-callback.php';

	/**
	 * Load customizer functions for intializing panel, section, and control fields
	 */
	require get_template_directory() . '/customizer/functions/reuseable-callback.php';		

	/**
	 * Load customizer functions for loading control field's choices, declaration of panel, section 
	 * and control fields
	 */
	require get_template_directory() . '/customizer/functions/customizer-fields.php';

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'fascinate_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'fascinate_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'fascinate_customize_register' );

/**
 * Load customizer option choices.
 */
require get_template_directory() . '/customizer/functions/customizer-choices.php';

/**
 * Load active callback functions.
 */
require get_template_directory() . '/customizer/functions/active-callback.php';

/**
 * Load function to load customizer field's default values.
 */
require get_template_directory() . '/customizer/functions/customizer-defaults.php';


/**
 * Load function to load dynamic style.
 */
require get_template_directory() . '/customizer/functions/dynamic-style.php';


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fascinate_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fascinate_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fascinate_customize_preview_js() {

	wp_enqueue_script( 'fascinate-customizer', get_template_directory_uri() . '/customizer/assets/js/customizer.js', array( 'customize-preview' ), FASCINATE_VERSION, true );
}
add_action( 'customize_preview_init', 'fascinate_customize_preview_js' );



/**
 * Enqueue Customizer Scripts and Styles
 */
function fascinate_enqueues() {

	wp_enqueue_style( 'fascinate-customizer-style', get_template_directory_uri() . '/customizer/assets/css/customizer-style.css' );

	wp_register_script( 'fascinate-customizer-script', get_template_directory_uri() . '/customizer/assets/js/customizer-script.js', array( 'jquery' ), FASCINATE_VERSION, true );

	// Localize the script with new data
	$titles = array(
	    'logo_title' => esc_html__( 'Logo Setup', 'fascinate' ),
	    'favicon_title' => esc_html__( 'Favicon', 'fascinate' ),
	    'body_bg_title' => esc_html__( 'Body Background', 'fascinate' ),
	    'header_bg_title' => esc_html__( 'Background Image', 'fascinate' ),
	    'carousel_content_title' => esc_html__( 'Carousel Content', 'fascinate' ),
	    'carousel_layout_title' => esc_html__( 'Carousel Layout', 'fascinate' ),
	    'social_links_title' => esc_html__( 'Social Links', 'fascinate' ),
	    'post_content_title' => esc_html__( 'Post Content', 'fascinate' ),
	    'author_section_title' => esc_html__( 'Author Section', 'fascinate' ),
	    'related_section_title' => esc_html__( 'Related Section', 'fascinate' ),
	    'sidebar_title' => esc_html__( 'Sidebar', 'fascinate' ),
	);

	wp_localize_script( 'fascinate-customizer-script', 'customizer_titles', $titles );
	 
	// Enqueued script with localized data.
	wp_enqueue_script( 'fascinate-customizer-script' );
}
add_action( 'customize_controls_enqueue_scripts', 'fascinate_enqueues' );