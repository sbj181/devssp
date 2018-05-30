<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
</div>
</div>

<div class="project-header row align-items-center" data-parallax="scroll" data-speed="0.5" data-image-src="/wp-content/uploads/assets/hero-images/hero-category.jpg">
	<div class="col-md-12">
		<div class="container">
			<h1 class="blogheader">
				SSP Content Categories
			</h1>
			<h2 class="blogheader">
				Fresh Content in the SSP Archives
			</h2>
		</div>
	</div>
</div>
<div class="container">
<div class="row">
	<section id="primary" class="content-area col-sm-12 col-md-12 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
<div class="breadcrumbs">
<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div>


			<?php
			/* Start the Loop */


				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

				get_template_part( 'template-parts/archive', 'category-content' );



		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>






<div class="row">
<div class="col-md-12">

</div>
</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar('blog');
get_footer();
