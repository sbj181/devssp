<?php
/**
 * The template for displaying download cpt archive page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

	$sectionPageID = 6389;

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
	<div id="eBook" class="row margin-b-60 dnload-group">



		<div class="col-lg-4 margin-b-20 sm-margin-b-50">
			<div class="my-inner">
				<div class="firstbox dnload-label ebooks">
					<h2 class="employee-type">FREE<br>eBOOKS</h2>
				</div>
			</div>
		</div>



		<?php
		$posts = get_field('ebooks', $sectionPageID);
		if( $posts ): ?>

			<?php $oddToggle = true; ?>

			<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>

				<?php if($oddToggle) { $stripe = "odd"; } else { $stripe = "even"; } ?>

					<div class="col-lg-4 margin-b-20 sm-margin-b-50">
						<a href="<?php echo get_the_permalink( $p->ID ); ?>">

							<div class="my-inner downbox">
								<div id="pbox" class="downloadbox *padding-t-10 *margin-b-n30">
									<div class="dcontent" style="background-image: url(<?php the_field('list_page_preview_image', $p->ID ); ?>) !important;"></div>
								</div>
								<div class="downcontent">
									<h2 class="download-title"><?php echo get_the_title( $p->ID ); ?></h2>
									<p class="download-text">
										<?php	$content = get_the_excerpt( $p->ID );
											echo wp_trim_words( $content , '16' ); ?>
									</p>
								</div>
								<div id="pboxcontent" class="downloadboxcontent">
		 							<h3>Download This</h3>
								</div>
							</div>

							<div class="clearfix"></div>

						</a>
					</div>

				<?php $oddToggle = !($oddToggle); ?>

			<?php endforeach; ?>

		<?php endif; ?>

	</div>
	<!-- END: Listing out child pages from relationship field -->



	<!-- Listing out child pages from relationship field -->
	<div id="Free Software Tool" class="row margin-b-60 dnload-group">



		<div class="col-lg-4 margin-b-20 sm-margin-b-50">
			<div class="my-inner">
				<div class="firstbox dnload-label software-tools">
					<h2 class="employee-type">FREE SOFTWARE TOOLS</h2>
				</div>
			</div>
		</div>



		<?php
		$posts = get_field('software', $sectionPageID);
		if( $posts ): ?>

			<?php $oddToggle = true; ?>

			<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>

				<?php if($oddToggle) { $stripe = "odd"; } else { $stripe = "even"; } ?>

					<div class="col-lg-4 margin-b-20 sm-margin-b-50">
						<a href="<?php echo get_the_permalink( $p->ID ); ?>">

							<div class="my-inner downbox">
								<div id="pbox" class="downloadbox *padding-t-10 *margin-b-n30">
									<div class="dcontent" style="background-image: url(<?php the_field('list_page_preview_image', $p->ID ); ?>) !important;"></div>
								</div>
								<div class="downcontent">
									<h2 class="download-title"><?php echo get_the_title( $p->ID ); ?></h2>
									<p class="download-text">
										<?php	$content = get_the_excerpt( $p->ID );
											echo wp_trim_words( $content , '16' ); ?>
									</p>
								</div>
								<div id="pboxcontent" class="downloadboxcontent">
		 							<h3>Download This</h3>
								</div>
							</div>

							<div class="clearfix"></div>

						</a>
					</div>

				<?php $oddToggle = !($oddToggle); ?>

			<?php endforeach; ?>

		<?php endif; ?>

	</div>
	<!-- END: Listing out child pages from relationship field -->



	<!-- Listing out child pages from relationship field -->
	<div id="Script" class="row margin-b-60 dnload-group">



		<div class="col-lg-4 margin-b-20 sm-margin-b-50">
			<div class="my-inner">
				<div class="firstbox dnload-label scripts">
					<h2 class="employee-type">SCRIPTS</h2>
				</div>
			</div>
		</div>



		<?php
		$posts = get_field('scripts', $sectionPageID);
		if( $posts ): ?>

			<?php $oddToggle = true; ?>

			<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>

				<?php if($oddToggle) { $stripe = "odd"; } else { $stripe = "even"; } ?>

					<div class="col-lg-4 margin-b-20 sm-margin-b-50">
						<a href="<?php echo get_the_permalink( $p->ID ); ?>">

							<div class="my-inner downbox">
								<div id="pbox" class="downloadbox *padding-t-10 *margin-b-n30">
									<div class="dcontent" style="background-image: url(<?php the_field('list_page_preview_image', $p->ID ); ?>) !important;"></div>
								</div>
								<div class="downcontent">
									<h2 class="download-title"><?php echo get_the_title( $p->ID ); ?></h2>
									<p class="download-text">
										<?php	$content = get_the_excerpt( $p->ID );
											echo wp_trim_words( $content , '16' ); ?>
									</p>
								</div>
								<div id="pboxcontent" class="downloadboxcontent">
		 							<h3>Download This</h3>
								</div>
							</div>

							<div class="clearfix"></div>

						</a>
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
