<?php
/**
 * Plugin Name:     Copyright Autoupdater
 * Plugin URI:      https://gitlab.com/morganestes/copyright-autoupdater
 * Description:     Automatically generates and updates your site's copyright text.
 * Author:          Morgan W. Estes
 * Author URI:      https://morganestes.com/
 * Text Domain:     copyright-autoupdater
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Copyright_Autoupdater
 */

namespace Copyright_Autoupdater;

add_action( 'plugins_loaded', __NAMESPACE__ . '\\load_files' );
add_action( 'copyright_autoupdater_footer', __NAMESPACE__ . '\\Template_Tags\\the_copyright' );

/**
 * Autoload the plugin source files from the includes directory.
 *
 * @since 1.0.0
 */
function load_files() {
	$includes_dir   = plugin_dir_path( __FILE__ ) . 'inc/';
	$includes_files = glob( $includes_dir . '*.php' );

	foreach ( $includes_files as $file ) {
		include_once $file;
	}
}
