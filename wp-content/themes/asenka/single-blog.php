<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
		<div class="breadcrumbs">
			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
		</div>
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-blog', get_post_format() );

			the_post_navigation();



		endwhile; // End of the loop.
		?>
<div class="row">
	<div class="col-sm-12">
<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar('blog');
get_footer();
