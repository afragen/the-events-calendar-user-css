<?php
/*
Plugin Name: The Events Calendar User CSS
Plugin URI: https://github.com/afragen/events-calendar-user-css/
Description: A plugin to work alongside The Events Calendar plugin to allow users to add custom CSS without having to either copy all existing code from the core events.css into their file or add the correct @import to their custom CSS.
Version: 0.6.1
Text Domain: events-calendar-user-css
Author: Andy Fragen
Author URI: http://thefragens.com/blog/
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

const tecuc_version = "0.6.1";

add_action( 'admin_notices', 'tecuc_fail_msg' );
function tecuc_fail_msg() {
	if ( !class_exists( 'TribeEvents' ) ) { 
		if ( current_user_can( 'activate_plugins' ) && is_admin() ) {
			$url = 'plugin-install.php?tab=plugin-information&plugin=the-events-calendar&TB_iframe=true';
			$title = __( 'The Events Calendar', 'tribe-events-calendar' );
			echo '<div class="error"><p>'.sprintf( __( 'To begin using The Events Calendar User CSS, please install the latest version of <a href="%s" class="thickbox" title="%s">The Events Calendar</a>.', 'tribe-events-calendar-pro' ),$url, $title ).'</p></div>';
		}
	}
}

add_action( 'plugins_loaded', 'tecuc_load' );
function tecuc_load() {
	if ( class_exists( 'TribeEvents' ) )
		add_action( 'wp_enqueue_scripts', 'tecuc_add_user_css', 9999 );
}

function tecuc_add_user_css() {
	global $wp_version;
	$wp_34 = version_compare($wp_version, '3.4', '>=');
	$my_theme = ( $wp_34 ? wp_get_theme() : get_theme( get_current_theme() ) );
	
	$domain = $_SERVER['SERVER_NAME'];
	$subdir = basename(rtrim(site_url(), '/'));
	$vars = array( 'theme' => $my_theme->stylesheet );
	if ( ($domain != $subdir) ) { $vars['subdir'] = $subdir; }

	$tec_css = '/events/events.css';
	$tec = TribeEvents::instance();
	$tec_path = $tec->pluginPath;
	$tec_url = $tec->pluginUrl;
	
	if ( file_exists( $tec_path . 'resources/events.css' ) && file_exists( get_stylesheet_directory() . $tec_css ) ) {
		$plugs[] = $tec_url . 'resources/events.css' ;
		$user[] = $tec_css;
		wp_dequeue_style( 'tribe-events-calendar-style' );
	}
	
// 	$ce_css = '/events/community/tribe-events-community.css';
// 	if ( class_exists( 'TribeCommunityEvents' ) ) {
// 		$teccommunity = TribeCommunityEvents::instance();
// 		$community_path = $teccommunity->pluginPath;
// 		$community_url = $teccommunity->pluginUrl;
// 	}
	
// 	if ( file_exists( $community_path . 'resources/tribe-events-community.css' ) && file_exists( get_stylesheet_directory() . $ce_css ) ) {
// 		$plugs[] = $community_url . '/resources/tribe-events-community.css';
// 		$user[] = $ce_css;
// 		wp_dequeue_style( 'tribe_events-ce-default' );
// 	}
	
	$vars['plugs'] = $plugs;
	$vars['user'] = $user;

	wp_register_style('tribe-user', plugin_dir_url(__FILE__) . 'tribe-user-css.php?' . build_query($vars), false, tecuc_version );
	wp_enqueue_style('tribe-user');

}
