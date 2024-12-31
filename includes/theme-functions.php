<?php



/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'fascinate_fonts_url' ) ) {

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function fascinate_fonts_url() {

        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins font: on or off', 'fascinate')) {

            $fonts[] = 'Poppins:400,400i,500,600,700,700i';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Oswald font: on or off', 'fascinate')) {

            $fonts[] = 'Oswald:400,500,600,700';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Pacifico font: on or off', 'fascinate')) {

            $fonts[] = 'Pacifico';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
}


/**
 * Fallback For Main Menu
 */
if ( !function_exists( 'fascinate_navigation_fallback' ) ) {
	/**
     * Return unordered list.
     *
     * @since 1.0.0
     * @return unordered list.
     */
    function fascinate_navigation_fallback() {
        ?>
        <ul class="primary-menu">
            <?php
            if( current_user_can( 'edit_theme_options' ) ) {
                ?>
                <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Add Menu', 'fascinate' ); ?></a></li>
                <?php
            } else {
                wp_list_pages( array( 'title_li' => '', 'depth' => 3 ) ); 
            }
            ?>
        </ul>
        <?php
    }
}


/**
 * Hook for Search Form
 */
if( !function_exists( 'fascinate_search_form' ) ) {
    /**
     * Return custom search HTML template.
     *
     * @since 1.0.0
     * @return HTML markup.
     */
    function fascinate_search_form() {

        $form = '<form role="search" method="get" id="search-form" class="clearfix" action="' . esc_url( home_url( '/' ) ) . '"><input type="search" name="s" placeholder="' . esc_attr_x( 'Type here to search', 'place-holder', 'fascinate' ) . '" value"' . esc_attr( get_search_query() ) . '"><button type="submit"><span class="ion-ios-search"></span></button></form>';

        return $form;
    }
}
add_filter( 'get_search_form', 'fascinate_search_form' );


/**
 * Filters For Excerpt Length
 */
if( !function_exists( 'fascinate_excerpt_length' ) ) :
    /*
     * Excerpt More
     */
    function fascinate_excerpt_length( $length ) {

        if( is_admin() ) {

            return $length;
        }

        $excerpt_length = fascinate_get_option( 'excerpt_length' );

        if ( absint( $excerpt_length ) > 0 ) {
            
            $excerpt_length = absint( $excerpt_length );
        }

        return $excerpt_length;
    }
endif;
add_filter( 'excerpt_length', 'fascinate_excerpt_length' );


/**
 * Filter For Excerpt More
 */
if( !function_exists( 'fascinate_excerpt_more' ) ) :

    function fascinate_excerpt_more( $more ) {

        if ( is_admin() ) {

            return $more;
        }

        return '...';
    }
endif;
add_filter( 'excerpt_more', 'fascinate_excerpt_more' );
