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
	.solution-header {
    	margin: 0 0 00px 0;
	}
	p#breadcrumbs {
	    margin-bottom: 0;
	}
	.relatedposts h3 {
	    text-transform: uppercase;
	    margin-top: 30px;
	    margin-bottom: 0;
	    font-size: 1.75em;
	    font-weight: 300;
	}
	.relatedposts {
	    margin: 0 0 10px !important;
	}
	.testimonial-slider.gallery {
	    margin: 0em 0;
	}
	#content.site-content {
	    padding-bottom: 0px;
	}
	#footer-widget {display: none;}
	#overview-features::before, #community::before, #resources::before {
	   content: "";
	   display: block;
	   height: 9999px;
	   margin-top: -9999px; //higher thin page height
	}
	.flickity-prev-next-button .arrow {
	  fill: white;
	}
	div#wrapFooter {
	    margin-top: 0px;
	}
</style>

</div>
</div>


<div class="solution-header row align-items-center" data-parallax="scroll" data-speed="0.5" data-image-src="<?php the_post_thumbnail_url();?>">
	<div class="col-md-12">
		<div class="container">
			<h1 class="blogheader">
				<?php the_title(); ?>
			</h1>
			<h2 class="blogheader">
			 <?php the_field('hero_subhead'); ?>
			</h2>
		</div>
	</div>
</div>

<!-- CONTAINER FLUID -->
	<div id="tabs"> <!--TABS START -->
	<div class="tabbar align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-md-4 tabcrumb">
					<div class="breadcrumbs">
						<?php  if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('<p id="breadcrumbs">','</p>');
						} ?>
					</div>
				</div>
			<div class="col-md-8 textside">
				<ul>
					<li class="overview nav nav-tabs nav-justified"><a href="#overview-features">Overview &amp; Features</a></li>
				    <li class="community nav nav-tabs nav-justified"><a href="#community">Community</a></li>
				    <li class="resources nav nav-tabs nav-justified"><a href="#resources">Resources</a></li>
				    <!--Extra Tab START -->
					<?php if( get_field('display_extra_navigation_tab') == 'yes' ): ?>
						<li class="extra"><a href="#extra"><?php the_field('extra_navigation_title') ?></a></li>
					<?php endif; ?>
					<!--Extra Tab START -->
				</ul>
			</div>
		</div>
	</div>
	</div>
	  <script type="text/javascript">

	  	$(function() {
    $("#tabs").tabs({
        activate: function(event, ui) {
            window.location.hash = ui.newPanel.attr('id');
        }
    });
});

</script>

	  <div id="overview-features" class="panel">
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
		<div class="screenshot-gallery">
			<div class="container">
				<h2 class="text-center color-white margin-b-40">Explore The Interface</h2>
				<?php

				$images = get_field('screenshot_gallery');

				if( $images ): ?>
				<div class="row gallery">

				        <?php foreach( $images as $image ): ?>
				            <div class="col-lg-2 col-md-3 col-sm-4 carousel-cell">
				                <a href="<?php echo $image['url']; ?>">
				                     <img src="<?php echo $image['sizes']['inset-image-crop']; ?>" title="<?php echo $image['description']; ?>" class="mpopup" alt="<?php echo $image['description']; ?>" />
				                </a>
				                <p class="color-white text-center caption"><?php echo $image['caption']; ?></p>
				            </div>
				        <?php endforeach; ?>
				   </div>
				<?php endif; ?>
				</div>
			</div>


			<div class="col-md-12 nopadding">

			<div class="gallery js-flickity testimonial-slider" data-flickity='{ "autoPlay": 12000 }'>

				<?php

								$posts = get_field('related_testimonials');

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
	  <div id="community" class="panel">
	  	<div class="container">


		<?php

		$posts = get_field('related_projects');

		if( $posts ): ?>
	    	<div class="row">
	<div class="col-md-12 relatedposts margin-t-40">
		<h3>Case Studies</h3>
	</div>
			<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
			   <div class="col-sm-6 col-lg-4  relatedposts margin-b-10">
			    	<a href="<?php echo get_permalink( $p->ID ); ?>">
			    		<div class="associated-posts" style="background-image: url(<?php echo get_the_post_thumbnail_url( $p->ID ); ?>) !important;">
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
			    		</div>
			    		<h4 class="margin-b-10"><?php echo get_the_title( $p->ID ); ?></h4>
			    	</a>
			    	<div class="posttype"><?php the_field('client_name', $p->ID); ?></div>
			  </div>
			<?php endforeach; ?>
