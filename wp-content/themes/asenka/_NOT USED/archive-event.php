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

<div class="job-opening-header row align-items-center">
  <div class="col-md-12">
    <div class="container">
      <h1 class="blogheader blog-m-size">
        Upcoming Events
      </h1>
      <h2 class="blogheader">
        Connect With Us and Learn Something Too
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
    <div class="row">
      <div class="col-sm-12 aboutblog">
        <?php
            // query for the service-archive page for preamble content
            $your_query = new WP_Query( 'pagename=events-archive' );
            // "loop" through query (even though it's just one page)
            while ( $your_query->have_posts() ) : $your_query->the_post();
                the_content();
            endwhile;
            // reset post data (important!)
            wp_reset_postdata();
        ?>
      </div>
    </div>
			<?php
			/* Not Starting the Loop Here *SJ */


				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/archive-event-content', get_post_format() );



			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

    <div class="social-share" style="margin-top: 75px;">
      <div class="addthis_inline_share_toolbox"></div>
    </div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar('event');
get_footer();
