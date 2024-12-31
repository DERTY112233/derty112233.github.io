<?php

$defaults = fascinate_get_default_theme_options();

if( ! function_exists( 'fascinate_panel_declaration' ) ) {

	function fascinate_panel_declaration() {

		$panels = array(
			array(
				'id' => 'site_header',
				'title' => esc_html__( 'Site Header', 'fascinate' ),
				'description' => '',
				'priority' => 2,
			),
			array(
				'id' => 'site_pages',
				'title' => esc_html__( 'Site Pages', 'fascinate' ),
				'description' => '',
				'priority' => 2,
			),
		);

		if( !empty( $panels ) ) {

			foreach( $panels as $panel ) {

				fascinate_add_panel( $panel['id'], $panel['title'], $panel['description'], $panel['priority'] );
			}
		}
	}
}
fascinate_panel_declaration();


if( ! function_exists( 'fascinate_section_declaration' ) ) {

	function fascinate_section_declaration() {

		$sections = array(
			array(
				'id' => 'site_layout',
				'title' => esc_html__( 'Site Layout', 'fascinate' ),
				'description' => '',
				'panel' => '',
				'priority' => 1,
			),
			array(
				'id' => 'site_preloader',
				'title' => esc_html__( 'Site Preloader', 'fascinate' ),
				'description' => '',
				'panel' => '',
				'priority' => 1,
			),
			array(
				'id' => 'site_logo',
				'title' => esc_html__( 'Site Logo', 'fascinate' ),
				'description' => '',
				'panel' => 'site_header',
				'priority' => '',
			),
			array(
				'id' => 'site_favicon',
				'title' => esc_html__( 'Site Favicon', 'fascinate' ),
				'description' => '',
				'panel' => 'site_header',
				'priority' => '',
			),
			array(
				'id' => 'top_header',
				'title' => esc_html__( 'Top Header', 'fascinate' ),
				'description' => '',
				'panel' => 'site_header',
				'priority' => '',
			),
			array(
				'id' => 'site_carousel',
				'title' => esc_html__( 'Site Carousel', 'fascinate' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'blog_page',
				'title' => esc_html__( 'Blog Page', 'fascinate' ),
				'description' => '',
				'panel' => 'site_pages',
				'priority' => 3,
			),
			array(
				'id' => 'archive_page',
				'title' => esc_html__( 'Archive Page', 'fascinate' ),
				'description' => '',
				'panel' => 'site_pages',
				'priority' => 3,
			),
			array(
				'id' => 'search_page',
				'title' => esc_html__( 'Search Page', 'fascinate' ),
				'description' => '',
				'panel' => 'site_pages',
				'priority' => 3,
			),
			array(
				'id' => 'post_single',
				'title' => esc_html__( 'Post Single', 'fascinate' ),
				'description' => '',
				'panel' => 'site_pages',
				'priority' => 3,
			),
			array(
				'id' => 'page_single',
				'title' => esc_html__( 'Page Single', 'fascinate' ),
				'description' => '',
				'panel' => 'site_pages',
				'priority' => 3,
			),
			array(
				'id' => 'site_breadcrumb',
				'title' => esc_html__( 'Breadcrumb', 'fascinate' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'site_image',
				'title' => esc_html__( 'Site Image', 'fascinate' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'site_sidebar',
				'title' => esc_html__( 'Site Sidebar', 'fascinate' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'site_footer',
				'title' => esc_html__( 'Site Footer', 'fascinate' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'post_excerpt',
				'title' => esc_html__( 'Post Excerpt', 'fascinate' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'post_meta',
				'title' => esc_html__( 'Post Meta', 'fascinate' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
		);

		if( !empty( $sections ) ) {

			foreach( $sections as $section ) {

				fascinate_add_section( $section['id'], $section['title'], $section['description'], $section['panel'], $section['priority'] );
			}
		}
	}
}
fascinate_section_declaration();


if( ! function_exists( 'fascinate_control_rearrange' ) ) {

	function fascinate_control_rearrange() {

		global $wp_customize;

		$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'fascinate' );
		$wp_customize->get_control( 'header_textcolor' )->section = 'title_tagline';
		$wp_customize->get_control( 'background_color' )->section = 'background_image';
		$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Site Background', 'fascinate' );

		$wp_customize->get_control( 'custom_logo' )->section = 'fascinate_section_site_logo';
		$wp_customize->get_control( 'blogname' )->section = 'fascinate_section_site_logo';
		$wp_customize->get_control( 'blogdescription' )->section = 'fascinate_section_site_logo';
		$wp_customize->get_control( 'header_textcolor' )->section = 'fascinate_section_site_logo';
		$wp_customize->get_control( 'display_header_text' )->section = 'fascinate_section_site_logo';
		$wp_customize->get_control( 'site_icon' )->section = 'fascinate_section_site_favicon';
		$wp_customize->get_control( 'header_image' )->section = 'fascinate_section_site_breadcrumb';
		$wp_customize->get_control( 'header_image' )->active_callback = 'fascinate_active_breadcrumb';
		$wp_customize->get_control( 'header_image' )->description = esc_html__( 'Header is used as background image for breadcrumb', 'fascinate' );
		$wp_customize->get_control( 'header_image' )->priority = 20;
	}
}
fascinate_control_rearrange();


/*******************************************************************************************************
******************************* Site Preloader Control Fields Declaration *******************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'display_preloader', esc_html__( 'Enable Preloader', 'fascinate' ), '', '', 'site_preloader' );



/*******************************************************************************************************
******************************* Site Layout Control Fields Declaration *******************************
*******************************************************************************************************/
fascinate_add_select_field( 'site_layout', esc_html__( 'Site Layout', 'fascinate' ), '', fascinate_site_layout_choices(), '', 'site_layout' );




/*******************************************************************************************************
********************************** Header Control Fields Declaration *********************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'display_top_header', esc_html__( 'Display Top Header', 'fascinate' ), '', '', 'top_header' );

fascinate_add_url_field( 'header_facebook_link', esc_html__( 'Facebook Link', 'fascinate' ), '', 'fascinate_active_top_header', 'top_header' );
fascinate_add_url_field( 'header_twitter_link', esc_html__( 'Twitter Link', 'fascinate' ), '', 'fascinate_active_top_header', 'top_header' );
fascinate_add_url_field( 'header_instagram_link', esc_html__( 'Instagram Link', 'fascinate' ), '', 'fascinate_active_top_header', 'top_header' );
fascinate_add_url_field( 'header_pinterest_link', esc_html__( 'Pinterest Link', 'fascinate' ), '', 'fascinate_active_top_header', 'top_header' );
fascinate_add_url_field( 'header_youtube_link', esc_html__( 'Youtube Link', 'fascinate' ), '', 'fascinate_active_top_header', 'top_header' );
fascinate_add_url_field( 'header_linkedin_link', esc_html__( 'Linkedin Link', 'fascinate' ), '', 'fascinate_active_top_header', 'top_header' );
fascinate_add_url_field( 'header_vk_link', esc_html__( 'VK Link', 'fascinate' ), '', 'fascinate_active_top_header', 'social_links' );

fascinate_add_toggle_field( 'enable_cursive_site_title', esc_html__( 'Enable Cursive Site Title', 'fascinate' ), '', '', 'site_logo' );
fascinate_add_slider_field( 'site_identity_section_padding', esc_html__( 'Logo Section Padding', 'fascinate' ), esc_html__( 'Set padding on top and bottom of logo section. The range of value for padding is 0-50.', 'fascinate' ), 'fascinate_active_carousel', 'site_logo', 0, 50, 1 );


/*******************************************************************************************************
********************************** Site Carousel Control Fields Declaration ****************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'display_carousel', esc_html__( 'Display Carousel', 'fascinate' ), '', '', 'site_carousel' );
fascinate_add_select_field( 'carousel_category', esc_html__( 'Carousel Category', 'fascinate' ), '', fascinate_post_category_choices(), 'fascinate_active_carousel', 'site_carousel' );
fascinate_add_number_field( 'carousel_item_no', esc_html__( 'Number of Carousel Items', 'fascinate' ), esc_html__( 'Maximum 5 items and minimum 1 item can be set.', 'fascinate' ), 'fascinate_active_carousel', 'site_carousel', 5, 1, 1 );
fascinate_add_toggle_field( 'carousel_hide_content', esc_html__( 'Display Carousel Content', 'fascinate' ), '', 'fascinate_active_carousel', 'site_carousel' );
fascinate_add_radio_image_field( 'carousel_layout', esc_html__( 'Carousel Layout', 'fascinate' ), '', fascinate_carousel_layout_choices(), 'fascinate_active_carousel', 'site_carousel' );
fascinate_add_toggle_field( 'carousel_enable_spacing', esc_html__( 'Enable Spacing', 'fascinate' ), '', 'fascinate_active_carousel', 'site_carousel' );
fascinate_add_slider_field( 'carousel_height', esc_html__( 'Carousel Height', 'fascinate' ), esc_html__( 'This height will be displayed for devices with display width 992px. The range of value for carousel height is 400-700.', 'fascinate' ), 'fascinate_active_carousel', 'site_carousel', 400, 700, 1 );




/*******************************************************************************************************
************************************* Blog Page Control Fields Declaration *****************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'blog_display_feat_img', esc_html__( 'Display Featured Image', 'fascinate' ), '', '', 'blog_page' );
fascinate_add_toggle_field( 'blog_display_cats', esc_html__( 'Display Post Categories', 'fascinate' ), '', '', 'blog_page' );
fascinate_add_toggle_field( 'blog_display_date', esc_html__( 'Display Post Date', 'fascinate' ), '', '', 'blog_page' );
fascinate_add_toggle_field( 'blog_display_author', esc_html__( 'Display Post Author', 'fascinate' ), '', '', 'blog_page' );
fascinate_add_toggle_field( 'blog_enable_dropcap', esc_html__( 'Enable Dropcap', 'fascinate' ), '', '', 'blog_page' );
fascinate_add_radio_image_field( 'blog_sidebar_position', esc_html__( 'Sidebar Position', 'fascinate' ), '', fascinate_sidebar_position_choices(), 'fascinate_not_active_global_sidebar', 'blog_page' );




/*******************************************************************************************************
********************************** Archive Page Control Fields Declaration *****************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'archive_display_feat_img', esc_html__( 'Display Featured Image', 'fascinate' ), '', '', 'archive_page' );
fascinate_add_toggle_field( 'archive_display_cats', esc_html__( 'Display Post Categories', 'fascinate' ), '', '', 'archive_page' );
fascinate_add_toggle_field( 'archive_display_date', esc_html__( 'Display Post Date', 'fascinate' ), '', '', 'archive_page' );
fascinate_add_toggle_field( 'archive_display_author', esc_html__( 'Display Post Author', 'fascinate' ), '', '', 'archive_page' );
fascinate_add_toggle_field( 'archive_enable_dropcap', esc_html__( 'Enable Dropcap', 'fascinate' ), '', '', 'archive_page' );
fascinate_add_radio_image_field( 'archive_sidebar_position', esc_html__( 'Sidebar Position', 'fascinate' ), '', fascinate_sidebar_position_choices(), 'fascinate_not_active_global_sidebar', 'archive_page' );



/*******************************************************************************************************
*********************************** Search Page Control Fields Declaration *****************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'search_display_feat_img', esc_html__( 'Display Featured Image', 'fascinate' ), '', '', 'search_page' );
fascinate_add_toggle_field( 'search_display_cats', esc_html__( 'Display Post Categories', 'fascinate' ), '', '', 'search_page' );
fascinate_add_toggle_field( 'search_display_date', esc_html__( 'Display Post Date', 'fascinate' ), '', '', 'search_page' );
fascinate_add_toggle_field( 'search_display_author', esc_html__( 'Display Post Author', 'fascinate' ), '', '', 'search_page' );
fascinate_add_toggle_field( 'search_enable_dropcap', esc_html__( 'Enable Dropcap', 'fascinate' ), '', '', 'search_page' );
fascinate_add_radio_image_field( 'search_sidebar_position', esc_html__( 'Sidebar Position', 'fascinate' ), '', fascinate_sidebar_position_choices(), 'fascinate_not_active_global_sidebar', 'search_page' );



/*******************************************************************************************************
*********************************** Blog Single Control Fields Declaration *****************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'display_post_cats', esc_html__( 'Display Categories', 'fascinate' ), '', '', 'post_single' );
fascinate_add_toggle_field( 'display_post_feat_img', esc_html__( 'Display Featured Image', 'fascinate' ), '', '', 'post_single' );
fascinate_add_toggle_field( 'display_post_date', esc_html__( 'Display Posted Date', 'fascinate' ), '', '', 'post_single' );
fascinate_add_toggle_field( 'display_post_author', esc_html__( 'Display Author Name', 'fascinate' ), '', '', 'post_single' );
fascinate_add_toggle_field( 'display_post_tags', esc_html__( 'Display Tags', 'fascinate' ), '', '', 'post_single' );
fascinate_add_select_field( 'display_post_comments_view', esc_html__( 'Comments View', 'fascinate' ), '', fascinate_comment_box_choices(), '', 'post_single' );
fascinate_add_toggle_field( 'display_author_section', esc_html__( 'Display Section', 'fascinate' ), '', '', 'post_single' );
fascinate_add_toggle_field( 'display_related_section', esc_html__( 'Display Section', 'fascinate' ), '', '', 'post_single' );
fascinate_add_text_field( 'related_section_title', esc_html__( 'Section Title', 'fascinate' ), '', 'fascinate_active_related_section', 'post_single' );
fascinate_add_number_field( 'related_posts_no', esc_html__( 'Number of Posts', 'fascinate' ), esc_html__( 'Maximum 4 items and minimum 1 items can be set.', 'fascinate' ), 'fascinate_active_related_section', 'post_single', 4, 1, 1 );
fascinate_add_toggle_field( 'display_related_author_meta', esc_html__( 'Display Author Meta', 'fascinate' ), '', 'fascinate_active_related_section', 'post_single' );
fascinate_add_toggle_field( 'enable_common_post_sidebar_position', esc_html__( 'Enable Common Sidebar Position', 'fascinate' ), '', 'fascinate_not_active_global_sidebar', 'post_single' );
fascinate_add_radio_image_field( 'common_post_sidebar_position', esc_html__( 'Common Sidebar Position', 'fascinate' ), '', fascinate_sidebar_position_choices(), 'fascinate_active_common_post_sidebar', 'post_single' );



/*******************************************************************************************************
*********************************** Page Single Control Fields Declaration *****************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'display_page_feat_img', esc_html__( 'Display Featured Image', 'fascinate' ), '', '', 'page_single' );
fascinate_add_toggle_field( 'enable_common_page_sidebar_position', esc_html__( 'Enable Common Sidebar Position', 'fascinate' ), '', 'fascinate_not_active_global_sidebar', 'page_single' );
fascinate_add_radio_image_field( 'common_page_sidebar_position', esc_html__( 'Common Sidebar Position', 'fascinate' ), '', fascinate_sidebar_position_choices(), 'fascinate_active_common_page_sidebar', 'page_single' );


/*******************************************************************************************************
*********************************** Breadcrumb Control Fields Declaration ******************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'display_breadcrumb', esc_html__( 'Display Breadcrumb', 'fascinate' ), '', '', 'site_breadcrumb' );


/*******************************************************************************************************
************************************** Image Control Fields Declaration ********************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'enable_lazy_loading', esc_html__( 'Enable Lazy Loading', 'fascinate' ), '', '', 'site_image' );




/*******************************************************************************************************
************************************ Sidebar Control Fields Declaration *********************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'enable_sticky_sidebar', esc_html__( 'Enable Sticky Sidebar', 'fascinate' ), '', '', 'site_sidebar' );
fascinate_add_toggle_field( 'enable_sidebar_small_devices', esc_html__( 'Enable Sidebar For Small Devices', 'fascinate' ), esc_html__( 'This option lets you to display or do not display sidebar for devices with width smaller than 992px.', 'fascinate' ), '', 'site_sidebar' );

fascinate_add_toggle_field( 'enable_global_sidebar_position', esc_html__( 'Enable Global Sidebar Position', 'fascinate' ), '', '', 'site_sidebar' );
fascinate_add_radio_image_field( 'global_sidebar_position', esc_html__( 'Global Sidebar Position', 'fascinate' ), '', fascinate_sidebar_position_choices(), 'fascinate_active_global_sidebar', 'site_sidebar' );







/*******************************************************************************************************
************************************ Footer Control Fields Declaration *********************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'display_scroll_top', esc_html__( 'Display Scroll Top Button', 'fascinate' ), '', '', 'site_footer' );
fascinate_add_text_field( 'copyright_text', esc_html__( 'Copyright Text', 'fascinate' ), '', '', 'site_footer' );


/*******************************************************************************************************
***************************************** Excerpt Fields Declaration ***********************************
*******************************************************************************************************/
fascinate_add_number_field( 'excerpt_length', esc_html__( 'Excerpt Length', 'fascinate' ), esc_html__( 'Maximum excerpt length 40 and minimum excerpt length 20 can be set.', 'fascinate' ), 'fascinate_active_carousel', 'post_excerpt', 40, 20, 1 );


/*******************************************************************************************************
******************************************** Meta Fields Declaration ***********************************
*******************************************************************************************************/
fascinate_add_toggle_field( 'enable_cursive_post_meta', esc_html__( 'Enable Cursive Post Meta', 'fascinate' ), esc_html__( 'This option affects categories and author post metas.', 'fascinate' ), '', 'post_meta' );