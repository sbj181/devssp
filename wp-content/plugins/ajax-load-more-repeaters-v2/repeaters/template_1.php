<div class="col-md-6">
        <div class="card card-block blogcards" style="min-height: 380px;">
            <a href="<?php the_permalink(); ?>"><div class="card-img-top img-fluid" style="background-image: url(<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { //inserts first embedded image as featured
					  echo get_the_post_thumbnail_url();
					} else {
					   echo main_image();
					} ?>);"></div></a>
            <div class="card-block">
                <a href="<?php the_permalink(); ?>"><h4 class="card-title"><?php the_title(); ?></h4></a>
                <div class="blogdate">
					
					<?php echo get_the_date(); ?>
					
				</div>
				
                <p class="card-text"><?php $content = get_the_excerpt(); echo wp_trim_words( $content , '15' ); ?></p>
				<a style="display: none" href="<?php the_permalink(); ?>"><button class="button readbutton" id="readmore"><span class="gbutton">Read more</span></button></a>
            </div>
            <div class="card-footer" style="display: none;">
			  <span class="comment-txt"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?> | </span>
			  <span class="tag-txt"><?php the_category(' / '); ?></span>
			</div>
        </div>
</div>
</div>
</div>