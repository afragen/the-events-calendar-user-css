<?php
/*
Plugin Name: The Events Calendar User CSS
Plugin URI: http://wordpress.org/extend/plugins/the-events-calendar-user-css/
Description: A plugin to work alongside The Events Calendar plugin to allow users to add custom CSS without having to either copy all existing events.css into their file or add the correct @import to their custom CSS.
Version: 0.2
Text Domain: events-calendar-user-css
Author: Andy Fragen
Author URI: http://thefragens.com/blog/
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

/**
* The Events Calendar User CSS
*
* @package      the-events-calendar-user-css
* @link         https://github.com/afragen/events-calendar-user-css/
* @link         http://wordpress.org/extend/plugins/the-events-calendar-user-css/
* @author       Andy Fragen <andy@thefragens.com>
* @copyright    Copyright (c) 2012, Andrew Fragen
*
* The Events Calendar User CSS is free software; you can redistribute it and/or modify it under
* the terms of the GNU General Public License version 2, as published by the
* Free Software Foundation.
*
* You may NOT assume that you can use any other version of the GPL.
*
* This program is distributed in the hope that it will be useful, but WITHOUT
* ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
* FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details
*
* You should have received a copy of the GNU General Public License along with
* this program; if not, write to:
*
*      Free Software Foundation, Inc.
*      51 Franklin St, Fifth Floor
*      Boston, MA  02110-1301  USA
*
* The license for this software can also likely be found here:
* http://www.gnu.org/licenses/gpl-2.0.html*
*/
/* Add your functions below this line */

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
global $plugin, $plugin_data;
add_action( 'admin_init', 'tecuc_requires_tec' );
function tecuc_requires_tec() {
	global $plugin, $plugin_data;
	$plugin = plugin_basename( __FILE__ );
	$plugin_data = get_plugin_data( __FILE__, false );
	$required_plugin = 'the-events-calendar/the-events-calendar.php';
	if ( !is_plugin_active( $required_plugin ) ) { 
		deactivate_plugins( $plugin );
		wp_die( "'".$plugin_data['Name']."' requires The Events Calendar plugin. Deactivating Plugin.<br /><br />Back to <a href='".admin_url()."'>WordPress admin</a>." );
	}
}

add_action( 'wp_enqueue_scripts', 'add_user_css' );
function add_user_css() {
	global $plugin, $plugin_data;
	$theme_dir = basename(rtrim(get_stylesheet_directory_uri(), '/'));
	$domain = $_SERVER['SERVER_NAME'];
	$subdir = basename(rtrim(site_url(), '/'));
	$vars = array( 'theme' => $theme_dir );
	if ( ($domain != $subdir) ) { $vars['subdir'] = $subdir; }
	//$vars['subdir'] = 'subdirectory';
	
	if ( file_exists( get_stylesheet_directory() . '/events/events.css' ) ) {
		$plugs[] = '/wp-content/plugins/the-events-calendar/resources/events.css';
		$user[] = 'events.css';
	} elseif ( file_exists( get_stylesheet_directory() . '/events/community/tribe-events-community.css' ) ) {
		$plugs[] = '/wp-content/plugins/the-events-calendar-community-events/resources/tribe-events-community.css';
		$user[] = 'community/tribe-events-community.css';
	} else {
		deactivate_plugins( $plugin );
		wp_die( "'".$plugin_data['Name']."' requires custom CSS overrides. Deactivating Plugin.<br /><br />Back to <a href='".admin_url()."'>WordPress admin</a>." );
	}

	$vars['plugs'] = $plugs;
	$vars['user'] = $user;

	wp_dequeue_style( 'tribe-events-calendar-style' );
	wp_register_style('tribe-user', plugin_dir_url(__FILE__) . 'tribe-user-css.php?' . build_query($vars) );
	wp_enqueue_style('tribe-user');
}

?>