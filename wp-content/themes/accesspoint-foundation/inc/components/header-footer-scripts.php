<?php

/**
 * Output header tracking scripts.
 */

function accesspoint_foundation_header_scripts() {
	$scripts = get_field( 'header_scripts', 'option' );

	if ( $scripts ) {
		echo $scripts;
	}
}
add_action( 'wp_head', 'accesspoint_foundation_header_scripts' );

/**
 * Output footer tracking scripts.
 */
function accesspoint_foundation_footer_scripts() {
	$scripts = get_field( 'footer_scripts', 'option' );

	if ( $scripts ) {
		echo $scripts;
	}
}
add_action( 'wp_footer', 'accesspoint_foundation_footer_scripts' );