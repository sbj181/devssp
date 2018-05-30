<?php
/**
 * Template part for displaying project archive post content
 *
 */

?>
<div class="col-md-6 col-lg-4">
        <div class="card procards">
            <a href="<?php the_permalink(); ?>"><div class="card-img-top img-fluid" style="background-image: url(<?php the_post_thumbnail_url();?>); background-size: cover; background-position: center center; height: 240px;">

                <!-- FIRST SERVICE USED -->
                <?php
                /*
                *  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
                *  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
                *  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
                */

                $post_objects = get_field('services_used');

                if( $post_objects ): ?>

                  <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>
                      <h2 class="text-center color-white project-box-title"><?php the_title(); ?></h2>
                      <?php break; // breaks loop to only get first result ?>
                    <?php endforeach; ?>

                  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

                <?php endif; ?>
                <!-- END FIRST SERVICE USED -->

            </div>
              <div class="card-img-overlay"><button class="button probutton" id="readmore"><span class="gbutton">See Project</span></button></div>
            </a>
            <div class="card-block">
                <a href="<?php the_permalink(); ?>"><h4 class="card-title"><?php the_title(); ?></h4></a>
                <div class="prodate">
          <?php// the_date(); ?><?php the_category(', '); ?>
           <!-- Author Multiselect Call Start -->
        <?php

        $post_objects = get_field('author_presenter');

        if( $post_objects ): ?>

          By:
            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

            <?php endforeach; ?>

            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif;

        ?>
      <!-- Author Multiselect Call End -->
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






















