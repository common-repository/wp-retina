<?php
/*
Plugin Name: wp-retina
Plugin URI: http://wordpress.org/extend/plugins/wp-retina
Description: Simple plugin to integrate (handmade) retina graphics to your website. 
Version: 1.0
Author: Jankees van Woezik
Author URI: http://base42.nl
License: GPL2
*/

function enqueue_wp_retina_script()
{
		wp_enqueue_script('wp_retina', plugins_url('/wp-retina.js', __FILE__));
}

add_action('wp_enqueue_scripts', 'enqueue_wp_retina_script');
add_action('admin_enqueue_scripts', 'enqueue_wp_retina_script');

/**
 * Flush the current rewrite rules, so we can change the current ones.
 */
function wp_retina_flush_rules()
{
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
}

register_activation_hook(__FILE__, 'wp_retina_flush_rules');

/**
 * @param $content
 * @return WP_Rewrite
 * This function and
 */
function wp_retina_add_rewrites($content)
{
		global $wp_rewrite;
		$image_proxy_uri = 'wp-content/plugins/wp-retina/' . plugin_basename('/wp_retina_image_proxy.php', __FILE__);
		$wp_rewrite->non_wp_rules = array('(.*)\.(jpe?g|gif|png)$' => $image_proxy_uri);
		return $wp_rewrite;
}

add_action('generate_rewrite_rules', 'wp_retina_add_rewrites');