<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

	$sectionPageID = 6390;

get_header(); ?>
</div>
</div>

<div class="project-header row align-items-center" data-parallax="scroll" data-speed="0.5" data-image-src="<?php echo get_the_post_thumbnail_url($sectionPageID); ?>">
	<div class="col-md-12">
		<div class="container">
			<h1 class="blogheader">
				<?php the_field('hero_headline', $sectionPageID); ?>
			</h1>
			<h2 class="blogheader">
				<?php the_field('hero_subhead', $sectionPageID); ?>
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

<article id="post-<?php the_ID(); ?>" >



	<!-- Post Content -->
 	<div class="entry-content">

	<?php
		$id=$sectionPageID;
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
	<div class="row margin-b-60">
		<div class="col-lg-4 margin-b-20 sm-margin-b-50">
			<div class="p-inner">
				<div class="peoplebox leadership">
					<h2 class="employee-type">Our Leadership</h2>
				</div>
			</div>
		</div>



		<?php
		$posts = get_field('leadership', $sectionPageID);
		if( $posts ): ?>

			<?php $oddToggle = true; ?>

			<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>

				<?php if($oddToggle) { $stripe = "odd"; } else { $stripe = "even"; } ?>

					<div class="col-lg-4 margin-b-20 sm-margin-b-50">

						<div class="p-inner">
							<div id="pbox" class="peoplebox" style="background-image: url(<?php echo get_the_post_thumbnail_url($p->ID); ?>) !important;"></div>
							<div id="pboxcontent" class="peopleboxcontent">
								<h2><?php echo get_the_title( $p->ID ); ?></h2>

								<?php if( get_field( 'job_title', $p->ID ) ): ?>
									<span><?php the_field('job_title', $p->ID ); ?></span>
								<?php else: ?>
									<span>Employee</span>
								<?php endif; ?>

								<?php if( get_field( 'employee_fun_fact', $p->ID ) ): ?>
									<h5>Fun Fact</h5>
									<p><?php the_field( 'employee_fun_fact', $p->ID ); ?></p>
								<?php else: ?>
									<h5>About Me</h5>
									<p>
										<?php
											$content = get_the_excerpt( $p->ID );
											echo wp_trim_words( $content , '15' ); ?>
									</p>
								<?php endif; ?>

								<div class="fullinfo">
									<a href="<?php the_permalink( $p->ID ); ?>"><button type="button" class="btn-base-brd-slide btn-slide btn-slide-top btn-base-xs">FULL INFO & CONTACT</button></a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>

					</div>

				<?php $oddToggle = !($oddToggle); ?>

			<?php endforeach; ?>

		<?php endif; ?>

	</div>
	<!-- END: Listing out child pages from relationship field -->



	<!-- Listing out child pages from relationship field -->
	<div class="row margin-b-60">
		<div class="col-lg-4 margin-b-20 sm-margin-b-50">
			<div class="p-inner">
				<div class="peoplebox team">
					<h2 class="employee-type">Team Members</h2>
				</div>
			</div>
		</div>


		<?php
		$posts = get_field('team_members', $sectionPageID);
		if( $posts ): ?>

			<?php $oddToggle = true; ?>

			<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>

				<?php if($oddToggle) { $stripe = "odd"; } else { $stripe = "even"; } ?>

					<div class="col-lg-4 margin-b-20 sm-margin-b-50">

						<div class="p-inner">
							<div id="pbox" class="peoplebox" style="background-image: url(<?php echo get_the_post_thumbnail_url($p->ID); ?>) !important;"></div>
							<div id="pboxcontent" class="peopleboxcontent">
								<h2><?php echo get_the_title( $p->ID ); ?></h2>

								<?php if( get_field( 'job_title', $p->ID ) ): ?>
									<span><?php the_field('job_title', $p->ID ); ?></span>
								<?php else: ?>
									<span>Employee</span>
								<?php endif; ?>

								<?php if( get_field( 'employee_fun_fact', $p->ID ) ): ?>
									<h5>Fun Fact</h5>
									<p><?php the_field( 'employee_fun_fact', $p->ID ); ?></p>
								<?php else: ?>
									<h5>About Me</h5>
									<p>
										<?php
											$content = get_the_excerpt( $p->ID );
											echo wp_trim_words( $content , '15' ); ?>
									</p>
								<?php endif; ?>

								<div class="fullinfo">
									<a href="<?php the_permalink( $p->ID ); ?>"><button type="button" class="btn-base-brd-slide btn-slide btn-slide-top btn-base-xs">FULL INFO & CONTACT</button></a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>

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
