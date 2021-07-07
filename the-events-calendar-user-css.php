<?php
/**
 * Plugin Name:       The Events Calendar User CSS
 * Plugin URI:        https://github.com/afragen/events-calendar-user-css/
 * Author:            Andy Fragen
 * Author URI:        https://github.com/afragen/
 * Description:       A plugin to work alongside The Events Calendar/Events Calendar PRO plugin(s) to allow users to add and load custom CSS from their <code>{theme}/tribe-events/tribe-events.css</code> file.
 * Version:           1.5.0
 * Text Domain:       the-events-calendar-user-css
 * License:           GNU General Public License v2
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Requires at least: 5.2
 * Requires PHP:      5.6
 */

define( 'TECUC_VERSION', '1.5.0' );

add_action( 'wp_enqueue_scripts', 'tribe_user_css_overrides', PHP_INT_MAX );
function tribe_user_css_overrides() {
	if ( file_exists( get_stylesheet_directory() . '/tribe-events/tribe-events.css' ) ) {
		$tec_user_css = '/tribe-events/tribe-events.css';
	} else {
		return false;
	}
	wp_dequeue_style( 'tribe-events-calendar-override-style' );
	wp_enqueue_style( 'tribe-events-user-override', get_stylesheet_directory_uri() . $tec_user_css, false, TECUC_VERSION );
}
