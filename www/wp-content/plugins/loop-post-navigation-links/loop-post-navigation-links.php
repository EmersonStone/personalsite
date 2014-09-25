<?php
/**
 * @package Loop_Post_Navigation_Links
 * @author Scott Reilly
 * @version 2.5
 */
/*
Plugin Name: Loop Post Navigation Links
Version: 2.5
Plugin URI: http://coffee2code.com/wp-plugins/loop-post-navigation-links/
Author: Scott Reilly
Author URI: http://coffee2code.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Description: Template tags (for single.php) to create post navigation loop (previous to first post is last post; next/after last post is first post).

Compatible with WordPress 3.6 through 3.8+.

=>> Read the accompanying readme.txt file for instructions and documentation.
=>> Also, visit the plugin's homepage for additional information and updates.
=>> Or visit: http://wordpress.org/plugins/loop-post-navigation-links/

TODO
	* Switch adjacent_or_loop_post_link() away from using global $post and use get_post() instead. (Drop pre-3.5 support in doing so)
*/

/*
	Copyright (c) 2008-2014 by Scott Reilly (aka coffee2code)

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined( 'ABSPATH' ) or die();

global $c2c_loop_navigation_find;
$c2c_loop_navigation_find = false;


if ( ! function_exists( 'c2c_get_next_or_loop_post_link' ) ) :
/**
 * Gets next post link that is adjacent to the current post, or if none, then
 * the first post in the series.
 *
 * @since 2.5
 *
 * @param string       $format         Optional. Link anchor format. Default is '%link &raquo;'.
 * @param string       $link           Optional. Link permalink format. Default is '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default is false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default is ''.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return void
 */
function c2c_get_next_or_loop_post_link( $format='%link &raquo;', $link='%title', $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' ) {
	return c2c_get_adjacent_or_loop_post_link( $format, $link, $in_same_term, $excluded_terms, false, $taxonomy );
}
add_action( 'c2c_get_next_or_loop_post_link', 'c2c_get_next_or_loop_post_link', 10, 5 );
endif;


if ( ! function_exists( 'c2c_next_or_loop_post_link' ) ) :
/**
 * Displays next post link that is adjacent to the current post, or if none, then
 * the first post in the series.
 *
 * @since 2.0
 *
 * @param string       $format         Optional. Link anchor format. Default is '%link &raquo;'.
 * @param string       $link           Optional. Link permalink format. Default is '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default is false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default is ''.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return void
 */
function c2c_next_or_loop_post_link( $format='%link &raquo;', $link='%title', $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' ) {
	c2c_adjacent_or_loop_post_link( $format, $link, $in_same_term, $excluded_terms, false, $taxonomy );
}
add_action( 'c2c_next_or_loop_post_link', 'c2c_next_or_loop_post_link', 10, 5 );
endif;


if ( ! function_exists( 'c2c_get_previous_or_loop_post_link' ) ) :
/**
 * Display previous post link that is adjacent to the current post, or if none,
 * then the last post in the series.
 *
 * @since 2.5
 *
 * @param string       $format         Optional. Link anchor format. Default is '&laquo; %link'.
 * @param string       $link           Optional. Link permalink format. Default is '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default is false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default is ''.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return void
 */
function c2c_get_previous_or_loop_post_link( $format='&laquo; %link', $link='%title', $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' ) {
	return c2c_get_adjacent_or_loop_post_link( $format, $link, $in_same_term, $excluded_terms, true, $taxonomy );
}
add_action( 'c2c_previous_or_loop_post_link', 'c2c_previous_or_loop_post_link', 10, 5 );
endif;


if ( ! function_exists( 'c2c_previous_or_loop_post_link' ) ) :
/**
 * Display previous post link that is adjacent to the current post, or if none,
 * then the last post in the series.
 *
 * @since 2.0
 *
 * @param string       $format         Optional. Link anchor format. Default is '&laquo; %link'.
 * @param string       $link           Optional. Link permalink format. Default is '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default is false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default is ''.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return void
 */
