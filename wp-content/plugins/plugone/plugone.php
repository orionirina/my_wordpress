<?php
/**
 * @package Plugone
 */
/*
Plugin Name: Plugone
Plugin URI: https://plugone.com/
Description: Used by millions, plugone is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. plugone Anti-spam keeps your site protected even while you sleep. To get started: activate the plugone plugin and then go to your plugone Settings page to set up your API key.
Version: 5.3.3
Requires at least: 5.8
Requires PHP: 5.6.20
Author: Automattic - Anti-spam Team
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: plugone
*/
function newFooter($content) {
    return $content . "My footer";
}

add_filter('wp_footer', 'newFooter');