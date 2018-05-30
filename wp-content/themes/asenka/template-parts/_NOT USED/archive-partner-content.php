<?php
/**
 * Template part for displaying partner archive post content
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row">
    <div class="col-sm-5">
      <div class="post-thumbnail partnerhero">
        <a href="<?php the_permalink(); ?>">
        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { //inserts first embedded image as featured
            echo get_the_post_thumbnail($post->ID);
          } else {
             echo main_image();
          } ?>
        </a>
      </div>
    </div>
    <div class="col-sm-7">
      <header class="entry-header">
        <?php
        if ( is_single() ) :
          the_title( '<h1 class="entry-title">', '</h1>' );
        else :
          the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
          <?php wp_bootstrap_starter_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php
        endif; ?>
      </header><!-- .entry-header -->
      <div class="row">
        <div class="col-sm-12 partner-headline">
          <h4><?php the_field('headline'); ?></h4>
        </div>
      </div>

      <div class="row"> <!-- Author Multiselect Call Start -->
        <?php

        $post_objects = get_field('author_presenter');

        if( $post_objects ): ?>

            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
                <div class="col-sm-6 partnerauthor">
              <h5>By: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            </div>
            <?php endforeach; ?>

            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif;

        ?>
      </div> <!-- Author Multiselect Call End -->
      <div class="entry-content">
      <?php the_excerpt(); ?>

        <?php
          wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
            'after'  => '</div>',
          ) );
        ?>
      </div><!-- .entry-content -->


      <footer class="entry-footer">
        <?php wp_bootstrap_starter_entry_footer(); ?>
      </footer><!-- .entry-footer -->
    </div>
  </div>
</article><!-- #post-## -->
