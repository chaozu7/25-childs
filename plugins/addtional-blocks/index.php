<?php

/*
 * Plugin Name:       Additional blocks
 * Description:       Additional blocks for Buksee site
 * Version:           1.0
 * Requires at least: 6.9
 * Requires PHP:      8.0
 * Author:            Kamila Bogacz
 * Author URI:        https://spaceberries.eu
 * Text Domain:       buksee
 * Domain Path:       /languages
 */

if(!function_exists('add_action')) {
    exit;
}

// Set up
define('UP_PLUGIN_DIR', plugin_dir_path(__FILE__));
//Includes
include(UP_PLUGIN_DIR . 'includes/register-blocks.php');
//Hooks

add_action( 'init', 'bs_register_blocks');