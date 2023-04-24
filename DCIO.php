<?php
/**
 * @package DragonCloud Image Optimizer
 * @version 1.0.0
 */
/*
Plugin Name: DragonCloud Image Optimizer
Plugin URI: https://github.com/HolgerHuo/DCIO
Description: This plugin rewrites image url to customized ones
Version: 1.0.0
Author: Holger Huo
Author URI: https://holger.one
*/

require_once(dirname(__FILE__) . '/core.php');

if (!is_admin()) 
{
    add_action('wp_head', 'buffer_start');
    add_action('wp_footer', 'buffer_end');
}

