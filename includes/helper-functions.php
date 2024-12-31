<?php

/**
 * Function to get post thumbnail Alt text
 */
if( !function_exists( 'fascinate_thumbnail_alt_text' ) ) {

    function fascinate_thumbnail_alt_text( $post_id ) {

        $post_thumbnail_id = get_post_thumbnail_id( $post_id );

        $alt_text = '';

        if( !empty( $post_thumbnail_id ) ) {

            $alt_text = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
        }

	    if( !empty( $alt_text ) ) {

	    	echo esc_attr( $alt_text );
	    } else {

	    	the_title_attribute();
	    }
    }
}


/**
 * Sidebar position for home page.
 */
if( ! function_exists( 'fascinate_home_sidebar_position' ) ) {

    function fascinate_home_sidebar_position() {

        $sidebar_position = '';

        $enable_global_sidebar_position = fascinate_get_option( 'enable_global_sidebar_position' );

        if( $enable_global_sidebar_position == true ) {

            $sidebar_position = fascinate_get_option( 'global_sidebar_position' );
        } else {

            $sidebar_position = fascinate_get_option( 'blog_sidebar_position' );
        }

        return $sidebar_position;
    }
}


/**
 * Sidebar position for archive page.
 */
if( ! function_exists( 'fascinate_archive_sidebar_position' ) ) {

    function fascinate_archive_sidebar_position() {

        $sidebar_position = '';

        $enable_global_sidebar_position = fascinate_get_option( 'enable_global_sidebar_position' );

        if( $enable_global_sidebar_position == true ) {

            $sidebar_position = fascinate_get_option( 'global_sidebar_position' );
        } else {

            $sidebar_position = fascinate_get_option( 'archive_sidebar_position' );
        }

        return $sidebar_position;
    }
}


/**
 * Sidebar position for search page.
 */
if( ! function_exists( 'fascinate_search_sidebar_position' ) ) {

    function fascinate_search_sidebar_position() {

        $sidebar_position = '';

        $enable_global_sidebar_position = fascinate_get_option( 'enable_global_sidebar_position' );

        if( $enable_global_sidebar_position == true ) {

            $sidebar_position = fascinate_get_option( 'global_sidebar_position' );
        } else {

            $sidebar_position = fascinate_get_option( 'search_sidebar_position' );
        }

        return $sidebar_position;
    }
}


/**
 * Sidebar position for post single.
 */
if( ! function_exists( 'fascinate_post_single_sidebar_position' ) ) {

    function fascinate_post_single_sidebar_position() {

        $sidebar_position = '';

        $enable_global_sidebar_position = fascinate_get_option( 'enable_global_sidebar_position' );

        if( $enable_global_sidebar_position == true ) {

            $sidebar_position = fascinate_get_option( 'global_sidebar_position' );
        } else {

            $enable_common_post_sidebar_position = fascinate_get_option( 'enable_common_post_sidebar_position' );

            if( $enable_common_post_sidebar_position == true ) {

                $sidebar_position = fascinate_get_option( 'common_post_sidebar_position' );
            } else {

                $sidebar_position = get_post_meta( get_the_ID(), 'fascinate_sidebar_position', true );

                if( empty( $sidebar_position ) ) {

                    $sidebar_position = 'right';
                }
            }
        }

        return $sidebar_position;
    }
}


/**
 * Sidebar position for page single.
 */
if( ! function_exists( 'fascinate_page_single_sidebar_position' ) ) {

    function fascinate_page_single_sidebar_position() {

        $sidebar_position = '';

        $enable_global_sidebar_position = fascinate_get_option( 'enable_global_sidebar_position' );

        if( $enable_global_sidebar_position == true ) {

            $sidebar_position = fascinate_get_option( 'global_sidebar_position' );
        } else {

            $enable_common_post_sidebar_position = fascinate_get_option( 'enable_common_page_sidebar_position' );

            if( $enable_common_post_sidebar_position == true ) {

                $sidebar_position = fascinate_get_option( 'common_page_sidebar_position' );
            } else {

                $sidebar_position = get_post_meta( get_the_ID(), 'fascinate_sidebar_position', true );

                if( empty( $sidebar_position ) ) {

                    $sidebar_position = 'right';
                }
            }
        }

        return $sidebar_position;
    }
}


