<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fascinate
 */

get_header();

fascinate_breadcrumb_wrapper();
	?>
	<div class="archive-content-area-wrap">
        <?php
        $archive_description = get_the_archive_description();
        if( !empty( $archive_description ) ) :
            ?>
            <div class="category-description-outer">
                <div class="fb-container">
                    <div class="category-description-inner">
                        <p><?php echo wp_kses_post( $archive_description ); ?></p>
                    </div><!-- .category-description-inner -->
                </div><!-- .fb-container -->
            </div><!-- .category-description-outer -->
            <?php
        endif;
        ?>
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
											get_template_part( 'template-parts/content', get_post_type() );

										endwhile;
										?>
	                                </div><!-- .posts-list-style-1 -->
	                                <?php 

	                                fascinate_pagination(); 

	                            else:

	                            	get_template_part( 'template-parts/content', 'none' );
	                            endif;
	                            ?>
                        </main><!-- #main.site-main -->
                    </div><!-- #primary.primary-widget-area.content-area -->
                </div><!-- .col -->
                <?php get_sidebar(); ?>
            </div><!-- .row -->
        </div><!-- .fb-container -->
    </div><!-- .archive-content-area-wrap -->
	<?php
get_footer();