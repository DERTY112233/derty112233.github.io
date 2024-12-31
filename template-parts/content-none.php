<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fascinate
 */

?>
<div class="nothing-found-page-entry">
	<div class="title">
        <h3><?php echo esc_html__( 'Nothing Found', 'fascinate' ); ?></h3>
    </div><!-- .title -->
    <?php
	if ( is_home() && current_user_can( 'publish_posts' ) ) :

		printf(
			'<p>' . wp_kses(
				/* translators: 1: link to WP admin new post page. */
				__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fascinate' ),
				array(
					'a' => array(
						'href' => array(),
					),
				)
			) . '</p>',
			esc_url( admin_url( 'post-new.php' ) )
		);

	elseif ( is_search() ) :
		?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fascinate' ); ?></p>
		<?php
	else :
		?>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fascinate' ); ?></p>
		<?php

	endif;
	?>
    <div class="search-form">
        <?php get_search_form(); ?>
    </div><!-- .search-form -->
</div><!-- .nothing-found-page-entry -->
