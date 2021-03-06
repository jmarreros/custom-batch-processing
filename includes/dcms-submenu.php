<?php

namespace dcms\batch\includes;

/**
 * Class for creating a dashboard submenu
 */
class Submenu{
    // Constructor
    public function __construct(){
        add_action('admin_menu', [$this, 'register_submenu']);
    }

    // Register submenu
    public function register_submenu(){
        add_submenu_page(
            'tools.php',
            __('Batch Process','dcms-batch-process'),
            __('Batch Process','dcms-batch-process'),
            'manage_options',
            'dcms-batch-process',
            [$this, 'submenu_page_callback']
        );
    }

    // Callback, show view
    public function submenu_page_callback(){
        include_once (DCMS_BATCH_PATH. '/views/display-process.php');
    }
}