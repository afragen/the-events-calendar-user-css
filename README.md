events-calendar-user-css
========================

Automatically add /the-events-calendar/resources/events.css and /my-theme/events/events.css without duplicating.

Create a plugin to work alongside The Events Calendar plugin to allow users to add custom CSS without having to either copy all existing events.css into their file or add the correct @import to their custom CSS.

The Events Calendar CSS lives in /wp-content/plugins/the-events-calendar/resources/events.css
User Added CSS lives in wp-content/themes/my-theme/events/events.css

This plugin creates a wp_enqueue_style stylesheet that adds the correct @import lines for both the default CSS and the user CSS.

Thus allows the user's CSS to only include the overrides.

Todo
====

1. Override for Community Events plugin too.
 > you will need to override these either in your themes style.css file or the /wp-content/plugins/the-events-calendar-community-events/resources/tribe-events-community.css file (if you want to modify this file please first make a copy and place in an ‘events/community’ folder in your theme).
2. http://stackoverflow.com/questions/1833330/how-to-get-php-get-array