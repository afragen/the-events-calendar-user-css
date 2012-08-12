=== The Events Calendar User CSS ===
Contributors: afragen, mzaweb
Tags: events, user css, css, modern tribe, tribe
Requires at least: 3.1
Tested up to: 3.4.1
Stable tag: 0.5.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin to allow users to add custom CSS without having to either copy all existing events.css or add the correct @import to their custom CSS.


== Description ==

Automatically add /resources/events.css and /my-theme/events/events.css and/or <br>
/resources/tribe-events-community.css and /my-theme/events/community/tribe-events-community.css without duplicating.

The Events Calendar CSS lives in /wp-content/plugins/the-events-calendar/resources/events.css<br>
User Added CSS lives in /wp-content/themes/my-theme/events/events.css

The Community Events CSS lives in /wp-content/plugins/the-events-calendar-community-events/resources/tribe-events-community.css<br>
User Added CSS lives in /wp-content/themes/my-theme/events/community/tribe-events-community.css

This plugin creates a wp_enqueue_style stylesheet that adds the correct @import lines for both the default CSS and the user CSS. This way the user only needs to add their overrides only to the events.css or tribe-events-community.css in their /wp-content/themes/my-theme/events directory.

== Installation ==

1. Upload the entire `/the-events-calendar-user-css/` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin.

== Frequently Asked Questions ==

= Does the plugin require The Events Calendar plugin? =

Yes. [The Events Calendar plugin](http://wordpress.org/extend/plugins/the-events-calendar/) is written by Modern Tribe, Inc. It requires at least The Events Calendar v2.0.5.

= Where can I report bugs? =

Add a new topic on the [WordPress Support Forum](http://wordpress.org/tags/the-events-calendar-user-css).

== Changelog ==

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
