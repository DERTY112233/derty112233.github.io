<?php
/**
 * Template part for displaying author detail
 *
 * @package Fascinate
 */

$display_author_section = fascinate_get_option( 'display_author_section' );

if( $display_author_section == true ) :
    ?>
    <div class="author-box">
        <div class="top-wrap">
            <div class="author-thumb">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 300 ); ?>
            </div><!-- .author-thumb -->
            <div class="author-name">
                <h3><?php echo esc_html( get_the_author() ); ?></h3>
            </div><!-- .author-name -->
        </div><!-- .top-wrap -->
        <div class="author-details">
            <?php
            $author_description = get_the_author_meta( 'description' );
            if( !empty( $author_description ) ) :
                ?>
                <div class="author-desc">
                    <p><?php echo esc_html( $author_description ); ?></p>
                </div><!-- .author-desc -->
                <?php
            endif;
            ?>
        </div><!-- .author-details -->
    </div><!-- .author-box -->
    <?php
endif;