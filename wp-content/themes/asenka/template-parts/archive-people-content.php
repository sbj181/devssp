
<?php
/**
 * Template part for displaying people archive post content
 *
 */

?>
<div class="row margin-b-60">
<div class="col-lg-4 margin-b-20 sm-margin-b-50">	
			      <div class="p-inner">
				     <div class="peoplebox leadership">
					 	
					 		<h2 class="employee-type">Our Leadership</h2>
				     	
				  	 </div>
				</div>
</div>
<?php
$args=array(
  'post_type' => 'people',
  'taxonomy' => 'employee_type',
  'posts_per_page' => -1,
  'caller_get_posts'=> 0,
  'tax_query' => array(
    array(
        'taxonomy' => 'employee_type',
        'terms' => 'leadership',
        'field' => 'slug',
        'include_children' => true,
        'operator' => 'IN'
    )
),
);
$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
 


       


<div class="col-lg-4 margin-b-20 sm-margin-b-50">
		
     <div class="p-inner">
	     <div id="pbox" class="peoplebox" style="background-image: url(<?php the_post_thumbnail_url(); ?>) !important;">
	     	</div>
	     	<div id="pboxcontent" class="peopleboxcontent"> 
		 		<h2><?php the_title(); ?></h2>
			 		<?php if ( get_field( 'job_title' ) ): ?>
					<span><?php the_field('job_title');?></span>
					<?php else: ?>
					<span>Employee</span>
					<?php endif; ?>
				<?php if( get_field('employee_fun_fact') ): ?>
					<h5>Fun Fact</h5> <p> <?php the_field('employee_fun_fact'); ?></p>
					<?php else: ?>
					<h5>About Me</h5><p><?php
						$content = get_the_excerpt();
						echo wp_trim_words( $content , '15' ); ?></p>
				<?php endif; ?>
				<div class="fullinfo">
				<a href="<?php the_permalink(); ?>"><button type="button" class="btn-base-brd-slide btn-slide btn-slide-top btn-base-xs">FULL INFO & CONTACT</button></a>
				</div>
	   			</div>
		</div>
<div class="clearfix"></div>
   


	
</div>
 <?php
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().

?>
</div>

<div class="row">
<div class="col-lg-4 margin-b-20 sm-margin-b-50">	
			      <div class="p-inner">
				     <div class="peoplebox team">
					 
					 		<h2 class="employee-type">Team Members</h2>
				     	
				  	 </div>
				</div>
</div>
<?php
$args=array(
  'post_type' => 'people',
  'taxonomy' => 'employee_type',
  'posts_per_page' => -1,
  'caller_get_posts'=> 0,
  'tax_query' => array(
    array(
        'taxonomy' => 'employee_type',
        'terms' => 'team-member',
        'field' => 'slug',
        'include_children' => true,
        'operator' => 'IN'
    )
),
);
$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
 


       


<div class="col-lg-4 margin-b-20 sm-margin-b-50">
		
     <div class="p-inner">
	     <div id="pbox" class="peoplebox" style="background-image: url(<?php the_post_thumbnail_url(); ?>) !important;">
	     	</div>
	     	<div id="pboxcontent" class="peopleboxcontent"> 
		 		<h2><?php the_title(); ?></h2>
			 		<?php if ( get_field( 'job_title' ) ): ?>
					<span><?php the_field('job_title');?></span>
					<?php else: ?>
					<span>Employee</span>
					<?php endif; ?>
				<?php if( get_field('employee_fun_fact') ): ?>
					<h5>Fun Fact</h5> <p> <?php the_field('employee_fun_fact'); ?></p>
					<?php else: ?>
					<h5>About Me</h5><p><?php
						$content = get_the_excerpt();
						echo wp_trim_words( $content , '15' ); ?></p>
				<?php endif; ?>
				<div class="fullinfo">
				<a href="<?php the_permalink(); ?>"><button type="button" class="btn-base-brd-slide btn-slide btn-slide-top btn-base-xs">FULL INFO & CONTACT</button></a>
				</div>
	   			</div>
		</div>
<div class="clearfix"></div>
   


	
</div>
 <?php
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().

?>
</div>