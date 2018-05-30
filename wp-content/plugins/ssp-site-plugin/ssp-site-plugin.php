<?php
/*
Plugin Name: Site-Specific Plugin for SSP Innovations
Description: Site specific code changes for the SSP Innovations Site
*/
/* Start Adding Functions Below this Line */




/*
  Change Admin Menu Order
*/
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
        'index.php', // Dashboard
        'upload.php', // Media
        'separator1', // First separator

        'edit-comments.php', // Comments
        'edit.php?post_type=blog', // Blog
        'edit.php?post_type=press', // Press
        'edit.php?post_type=ssptv', // SSP TV
        'edit.php?post_type=service', // Services
        'edit.php?post_type=product', // Solutions
        'edit.php?post_type=industry', // Industries
        'edit.php?post_type=project', // Projects
        'edit.php?post_type=partner', // Partners
        'edit.php?post_type=testimonial', // Testimonials
        'edit.php?post_type=download', // Downloads
        'edit.php?post_type=event', // Events
        'edit.php?post_type=people', // People
        'edit.php?post_type=job_opening', // Job Openings
        'edit.php?post_type=sectionpage', // Section Pages
        'edit.php?post_type=cta', // CTAs
        'edit.php?post_type=preamble', // Preambles
        'edit.php', // Posts
        'edit.php?post_type=page', // Pages
        'separator2', // Second separator

        'options-general.php', // Settings
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'tools.php', // Tools
        'users.php', // Users
        'edit.php?post_type=acf', // ACF
        'separator3', // Third separator

        'admin.php?page=cptui_manage_post_types', // CPT UI
        'admin.php?page=gf_edit_forms', //Forms
        'admin.php?page=vc-general', // Visual Composer
        'admin.php?page=bv-key-config', // blogVault
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

add_action('admin_head', 'admin_styles');
function admin_styles() {
    if( get_post_type() == "page" ) {
  ?>
  <style>
    .acf-editor-wrap iframe {
      height: 70px !important;
      min-height: 70px;
    }
  </style>
  <?php
  }
}

/**
 * Replace Placeholder Text on Title Field
 */

function hexa_change_title_text( $title ){
     $screen = get_current_screen();

     if  ( $screen->post_type == 'testimonial' ) {

        $title = 'Enter the name of the person who gave the testimonial';

     } elseif ( $screen->post_type == 'partner' ) {

        $title = 'Enter the partner name';

     } elseif ( $screen->post_type == 'people' ) {

        $title = 'Enter the person\'s name';

     } elseif ( $screen->post_type == 'service' ) {

        $title = 'Enter the service\'s name';

     } elseif ( $screen->post_type == 'job_opening' ) {

        $title = 'Enter the job title';

     }

     return $title;
}

add_filter( 'enter_title_here', 'hexa_change_title_text' );


/*
  Move and Rename Featured Image to Hero on Blog, People
*/

add_action('do_meta_boxes', 'be_rotator_image_metabox' );

function be_rotator_image_metabox() {
    remove_meta_box( 'postimagediv', 'blog', 'side' );
    add_meta_box('postimagediv', __('Hero Image'), 'post_thumbnail_meta_box', 'blog', 'side');
    remove_meta_box( 'postimagediv', 'people', 'side' );
    add_meta_box('postimagediv', __('Headshot Image'), 'post_thumbnail_meta_box', 'people', 'side');
}


/*
  Customize Read More
*/

function new_excerpt_more($more) {
    global $post;
    return ' <a class="moretag" href="'. get_permalink($post->ID) . '"> Read more</a>'; //This can be whatever
}

add_filter( 'excerpt_more', 'new_excerpt_more' );


/*
  Customize Excerpt Length  (If no excerpt is entered by user this will cut off full content)
*/

function custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/*
  Remove metaboxes from Admin pages
*/

function hexa_remove_meta_boxes() {
  remove_meta_box( 'companydiv', 'testimonial', 'side' );
  remove_meta_box( 'tagsdiv-employee_type', 'people', 'side' );
  remove_meta_box( 'project_statusdiv', 'project', 'side' );
  remove_meta_box( 'tagsdiv-download_type', 'download', 'side' );
}

add_action('add_meta_boxes', 'hexa_remove_meta_boxes', 2);


/*
  Fixes Category Permalinks for Custom Post Types
*/

function wpse_category_set_post_types( $query ){
    if( $query->is_category() && $query->is_main_query() ){
        $query->set( 'post_type', array( 'post', 'blog', 'people','press','testimonial','ssptv','project','industry','partner','solution','service','event','download' ) );
    }
}
add_action( 'pre_get_posts', 'wpse_category_set_post_types' );


/*
  Call first uploaded image as featured image if forgotten
*/

function main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
        $template=get_template_directory();
        $the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='frame' />";
  endif;
}


/*
  Filter the Gravity Forms button type so far ID 1 and ID 3 below
*/
add_filter( 'gform_submit_button_1', 'form_submit_button', 10, 2 );
add_filter( 'gform_submit_button_3', 'form_submit_button', 10, 2 );
add_filter( 'gform_submit_button_11', 'form_submit_button', 10, 2 );

function form_submit_button( $button, $form ) {
  return "<button class='button col-sm-2 offset-sm-10 sendbutton' id='gform_submit_button_{$form['id']}'><span class='gbutton'>Send</span></button>";
}


/*
  Filter the Gravity Forms Apply Online Button type
*/
add_filter('gform_submit_button_8', 'gf_make_submit_input_into_a_button_element', 10, 2);

function gf_make_submit_input_into_a_button_element($button_input, $form) {
  return "<button class='button col-sm-4 offset-md-8 sendbutton' id='gform_submit_button_{$form['id']}'><span class='gbutton'>Apply</span></button>";
}

