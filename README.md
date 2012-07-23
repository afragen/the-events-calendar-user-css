events-calendar-user-css
========================

Create a plugin to work alongside The Events Calendar plugin to allow users to add custom CSS without having to either copy all existing events.css into their file or add the correct @import to their custom CSS.

Automatically add /the-events-calendar/resources/events.css and /my-theme/events/events.css and/or <br>
/the-events-calendar-community-events/resources/tribe-events-community.css and /my-theme/events/community/tribe-events-community.css without duplicating.

The Events Calendar CSS lives in /wp-content/plugins/the-events-calendar/resources/events.css<br>
User Added CSS lives in /wp-content/themes/my-theme/events/events.css

The Community Events CSS lives in /wp-content/plugins/the-events-calendar-community-events/resources/tribe-events-community.css<br>
User Added CSS lives in /wp-content/themes/my-theme/events/community/tribe-events-community.css

This plugin creates a wp_enqueue_style stylesheet that adds the correct @import lines for both the default CSS and the user CSS.

Thus allows the user's CSS to only include the overrides.


