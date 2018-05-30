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



	<!-- Big Video -->
	<div class="post-thumbnail ssptvhero embed-container">
		<iframe width="1280" height="420" src="https://www.youtube.com/embed/<?php the_field('youtube_video_id'); ?>" frameborder="0" allowfullscreen></iframe>
	</div>
	<!-- END: Big Video -->


	<!-- Post Content -->
	<div class="row">
		<div class="col-md-8">


	<!-- Entry Header -->
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
			<?php endif; ?>
	</header><!-- .entry-header -->
	<!-- END: Entry Header -->



<!-- Entry Meta -->
	<div class="single-date">
		<?php the_date(); ?> &mdash;
		<?php // Author Name
			$post_objects = get_field('author_presenter');
			if( $post_objects ): ?>

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

		<?php endif; ?>
		&nbsp;[<?php the_field('video_duration'); ?>]
	</div>
	<!-- END: Entry Meta -->



	<!-- Post Content -->
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



		<?php if( get_field('video_transcript') ): ?>
			<p id="wrapToggle"><a href="" id="toggle" class="button white-button">Video Transcript</a></p>
			<div id="transcript">
				<?php the_field('video_transcript'); ?>
			</div>
		<?php endif; ?>


		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>

		<div class="categories">
			<h4> <span class="catbar"></span> <?php the_category('&nbsp;&nbsp;'); ?></h4>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<!-- END: Post Content -->



	<!-- CTA Banner -->
	<?php
		$post_objects = get_field('cta_banner');

		if( $post_objects ): ?>

			<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>

				<?php setup_postdata($post); ?>
				<?php the_content()?>

			<?php endforeach; ?>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

			<div class="fix"></div>

		<?php else : ?>

			<?php // Default CTA Post
				$post_id = 1943;
				$queried_post = get_post($post_id); ?>
			<?php echo $queried_post->post_content; ?>

	<?php endif; ?>
	<!-- END: CTA Banner -->



	<!-- Author Info -->
	<div class="authorinfo">
		<?php

			/*
			*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
			*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
			*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
			*/

			$post_objects = get_field('author_presenter');

			if( $post_objects ): ?>

			<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				<?php if ( has_term('guest-author','employee_type' ) ) {?>
					<div class="row align-items-center margin-t-40">
						<div class="col-sm-4">
							<div class="guest-headshot">Guest Author</div>
						</div>
						<div class="col-sm-8">
							<h4 class="author"><?php the_title(); ?>
						</div>
					</div>

				<?php } elseif ( has_term('team-member','employee_type' ) ) {?>

					<div class="row align-items-center">
						<div class="col-sm-4">
							<a href="<?php the_permalink(); ?>"><div class="author-headshot" style="background-image: url('<?php the_post_thumbnail_url() ?>')!important;"></div></a>
						</div>
						<div class="col-sm-8">
							<div class="row align-items-center">
								<div class="col-sm-8">
									<h4 class="author"><?php the_title(); ?>
										<span class="contact linkedin">
										<?php if( get_field('contact_linkedin') ): ?>
											<a href="<?php the_field('contact_linkedin'); ?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
										<?php endif; ?>
										</span>
										<span class="contact twitter">
										<?php if( get_field('contact_twitter') ): ?>
											<a href="<?php the_field('contact_twitter'); ?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
										<?php endif; ?>
										</span>
									</h4>
								</div>

								<div class="col-sm-4">
									<span class="morealink"><a href="<?php the_permalink(); ?>">More by this author </a></span>
								</div>
							</div>

							<div class="bio-excerpt padding-t-10">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>

				<?php } elseif ( has_term('leadership','employee_type' ) ) {?>
					<div class="row align-items-center">
						<div class="col-sm-4">
							<div class="author-headshot" style="background-image: url('<?php the_post_thumbnail_url() ?>')!important;"></div>
						</div>
						<div class="col-sm-8">
							<div class="row align-items-center">
								<div class="col-sm-8">
									<h4 class="author"><?php the_title(); ?>
										<span class="contact linkedin">
										<?php if( get_field('contact_linkedin') ): ?>
											<a href="<?php the_field('contact_linkedin'); ?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
										<?php endif; ?>
										</span>
										<span class="contact twitter">
											<?php if( get_field('contact_twitter') ): ?>
												<a href="<?php the_field('contact_twitter'); ?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
											<?php endif; ?>
										</span>
									</h4>
								</div>
								<div class="col-sm-4">
									<span class="morealink"><a href="<?php the_permalink(); ?>">More by this author </a></span>
								</div>
							</div>

							<div class="bio-excerpt padding-t-10">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				<?php } ?>


			<?php endforeach; ?>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

		<?php endif; ?>

	</div>
	<!-- END: Author Info -->



	<!-- Assoc Blog Posts -->
	<?php if( get_field('related_blog_posts') ): ?>
		<div class="row">
			<div class="col-sm-12 relatedposts margin-t-40">
				<h3>RELATED blog posts & VIDEOS</h3>
			</div>

			<?php
				$posts = get_field('related_blog_posts');
				if( $posts ): ?>

					<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
						<div class="col-sm-6 relatedposts">
							<a href="<?php echo get_permalink( $p->ID ); ?>"><div class="associated-posts" style="background-image: url(<?php echo get_the_post_thumbnail_url( $p->ID ) ?>) !important;"></div></a>
							<a href="<?php echo get_permalink( $p->ID ); ?>"><h4><?php echo get_the_title( $p->ID ); ?></h4></a>
						</div>

					<?php endforeach; ?>

			<?php endif; ?>

		</div>
	<?php endif; ?>
	<!-- END: Assoc Blog Posts -->



	</div>



	<div class="col-md-4">
		<?php get_sidebar('ssptv'); ?>
	</div>



</article><!-- #post-## -->
