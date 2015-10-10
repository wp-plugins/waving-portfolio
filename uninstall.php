<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   waving-portfolio
 * @author    aelbuni
 * @license   GPL-2.0+
 * @link      http://www.itechflare.com
 * @copyright 2015 itechflare ltd
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

if ( ! current_user_can( 'activate_plugins' ) ) {
	exit;
}

// Define uninstall functionality here
$post_type = "itech_portfolio";
global $wp_post_types;
if ( isset( $wp_post_types[ $post_type ] ) ) {
    unset( $wp_post_types[ $post_type ] );
    return true;
}

flush_rewrite_rules();