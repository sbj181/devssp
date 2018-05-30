<?php
/**
 * Template part for displaying blog archive post content
 *
 */

?>

			<div class="col-sm-6">
				<div class="card card-block blogcards" style="min-height: 530px;">

					<a href="<?php the_permalink(); ?>"><div class="card-img-top img-fluid" style="background-image: url(<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { //inserts first embedded image as featured
					  echo get_the_post_thumbnail_url($post->ID);
					} else {
					   echo '/wp-content/uploads/2017/12/156233_BlogPostFeatureImages5_120517.jpg'; /* main_image();*/
					} ?>);"></div></a>

						<div class="card-block">
							<a href="<?php the_permalink(); ?>"><h4 class="card-title"><?php the_title(); ?></h4></a>
							<div class="blogdate">
								<?php the_date(); ?>

								<!-- Author Multiselect Call Start -->
								<?php

								$post_objects = get_field('author_presenter');

								if( $post_objects ): ?>

									By:
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

								<?php else : ?>
									<span class="meta-guest">| By: SSP Innovations</span>
								<?php endif; ?>
								<!-- Author Multiselect Call End -->
							</div>

							<p class="card-text"><?php $content = get_the_excerpt(); echo wp_trim_words( $content , '30' ); ?></p>
							<a href="<?php the_permalink(); ?>"><button class="button readbutton" id="readmore"><span class="gbutton">Read more</span></button></a>
						</div>

						<div class="card-footer">
							<span class="comment-txt"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?> | </span>
							<span class="tag-txt"><?php the_category('&nbsp;/&nbsp;'); ?></span>
						</div>

				</div>
			</div>
