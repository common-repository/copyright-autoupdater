<?php
/**
 * Template tags for use by developers.
 */
namespace Copyright_Autoupdater\Template_Tags;

use Copyright_Autoupdater\Utilities;

/**
 * Prints the copyright text in a template.
 *
 * @since 1.0.0
 */
function the_copyright() {
	echo get_the_copyright();
}

/**
 * Gets the translated and filtered copyright notice.
 *
 * @since 1.0.0
 *
 * @return string The copyright notice.
 */
function get_the_copyright() {
	/* translators: 1: site name, 2: starting year, 3: current year */
	$copyright = sprintf(
		esc_html__( 'Content copyright %1$s &copy;&thinsp;%2$s&ndash;%3$s', 'copyright-autoupdater' ),
		get_site_option( 'blogname' ),
		Utilities\get_copyright_start_date( 'Y' ),
		date( 'Y' )
	);

	/**
	 * Filter the copyright text after it's been translated.
	 *
	 * @since 1.0.0
	 *
	 * @param string $copyright The translated copyright notice.
	 * @return string The translated and filtered copyright notice.
	 */
	return apply_filters( 'copyright_autoupdater_footer_text', $copyright );
}
