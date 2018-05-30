<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
<style type="text/css">
/* Hiding Form Labels */
.gform_wrapper label.gfield_label {
    opacity: 0;
}
</style>
</div>
</div>

<div class="download-header row align-items-center hidethis">
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
		<div class="breadcrumbs margin-t-40">
			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
		</div>
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-download', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<style>
	nav.navbar button,
	div#footer-widget section#gform_widget-2,
	div#footer-widget h3.widget-title,
	div#footer-widget h4.widget-subtitle,
	div#footer-widget section#custom_html-2,
	header#masthead div.navbar-collapse,
	p#breadcrumbs,
	form.search-form {
		display: none !important;
	}

</style>

<?php
//get_sidebar('download');
get_footer();
