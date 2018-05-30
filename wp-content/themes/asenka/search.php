<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
</div>
</div>

<div class="project-header row align-items-center" data-parallax="scroll" data-speed="0.5" data-image-src="/wp-content/uploads/assets/hero-images/hero-search.jpg">
  <div class="col-md-12">
    <div class="container">
      <h1 class="blogheader">
        <?php printf( esc_html__( 'Search Results for: %s', 'wp-bootstrap-starter' ), '<span>' . get_search_query() . '</span>' ); ?>
      </h1>
      <h2 class="blogheader">
			 Exactly What You Want
      </h2>
    </div>
  </div>
</div>
<div class="container">
<div class="row">
	<section id="primary" class="search-results content-area col-sm-12 col-md-12 col-lg-8">
		 <div class="breadcrumbs">
      <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
      } ?>
    </div>
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar('blog');
get_footer();
