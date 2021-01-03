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
		define ('DCMS_BATCH_BASE_NAME', plugin_basename( __FILE__ ));
	}

	// Load all the files we need
	public function load_includes(){
		include_once ( DCMS_BATCH_PATH . '/includes/dcms-submenu.php');
		include_once ( DCMS_BATCH_PATH . '/includes/dcms-enqueue.php');
	}

	// Load tex domain
	public function load_domain(){
		add_action('plugins_loaded', function(){
			$path_languages = dirname(DCMS_BATCH_BASE_NAME).'/languages/';
			load_plugin_textdomain('dcms-batch-process', false, $path_languages );
		});
	}

	// Add link to plugin list
	public function add_link_plugin(){
		add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), function( $links ){
			return array_merge( array(
				'<a href="' . esc_url( admin_url( '/tools.php?page=dcms-batch-process' ) ) . '">' . __( 'Settings', 'dcms-batch-process' ) . '</a>'
			), $links );
		} );
	}

	// Initialize all
	public function init(){
		$this->define_constants();
		$this->load_includes();
		$this->load_domain();
		$this->add_link_plugin();
		new SubMenu();
		new Enqueue();
	}

}

$dcms_batch_process = new Loader();
$dcms_batch_process->init();

