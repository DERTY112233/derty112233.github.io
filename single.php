<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

	                            		if( $single_layout == "layout_two" ) {

	                            			get_template_part( 'template-parts/single/single', 'two' );
	                            		} else {
	                            			get_template_part( 'template-parts/single/single', 'one' );
	                            		}

	                            		fascinate_post_navigation();

									    get_template_part( 'template-parts/content', 'author' );

									    get_template_part( 'template-parts/content', 'related' );

									    // If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :

										    $comments_view = fascinate_get_option( 'display_post_comments_view' );

											if( $comments_view == 'default' ) {

												comments_template();
											} else {
												?>
												<div class="container">
												    <div class="comments-box-entry">
												        <button id="load-comments"><?php esc_html_e( 'Load Comments', 'fascinate' ); ?></button>
												    </div><!-- .comments-box-entry -->
												</div><!-- .container -->
												<?php
											}
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
    if( $comments_view != 'default' ) {

	    while( have_posts() ) :
	    	
	    	the_post();

	    	// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
			    ?>
		    	<div class="canvas-aside" id="comment-canvas">
		            <div class="canvas-inner">
		            	<?php comments_template(); ?>
		            </div><!-- .canvas-inner -->
		        </div><!-- .comment-canvas -->
		        <div class="canvas-aside-mask"></div>
	    		<?php
	    	endif;
	    endwhile;
	}

get_footer();
