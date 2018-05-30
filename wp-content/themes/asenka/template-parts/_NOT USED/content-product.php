<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( !is_single() ) { ?>
		<div class="post-thumbnail servicehero">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>
	





</div>
</div>


	



<div class="container">




	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
