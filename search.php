<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Fascinate
 */

get_header();

fascinate_breadcrumb_wrapper();
	?>
	<div class="search-page-content-area-wrap">
	    <div class="fb-container">
	        <div class="row">
	            <div class="<?php fascinate_main_container_class(); ?>">
	                <div id="primary" class="primary-widget-area content-area">
	                    <main id="main" class="site-main">
	                        <div class="recent-posts-wrapper">
	                            <?php
                            	if( have_posts() ) :
	                            	?>
	                                <div class="posts-list-style-1">
	                                    <?php
										/* Start the Loop */
										while ( have_posts() ) :

											the_post();

											/*
											 * Include the Post-Type-specific template for the content.
											 * If you want to override this in a child theme, then include a file
											 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
											 */
											get_template_part( 'template-parts/content', 'search' );

										endwhile;
										?>
	                                </div><!-- .posts-list-style-1 -->
	                                <?php 

	                                fascinate_pagination(); 

	                            else:

	                            	get_template_part( 'template-parts/content', 'none' );
	                            endif;
	                            ?>
	                        </div><!-- .archive-page-style-1-entry -->
	                    </main><!-- #main.site-main -->
	                </div><!-- #primary.primary-widget-area.content-area -->
	            </div><!-- .col -->
	            <?php get_sidebar(); ?>
	        </div><!-- .row -->
	    </div><!-- .fb-container -->
	</div><!-- .search-page-content-area-wrap -->
	<?php
get_footer();
