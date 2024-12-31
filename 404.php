<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Fascinate
 */

get_header();

fascinate_breadcrumb_wrapper();
	?>
	<div class="innerpage-content-area-wrap">
        <div class="fb-container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="primary" class="primary-widget-area content-area">
                        <main id="main" class="site-main">
                            <div class="error-404-page-entry">
                                <div class="error-404-head">
                                    <h2><?php esc_html_e( '404', 'fascinate' ); ?></h2>
                                </div><!-- .error-404-head -->
                                <div class="error-404-message">
                                    <p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fascinate' ); ?></p>
                                </div><!-- . error-404-message -->
                                <div class="error-404-body">
                                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'fascinate' ); ?></p>
                                    <div class="search-form">
                                        <?php get_search_form(); ?>
                                    </div><!-- .search-form -->
                                </div><!-- .error-404-body -->
                            </div><!-- .error-404-page-entry -->
                        </main><!-- #main.site-main -->
                    </div><!-- #primary.primary-widget-area.content-area -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .fb-container -->
    </div><!-- .innerpage-content-area-wrap -->

<?php
get_footer();