<?php
/*
Plugin Name: The Events Calendar User CSS
Plugin URI:  https://github.com/afragen/events-calendar-user-css/
Author:      Andy Fragen
Author URI:  http://thefragens.com/
Description: A plugin to work alongside The Events Calendar PRO plugin to allow users to add and load custom CSS from their <code>{theme}/tribe-events/tribe-events.css</code> file.
Version:     1.2.0
Text Domain: the-events-calendar-user-css
License:     GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

define( 'TECUC_VERSION', '1.2.0' );

add_action( 'admin_notices', 'tecuc_fail_msg' );
function tecuc_fail_msg() {
	if ( ! class_exists( 'TribeEventsPro' ) ) {
		if ( current_user_can( 'activate_plugins' ) && is_admin() ) {
			$url   = 'http://tri.be/wordpress-events-calendar-pro/?utm_source=helptab&utm_medium=promolink&utm_campaign=plugin';
			$title = __( 'The Events Calendar PRO', 'the-events-calendar-user-css' );
			echo '<div class="error"><p>'.sprintf( __( 'To begin using The Events Calendar User CSS, please install the latest version of <a href="%s" class="thickbox" title="%s">The Events Calendar PRO</a>.', 'the-events-calendar-user-css' ),$url, $title ).'</p></div>';
		}
	}
}

add_action( 'wp_enqueue_scripts', 'tribe_user_css_overrides', 999 );
function tribe_user_css_overrides () {
	if ( class_exists( 'TribeEventsPro' ) ) {
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
