<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article class="margin-b-60" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="search-post-type"><?php echo get_post_type(); ?></div>
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php wp_bootstrap_starter_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<p class="search-text"><?php $content = get_the_excerpt(); echo wp_trim_words( $content , '25' ); ?></p>
		<p class="readMore"><a href="<?php the_permalink(); ?>">READ MORE</a></p>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->
