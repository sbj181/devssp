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
<div class="service-header row align-items-center" data-parallax="scroll" data-speed="0.5" data-image-src="<?php echo get_the_post_thumbnail_url('2343'); ?>">
  <div class="col-md-12">
    <div class="container">
      <h1 class="blogheader">
        <?php the_field('hero_headline', 2343); ?>
      </h1>
      <h2 class="blogheader">
        <?php the_field('hero_subhead', 2343); ?>
      </h2>
    </div>
  </div>
</div>

<div class="container">
<div class="row">
  <section id="primary" class="content-area col-sm-12 col-md-12 col-lg-12">
    <div class="breadcrumbs">
      <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
      } ?>
    </div>

    <main id="main" class="site-main" role="main">

    <?php
    /**
     * Template part for displaying posts
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package WP_Bootstrap_Starter
     */
    ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



  <!-- Post Content -->
  <div class="entry-content">

    <?php
		$id=2343;
		$post = get_post($id);
		$content = apply_filters('the_content', $post->post_content);
		echo $content;
	 ?>

  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php wp_bootstrap_starter_entry_footer(); ?>
  </footer><!-- .entry-footer -->
  <!-- END: Post Content -->



  <!-- Listing out child pages from relationship field -->
  <div class="container childPages">
    <?php
    $posts = get_field('section_child_pages', 2343);
    if( $posts ): ?>

      <?php $oddToggle = true; ?>

      <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>

        <?php if($oddToggle) { $stripe = "odd"; } else { $stripe = "even"; } ?>
        <div class="row <?php echo $stripe; ?> childpage">

          <div class="col-md-4 nopadding image <?php if(!($oddToggle)) { echo 'hx-push-8'; } ?>" >
            <a href="<?php if ( get_field( 'alternate_product_url', $p->ID  ) ): ?>
                <?php the_field('alternate_product_url', $p->ID ); ?>
              <?php else: ?>
                <?php the_permalink( $p->ID ); ?>
              <?php endif; ?>">
              <div class="section-images" style="background-image: url(<?php echo the_field('preview_image_for_section_page', $p->ID ); ?>) !important;">&nbsp;</div>
            </a>
          </div>

          <div class="col-md-8 text <?php if(!($oddToggle)) { echo 'hx-pull-4'; } ?>">
            <a class="title" href="<?php if ( get_field( 'alternate_product_url', $p->ID  ) ): ?>
                <?php the_field('alternate_product_url', $p->ID ); ?>
              <?php else: ?>
                <?php the_permalink( $p->ID ); ?>
              <?php endif; ?>">
              <h4><?php echo get_the_title( $p->ID ); ?></h4>
            </a>
            <p class="section-text">
              <?php $content = get_the_excerpt( $p->ID ); echo wp_trim_words( $content , '20' ); ?>
                <a class="section-readmore" href="<?php if ( get_field( 'alternate_product_url', $p->ID  ) ): ?>
                    <?php the_field('alternate_product_url', $p->ID ); ?>
                  <?php else: ?>
                    <?php the_permalink( $p->ID ); ?>
                  <?php endif; ?>">Read more <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a>
            </p>
          </div>

        </div>

        <?php $oddToggle = !($oddToggle); ?>

      <?php endforeach; ?>

    <?php endif; ?>

  </div>
  <!-- END: Listing out child pages from relationship field -->



</article><!-- #post-## -->


    </main><!-- #main -->
  </section><!-- #primary -->

<?php
//get_sidebar('service');
get_footer();
