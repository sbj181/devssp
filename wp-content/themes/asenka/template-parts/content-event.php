<?php
/**
 * Template part for displaying event posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<!-- Main Image -->
	<div class="post-thumbnail bloghero">
		<?php the_post_thumbnail(); ?>
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

			<?php endif; ?>
	</header><!-- .entry-header -->
	<!-- END: Entry Header -->



	<!-- Entry Meta -->
	<div class="single-date">
		<div class="event-meta"><span><?php the_field('event_city_st'); ?></span> | <?php $date = get_field('date'); ?><?php echo date("M d, Y", strtotime($date)); ?>
			<?php $date = get_field('date');
				$endDate = get_field('end_date');
				if($date != $endDate) {
					echo " &mdash; " . date("M d, Y", strtotime($endDate));
				} ?>
		</div>
	</div>



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



	<!-- Ext. URL -->
	<p class="urlExt">
	  <?php if( get_field('external_event_url') ): ?>
	    <a class="button white-button" href="<?php the_field('external_event_url'); ?>" target="_blank" >Visit Event Page</a>
	  <?php endif; ?>
	</p>
	<!-- END: Ext. URL -->



	<!-- Recap URL -->
	<p class="urlExt">
		<?php if( get_field('recap_url') ): ?>
			<a class="button white-button" href="<?php the_field('recap_url'); ?>" target="_blank" >See Our Event Recap</a>
		<?php endif; ?>
	</p>
	<!-- END: Recap URL -->




</article><!-- #post-## -->
