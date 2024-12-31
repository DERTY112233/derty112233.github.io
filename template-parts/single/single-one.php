<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fascinate
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	fascinate_post_thumbnail(); 

	if( get_post_type() === 'post' ) {

		$display_cats = fascinate_get_option( 'display_post_cats' );
		$display_date = fascinate_get_option( 'display_post_date' );
		$display_author = fascinate_get_option( 'display_post_author' );
		
		if( $display_cats == true || $display_author == true || $display_date == true ) {
			?>
			<div class="single-metas-and-cats">
			    <?php fascinate_categories_meta( $display_cats ); ?>
			    <div class="entry-metas">
			        <ul>
			            <?php fascinate_posted_on( $display_date ); ?>
			            <?php fascinate_posted_by( $display_author ); ?>
			        </ul>
			    </div><!-- .entry-metas -->
			</div><!-- .single-metas-and-cats -->
			<?php
		}
	}
	?>
	<div class="single-page-entry">
	    <div class="editor-entry	">
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
	</div><!-- .single-page-entry -->
</article><!-- #post-<?php the_ID(); ?> -->