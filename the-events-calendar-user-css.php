<?php
/*
Plugin Name: The Events Calendar User CSS
Plugin URI:  https://github.com/afragen/events-calendar-user-css/
Author:      Andy Fragen
Author URI:  http://thefragens.com/blog/
Description: A plugin to work alongside The Events Calendar plugin to allow users to add custom CSS without having to either copy all existing code from the core events.css into their file or add the correct @import to their custom CSS.
Version:     1.1.0
Text Domain: the-events-calendar-user-css
License:     GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

define( 'TECUC_VERSION', '1.1.0' );

add_action( 'admin_notices', 'tecuc_fail_msg' );
function tecuc_fail_msg() {
	if ( ! class_exists( 'TribeEvents' ) ) {
		if ( current_user_can( 'activate_plugins' ) && is_admin() ) {
			$url   = 'plugin-install.php?tab=plugin-information&plugin=the-events-calendar&TB_iframe=true';
			$title = __( 'The Events Calendar', 'the-events-calendar-user-css' );
			echo '<div class="error"><p>'.sprintf( __( 'To begin using The Events Calendar User CSS, please install the latest version of <a href="%s" class="thickbox" title="%s">The Events Calendar</a>.', 'the-events-calendar-user-css' ),$url, $title ).'</p></div>';
		}
	}
}

add_action( 'wp_enqueue_scripts', 'tribe_user_css_overrides', 999 );
function tribe_user_css_overrides () {
	if ( class_exists( 'TribeEvents' ) ) {
		if ( file_exists( get_stylesheet_directory() . '/tribe-events/tribe-events.css' ) ) {
			$tec_user_css = '/tribe-events/tribe-events.css';
		} else {
			return false;
		}
		wp_dequeue_style( 'tribe-events-calendar-override-style' );
		wp_enqueue_style( 'tribe-events-user-override', get_stylesheet_directory_uri() . $tec_user_css, false, TECUC_VERSION ) ;

	}
	return true;
}
