<?php
/**
 * Template part for displaying blog archive post content
 *
 */

?>
<div class="row">
					<div class="col-md-12">
						<h1 class="page-title margin-b-40" style="margin-top: 30px;"><a href="/events/upcoming">Upcoming Events</a></h1>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php endwhile; // end of the loop. ?>

			<?php
			$today = date('Ymd');

			$args = array(
				'post_type'  => 'event',
				'showposts' => -1,
				'meta_query' => array(
					array(
						'key'     => 'date', //name of custom field
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

        <h2>Not Found</h2>

    <?php //endif; ?>
    <?php } ?>
    <?php wp_reset_postdata(); ?>

			<div class="linkList">
				<a href="/events/upcoming" class="button white-button">See All Upcoming Events</a>
			</div>

					</div>
</div>
<div class="row">
<div class="col-md-12 margin-t-80">
						<h1 class="page-title margin-b-40"><a href="/events/past">Past Events</a></h1>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php endwhile; // end of the loop. ?>

			<?php
			$today = date('Ymd');

			$args = array(
				'post_type'  => 'event',
				'showposts' => -1,
				'meta_query' => array(
					array(
						'key'     => 'date', //name of custom field
						'compare'	=> '<',
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
			<div class="event-square" style="background-image: url(<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { //inserts first embedded image as featured
					  echo get_the_post_thumbnail_url($post->ID);
					} else {
					   echo main_image();
					} ?>	); background-size: cover; background-position: center center;">
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

        <h2>Not Found</h2>

    <?php //endif; ?>
    <?php } ?>
    <?php wp_reset_postdata(); ?>

    <div class="linkList">
			<a href="/events/past" class="button white-button">See All Past Events</a>
		</div>



					</div>
</div>
