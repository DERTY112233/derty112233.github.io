<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fascinate
 */

get_header();

$single_layout = fascinate_single_layout();

fascinate_single_breadcrumb_wrapper();

	?>
	<div class="innerpage-content-area-wrap <?php fascinate_single_layout_class(); ?>">
        <div class="fb-container">
        	<div class="single-content-container">
	            <div class="row">
	                <div class="<?php fascinate_main_container_class(); ?>">
	                    <div id="primary" class="primary-widget-area content-area">
	                        <main id="main" class="site-main">
	                            <div class="single-page-entry">
	                            	<?php
	                            	while( have_posts() ) :

	                            		the_post();

	                            		if( is_front_page() ) {

	                            			get_template_part( 'template-parts/single/single', 'one' );
	                            		} else {

	                            			if( $single_layout == "layout_two" ) {

		                            			get_template_part( 'template-parts/single/single', 'two' );
		                            		} else {
		                            			
		                            			get_template_part( 'template-parts/single/single', 'one' );
		                            		}
	                            		}

									    // If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
	                            		
	                    			endwhile;
	                        		?>
	                            </div><!-- .single-page-entry -->
	                        </main><!-- #main.site-main -->
	                    </div><!-- #primary.primary-widget-area.content-area -->
	                </div><!-- .col -->
	                <?php get_sidebar(); ?>
	            </div><!-- .row -->
	        </div><!-- .single-content-container -->
        </div><!-- .fb-container -->
    </div><!-- .innerpage-content-area-wrap.single-page-style-2 -->
    <?php
get_footer();
