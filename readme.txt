=== The Events Calendar User CSS ===
Contributors: afragen
Tags: events, user css, css, modern tribe, tribe
Requires at least: 3.1
Tested up to: 3.5.4
Stable tag: 0.8.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin to allow users to easily add custom CSS overrides for The Events Calendar.


== Description ==
A plugin to allow users to add custom CSS without having to either copy all existing code from the core events.css or add the correct @import to their custom CSS.

Automatically load /my-theme/events/events.css if it exists using wp_enqueue_style.

User Added CSS lives in /wp-content/themes/my-theme/events/events.css for TEC 2.x.

The default TEC events.css will be loaded for you.

== Installation ==

1. Create an `/events/events.css` file and directory inside your active theme or child theme directory.
1. `/events/events.css` only needs to contain the override CSS. No CSS code from the core events.css file needs to be duplicated.
1. Upload the entire `/the-events-calendar-user-css/` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin.

== Frequently Asked Questions ==

= Does the plugin require The Events Calendar plugin? =

Yes. [The Events Calendar plugin](http://wordpress.org/extend/plugins/the-events-calendar/) is written by Modern Tribe, Inc. It requires at least The Events Calendar v2.0.5.

= What do I name the override folder? =

* For The Events Calendar 2.x name the override folder `'events'`

= Do I really need this? =

No, if you're using The Events Calendar 3.x all you need to do is create the following structure in your theme's folder. `{YOUR_THEME}/tribe-events/tribe-events.css`. This file should contain only the override CSS. It will be loaded automatically by TEC 3.0.

= Where can I report bugs? =

Add a new topic on the [WordPress Support Forum](http://wordpress.org/tags/the-events-calendar-user-css).

== Changelog ==

= 0.8.2 =
* Only needed for TEC 2.x
* Will work for TEC 3.0 if you haven't created the new folder structure. If you're using TEC 3.0 go ahead, make the change and deactivate this plugin. ;-)

= 0.8.1 =
* version bump

= 0.8 =
* fixes for TEC 3.0 compliance
* still backwards compatible with TEC 2.x

= 0.7.1 =
* fixed stupid error in defining constant.

= 0.7 =
* vastly simplified plugin by checking for existence of CSS override file in pre-determined location and if present, enqueue loading of file.
* submitted similar code for review and inclusion into TEC 3.0
* no longer needs to create separate file with @import statements.
* enqueue loading of default Events Calendar CSS.

= 0.6.1 =
* prevent tribe-user-css.php from throwing PHP error if loaded directly

= 0.6 =
* fixes to readme

= 0.5.9 =
* fixed code that tested for deprecated function get_theme.

= 0.5.8 =
* code cleanup

= 0.5.7 =
* fail message to admin_notices

= 0.5.6 =
* load only with class TribeEvents
* continuity with fail message
* test for existence of override files
* commented out code for Community Events plugin, it seems this is handled internally in the correct manner as of version 1.0.2.

= 0.5.5 =
* bug fix if TEC not active

= 0.5.4 =
* better directions in readme, I hope. This plugin will not create any files or directories.
* changed deactivate to just warning.

= 0.5.3 =
* fixes for Community Events plugin

= 0.5.2 =
* fixes for Community Events plugin

= 0.5.1 =
* readme updates

= 0.5 =
* fixes for Community Events plugin

= 0.4 =
* Major code cleanup, Thanks Daniel Dvorkin

= 0.3 = 
* fixes

= 0.2 =
* readme fixes

= 0.1 =
* Initial release.

== Upgrade Notice ==
Please stay current with your WordPress installation, your active theme, and your plugins and especially _The Events Calendar_.
