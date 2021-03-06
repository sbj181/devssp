<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
</div>
</div>

<div class="job-opening-header row align-items-center" data-parallax="scroll" data-speed="0.5" data-image-src="<?php bloginfo('template_directory'); ?>/imgs/blogbg.jpg">  <div class="col-md-12">
    <div class="container">
      <h1 class="blogheader blog-m-size">
        Job Openings
      </h1>
      <h2 class="blogheader">
        Join our team
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
    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content-job_opening', get_post_format() );

      the_post_navigation();

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
  </section><!-- #primary -->

<?php
get_sidebar('job_opening');
get_footer();
