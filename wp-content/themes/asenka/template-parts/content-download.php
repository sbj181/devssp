<?php
/**
 * Template part for displaying download cpt posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="row align-items-center no-margin dtop margin-b-20">
	<div class="col-md-6">
		<div class="download-left">
			<div class="backtolink"><?php
				$term = get_field('download_type');
				if( $term ): ?>
					<a class="color-blue" href="/downloads/#<?php echo $term->name; ?>"><span>&#x2039;</span> Back to <?php echo $term->name; ?>S</a>
				<?php endif; ?></div>
								<header class="entry-header">
									<?php
									if ( is_single() ) :
										the_title( '<h1 class="entry-title downloads-title margin-b-10">DOWNLOAD: ', '</h1>' );
									else :
										the_title( '<h1 class="entry-title downloads-title margin-b-10"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
									endif;

									if ( 'post' === get_post_type() ) : ?>

									<?php
									endif; ?>
									<p class="download-excerpt"><?php
						$content = get_the_excerpt();
						echo wp_trim_words( $content , '30' ); ?></p>
								</header><!-- .entry-header -->
		</div>
	</div>
	<div class="col-md-6 nopadding-xs">
		<div class="download-thumbnail">
			<div class="downloadhero" style="background-image: url(<?php the_post_thumbnail_url(); ?>) !important;">

			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-8">
					<div class="download-content">

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
	</div>
	<div class="col-lg-4">
		<div class="downloadside">

					<h1 class="download-title color-white margin-b-10">Download Now</h1>
						<p class="color-white download-excerpt margin-b-10">Share a little about yourself, and we'll email you a link to this free download.</p>
						<div class="downloadfile">

							<!--Download Start-->
							<div class="downloadform">
								<?php
								    $form_object = get_field('download_form');
								    gravity_form_enqueue_scripts($form_object['id'], true);
								    gravity_form($form_object['id'], false, false, false, '', true, 100);
								?>

			</div>



		</div>

	</div>
	<div class="social-share download-share">
			<div class="addthis_inline_share_toolbox"></div>
	</div>
	</div>
</div>


</article><!-- #post-## -->


<script type="text/javascript">

	jQuery(document).ready(function ($) {
		jQuery("button#gform_submit_button_").click(function() {
			 /* jQuery("div.downloadform div.gform_wrapper form").hide(); */
			jQuery("div.downloadform div.gform_wrapper form").css({ 'opacity' : 0.4 });
			var msg = "<img src='/wp-content/themes/asenka/imgs/spinner-rolling.gif' >";
			jQuery("div.downloadform div.gform_wrapper").append(msg);
		});
});

</script>

