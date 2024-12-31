<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fascinate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php 
	if( function_exists( 'wp_body_open' ) ) { 
		wp_body_open(); 
	} 
	?>
	<div class="page--wrap">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fascinate' ); ?></a>

		<?php
		$is_preloader_enabled = fascinate_get_option( 'display_preloader' );
		if( $is_preloader_enabled == true ) {
			?>
			<div class="preLoader">
				<div class="fl fl-spinner spinner1">
					<div class="double-bounce1"></div>
					<div class="double-bounce2"></div>
				</div>
			</div>
		    <?php
		}
		?>
	
		<header class="fb-general-header header-style-1">
	        <div class="header-inner">
	        	<?php

	        	$display_top_header = fascinate_get_option( 'display_top_header' );

	        	if( $display_top_header == true ) :
	        		?>
		            <div class="header-top">
		                <div class="fb-container">
		                    <div class="row">
	                        	<div class="col-lg-7 col-md-6 col-sm-12">
	                        		<?php
	                        		if( has_nav_menu( 'menu-2' ) ) :
	                        			?>
			                            <div class="secondary-navigation">
			                                <?php 
			                                wp_nav_menu( array(
			                                	'theme_location' => 'menu-2',
								 				'container' => '', 
								 				'depth' => 1,
								 			) );
			                                ?>
			                            </div><!-- .secondary-navigation -->
			                            <?php
			                        endif;
			                        ?>
	                        	</div><!-- .col -->
		                        <div class="col-lg-5 col-md-6 col-sm-12">
		                            <div class="social-icons">
		                                <ul class="social-icons-list">
		                                	<?php
		                                	$facebook_link = fascinate_get_option( 'header_facebook_link' );
		                                	if( !empty( $facebook_link ) ) :
		                                		?>
		                                		<li>
		                                			<a href="<?php echo esc_url( $facebook_link ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		                                		</li>
		                                		<?php
		                                	endif;

		                                	$twitter_link = fascinate_get_option( 'header_twitter_link' );
		                                	if( !empty( $twitter_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $twitter_link ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;

		                                    $instagram_link = fascinate_get_option( 'header_instagram_link' );
		                                	if( !empty( $instagram_link ) ) :
		                                		?>
		                                		<li>
		                                			<a href="<?php echo esc_url( $instagram_link ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		                                		</li>
		                                		<?php
		                                	endif;

		                                	$pinterest_link = fascinate_get_option( 'header_pinterest_link' );
		                                	if( !empty( $pinterest_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $pinterest_link ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;

		                                    $youtube_link = fascinate_get_option( 'header_youtube_link' );
		                                	if( !empty( $youtube_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $youtube_link ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;

		                                    $linkedin_link = fascinate_get_option( 'header_linkedin_link' );
		                                	if( !empty( $linkedin_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $linkedin_link ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;

		                                    $vk_link = fascinate_get_option( 'header_vk_link' );
		                                	if( !empty( $vk_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $vk_link ); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;
		                                    ?>
		                                </ul><!-- .social-icons-list -->
		                            </div><!-- .social-icons -->
		                        </div><!-- .col -->
		                    </div><!-- .row -->
		                </div><!-- .fb-container -->
		            </div><!-- .header-top -->
		            <?php
		        endif;
		        ?>
	            <div class="mid-header">
	                <div class="fb-container">
	                    <div class="site-branding">
	                    	<?php
	                    	if( has_custom_logo() ) :
	                    		if( is_home() || is_front_page() ) :
		                    		?>
		                    		<h1 class="site-logo">
			                    	<?php
			                    endif;

			                    	the_custom_logo();
			                  
			                    if( is_home() ) :
		                    		?>
		                    		</h1>
			                    	<?php
			                    endif;
	                    	else :
	                    		if( is_home() || is_front_page() ) :
		                    		?>
		                    		<h1 class="site-title">
		                    		<?php
		                    	else :
		                    		?>
		                    		<span class="site-title">
		                    		<?php
		                    	endif;
		                    	?>
	                    			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
	                    		<?php
	                    		if( is_home() ) :
		                    		?>
		                    		</h1>
		                    		<?php
		                    	else :
		                    		?>
		                    		</span>
		                    		<?php
		                    	endif;
		                    	?>
	                    		<?php
	                        	$fascinate_description = get_bloginfo( 'description', 'display' );
								if ( $fascinate_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo esc_html( $fascinate_description ); // phpcs:ignore ?></p><!-- .site-description -->
									<?php 
								endif;
	                    	endif;
	                    	?>                        
	                    </div><!-- .site-branding -->
	                </div><!-- .fb-container -->
	            </div><!-- .mid-header -->
	            <div class="header-bottom">
	                <div class="main-menu-wrapper">
	                    <div class="fb-container">
	                        <div class="menu-toggle">
	                        	<span class="hamburger-bar"></span>
	                        	<span class="hamburger-bar"></span>
	                        	<span class="hamburger-bar"></span>
	                        </div><!-- .menu-toggle -->
	                        <nav id="site-navigation" class="site-navigation">
	                        	<?php
	                        	$menu_args = array(
						 			'theme_location' => 'menu-1',
						 			'container' => '',
						 			'menu_class' => 'primary-menu',
									'menu_id' => '',
									'fallback_cb' => 'fascinate_navigation_fallback',
						 		);
								wp_nav_menu( $menu_args );
	                        	?>
	                        </nav><!-- #site-navigation.site-navigation -->
	                    </div><!-- .fb-container -->
	                </div><!-- .main-menu-wrapper -->
	            </div><!-- .header-bottom -->
	        </div><!-- .header-inner -->
	    </header><!-- .fb-general-header.header-style-1 -->

	    <div id="content" class="site-content">
