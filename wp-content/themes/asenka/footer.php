<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>

		<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- #content -->

		<div id="wrapFooter">
			<?php get_template_part( 'footer-widget' ); ?>
			<footer id="colophon" class="site-footer-first" role="contentinfo">
				<div class="container">
					<div class="site-info">
						©2017 SSP Innovations, LLC     6766 S. Revere Parkway Suite 100 | Centennial, Colorado 80112
					</div><!-- close .site-info -->
				</div>
			</footer><!-- #colophon -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="container">
					<div class="site-info">
						All trademarks remain the property of their respective owners. Unless otherwise specified, no association between SSP Innovations and any trademark holder is expressed or implied. For example, ArcFM™ is the registered trademark of Schneider Electric, and no endorsement of SSP Innovations or its products and services is expressed or implied by the mention of ArcFM™ in this website and blog.
					</div><!-- close .site-info -->
				</div>
			</footer><!-- #colophon -->
		</div>
	<?php endif; ?>

		</div><!-- #page -->

		<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59e0cd7995f66cc0"></script>

		<?php wp_footer(); ?>

	</body>
</html>
