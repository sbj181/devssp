<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-&lt;?php the_ID(); ?&gt;">



	<!-- Main Image -->
	<div class="post-thumbnail bloghero">
		<?php
			if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { //inserts first embedded image as featured
				echo get_the_post_thumbnail($post->ID);
			} else {
				echo main_image();
			} ?>
	</div>
	<!-- END: Main Image -->



	<!-- Entry Header -->
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
				<?php wp_bootstrap_starter_posted_on(); ?>
			<?php endif; ?>
	</header><!-- .entry-header -->
	<!-- END: Entry Header -->



	<!-- Post Content -->
	<div class="entry-content">

		<?php
			if ( is_single() ) :
				the_content();
			else :
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
	    endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<!-- END: Post Content -->



</article><!-- #post-## -->
