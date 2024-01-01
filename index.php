<?php
/*
Plugin Name: Magic Head & Footer Tag
Description: Inject script to head & footer tag in global and per page
Plugin URI: https://ramizbrain.com/magic-head-footer-tag
Version: 1.0
Author: Ramiz Brain
Author URI: https://ramizbrain.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: magic-head-footer-script
Domain Path: /languages
Requires at least: 5.0
Tested up to: 5.7
Requires PHP: 7.2
Tags: scripts, head, footer, custom scripts
Network: false
*/

require_once plugin_dir_path(__FILE__) . 'admin-settings.php';
require_once plugin_dir_path(__FILE__) . 'metaboxes.php';
require_once plugin_dir_path(__FILE__) . 'script-output.php';
