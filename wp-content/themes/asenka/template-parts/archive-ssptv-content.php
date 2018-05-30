<?php
/**
 * Template part for displaying ssptv
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>
<div class="col-sm-6 col-md-4 ">
        <div class="card tvcards">
            <a href="<?php the_permalink(); ?>"><div class="card-img-top img-fluid" style="background-image: url(<?php 
			$image = get_field('video_still_frame');
			echo $image['url']; ?>);"></div>
              <div class="card-img-overlay"><button class="button tvbutton" id="readmore"><span class="gbutton">Watch Video</span></button></div>
            </a>
            <div class="card-block">
                <a href="<?php the_permalink(); ?>"><h4 class="card-title"><?php the_title(); ?></h4></a>
               <div class="tvdate">
					
					
					 <!-- Author Multiselect Call Start -->
				<?php 

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
				<?php endif;

				?> [<?php the_field('video_duration'); ?>]
			<!-- Author Multiselect Call End -->
| <?php echo get_the_date(); ?>
				</div>
        
               <!-- <p class="card-text"><?php// $content = get_the_excerpt(); echo wp_trim_words( $content , '30' ); ?></p>
        <a href="<?php the_permalink(); ?>"><button class="button readbutton" id="readmore"><span class="gbutton">Read more</span></button></a>
            </div>-->
            <div class="card-footer">
        <?php// comments_number( 'no comments', 'one comment', '% comments' ); ?> 
         <?php// the_category('&nbsp;/&nbsp;'); ?>

        </div>
    </div>
</div>
</div>
