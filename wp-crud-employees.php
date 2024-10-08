<?php 
/*
* Plugin Name: WP Crud Employees
* Plugin URI:  https://www.wp-crud-employees.com
* Description: CSV Data Uploader
* Version:     1.0.0
* Author:      Tanvir
* Author URI:  https://github.com/tanvirlaravel
* License:     GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wp-crud-employees
*/


if(!defined("ABSPATH")){
    exit;
}

define("WCE_DIR_PATH", plugin_dir_path( __FILE__ ));
define("WCE_DIR_URL", plugin_dir_url( __FILE__ ));

include_once WCE_DIR_PATH . "MyEmployees.php";

// Create class Object
$myemployess = new MyEmployees();

// Create db table
register_activation_hook( __FILE__, [$myemployess, "callPluginActivationFunctions"] );

// Drop db table 
register_deactivation_hook( __FILE__, [$myemployess, "dropEmployessTable"] );

// Register Shortcode
add_shortcode( "wp-employee-form", [$myemployess, "createEmployessForm"] );

// 
add_action( "wp_enqueue_scripts", [$myemployess, "addAssetsToPlugin"] );

// Process Ajax request 
add_action( "wp_ajax_wce_add_employee", [$myemployess, "handleAddEmployeeFormData"] );