function c2c_previous_or_loop_post_link( $format='&laquo; %link', $link='%title', $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' ) {
	c2c_adjacent_or_loop_post_link( $format, $link, $in_same_term, $excluded_terms, true, $taxonomy );
}
add_action( 'c2c_previous_or_loop_post_link', 'c2c_previous_or_loop_post_link', 10, 5 );
endif;


if ( ! function_exists( 'c2c_get_adjacent_or_loop_post_link' ) ) :
/**
 * Gets adjacent post link or the post link for the post at the opposite end of the series.
 *
 * Can be either next post link or previous.
 *
 * @since 2.5
 *
 * @param string       $format         Link anchor format.
 * @param string       $link           Link permalink format.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default is false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default is ''.
 * @param bool         $previous       Optional. Whether to display link to previous or next post. Default is true.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return void
 */
function c2c_get_adjacent_or_loop_post_link( $format, $link, $in_same_term = false, $excluded_terms = '', $previous = true, $taxonomy = 'category' ) {
	if ( $previous && is_attachment() )
		$post = get_post( get_post()->post_parent );
	else
		$post = get_adjacent_post( $in_same_term, $excluded_terms, $previous, $taxonomy );

	// START The only modification of adjacent_post_link() -- get the last/first post if there isn't a legitimate previous/next post
	if ( ! $post ) {
		global $c2c_loop_navigation_find;
		$c2c_loop_navigation_find = true;
		$post = get_adjacent_post( $in_same_term, $excluded_terms, $previous, $taxonomy );
		$c2c_loop_navigation_find = false;
	}
	// END modification

	if ( ! $post ) {
		$output = '';
	} else {
		$title = $post->post_title;

		if ( empty( $post->post_title ) )
			$title = $previous ? __( 'Previous Post' ) : __( 'Next Post' );

		$title = apply_filters( 'the_title', $title, $post->ID );
		$date = mysql2date( get_option( 'date_format' ), $post->post_date );
		$rel = $previous ? 'prev' : 'next';

		$string = '<a href="' . get_permalink( $post ) . '" rel="' . $rel . '">';
		$link = str_replace( '%title', $title, $link );
		$link = str_replace( '%date', $date, $link );
		$link = $string . $link . '</a>';

		$output = str_replace( '%link', $link, $format );
	}

	$adjacent = $previous ? 'previous' : 'next';

	// Apply the filters present in WP's adjacent_or_loop_post_link()
	$output = apply_filters( "{$adjacent}_post_link", $output, $format, $link, $post );

	// Apply old {$adjacent}_or_loop_post_link filters.
	// Deprecated as of v2.0. Here temporarily for backwards compatibility.
	$output = apply_filters( "{$adjacent}_or_loop_post_link", $output, $format, $link, $post );

	// Apply custom filters and return
	return apply_filters( "c2c_{$adjacent}_or_loop_post_link_get", $output, $format, $link, $post, $in_same_term, $excluded_terms, $taxonomy );
}
add_action( 'c2c_get_adjacent_or_loop_post_link', 'c2c_get_adjacent_or_loop_post_link', 10, 6 );
endif;


if ( ! function_exists( 'c2c_adjacent_or_loop_post_link' ) ) :
/**
 * Displays adjacent post link or the post link for the post at the opposite end of the series.
 *
 * Can be either next post link or previous.
 *
 * @param string       $format         Link anchor format.
 * @param string       $link           Link permalink format.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default is false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default is ''.
 * @param bool         $previous       Optional. Whether to display link to previous or next post. Default is true.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return void
 */
