<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fascinate
 */

?>
        </div>

		<footer class="footer dark secondary-widget-area">
            <div class="footer-inner">
                <?php
                if( is_active_sidebar( 'footer-left' ) || is_active_sidebar( 'footer-middle' ) || is_active_sidebar( 'footer-right' ) ) :
                    ?>
                    <div class="footer-top">
                        <div class="fb-container">                            
    	                    <div class="footer-widget-area">
    	                        <div class="row">
                                   
                                    <div class="col-lg-4 col-md-12">
                                        <?php
                                        if( is_active_sidebar( 'footer-left' ) ) {

                                            dynamic_sidebar( 'footer-left' ); 
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <?php 
                                        if( is_active_sidebar( 'footer-middle' ) ) {
                                            dynamic_sidebar( 'footer-middle' ); 
                                        } 
                                        ?>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <?php 
                                        if( is_active_sidebar( 'footer-right' ) ) {
                                            dynamic_sidebar( 'footer-right' ); 
                                        } 
                                        ?>
                                    </div>      	                            
    	                        </div><!-- .row -->
    	                    </div><!-- .footer-widget-area -->
                        </div><!-- .fb-container -->
                    </div><!-- .footer-top -->
                    <?php
                endif;
                ?>
                <div class="footer-bottom">
                    <div class="fb-container">
                        <div class="row">                            
                            <div class="col-lg-6">
                                <?php
                                $copyright_text = fascinate_get_option( 'copyright_text' );

                                if( !empty( $copyright_text ) ) :
                                    ?>
                                    <div class="copyright-information">
                                        <p><?php echo esc_html( $copyright_text ); ?></p>
                                    </div><!-- .copyright-information -->
                                    <?php
                                endif;
                                ?>
                            </div><!-- .col -->
                            <div class="col-lg-6">
                                <div class="author-credit">
                                    <p> 
                                        <?php
                                        /* translators: 1: Theme name, 2: Theme author. */
                                        printf( esc_html__( '%1$s Theme By %2$s', 'fascinate' ), 'Fascinate', '<a href="' . esc_url( 'https://themebeez.com/' ) . '" target="_blank">'. esc_html__( 'Themebeez', 'fascinate' ) . '</a>' );
                                        ?>
                                    </p>
                                </div><!-- .author-credit -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .fb-container -->
                </div><!-- .footer-bottom -->
            </div><!-- .footer-inner -->
        </footer><!-- .footer.secondary-widget-area -->
	</div><!-- .page--wrap -->

    <div class="fascinate-to-top"><span><?php esc_html_e( 'Back to top', 'fascinate' ); ?></span></div>

<?php wp_footer(); ?>

</body>
</html>
