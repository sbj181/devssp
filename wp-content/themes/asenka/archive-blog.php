<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

$sectionPageID = 2563;

get_header(); ?>
</div>
</div>

<div class="project-header row align-items-center" data-parallax="scroll" data-speed="0.5" data-image-src="<?php echo get_the_post_thumbnail_url($sectionPageID); ?>">
	<div class="col-md-12">
		<div class="container">
			<h1 class="blogheader">
				<?php the_field('hero_headline', $sectionPageID); ?>
			</h1>
			<h2 class="blogheader">
				<?php the_field('hero_subhead', $sectionPageID); ?>
			</h2>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<section id="primary" class="content-area col-sm-12 col-md-12 col-lg-8">
			<main id="main" class="site-main" role="main">

				<div class="breadcrumbs">
					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					} ?>
				</div>

				<!-- Post Content -->
			 	<div class="entry-content">

				<?php
					$id=$sectionPageID;
					$post = get_post($id);
					$content = apply_filters('the_content', $post->post_content);
					echo $content;
				 ?>

				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php wp_bootstrap_starter_entry_footer(); ?>
				</footer><!-- .entry-footer -->
				<!-- END: Post Content -->



				<?php
				if ( have_posts() ) : ?>

				<div class="row">

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/archive-blog-content', get_post_format() );

					endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div>

				<div class="row">
					<div class="col-md-12">
						<?php the_posts_navigation(); ?>
					</div>
				</div>

			</main><!-- #main -->
		</section><!-- #primary -->

<?php
get_sidebar('blog');
get_footer();
