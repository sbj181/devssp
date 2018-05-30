<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

  <section id="primary" class="content-area col-sm-12 col-md-12 col-lg-8">
    <main id="main" class="site-main" role="main">

    <?php
    if ( have_posts() ) : ?>

      <header class="page-header">
        <?php
          the_archive_title( '<h1 class="page-title">', '</h1>' );
          the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
      </header><!-- .page-header -->
<div class="row">
  <div class="col-sm-12 aboutpartners">
    <?php
        // query for the downloads-archive page for preamble content
        $your_query = new WP_Query( 'pagename=partner-archive' );
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
      /* Start the Loop */
      while ( have_posts() ) : the_post();

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        get_template_part( 'template-parts/archive-partner-content', get_post_format() );

      endwhile;

      the_posts_navigation();

    else :

      get_template_part( 'template-parts/content', 'none' );

    endif; ?>

    </main><!-- #main -->
  </section><!-- #primary -->

<?php
get_sidebar('partner');
get_footer();
