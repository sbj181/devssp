<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

if ( ! is_active_sidebar( 'sidebar-ssptv' ) ) {
	return;
}
?>

<aside id="secondary" class="col-sm-12 col-md-12 col-lg-12" role="complementary">
	<?php dynamic_sidebar( 'sidebar-ssptv' ); ?>
</aside><!-- #secondary -->
