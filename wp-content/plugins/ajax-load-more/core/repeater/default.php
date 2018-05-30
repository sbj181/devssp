<div class="authoredpost col-md-4 margin-b-10">
		                <a href="<?php echo get_permalink( $document->ID ); ?>">
		                  <div class="authoredimage" style="background-image: url('<?php echo get_the_post_thumbnail_url( $document->ID ) ?>');"></div>
		                   
		                     <h4><?php echo get_the_title( $document->ID ); ?></h4></a>
		                     <div class="posttype"><?php echo get_post_type( $document->ID ); ?></div>
		                </div>