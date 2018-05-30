<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://codecanyon.net/user/whybhagi
 * @since      1.0.0
 *
 * @package    Gravity_Forms_Acf_Merge_Tags
 * @subpackage Gravity_Forms_Acf_Merge_Tags/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gravity_Forms_Acf_Merge_Tags
 * @subpackage Gravity_Forms_Acf_Merge_Tags/public
 * @author     Bhargav 
 */
class Gravity_Forms_Acf_Merge_Tags_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

        
        /**
         * Add gfgd to the wp query vars so we can safely work with it.
         * 
         * @param array $vars
         * @return array $vars
         */
        public function gf_acf_add_query_vars( $vars ){
            $vars[] = "gfgd";
            return $vars;
        }

	/**
	 * Check and update anymerge tags found with the relevent acf tags. 
	 *
	 * @since    1.0.0
         * @param      string    $text            The current text in which merge tags are being replaced.
         * @param      string    $form            The current form.
         * @param      string    $entry           The current entry.
         * @param      string    $url_encode      Whether or not to encode any URLs found in the replaced value.
         * @param      string    $esc_html        Whether or not to encode HTML found in the replaced value.
         * @param      string    $nl2br           Whether or not to convert newlines to break tags.
         * @param      string    $format          Default "html"; determines how the value should be formatted.
	 */
	public function replace_acf_custom_merge_tags( $text ) {

            $acf_field_groups = acf_get_field_groups();

            foreach( $acf_field_groups as $acf_field_group) {

                $acf_fields = acf_get_fields($acf_field_group['ID']);
                                
                $acf_fields = acf_get_fields($acf_field_group['ID']);

                $locations_list = array();
                foreach( $acf_field_group['location'] as $acf_group_locations ) {
                        foreach( $acf_group_locations as $acf_group_location ) {
                                $locations_list[] =  $acf_group_location['param'];
                        }
                }
                
                $locations_list = array_unique( $locations_list );
                
                // Process Options Page values
                if ( in_array('options_page', $locations_list) ) {
                    
                    foreach( $acf_fields as $acf_field) {

                    // Skip check the tab fields
                    if ( $acf_field['name'] ) {

                        $acf_tag = '{acf,' . $acf_field["name"] .',options_page}';

                            if ( strpos( $text, $acf_tag ) !== false ) {

                            if ( $acf_field['type'] === 'text' || $acf_field['type'] === 'textarea' || $acf_field['type'] === 'number' || $acf_field['type'] === 'email' || $acf_field['type'] === 'url' || $acf_field['type'] === 'wysiwyg' || $acf_field['type'] === 'date_picker' ) {

                                $acf_content = get_field( $acf_field['name'] , 'option' );
                                $text = str_replace( $acf_tag, $acf_content, $text );

                            } else if ( $acf_field['type'] === 'image' ) {

                                    $acf_get_image = get_field( $acf_field['name'] , 'option' );

                                    $acf_image_link = $acf_get_image['url'];
                                    $acf_image_title = $acf_get_image['title'];

                                    $acf_content = "<img src='$acf_image_link' alt='$acf_image_title'>";

                                    $text = str_replace( $acf_tag, $acf_content, $text );

                            } else if ( $acf_field['type'] === 'file' ) {

                                    $acf_get_image = get_field( $acf_field['name'] , 'option' );

                                    $acf_content = $acf_get_image['url'];

                                    $text = str_replace( $acf_tag, $acf_content, $text );

                            } else if ( $acf_field['type'] === 'select' || $acf_field['type'] === 'checkbox' || $acf_field['type'] === 'true_false' || $acf_field['type'] === 'radio' ) {

                                $acf_content = get_field( $acf_field['name'] , 'option' );

                                if ( is_array($acf_content) ) {
                                    $acf_content = implode( ',' , $acf_content );
                                }

                                $text = str_replace( $acf_tag, $acf_content, $text );

                            } else if ( $acf_field['type'] === 'post_object' ) {

                                $acf_content = get_field( $acf_field['name'] , 'option' );
                                $acf_replace = array();

                                foreach( $acf_content as $post) {
                                    $acf_replace[] = get_permalink($post->ID); 
                                }

                                $acf_fin_content = implode( ',' , $acf_replace );

                                $text = str_replace( $acf_tag, $acf_fin_content, $text );

                            } else if ( $acf_field['type'] === 'page_link' ) {

                                $acf_content = get_field( $acf_field['name'] , 'option' );

                                if ( is_array($acf_content) ) {
                                    $acf_content = implode( ',' , $acf_content );
                                }

                                $text = str_replace( $acf_tag, $acf_content, $text );                                

                            } else if ( $acf_field['type'] === 'relationship' ) {

                                $acf_content = get_field( $acf_field['name'] , 'option' );
                                $acf_replace = array();

                                foreach( $acf_content as $post) {
                                    $acf_replace[] = get_permalink($post->ID); 
                                }

                                $acf_fin_content = implode( ',' , $acf_replace );

                                $text = str_replace( $acf_tag, $acf_fin_content, $text );

                            } else if ( $acf_field['type'] === 'taxonomy' ) {

                                $acf_content = get_field( $acf_field['name'] , 'option' );
                                    
                                $acf_replace ='';
                                
                                if ( is_array($acf_content) ) {
                                    foreach( $acf_content as $taxonomy) {

                                        $term = get_term( $taxonomy , $acf_field['taxonomy'] );
                                        $term_url = get_term_link( $taxonomy , $acf_field['taxonomy'] );

                                        $acf_replace = $acf_replace . '<a href="' . esc_url( $term_url ) . '">' . $term->name . '</a>,';
                                    }
                                } else {
                                    $term = get_term( $acf_content , $acf_field['taxonomy'] );
                                    $term_url = get_term_link( $acf_content , $acf_field['taxonomy'] );

                                    $acf_replace = $acf_replace . '<a href="' . esc_url( $term_url ) . '">' . $term->name . '</a>,';
                                }

                                $text = str_replace( $acf_tag, $acf_replace, $text );

                            } else {

                                $acf_content = get_field( $acf_field['name'] , 'option' );
                                $acf_content = implode( ',' , $acf_content );
                                $text = str_replace( $acf_tag, $acf_content, $text );

                            }

                            }

                    }

                    }
                    
                }
                
                
                // Process Normal Values
                foreach( $acf_fields as $acf_field) {

                // Skip check the tab fields
                if ( $acf_field['name'] ) {

                    $acf_tag = '{acf,' . $acf_field["name"] .'}';

                        if ( strpos( $text, $acf_tag ) !== false ) {

                        if ( $acf_field['type'] === 'text' || $acf_field['type'] === 'textarea' || $acf_field['type'] === 'number' || $acf_field['type'] === 'email' || $acf_field['type'] === 'url' || $acf_field['type'] === 'wysiwyg' || $acf_field['type'] === 'date_picker' ) {

                            $acf_content = get_field( $acf_field['name'] );
                            $text = str_replace( $acf_tag, $acf_content, $text );

                        } else if ( $acf_field['type'] === 'image' ) {

                                $acf_get_image = get_field( $acf_field['name'] );

                                $acf_image_link = $acf_get_image['url'];
                                $acf_image_title = $acf_get_image['title'];

                                $acf_content = "<img src='$acf_image_link' alt='$acf_image_title'>";

                                $text = str_replace( $acf_tag, $acf_content, $text );

                        } else if ( $acf_field['type'] === 'file' ) {

                                $acf_get_image = get_field( $acf_field['name'] );

                                $acf_content = $acf_get_image['url'];

                                $text = str_replace( $acf_tag, $acf_content, $text );

                        } else if ( $acf_field['type'] === 'select' || $acf_field['type'] === 'checkbox' || $acf_field['type'] === 'true_false' || $acf_field['type'] === 'radio' ) {

                            $acf_content = get_field( $acf_field['name'] );

                            if ( is_array($acf_content) ) {
                                $acf_content = implode( ',' , $acf_content );
                            }

                            $text = str_replace( $acf_tag, $acf_content, $text );

                        } else if ( $acf_field['type'] === 'post_object' ) {

                            $acf_content = get_field( $acf_field['name'] );
                            $acf_replace = array();

                            foreach( $acf_content as $post) {
                                $acf_replace[] = get_permalink($post->ID); 
                            }

                            $acf_fin_content = implode( ',' , $acf_replace );

                            $text = str_replace( $acf_tag, $acf_fin_content, $text );

                        } else if ( $acf_field['type'] === 'page_link' ) {

                            $acf_content = get_field( $acf_field['name'] );

                            if ( is_array($acf_content) ) {
                                $acf_content = implode( ',' , $acf_content );
                            }

                            $text = str_replace( $acf_tag, $acf_content, $text );                                

                        } else if ( $acf_field['type'] === 'relationship' ) {

                            $acf_content = get_field( $acf_field['name'] );
                            $acf_replace = array();

                            foreach( $acf_content as $post) {
                                $acf_replace[] = get_permalink($post->ID); 
                            }

                            $acf_fin_content = implode( ',' , $acf_replace );

                            $text = str_replace( $acf_tag, $acf_fin_content, $text );

                        } else if ( $acf_field['type'] === 'taxonomy' ) {

                            $acf_content = get_field( $acf_field['name'] );
                            $acf_replace ='';

                            foreach( $acf_content as $taxonomy) {

                                $term = get_term( $taxonomy , $acf_field['taxonomy'] );
                                $term_url = get_term_link( $taxonomy , $acf_field['taxonomy'] );

                                $acf_replace = $acf_replace . '<a href="' . esc_url( $term_url ) . '">' . $term->name . '</a>,';
                            }

                            $text = str_replace( $acf_tag, $acf_replace, $text );

                        } else {

                            $acf_content = get_field( $acf_field['name'] );
                            $acf_content = implode( ',' , $acf_content );
                            $text = str_replace( $acf_tag, $acf_content, $text );

                        }

                        }

                }

                }
                
                $anotherpostid = trim( get_query_var( 'gfgd', '' ) );
                
                // Skip check the tab fields
                if ( $acf_field['name'] ) {

                    $acf_tag = '{acf,' . $acf_field["name"] .',gfgd}';

                        if ( strpos( $text, $acf_tag ) !== false ) {

                        if ( $acf_field['type'] === 'text' || $acf_field['type'] === 'textarea' || $acf_field['type'] === 'number' || $acf_field['type'] === 'email' || $acf_field['type'] === 'url' || $acf_field['type'] === 'wysiwyg' || $acf_field['type'] === 'date_picker' ) {

                            $acf_content = get_field( $acf_field['name'] , $anotherpostid );
                            $text = str_replace( $acf_tag, $acf_content, $text );

                        } else if ( $acf_field['type'] === 'image' ) {

                                $acf_get_image = get_field( $acf_field['name'] , $anotherpostid );

                                $acf_image_link = $acf_get_image['url'];
                                $acf_image_title = $acf_get_image['title'];

                                $acf_content = "<img src='$acf_image_link' alt='$acf_image_title'>";

                                $text = str_replace( $acf_tag, $acf_content, $text );

                        } else if ( $acf_field['type'] === 'file' ) {

                                $acf_get_image = get_field( $acf_field['name'] , $anotherpostid );

                                $acf_content = $acf_get_image['url'];

                                $text = str_replace( $acf_tag, $acf_content, $text );

                        } else if ( $acf_field['type'] === 'select' || $acf_field['type'] === 'checkbox' || $acf_field['type'] === 'true_false' || $acf_field['type'] === 'radio' ) {

                            $acf_content = get_field( $acf_field['name'] , $anotherpostid );

                            if ( is_array($acf_content) ) {
                                $acf_content = implode( ',' , $acf_content );
                            }

                            $text = str_replace( $acf_tag, $acf_content, $text );

                        } else if ( $acf_field['type'] === 'post_object' ) {

                            $acf_content = get_field( $acf_field['name'] , $anotherpostid );
                            $acf_replace = array();

                            foreach( $acf_content as $post) {
                                $acf_replace[] = get_permalink($post->ID); 
                            }

                            $acf_fin_content = implode( ',' , $acf_replace );

                            $text = str_replace( $acf_tag, $acf_fin_content, $text );

                        } else if ( $acf_field['type'] === 'page_link' ) {

                            $acf_content = get_field( $acf_field['name'] , $anotherpostid );

                            if ( is_array($acf_content) ) {
                                $acf_content = implode( ',' , $acf_content );
                            }

                            $text = str_replace( $acf_tag, $acf_content, $text );                                

                        } else if ( $acf_field['type'] === 'relationship' ) {

                            $acf_content = get_field( $acf_field['name'] , $anotherpostid );
                            $acf_replace = array();

                            foreach( $acf_content as $post) {
                                $acf_replace[] = get_permalink($post->ID); 
                            }

                            $acf_fin_content = implode( ',' , $acf_replace );

                            $text = str_replace( $acf_tag, $acf_fin_content, $text );

                        } else if ( $acf_field['type'] === 'taxonomy' ) {

                            $acf_content = get_field( $acf_field['name'] , $anotherpostid );
                            $acf_replace ='';

                            foreach( $acf_content as $taxonomy) {

                                $term = get_term( $taxonomy , $acf_field['taxonomy'] );
                                $term_url = get_term_link( $taxonomy , $acf_field['taxonomy'] );

                                $acf_replace = $acf_replace . '<a href="' . esc_url( $term_url ) . '">' . $term->name . '</a>,';
                            }

                            $text = str_replace( $acf_tag, $acf_replace, $text );

                        } else {

                            $acf_content = get_field( $acf_field['name'] , $anotherpostid );
                            $acf_content = implode( ',' , $acf_content );
                            $text = str_replace( $acf_tag, $acf_content, $text );

                        }

                        }

                }
                    
                
                
                

            }
            
            return $text;
            
	}

}
