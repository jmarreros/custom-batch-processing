<?php
/*
Plugin Name: Batch Process
Plugin URI: https://decodecms.com
Description: Generic plugin for batch processing
Version: 1.0
Author: Jhon Marreros Guzmán
Author URI: https://decodecms.com
Text Domain: dcms-batch-process
Domain Path: languages
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

namespace dcms\batch;

use dcms\batch\includes\Submenu;
use dcms\batch\includes\Enqueue;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin class to handle settings constants and loading files
**/
final class Loader{

	// Define all the constants we need
	public function define_constants(){
		define ('DCMS_BATCH_VERSION', '0.1');
		define ('DCMS_BATCH_PATH', plugin_dir_path( __FILE__ ));
		define ('DCMS_BATCH_URL', plugin_dir_url( __FILE__ ));
	}

	// Load all the files we need
	public function load_includes(){
		include_once ( DCMS_BATCH_PATH . '/includes/dcms-submenu.php');
		include_once ( DCMS_BATCH_PATH . '/includes/dcms-enqueue.php');
	}

	// Load tex domain
	public function load_domain(){
		add_action('plugins_loaded', function(){
			load_plugin_textdomain( 'dcms-batch-process', false, DCMS_BATCH_PATH . '/languages');
		});
	}

	// Initialize all
	public function init(){
		$this->define_constants();
		$this->load_includes();
		$this->load_domain();
		new SubMenu();
		new Enqueue();
	}

}

$dcms_batch_process = new Loader();
$dcms_batch_process->init();