add_filter('gform_submit_button_9', 'gf_make_submit_input_into_a_button_element2', 10, 2);
add_filter('gform_submit_button_10', 'gf_make_submit_input_into_a_button_element2', 10, 2);

function gf_make_submit_input_into_a_button_element2($button_input, $form) {
  return "<button class='button col-sm-4 offset-sm-8 sendbutton' id='gform_submit_button_{$form['id']}'><span class='gbutton'>Send</span></button>";
}


add_filter('gform_submit_button_21', 'gf_make_submit_input_into_a_button_element3', 10, 2);

function gf_make_submit_input_into_a_button_element3($button_input, $form) {
  return "<button class='button col-sm-4 offset-md-8 sendbutton' id='gform_submit_button_{$form['id']}'><span class='gbutton'>Subscribe</span></button>";
}

/*
  Add Gravityforms Most Other Buttons but mostly downloads
*/

remove_filter( 'gform_submit_button', 'wpcasa_gform_submit_button', 10, 2 );
add_filter( 'gform_submit_button', 'penthouse_gform_submit_button', 10, 2 );

function penthouse_gform_submit_button( $button ) {
  return "<button class='button col-sm-4 offset-sm-8 sendbutton' id='gform_submit_button_{$form['id']}'><span class='gbutton'>Get it</span></button>";
}

/*
    Gravity Forms => 1.9
*/

add_filter('gform_form_args', 'no_ajax_on_all_forms', 10, 1);
function no_ajax_on_all_forms($args){
    $args['ajax'] = true;
    return $args;
}

/*
  Gravity Forms Spinner Change
*/

function gf_spinner_replace( $image_src, $form ) {
  return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}
add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );


/*
  Tag Cloud Font Sizes
*/

add_filter('widget_tag_cloud_args','set_tag_cloud_font_size');
function set_tag_cloud_font_size($args) {
    $args['smallest'] = 12; /* Set the smallest size to 12px */
    $args['largest'] = 19;  /* set the largest size to 19px */
    return $args;
}

//* Strip width from image captions to allow responsive code to shrink images.
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
  if ( ! isset( $attr['caption'] ) ) {
    if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is',
      $content, $matches ) ) {
      $content = $matches[1];
      $attr['caption'] = trim( $matches[2] );
    }
  }
  $output = apply_filters('img_caption_shortcode', '', $attr, $content);
  if ( $output != '' )
    return $output;
  extract(shortcode_atts(array(
    'id'  => '',
    'align' => 'alignnone',
    'width' => '',
    'caption' => ''
  ), $attr));
  if ( 1 > (int) $width || empty($caption) )
    return $content;
  if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}


/*
  Header Shrink
*/

add_action('wp_footer', 'ava_custom_script');
function ava_custom_script(){
?>
<script>
(function($){
    $(window).scroll(function() {
        if($(window).scrollTop() > 80) {
            $('header').addClass('scrolled');
            $('header').removeClass('not-scrolled');
            $('#full-screen-search').addClass('scrolled');
            $('#full-screen-search').removeClass('not-scrolled');
            $('.blogheader').addClass('fadeuphead');
            $('.blogheader').removeClass('no-fadeuphead');
            $('.slide-text').addClass('fadeuphead');
            $('.slide-text').removeClass('no-fadeuphead');
        } else {
            $('header').addClass('not-scrolled');
            $('header').removeClass('scrolled');
            $('#full-screen-search').addClass('not-scrolled');
            $('#full-screen-search').removeClass('scrolled');
            $('.blogheader').addClass('no-fadeuphead');
            $('.blogheader').removeClass('fadeuphead');
            $('.slide-text').addClass('no-fadeuphead');
            $('.slide-text').removeClass('fadeuphead');
        }
    });
})(jQuery);


</script>
<?php
}


/*
  Comment Form Fields
*/

// Add custom meta (ratings) fields to the default comment form
// Default comment form includes name, email address and website URL
// Default comment form elements are hidden when user is logged in

add_filter('comment_form_default_fields', 'custom_fields');
function custom_fields($fields) {

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $fields[ 'author' ] = '<div class="row"><div class="col-md-3"><div class="comment-form-author">'.

      ( $req ? '<span class="required"></span>' : '' ).
      '<input class="comment-field medium" id="author" placeholder="Name*" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
      '" tabindex="1"' . $aria_req . ' /></div></div>';

    $fields[ 'email' ] = '<div class="col-md-3"><div class="comment-form-email">'.

      ( $req ? '<span class="required"></span>' : '' ).
      '<input class="comment-field medium" id="email" placeholder="Email Address*" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
      '" tabindex="2"' . $aria_req . ' /></div></div>';

    $fields[ 'url' ] = '<div class="col-md-3"><div class="comment-form-url">'.

      '<input class="comment-field medium" id="url" placeholder="Website URL" name="url" type="text" value="'. esc_attr( $commenter['comment_author_url'] ) .
      '" tabindex="3" /></div></div>';

  return $fields;
}

function comment_form_submit_button($button) {
$button =
'<div class="col-md-3"><button class="button submitbutton" type="submit"><span class="gbutton">Submit</span></button></div></div>' . //Add your html codes here
get_comment_id_fields();
return $button;
}
add_filter('comment_form_submit_button', 'comment_form_submit_button');



/*
  Search Filter: Include only the listed types
*/

function filter_search($query) {
  if (!$query->is_admin && $query->is_search) {
    $query->set('post_type', array('post','blog','press','ssptv','service','product','industry','project','download','event','job_opening','sectionpage'));
  }
  return $query;
}
add_filter('pre_get_posts', 'filter_search');





/* Stop Adding Functions Below this Line */
?>
