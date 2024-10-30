<?php
/**
 * General utility functions.
 */
namespace Copyright_Autoupdater\Utilities;

/**
 * Gets the first published post.
 *
 * @since 1.0.0
 *
 * @return \WP_Post|\WP_Error The earliest published post, or error if no posts found.
 */
function get_first_post() {
	/**
	 * Filter the post types used in the "first post" query.
	 *
	 * If custom post types are used for organizing content on the site,
	 * they need to be added to the list of post types to be queried.
	 * Otherwise they'll be ignored.
	 *
	 * @since 1.0.0
	 *
	 * @param $post_types array|string Default 'post', 'page', and 'attachment'.
	 */
	$post_types = apply_filters( 'copyright_autoupdater_post_types', [ 'post', 'page', 'attachment' ] );

	$args = [
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'cache_results'          => false,
		'post_type'              => $post_types,
		'nopaging'               => true,
		'posts_per_page'         => 1,
		'ignore_sticky_posts'    => true,
		'has_password'           => false,
		'post_status'            => [ 'publish' ],
		'order'                  => 'ASC',
		'orderby'                => 'date',
	];

	$posts = new \WP_Query( $args );

	if ( $posts->have_posts() ) {
		return $posts->post;
	}


	return new \WP_Error( 'no_posts', __( 'No posts found.', 'copyright-autoupdater' ) );
}

/**
 * Gets the date of the earliest published content.
 *
 * @since 1.0.0
 *
 * @param string $format Optional. PHP date format. Defaults to the four-digit year.
 * @return string The date of the first published post.
 */
function get_copyright_start_date( $format = 'Y' ) {
	$post = get_first_post();
	$date = false;

	if ( ! is_wp_error( $post ) ) {
		$date = get_the_date( $format, $post->ID );
	}

	// Set a default in case {@link get_the_date()} fails for some reason.
	$date = false === $date ? '1984' : $date;

	return $date;
}
