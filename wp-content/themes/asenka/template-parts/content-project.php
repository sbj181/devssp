<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article class="page-archive" id="post-<?php the_ID(); ?>">

<div class="row">
		<div class="col-md-8">
				<div class="project-hero" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">

							<!-- SERVICES USED -->
								<?php
								/*
								*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
								*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
								*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
								*/

								$post_objects = get_field('services_used');

								if( $post_objects ): ?>

									<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
										<?php setup_postdata($post); ?>
											<h2 class="text-center color-white hero-title"><?php the_title(); ?></h2>
											<?php break; // breaks loop to only get first result ?>
										<?php endforeach; ?>

									<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

								<?php endif; ?>
								<!-- END SERVICES USED -->
				</div>
		</div>

		<div class="col-md-4">
				<div class="project-box bluebox">
					<div>
						<header class="entry-header margin-b-10">


								<?php if ( is_single() ) { ?>
											<h1 class='entry-title projects-title color-white'><?php the_field('client_name'); ?></h1>
								<?php } else { ?>
											<h1 class='entry-title projects-title color-white'><a href='<?php esc_url( get_permalink() ); ?>' rel='bookmark'><?php the_field('client_name'); ?></a></h1>
								<?php } ?>

								<?php if ( 'post' === get_post_type() ) : ?>
								<div class="entry-meta">
									<?php wp_bootstrap_starter_posted_on(); ?>
								</div><!-- .entry-meta -->
								<?php
										endif; ?>
							</header><!-- .entry-header -->
										<!-- PROJECT STATUS -->
										<?php
										$term = get_field('project_status');
										if( $term ): ?>

											<p class="color-white pstatus"><?php echo $term->name; ?></p>

										<?php endif; ?>
										<!-- END PROJECT STATUS -->
								<!-- INDUSTRY -->
								<?php
								/*
								*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
								*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
								*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
								*/

								$post_objects = get_field('industry');

								if( $post_objects ): ?>
									<p class="details">INDUSTRY:
									<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
										<?php setup_postdata($post); ?>
											<a class="color-white font-16 industries" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<?php endforeach; ?>
									</p>
									<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

								<?php endif; ?>
								<!-- END INDUSTRY -->

							<!-- SERVICES USED -->
								<?php
								/*
								*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
								*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
								*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
								*/

								$post_objects = get_field('services_used');

								if( $post_objects ): ?>
									<p class="details">SERVICES:
									<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
										<?php setup_postdata($post); ?>
											<a class="color-white font-16 services-used" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<?php endforeach; ?>
									</p>
									<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

								<?php endif; ?>
								<!-- END SERVICES USED -->
								<!-- SOLUTIONS USED -->
								<?php
								/*
								*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
								*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
								*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
								*/

								$post_objects = get_field('solutions_used');

								if( $post_objects ): ?>
									<p class="details">PRODUCTS:
									<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
										<?php setup_postdata($post); ?>
											<a class="color-white font-16 solutions-used" href="<?php if ( get_field( 'alternate_product_url', $p->ID  ) ): ?>
<?php the_field('alternate_product_url', $p->ID ); ?>
<?php else: ?>
<?php the_permalink( $p->ID ); ?>
<?php endif; ?>"><?php the_title(); ?></a>
										<?php endforeach; ?>
									<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									</p>
								<?php endif; ?>
								<!-- END SOLUTIONS USED -->
						</div>
				</div>
		</div>
</div>



	<!-- Post Content -->
	<div class="col-md-8">

		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
				the_content();
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
			endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .project-content -->

	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<!-- END: Post Content -->



	<!-- PDF VERSION -->
	<?php if( get_field('pdf_version') ): ?>
		<a class="button white-button" href="<?php the_field('pdf_version'); ?>" target="_blank" >Get this as a PDF</a>
	<?php endif; ?>
	<!-- END PDF VERSION -->



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
  <!-- END: Associated Content (Featured Content) -->



</article><!-- #post-## -->
