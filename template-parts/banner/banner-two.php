<?php
/**
 * Template part for displaying banner two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fascinate
 */


$banner_query = fascinate_banner_query();

if( $banner_query->have_posts() ) {

	$display_banner_content = fascinate_get_option( 'carousel_hide_content' );

	$enable_spacing = fascinate_get_option( 'carousel_enable_spacing' );

	$spacing_class = '';

	if( $enable_spacing == true ) {

		$spacing_class = 'carousel-spacing';
	} else {

		$spacing_class = 'no-carousel-spacing';
	}
	?>
	<div class="fb-banner banner-style-1 <?php echo esc_attr( $spacing_class ); ?>">
        <div class="banner-inner">		            	
            <div class="slider-tweak slider-1-single">
            	<?php
            	while( $banner_query->have_posts() ) :

            		$banner_query->the_post();

            		$carousel_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );

            		if( ! empty( $carousel_img_url ) ) :
            			?>
	                    <div class="item">
	                    	<?php $is_lazy_load_enabled = fascinate_get_option( 'enable_lazy_loading' ); ?>			                    	
	                        <div class="post-thumb <?php if( $is_lazy_load_enabled == true ) { ?>lazyload lazyloading<?php } ?>" <?php if( $is_lazy_load_enabled == true ) {?>data-bg="<?php echo esc_url( $carousel_img_url ); ?>" <?php } else { ?>style="background-image: url( <?php echo esc_url( $carousel_img_url ); ?> );"<?php } ?>>                        	
	                        	<?php
	                        	if( $display_banner_content == true ) {
		                        	?>
		                            <div class="content-holder-wrap">
		                                <div class="content-holder">
		                                    <?php fascinate_categories_meta( true ); ?>
		                                    <div class="post-title">
		                                        <h2>
		                                        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                                        </h2>
		                                    </div><!-- .post-title -->
		                                    <div class="entry-metas">
		                                        <ul>
		                                            <?php fascinate_posted_on( true ); ?>
		                                            <?php fascinate_posted_by( true ); ?>
		                                        </ul>
		                                    </div><!-- .entry-metas -->
		                                </div><!-- .content-holder -->
		                            </div><!-- .content-holder-wrap -->
		                            <?php
		                        }
		                        ?>
	                            <div class="mask"></div><!-- .mask -->
	                        </div><!-- .post-thumb -->
	                    </div><!-- .item -->
	                    <?php
	                endif;
                endwhile;
                wp_reset_postdata();
                ?>
            </div><!-- .banner-1-carousel -->		            
        </div><!-- .banner-inner -->
    </div><!-- .fb-banner -->
	<?php
}