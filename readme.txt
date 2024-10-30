=== Copyright Autoupdater ===
Contributors: morganestes
Donate link: https://morganestes.com/donate/
Tags: copyright, template-tags, shortcode
Requires at least: 3.7
Tested up to: 4.7
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Keep your site's copyright notice updated automatically.

== Description ==

Never worry about updating your copyright notice again!

The best way to add a copyright notice to your site is to include a range of dates, from first publish to today. This plugin automatically gets the date of your first published content and uses it to create the copyright range.

== Installation ==

1. Extract and upload the plugin files to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Place `<?php do_action( 'copyright_autoupdater_footer' ); ?>` in your templates.

== Usage ==

= Templates =

Add the line `<?php do_action( 'copyright_autoupdater_footer' ); ?>` to your footer template file. You can wrap this in any HTML element to adjust the layout.

== Changelog ==

= 1.0.0 =
* Initial release.
