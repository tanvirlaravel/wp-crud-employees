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

new MyEmployees();