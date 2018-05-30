
<?php
/**
 * Template part for displaying people archive post content
 *
 */

?>
<div class="row margin-b-40">
<div class="col-md-4 margin-b-20">
			      <div class="my-inner">
				     <div id="eBook" class="firstbox dnload-label ebook">

					 		<h2 class="employee-type">FREE<br>eBOOKS</h2>

				  	 </div>
				</div>
</div>
<?php
$args=array(
  'post_type' => 'download',
  'taxonomy' => 'download_type',
  'posts_per_page' => 50,
  'caller_get_posts'=> 0,
  'tax_query' => array(
    array(
        'taxonomy' => 'download_type',
        'terms' => 'ebook',
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



<div class="col-md-4 margin-b-20">
<a href="<?php the_permalink();?>">
     <div class="my-inner downbox">
	     <div id="pbox" class="downloadbox *padding-t-10 *margin-b-n30">
			<div class="dcontent" style="background-image: url(<?php $image = get_field('list_page_preview_image'); echo $image['url']; ?>) !important;"></div>
			</div>
			<div class="downcontent">
			<h2 class="download-title"><?php the_title(); ?></h2>
			<p class="download-text"><?php $content = get_the_excerpt(); echo wp_trim_words( $content , '16' ); ?></p>
			</div>
		 	<div id="pboxcontent" class="downloadboxcontent">
		 		<h3>Download This</h3>
	     	</div>
		</div>
<div class="clearfix"></div>
</a>
</div>


 <?php
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().

?>
</div>

<div class="row margin-b-40">
<div class="col-md-4 margin-b-20">
			      <div class="my-inner">
				     <div id="Free Software Tool" class="firstbox dnload-label software-tools">

					 		<h2 class="employee-type">FREE SOFTWARE TOOLS</h2>

				  	 </div>
				</div>
</div>
<?php
$args=array(
  'post_type' => 'download',
  'taxonomy' => 'download_type',
  'posts_per_page' => 50,
  'caller_get_posts'=> 0,
  'tax_query' => array(
    array(
        'taxonomy' => 'download_type',
        'terms' => 'free_software_tool',
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




<div class="col-md-4 margin-b-20">
<a href="<?php the_permalink();?>">
     <div class="my-inner downbox">
	     <div id="pbox" class="downloadbox">
			<div class="dcontent" style="background-image: url(<?php the_post_thumbnail_url(); ?>) !important; background-size: cover !important"></div>
			</div>
			<div class="downcontent">
			<h2 class="download-title"><?php the_title(); ?></h2>
			<p class="download-text"><?php $content = get_the_excerpt(); echo wp_trim_words( $content , '20' ); ?></p>
			</div>
		 	<div id="pboxcontent" class="downloadboxcontent">
		 		<h3>Download This</h3>
	     	</div>
		</div>
<div class="clearfix"></div>
</a>
</div>


 <?php
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().

?>

</div>

<div class="row">
<div class="col-md-4 margin-b-20">
			      <div class="my-inner">
				     <div id="Script" class="firstbox dnload-label scripts">

					 		<h2 class="employee-type">SCRIPTS</h2>

				  	 </div>
				</div>
</div>
<?php
$args=array(
  'post_type' => 'download',
  'taxonomy' => 'download_type',
  'posts_per_page' => 50,
  'caller_get_posts'=> 0,
  'tax_query' => array(
    array(
        'taxonomy' => 'download_type',
        'terms' => 'script',
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



<div class="col-md-4 margin-b-20">
<a href="<?php the_permalink();?>">
     <div class="my-inner downbox">
	     <div id="pbox" class="downloadbox">
			<div class="dcontent" style="background-image: url(<?php the_post_thumbnail_url(); ?>) !important; background-size: cover !important"></div>
			</div>
			<div class="downcontent">
			<h2 class="download-title"><?php the_title(); ?></h2>
			<p class="download-text"><?php $content = get_the_content(); echo wp_trim_words( $content , '15' ); ?></p>
			</div>
		 	<div id="pboxcontent" class="downloadboxcontent">
		 		<h3>Download This</h3>
	     	</div>
		</div>
<div class="clearfix"></div>
</a>
</div>

 <?php
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().

?>

</div>
