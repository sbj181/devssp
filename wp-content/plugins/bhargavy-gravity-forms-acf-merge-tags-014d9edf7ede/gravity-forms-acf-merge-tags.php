<?php

/**
 *
 * @link              http://codecanyon.net/user/whybhagi
 * @since             1.0.0
 * @package           Gravity_Forms_Acf_Merge_Tags
 *
 * @wordpress-plugin
 * Plugin Name:       Gravity Forms - ACF Merge Tags
 * Plugin URI:        http://codecanyon.net/user/whybhagi
 * Description:       Creates custom merge tags in gravity forms that will show allow the usage of Advanced Custom Fields data in gravity forms.
 * Version:           1.2.0
 * Author:            Bhargav
 * Author URI:        http://codecanyon.net/user/whybhagi
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gravity-forms-acf-merge-tags
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gravity-forms-acf-merge-tags-activator.php
 */
function activate_gravity_forms_acf_merge_tags() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gravity-forms-acf-merge-tags-activator.php';
	Gravity_Forms_Acf_Merge_Tags_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gravity-forms-acf-merge-tags-deactivator.php
 */
function deactivate_gravity_forms_acf_merge_tags() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gravity-forms-acf-merge-tags-deactivator.php';
	Gravity_Forms_Acf_Merge_Tags_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gravity_forms_acf_merge_tags' );
register_deactivation_hook( __FILE__, 'deactivate_gravity_forms_acf_merge_tags' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gravity-forms-acf-merge-tags.php';

/**
 * Include the core plugin class and execute the plugin only if AFC Pro and Gravity Fields is Active else throw an admin error notice.
 * 
 * @since 1.1.0
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) &&  is_plugin_active( 'gravityforms/gravityforms.php' ) ) {

    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    function run_gravity_forms_acf_merge_tags() {

            $plugin = new Gravity_Forms_Acf_Merge_Tags();
            $plugin->run();

    }
    run_gravity_forms_acf_merge_tags();
    
} else if( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
    
    function gf_acf_merge_tags_admin_error_notice() {
	$class = "update-nag";
	$message = "<b>Gravity Forms - ACF Merge Tags</b> requires the ACF Pro to be installed and activated.";
        echo "<div class=\"$class\"> <p>$message</p></div>"; 
    }
    
    add_action( 'admin_notices', 'gf_acf_merge_tags_admin_error_notice' );
    
} else if( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
    
    function gf_acf_merge_tags_admin_error_notice() {
	$class = "update-nag";
	$message = "<b>Gravity Forms - ACF Merge Tags</b> requires the Gravity Forms to be installed and activated.";
        echo "<div class=\"$class\"> <p>$message</p></div>"; 
    }
    
    add_action( 'admin_notices', 'gf_acf_merge_tags_admin_error_notice' );
    
} else {
    
    function gf_acf_merge_tags_admin_error_notice() {
	$class = "update-nag";
	$message = "<b>Gravity Forms - ACF Merge Tags</b> requires the ACF Pro and Gravity Forms Plugin to be installed and activated.";
        echo "<div class=\"$class\"> <p>$message</p></div>"; 
    }
    
    add_action( 'admin_notices', 'gf_acf_merge_tags_admin_error_notice' );
    
}

