<?php
/**
 * Template part for displaying people posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<div class="bigheadshot col-md-12" style="background-image: url('<?php the_post_thumbnail_url();?>');">

	</div>

<div class="row">
	<div class="col-md-8">
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title people-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wp_bootstrap_starter_posted_on(); ?>
			
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
		<div class="jobtitle">
			<?php if( get_field('job_title') ): ?>
				<?php the_field('job_title'); ?>
			<?php endif; ?>
		</div>
	</header><!-- .entry-header -->
		<div class="entry-content people">
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

	<div class="col-md-4">
	<div class="bluebox">

			<?php if( get_field('employee_fun_fact') ): ?>
				<div class="funfact">
				<h2>Fun Fact</h2>
				<p><?php the_field('employee_fun_fact'); ?></p>
				</div>
			<?php endif; ?>

		<div class="contactbox linkedin twitter">
		<h2>Let's Connect</h2>
		<p class="margin-b-10">Follow me on social media</p>
			<?php if( get_field('contact_linkedin') ): ?>
				<a href="<?php the_field('contact_linkedin'); ?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
			<?php endif; ?>
			<?php if( get_field('contact_twitter') ): ?>
				<a href="<?php the_field('contact_twitter'); ?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
			<?php endif; ?>
		</div>
	</div>
	</div>
</div>
</article>
</div>
</div>

<div class="container-fluid contactpeople">
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="contactform">
					<h3>Get in touch with me</h3>
					<p class="margin-b-0">Fill out the form to send me an email</p>
						<?php gravity_form(1, false, false, false, '', true, 12); ?>
				</div>
			</div>
		</div>
	</div>
		
</div>


		       
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h2 class="authored">Content I have Authored</h2>
		             
		            <?php echo do_shortcode("[ajax_load_more transition_container_classes=row transition=fade container_type=div post_type=blog, press, ssptv posts_per_page=6 meta_key=author_presenter meta_compare=LIKE meta_value=$id images_loaded=true button_loading_label='loading more...']"); ?>

		            
		  </div>
	</div>
		   



	
</article><!-- #post-## -->
