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
	<?php if ( !is_single() ) { ?>
		<div class="post-thumbnail servicehero">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>

	<div class="entry-content">

		<?php
			if ( is_single() ) :
				the_content();
			else :
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
			endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<!-- END: Post Content -->


<!-- BREAK THE FLOW OF CONTAINING DIVS TO GO FULLSCREEN -->
</div>
</div>
<!-- END: BREAK THE FLOW OF CONTAINING DIVS TO GO FULLSCREEN -->



	<!-- Testimonial Slider -->
	<div class="row">
		<div class="col-md-12 nopadding">
			<div class="gallery js-flickity testimonial-slider" data-flickity='{ "autoPlay": 12000 }'>
				<?php
					$posts = get_field('related_testimonial');
					if( $posts ): ?>

					<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
						<div class="gallery-cell text-center">
							<div class="container">
								<div class="col-md-10 offset-md-1">
									<i class="fa fa-quote-left test-quote"></i>
									<div class="ft-testimonial color-white"><?php the_content(); ?></div>
									<?php $company = get_field('company'); if( $company ): ?><p class="ft-testimonial-from"><?php echo get_field('givers_name'); ?>, <?php echo $company->name; ?></p><?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>

					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- END: Testimonial Slider -->



<!-- START: FLICKITY PRODUCT Slider -->

    <?php if(get_field('partners_solutions')): ?>
<div class="container"><!-- Start: Contianer -->
  <div class="col-md-12">
    <h2 class="authored">Related Products</h2>
  </div>
      <div class="carousel js-flickity flickity-enabled is-draggable" id="productstep" data-flickity='{ "cellAlign": "left", "freeScroll": true, "contain": true , "initialIndex": 0, "dragThreshold": 20 }'>
            <?php
              $posts = get_field('partners_solutions');

              if( $posts ): ?>

                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

                  <?php setup_postdata($post); ?>
                      <div class="col-md-3 nopadding carousel-cell">
                            <a href="<?php if ( get_field( 'alternate_product_url' ) ): ?>
                      <?php the_field('alternate_product_url'); ?>
                      <?php else: ?>
                      <?php the_permalink(); ?>
                      <?php endif; ?>">
                      <div class="partner-image" style="background-image: url(<?php the_field('preview_image_for_section_page'); ?>); background-size: cover; background-position: center center;">
                        <h3 class="relatedsolutions"><?php the_title(); ?></h3>
                      </div>
                    </a>
                  </div>
              <?php endforeach; ?>

                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
              </div>
</div>
    <?php endif; ?>


<!-- END: FLICKITY PRODUCT Slider -->

<!-- End: Contianer -->
<!-- Starting Container Again -->
<div class="container">

	<!-- Associated Content (Featured Content) -->
	<?php if( get_field('featured_content') ): ?>
		<div class="row featuredContent">
			<div class="col-sm-12">
				<h2>Associated Content</h2>
			</div>

			<?php
				$posts = get_field('featured_content');
				if( $posts ): ?>

					<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
						<div class="col-sm-6 col-md-4 relatedposts">
							<a href="<?php echo get_permalink( $p->ID ); ?>"><div class="associated-posts" style="background-image: url(<?php echo get_the_post_thumbnail_url( $p->ID ) ?>) !important;">
								<!-- FIRST SERVICE USED -->
		            <?php
		            /*
		            *  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
		            *  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
		            *  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
		            */

		            $post_objects = get_field('services_used', $p->ID);

		            if( $post_objects ): ?>

		              <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
		                <?php setup_postdata($post); ?>
		                  <h2 class="text-center color-white project-box-title"><?php the_title(); ?></h2>
		                  <?php break; // breaks loop to only get first result ?>
		                <?php endforeach; ?>

		              <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

		            <?php endif; ?>
		            <!-- END FIRST SERVICE USED -->
							</div></a>
							<a href="<?php echo get_permalink( $p->ID ); ?>"><h4 class="margin-b-10"><?php echo get_the_title( $p->ID ); ?></h4></a>
							<div class="posttype"><?php echo get_post_type( $p->ID ); ?></div>
						</div>

					<?php endforeach; ?>

				<?php endif; ?>

		</div>
	<?php endif; ?>
	<!-- END: Associated Content (Featued Content) -->



<!-- BREAK THE FLOW OF CONTAINING DIVS TO GO FULLSCREEN -->
</div>
</div>
<!-- END: BREAK THE FLOW OF CONTAINING DIVS TO GO FULLSCREEN -->



<!-- Contact Form: Industry -->
<div class="container-fluid contactindustry">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="contactform">
					<h3>Industry Contact</h3>
					<p class="margin-b-0">Get in touch with one of our industry specialists:
<!-- Industry Contact ACF Start -->
<?php

/*
*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
*/

$post_objects = get_field('industry_contact');

if( $post_objects ): ?>

    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>

            <a class="color-white industries" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>


    <?php endforeach; ?>

    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
<!-- Industry Contact ACF End -->
					</p>
					<?php gravity_form(9, false, false, false, '', true, 100); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: Contact Form: Industry -->



</article><!-- #post-## -->
