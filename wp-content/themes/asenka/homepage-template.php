<?php
/**
* Template Name: Homepage Template
 */

get_header(); ?>

<style type="text/css">
p.ft-testimonial-from {
	font-size: 20px;
}
div.ft-testimonial {
	font-size: 22px;
	line-height: 30px;
}
</style>

	</div> <!--Ended Inner Container for Slider-->
</div> <!--Ended Outer Container for Slider-->

<!-- Subscription CTA Overlay -->
<div class="stayuptodate">
	<a href="/subscribe">
		<h3 class="color-blue">STAY UP TO DATE</h3>
		<span class="color-grey">Subscribe to the SSP Newsletter</span>
	</a>
</div>

<div class="row bg-white"> <!--Re Started Outer Container for Slider-->
	<div class="container"> <!--Re Started Inner Container for Slider-->

		<section id="primary" class="content-area col-sm-12">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'home' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</section><!-- #primary -->

	</div> <!--Ended Inner Container for Slider-->
</div> <!--Ended Outer Container for Slider-->


<!-- START: FLICKITY PRODUCT Slider -->

<?php if( get_field('homepage_products') ): ?>
	<div class="row" id="productstep">
		<?php
		$posts = get_field('homepage_products');
		if( $posts ): ?>

		<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

		<?php setup_postdata($post); ?>
		<div class="col-md-3 nopadding-md">
			<a href="<?php if ( get_field( 'alternate_product_url' ) ): ?>
				<?php the_field('alternate_product_url'); ?>
			<?php else: ?>
			<?php the_permalink(); ?>
		<?php endif; ?>">
		<div class="home-cover">
			<div class="home-image move" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>); background-size: cover;">

			</div>
			<h3 class="homesolutions shadow color-white"><?php the_title(); ?></h3>
		</div>
	</a>
</div>
<?php endforeach; ?>

<div class="col-md-3 nopadding">
	<div class="partner-image" style="background-color: #EFEFEF">
		<a class="color-grey" href="/products"><h3 class="homesolutions">All SSP Products ></h3></a>
	</div>
</div>

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
</div>
<?php endif; ?>

<!-- END: FLICKITY PRODUCT Slider -->


<!-- START: FLICKITY SERVICE Slider -->

<?php if( get_field('homepage_services') ): ?>
	<div class="margin-b-40 row" id="servicestep">
		<?php
		$posts = get_field('homepage_services');
		if( $posts ): ?>

		<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

		<?php setup_postdata($post); ?>
		<div class="col-md-3 nopadding carousel-cell">
			<a href="<?php if ( get_field( 'alternate_product_url' ) ): ?>
				<?php the_field('alternate_product_url'); ?>
			<?php else: ?>
			<?php the_permalink(); ?>
		<?php endif; ?>">
		<div class="home-cover">
			<div class="home-image move" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>); background-size: cover;">

			</div>
			<h3 class="homesolutions shadow color-white"><?php the_title(); ?></h3>
		</div>
	</a>
</div>
<?php endforeach; ?>

<div class="col-md-3 nopadding">
	<div class="partner-image">
		<a class="color-grey" href="/services"><h3 class="homesolutions">All SSP Services ></h3></a>
	</div>
</div>

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
</div>
<?php endif; ?>

<!-- END: FLICKITY SERVICE Slider -->


<div class="bg-white text-center margin-t-140 margin-b-80">
	<div class="container">
		<div class="row">
			<?php

// check if the repeater field has rows of data
			if( have_rows('countup_numbers') ):

	// loop through the rows of data
				while ( have_rows('countup_numbers') ) : the_row(); ?>
				<div class="col-sm-3 col-xs-6 xs-full-width margin-b-20">
					<div class="counters-v6">
						<div class="counter color-blue margin-b-20">
							<?php the_sub_field('count'); ?>
						</div>
						<h4 class="counter-title margin-b-20 color-grey"><?php the_sub_field('countup_title'); ?></h4>
					</div>
				</div>
				<?php  endwhile;

				else : ?>
			<?php endif;

			?>
		</div>
		<!--// end row -->
	</div> <!--Ended Inner Container for Slider-->
</div> <!--Ended Outer Container for Slider-->



<!-- Testimonial Slider -->
<div class="row">
	<div class="col-md-12 nopadding">
		<div class="gallery js-flickity testimonial-slider" data-flickity='{ "autoPlay": 12000 }'>
			<?php
			$posts = get_field('homepage_testimonials');
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
	</div> <!--Ended Inner Container for Slider-->
</div> <!--Ended Outer Container for Slider-->
<!-- END: Testimonial Slider -->


<div class="bg-white text-center margin-t-100 margin-b-80">
	<div class="container">
		<div class="row">
			<?php

// check if the repeater field has rows of data
			if( have_rows('icon_box') ):

	// loop through the rows of data
				while ( have_rows('icon_box') ) : the_row(); ?>
				<div class="col-sm-3 col-xs-6 xs-full-width sm-margin-b-30">
					<i class="bordered-icon-box-item fa <? the_sub_field('icon_code'); ?>"></i>
					<p class="text-center text-bold font-18"><? the_sub_field('icon_title'); ?></p>
					<p class="text-center"><? the_sub_field('icon_text'); ?></p>
				</div>
				<?php  endwhile;

				else : ?>
			<?php endif; ?>
		</div>
		<!--// end row -->
	</div> <!--Ended Inner Container for Slider-->
</div> <!--Ended Outer Container for Slider-->


<div class="row">
	<div class="container">

		<!-- Associated Content (Featured Content) -->
		<?php if( get_field('featured_content') ): ?>
		<div class="row featuredContent">
			<div class="col-sm-12">
				<h2>What We've Been Up To</h2>
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



<?php
get_footer();