function c2c_adjacent_or_loop_post_link( $format, $link, $in_same_term = false, $excluded_terms = '', $previous = true, $taxonomy = 'category' ) {
	if ( $previous && is_attachment() )
		$post = get_post( get_post()->post_parent );
	else
		$post = get_adjacent_post( $in_same_term, $excluded_terms, $previous, $taxonomy );

	$adjacent = $previous ? 'previous' : 'next';

	// Apply custom filters and echo
	echo apply_filters(
		"c2c_{$adjacent}_or_loop_post_link_output",
		c2c_get_adjacent_or_loop_post_link( $format, $link, $in_same_term, $excluded_terms, $previous, $taxonomy ),
		$format,
		$link,
		$post,
		$in_same_term,
		$excluded_terms,
		$taxonomy
	);
}
add_action( 'c2c_adjacent_or_loop_post_link', 'c2c_previous_or_loop_post_link', 10, 6 );
endif;


if ( ! function_exists( 'c2c_modify_nextprevious_post_where' ) ) :
/**
 * Modifies the SQL WHERE clause used by WordPress when getting a previous/next post to accommodate looping navigation.
 *
 * Can be either next post link or previous.
 *
 * @param string       $where          SQL WHERE clause generated by WordPress
 * @param string       $link           Link permalink format.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default is false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default is ''.
 * @param bool         $previous       Optional. Whether to display link to previous or next post. Default is true.
 * @return void
 */
function c2c_modify_nextprevious_post_where( $where ) {
	// The incoming WHERE statement generated by WordPress is a condition for the date, relative to the current
	//	post's date. To find the post we want, we just need to get rid of that condition (which is the first) and retain the others.
	if ( $GLOBALS['c2c_loop_navigation_find'] )
		$where = preg_replace( '/WHERE (.+) AND/imsU', 'WHERE', $where );
	return $where;
}
endif;

/*
 * Register actions to filter WHERE clause when previous or next post query is being processed.
 */
add_filter( 'get_next_post_where',     'c2c_modify_nextprevious_post_where' );
add_filter( 'get_previous_post_where', 'c2c_modify_nextprevious_post_where' );


/*****
 * DEPRECATED FUNCTIONS
 *****/

if ( ! function_exists( 'next_or_loop_post_link' ) ) :
	/**
	 * Display next post link that is adjacent to the current post, or if none,
	 * then the first post in the series.
	 *
	 * @since 1.0
	 * @deprecated 2.0 Use c2c_next_or_loop_post_link() instead
	 */
	function next_or_loop_post_link( $format='%link &raquo;', $link='%title', $in_same_term = false, $excluded_terms = '' ) {
		_deprecated_function( 'next_or_loop_post_link', '2.0', 'c2c_next_or_loop_post_link' );
		return c2c_next_or_loop_post_link( $format, $link, $in_same_term, $excluded_terms );
	}
endif;

if ( ! function_exists( 'previous_or_loop_post_link' ) ) :
	/**
	 * Display previous post link that is adjacent to the current post, or if
	 * none, then the last post in the series.
	 *
	 * @since 1.0
	 * @deprecated 2.0 Use c2c_previous_or_loop_post_link() instead
	 */
	function previous_or_loop_post_link( $format='&laquo; %link', $link='%title', $in_same_term = false, $excluded_terms = '' ) {
		_deprecated_function( 'previous_or_loop_post_link', '2.0', 'c2c_previous_or_loop_post_link' );
		return c2c_previous_or_loop_post_link( $format, $link, $in_same_term, $excluded_terms );
	}
endif;

if ( ! function_exists( 'adjacent_or_loop_post_link' ) ) :
	/**
	 * Display previous post link that is adjacent to the current post, or if
	 * none, then the last post in the series.
	 *
	 * @since 1.0
	 * @deprecated 2.0 Use c2c_adjacent_or_loop_post_link() instead
	 */
	function adjacent_or_loop_post_link( $format, $link, $in_same_term = false, $excluded_terms = '', $previous = true ) {
		_deprecated_function( 'adjacent_or_loop_post_link', '2.0', 'c2c_adjacent_or_loop_post_link' );
		return c2c_adjacent_or_loop_post_link( $format, $link, $in_same_term, $excluded_terms, $previous );
	}
endif;
