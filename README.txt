=== WP Google Places Reviews ===
Contributors: hawpmedia
Tags: Hawp Media, Google Reviews, Google Places
Requires at least: 3.5
Tested up to: 5.0
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily add your Google Places profile reviews to your website.

== Description ==

**Description:** Welcome to WP Google Places Reviews: Easily add your Google Places profile reviews to your website. Provides a simple Gutenberg Block and Classic Editor Shortcode.

== Installation ==

1. Upload the `wp-google-places-reviews` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. You can configure the Plugin Settings in `Settings` -> `WP Google Places Reviews`

== Requirements ==
1. This plugin requires a Google Places API key in order to work. Check out this tutorial on how to get yours set up: https://www.youtube.com/watch?v=PsWaDosk2gc
2. You will also need your Google Place ID. Search your listing to retrieve your Place ID here: https://developers.google.com/places/place-id

== Limitations ==

* Unfortunately, the Google Places API only allows a limit of 5 reviews to be fetched at one time, this is a limitation that Google controls and we are unable to get more reviews with their API at the moment.

== Developers ==

* This plugin uses the Google Places API to retrieve review data.

== Changelog ==

= 1.0.0 =
* Initial commit

= 1.0.1 =
* Fix issue where files were being enqueued from the wrong path
* Increment version number