</div>
		<?php endif; ?>



		<?php

		$posts = get_field('related_blog_posts');

		if( $posts ): ?>
		<div class="row margin-b-40">
	<div class="col-md-12 relatedposts margin-t-40">
		<h3>Related Blog Posts</h3>
	</div>

			<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
			   <div class="col-sm-6 col-md-4 relatedposts">
			    	<a href="<?php echo get_permalink( $p->ID ); ?>"><div class="associated-posts" style="background-image: url(<?php echo get_the_post_thumbnail_url( $p->ID ); ?>) !important;"></div><h4 class="margin-b-10"><?php echo get_the_title( $p->ID ); ?></h4></a>
					<div class="product-blog-author text-center">
						 <!-- Author Multiselect Call Start -->
				<?php

				$post_objects = get_field('author_presenter', $p->ID );

				if( $post_objects ): ?>

					 By:
				   <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>


<?php if ( has_term('guest-author','employee_type' ) ) {?>
				        <span class="meta-guest"><?php the_title(); ?></span>
<?php } elseif ( has_term('team-member','employee_type' ) ) {?>
 						<a class="meta-author" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php } elseif ( has_term('leadership','employee_type' ) ) {?>
 						<a class="meta-author" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php } ?>


				         <?php endforeach; ?>

				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

			<?php else : ?>
				<span class="meta-guest">| By: SSP Innovations</span>
			<?php endif; ?>
			<!-- Author Multiselect Call End -->
</div>

			  </div>
			<?php endforeach; ?>
</div>
		<?php endif; ?>





<!-- Demo Videos -->
<?php

// check if the repeater field has rows of data
if( have_rows('youtube_demo_videos') ): ?>

	<div class="row">
		<div class="col-md-12 relatedposts margin-t-40 margin-b-40">
			<h3>Demo Videos</h3>

	<?php // loop through the rows of data
		while ( have_rows('youtube_demo_videos') ) : the_row(); ?>

			<!-- Big Video -->
			<div class="post-thumbnail demo-video embed-container">
				<iframe width="1280" height="420" src="https://www.youtube.com/embed/<?php the_sub_field('youtube_video_id'); ?>" frameborder="0" allowfullscreen></iframe>
			</div>
			<!-- END: Big Video -->

<?php endwhile; ?>

		</div>
	</div>

<?php else : ?>

<?php endif; ?>
<!-- END: Demo Videos -->





<?php if( get_field('community_tab_extra_content') ): ?>
<div class="row">
	<div class="col-md-12 relatedposts margin-t-40 margin-b-40">
		<h3>Extra Content</h3>
		<div class="extracontent"><?php the_field('community_tab_extra_content'); ?></div>
	</div>
</div>
<?php endif; ?>
		</div>
	  </div>
	  <div id="resources" class="panel">

						<?php

						$posts = get_field('webinar_list');

						if( $posts ): ?>
	  	<div class="container">


				<div class="row">
					<div class="col-md-12 relatedposts margin-t-40">
						<h3>SSP TV</h3>
					</div>
							<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
							   <div class="col-sm-6 col-md-4  relatedposts margin-b-10">
							    	<a href="<?php echo get_permalink( $p->ID ); ?>"><div class="associated-posts" style="background-image: url(<?php echo get_the_post_thumbnail_url( $p->ID ); ?>) !important;"></div><h4 class="margin-b-10"><?php echo get_the_title( $p->ID ); ?></h4></a>

							  </div>
							<?php endforeach; ?>
				</div>
						<?php endif; ?>

<?php if( get_field('resources_tab_extra_content') ): ?>
				<div class="row">
					<div class="col-md-12 relatedposts margin-t-40 margin-b-40">
						<h3>Extra Content</h3>
						<div class="extracontent"><?php the_field('resources_tab_extra_content'); ?></div>
					</div>
				</div>
<?php endif; ?>


	    </div>
	  </div>

<div id="extra" class="panel">
			<div class="container">


					<?php if( get_field('extra_navigation_content') ): ?>
									<div class="row">
										<div class="col-md-12 relatedposts margin-t-40 margin-b-40">
											<h3>Extra Content</h3>
											<div class="extracontent"><?php the_field('extra_navigation_content'); ?></div>
										</div>
									</div>
					<?php endif; ?>
			</div>

	    </div>

	</div> <!--TABS END-->
<!-- CONTAINER FLUID END -->

<div class="container-fluid contactproduct">
    <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="contactform">
          <h3>Inquire About This Product</h3>
          <p class="margin-b-0">Reach out to learn more, and we will get back in touch with you</p>
            <?php gravity_form(11, false, false, false, '', true, 12); ?>
        </div>
      </div>
    </div>
  </div>

</div>


<div class="container">




<?php
get_sidebar('solution');
get_footer();
