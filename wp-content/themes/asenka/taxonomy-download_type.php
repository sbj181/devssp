<?php
/**
 * The template for displaying download cpt archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
</div>
</div>

<div class="download-header row align-items-center">
	<div class="col-md-12">
		<div class="container">
			<h1 class="blogheader">
				SSP Free Downloads
			</h1>
			<h2 class="blogheader">
				Find Something to Get Your GIS Fire Started
			</h2>
		</div>
	</div>
</div>
<div class="container">
<div class="row">
	<section id="primary" class="content-area col-sm-12 col-md-12 col-lg-12">
		<main id="main" class="site-main" role="main">
<div class="breadcrumbs">
<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div>
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
<div class="row">
	<div class="col-sm-12 aboutblog">
This is the download type taxonomy archive page.
	</div>
</div>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-download', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
//get_sidebar('download');
get_footer();
