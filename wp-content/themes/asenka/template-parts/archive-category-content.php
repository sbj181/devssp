<div><h1 class="category-title">SSPTV</h1></div>

		<?php if(is_category()){ ?>
			<?php
				$cat = get_category( get_query_var( 'cat' ) );
				$category = $cat->slug;	
			?>
		    
		    <?php
				echo do_shortcode("[ajax_load_more category='$category' transition_container_classes='row' scroll='false' container_type='div' transition='fade' acf_field_type='relationship' acf_field_name='author_presenter' post_type='ssptv' repeater=template_1 posts_per_page='2' pause='false' button_label='Load more...']");
			?>
<?php } ?>	


<div><h1 class="category-title">Downloads</h1></div>

<?php if(is_category()){ ?>
			<?php
				$cat = get_category( get_query_var( 'cat' ) );
				$category = $cat->slug;	
			?>
		    
		    <?php
				echo do_shortcode("[ajax_load_more category='$category' transition_container_classes='row' scroll='false' container_type='div' transition='fade' acf_field_type='relationship' acf_field_name='author_presenter' post_type='download' repeater=template_1 posts_per_page='2' pause='false' button_label='Load more...']");
			?>
<?php } ?>	

<div><h1 class="category-title">Projects</h1></div>

<?php if(is_category()){ ?>
			<?php
				$cat = get_category( get_query_var( 'cat' ) );
				$category = $cat->slug;	
			?>
		    
		    <?php
				echo do_shortcode("[ajax_load_more category='$category' transition_container_classes='row' scroll='false' container_type='div' transition='fade' acf_field_type='relationship' acf_field_name='author_presenter' post_type='project' repeater=template_1 posts_per_page='2' pause='false' button_label='Load more...']");
			?>
<?php } ?>	

<div><h1 class="category-title">Blog</h1></div>

<?php if(is_category()){ ?>
			<?php
				$cat = get_category( get_query_var( 'cat' ) );
				$category = $cat->slug;	
			?>
		    
		    <?php
				echo do_shortcode("[ajax_load_more category='$category' transition_container_classes='row' scroll='false' container_type='div' transition='fade' acf_field_type='relationship' acf_field_name='author_presenter' post_type='blog' repeater=template_1 posts_per_page='2' pause='false' button_label='Load more...']");
			?>
<?php } ?>	

<div><h1 class="category-title">Press</h1></div>

<?php if(is_category()){ ?>
			<?php
				$cat = get_category( get_query_var( 'cat' ) );
				$category = $cat->slug;	
			?>
		    
		    <?php
				echo do_shortcode("[ajax_load_more category='$category' transition_container_classes='row' scroll='false' container_type='div' transition='fade' acf_field_type='relationship' acf_field_name='author_presenter' post_type='press' repeater=template_1 posts_per_page='2' pause='false' button_label='Load more...']");
			?>
<?php } ?>	