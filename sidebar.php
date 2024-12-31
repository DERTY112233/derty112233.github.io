<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fascinate
 */

$sidebar_position = fascinate_sidebar_position();

if ( ! is_active_sidebar( 'sidebar' ) || $sidebar_position == 'none' ) {
	return;
}
?>
<div class="<?php fascinate_sidebar_class(); ?>">
	<aside id="secondary" class="secondary-widget-area">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside><!-- #secondary -->
</div>
