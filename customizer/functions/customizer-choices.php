<?php
/**
 * Collection of functions that returns array of different elements. 
 */

if( ! function_exists( 'fascinate_post_category_choices' ) ) {
	/**
     * Get post categories.
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function fascinate_post_category_choices() {

		$post_terms = get_terms( array( 'taxonomy' => 'category' ) );

		$post_categories = array();

		if( ! empty( $post_terms ) ) {

			foreach( $post_terms as $post_term ) {

				$post_categories[$post_term->slug] = $post_term->name;
			}
		}

		return $post_categories;
	}
}


if( ! function_exists( 'fascinate_site_layout_choices' ) ) {
	/**
     * Get site layouts.
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function fascinate_site_layout_choices() {

		return array( 
			'boxed' 	=> esc_html__( 'Boxed Layout', 'fascinate' ), 
			'fullwidth' => esc_html__( 'Full Width Layout', 'fascinate' )
		);
	}
}


if( ! function_exists( 'fascinate_carousel_layout_choices' ) ) {
	/**
     * Get sidebar positions.
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function fascinate_carousel_layout_choices() {

		return array(
			'carousel_one' => get_template_directory_uri() . '/customizer/assets/images/carousel_one.png',
			'carousel_two' => get_template_directory_uri() . '/customizer/assets/images/carousel_two.png',
		);
	}
}


if( ! function_exists( 'fascinate_sidebar_position_choices' ) ) {
	/**
     * Get sidebar positions.
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function fascinate_sidebar_position_choices() {

		return array(
			'left' 	=> get_template_directory_uri() . '/customizer/assets/images/sidebar_left.png',
			'right' => get_template_directory_uri() . '/customizer/assets/images/sidebar_right.png',
			'none' 	=> get_template_directory_uri() . '/customizer/assets/images/sidebar_none.png',
		);
	}
}

if( ! function_exists( 'fascinate_comment_box_choices' ) ) {

	function fascinate_comment_box_choices() {

		return array(
			'default' => esc_html__( 'Show Default View', 'fascinate' ),
			'toggle_canvas' => esc_html__( 'Toggleable Canvas View', 'fascinate' ),
		);
	}
} 