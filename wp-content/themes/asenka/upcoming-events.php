<?php
/**
* Template Name: Upcoming Events Template
 */

$sectionPageID = 7137;

get_header(); ?>
</div>
</div>

<div class="project-header row align-items-center" data-parallax="scroll" data-speed="0.5" data-image-src="<?php echo get_the_post_thumbnail_url($sectionPageID); ?>">
  <div class="col-md-12">
    <div class="container">
      <h1 class="blogheader blog-m-size">
        SSP Events
      </h1>
      <h2 class="blogheader">
        Visit our Booth and Say Hello
      </h2>
    </div>
  </div>
</div>
<div class="container">
<div class="row">

	<section id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">
<div class="breadcrumbs">
<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div>
			<div class="row">
					<div class="col-md-12">
						<!--<h1 class="page-title margin-b-20" style="margin-top: 30px;"><a href="/events/upcoming">Upcoming Events</a></h1>-->
						<div class="event-page-content margin-b-40"><?php the_content(); ?></div>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php endwhile; // end of the loop. ?>

			<?php
			$today = date('Ymd');

			$args = array(
				'post_type'  => 'event',
				'showposts' => -1,
				'meta_query' => array(
					array(
						'key'     => 'end_date', //name of custom field
						'compare'	=> '>=',
						'value'		=> $today,
					),
				),
				// 'meta_key' => 'event_date',
				'orderby' => 'meta_value_num',
				'order' => 'ASC',
			);
    $the_query = new WP_Query( $args );


    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {

            $the_query->the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-md-2">
			<div class="event-square">
				<div class="event-number"><?php $date = get_field('date'); ?><?php echo date("d", strtotime($date)); ?></div>
				<div class="event-month"><?php $date = get_field('date'); ?><?php echo date("M", strtotime($date)); ?></div>
			</div>
		</div>
		<div class="col-md-10">
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
				<div class="col-md-12 eventdate">
					<div class="event-time"><?php $date = get_field('date'); ?><?php echo date("M d, Y", strtotime($date)); ?></div>
				</div>
			</div>


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


        <?php } } else { ?>

        <h2 class="notfound">No Upcoming Events</h2>

    <?php //endif; ?>
    <?php } ?>
    <?php wp_reset_postdata(); ?>



					</div>
</div>

		</main><!-- #main -->
	</section><!-- #primary -->


<?php
get_sidebar('event');
get_footer();