/**
 * Get sidebar position.
 */
if( ! function_exists( 'fascinate_sidebar_position' ) ) {

    function fascinate_sidebar_position() {

        if( ! is_active_sidebar( 'sidebar' ) ) {

            return 'none';
        }

        if( is_home() ) {

            return fascinate_home_sidebar_position();
        }

        if( is_archive() ) {

            return fascinate_archive_sidebar_position();
        }

        if( is_search() ) {

            return fascinate_search_sidebar_position();
        }

        if( is_single() ) {

            return fascinate_post_single_sidebar_position();
        }

        if( is_page() ) {

            return fascinate_page_single_sidebar_position();
        }
    }
}


/**
 * Get single layout
 */
if( ! function_exists( 'fascinate_single_layout' ) ) {

    function fascinate_single_layout() {

        $single_layout = get_post_meta( get_the_ID(), 'fascinate_single_layout', true );

        if( empty( $single_layout ) ) {

            $single_layout = 'layout_one';
        }

        return $single_layout;
    }
}


/**
 * Function to check for sticky sidebar
 */
if( !function_exists( 'fascinate_sticky_sidebar_enabled' ) ) {

    function fascinate_sticky_sidebar_enabled() {

    	$enable_sticky_sidebar = fascinate_get_option( 'enable_sticky_sidebar' );

        $sidebar_position = fascinate_sidebar_position();

        if( is_active_sidebar( 'sidebar' ) && $sidebar_position != 'none' ) {

            if( $enable_sticky_sidebar == true ) {

                return true;
            }
        } else {

            return false;
        }
    }
}



/**
 * Function to query posts for banner.
 */
if( ! function_exists( 'fascinate_banner_query' ) ) {

    function fascinate_banner_query() {

        $banner_post_cat = fascinate_get_option( 'carousel_category' );

        $banner_post_no = fascinate_get_option( 'carousel_item_no' );

        $banner_args = array( 
            'post_type' => 'post', 
            'ignore_sticky_posts' => true, 
            'posts_per_page' => $banner_post_no, 
            'category_name' => $banner_post_cat 
        );

        $banner_query = new WP_Query( $banner_args );

        return $banner_query;
    }
}


/**
 * Function to query related posts for banner.
 */
if( ! function_exists( 'fascinate_related_posts_query' ) ) {

    function fascinate_related_posts_query() {

        $related_posts_no = fascinate_get_option( 'related_posts_no' );

        $related_query_args = array(
            'no_found_rows'       => true,
            'ignore_sticky_posts' => true,
        );

        if( absint( $related_posts_no ) > 0 ) {

            $related_query_args['posts_per_page'] = absint( $related_posts_no );
        } else {

            $related_query_args['posts_per_page'] = 4;
        }

        $current_object = get_queried_object();

        if ( $current_object instanceof WP_Post ) {

            $current_id = $current_object->ID;

            if ( absint( $current_id ) > 0 ) {

                // Exclude current post.
                $related_query_args['post__not_in'] = array( absint( $current_id ) );

                // Include current posts categories.
                $categories = wp_get_post_categories( $current_id );

                if ( ! empty( $categories ) ) {

                    $related_query_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => $categories,
                            'operator' => 'IN',
                        )
                    );
                }
            }
        }

        $related_query = new WP_Query( $related_query_args );

        return $related_query;
    }
}


/*
 * Hook - Plugin Recommendation
 */
if ( ! function_exists( 'fascinate_recommended_plugins' ) ) :
    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function fascinate_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'Themebeez Toolkit', 'fascinate' ),
                'slug'     => 'themebeez-toolkit',
                'required' => false,
            ),
        );

        tgmpa( $plugins );
    }

endif;
add_action( 'tgmpa_register', 'fascinate_recommended_plugins' );