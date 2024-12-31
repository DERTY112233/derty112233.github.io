<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fascinate
 */
$sidebar_position = fascinate_sidebar_position();
$single_container_class = '';
if( $sidebar_position == 'none' || !is_active_sidebar( 'fascinate-sidebar' ) ) {
	$single_container_class = 'article-no-sidebar';
} else {
	$single_container_class = 'article-with-sidebar';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $single_container_class ); ?>>
	<div class="editor-entry">
    	<?php
        the_content();

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fascinate' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .editor-entry.dropcap -->
    <?php 
    if( get_post_type() === 'post' ) {

        $display_tags = fascinate_get_option( 'display_post_tags' );

        fascinate_tags_meta( $display_tags ); 
    }

    if ( get_edit_post_link() ) :

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'fascinate' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    endif;
    ?>
</article><!-- #post-<?php the_ID(); ?> -->