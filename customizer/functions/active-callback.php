<?php
/**
 * Collection of active callback functions for customizer fields.
 *
 * @package Fascinate
 */

/**
 * Active callback function for when top header is active.
 */
if( ! function_exists( 'fascinate_active_top_header' ) ) {

	function fascinate_active_top_header( $control ) {

		if ( $control->manager->get_setting( 'fascinate_field_display_top_header' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when carousel is active.
 */
if( ! function_exists( 'fascinate_active_carousel' ) ) {

	function fascinate_active_carousel( $control ) {

		if ( $control->manager->get_setting( 'fascinate_field_display_carousel' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when related section is active.
 */
if( ! function_exists( 'fascinate_active_related_section' ) ) {

	function fascinate_active_related_section( $control ) {

		if ( $control->manager->get_setting( 'fascinate_field_display_related_section' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when breadcrumb is active.
 */
if( ! function_exists( 'fascinate_active_breadcrumb' ) ) {

	function fascinate_active_breadcrumb( $control ) {

		if ( $control->manager->get_setting( 'fascinate_field_display_breadcrumb' )->value() == true ) {

			return true;
		} else {

			return false;
		}		
	}
}


/**
 * Active callback function for when global sidebar position is not active.
 */
if( ! function_exists( 'fascinate_not_active_global_sidebar' ) ) {

	function fascinate_not_active_global_sidebar( $control ) {

		if ( $control->manager->get_setting( 'fascinate_field_enable_global_sidebar_position' )->value() == false ) {

			return true;
		} else {

			return false;
		}		
	}
}

/**
 * Active callback function for when global sidebar position is active.
 */
if( ! function_exists( 'fascinate_active_global_sidebar' ) ) {

	function fascinate_active_global_sidebar( $control ) {

		if ( $control->manager->get_setting( 'fascinate_field_enable_global_sidebar_position' )->value() == true ) {

			return true;
		} else {

			return false;
		}		
	}
}



/**
 * Active callback function for when common post sidebar position is active.
 */
if( ! function_exists( 'fascinate_active_common_post_sidebar' ) ) {

	function fascinate_active_common_post_sidebar( $control ) {

		if ( $control->manager->get_setting( 'fascinate_field_enable_global_sidebar_position' )->value() == false && $control->manager->get_setting( 'fascinate_field_enable_common_post_sidebar_position' )->value() == true ) {

			return true;
		} else {

			return false;
		}		
	}
}



/**
 * Active callback function for when common page sidebar position is active.
 */
if( ! function_exists( 'fascinate_active_common_page_sidebar' ) ) {

	function fascinate_active_common_page_sidebar( $control ) {

		if ( $control->manager->get_setting( 'fascinate_field_enable_global_sidebar_position' )->value() == false && $control->manager->get_setting( 'fascinate_field_enable_common_page_sidebar_position' )->value() == true ) {

			return true;
		} else {

			return false;
		}		
	}
}