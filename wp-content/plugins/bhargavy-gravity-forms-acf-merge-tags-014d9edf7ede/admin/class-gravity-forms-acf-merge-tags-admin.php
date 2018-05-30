<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://codecanyon.net/user/whybhagi
 * @since      1.0.0
 *
 * @package    Gravity_Forms_Acf_Merge_Tags
 * @subpackage Gravity_Forms_Acf_Merge_Tags/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gravity_Forms_Acf_Merge_Tags
 * @subpackage Gravity_Forms_Acf_Merge_Tags/admin
 * @author     Bhargav 
 */
class Gravity_Forms_Acf_Merge_Tags_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
        
        /*
         * Add the custom acf merge tags to Gravty Forms
         * gform.addFilter js hook from gravity forms
         * 
         * @since 1.0.0
         * @param   int     $form   The ID of the gravity form begin processed.
         */
        function wb_add_merge_tags($form){

        ?>
            </p>

            <script type="text/javascript">
                gform.addFilter("gform_merge_tags", "add_merge_tags");
                function add_merge_tags(mergeTags, elementId, hideAllFields, excludeFieldTypes, isPrepop, option){

                <?php

                $acf_field_groups = acf_get_field_groups();

                foreach( $acf_field_groups as $acf_field_group) {

                    $acf_fields = acf_get_fields($acf_field_group['ID']);

                    $locations_list = array();
                    foreach( $acf_field_group['location'] as $acf_group_locations ) {
                            foreach( $acf_group_locations as $acf_group_location ) {
                                    $locations_list[] =  $acf_group_location['param'];
                            }
                    }

                    $locations_list = array_unique( $locations_list );

                    if ( in_array("options_page", $locations_list) && count($locations_list) == 1 ) {
                        foreach( $acf_fields as $acf_field) {
                            // Do not add field to the tags if its a Tab Field or user Field
                            if ( $acf_field['name']  && $acf_field['name'] !== 'user' ) {
                                    echo "mergeTags['custom'].tags.push({ tag: '{acf,". $acf_field['name'] . ",options_page}', label: 'ACF - " . $acf_field['label'] . " - Options Page' }); \n";
                            }
                        }
                    } else if ( in_array("options_page", $locations_list) && count($locations_list) !== 1 ) {
                        foreach( $acf_fields as $acf_field) {
                            // Do not add field to the tags if its a Tab Field or user Field
                            if ( $acf_field['name']  && $acf_field['name'] !== 'user' ) {
                                    echo "mergeTags['custom'].tags.push({ tag: '{acf,". $acf_field['name'] . "}', label: 'ACF - " . $acf_field['label'] . "' }); \n";
                                    echo "mergeTags['custom'].tags.push({ tag: '{acf,". $acf_field['name'] . ",gfgd}', label: 'ACF - " . $acf_field['label'] . "- Another Page' }); \n";
                                    echo "mergeTags['custom'].tags.push({ tag: '{acf,". $acf_field['name'] . ",options_page}', label: 'ACF - " . $acf_field['label'] . " - Options Page' }); \n";
                            }
                        }
                    } else {
                        foreach( $acf_fields as $acf_field) {
                            // Do not add field to the tags if its a Tab Field or User Field
                            if ( $acf_field['name'] && $acf_field['name'] !== 'user' ) {
                                    echo "mergeTags['custom'].tags.push({ tag: '{acf,". $acf_field['name'] . "}', label: 'ACF - " . $acf_field['label'] . "' }); \n";
                                    echo "mergeTags['custom'].tags.push({ tag: '{acf,". $acf_field['name'] . ",gfgd}', label: 'ACF - " . $acf_field['label'] . "- Another Page' }); \n";
                            }

                        }
                    }

                }

                ?>
                    return mergeTags;
                }
                </script>
                <p>
        <?php 

        //return the form object from the php hook  
        return $form;
        }
        
}