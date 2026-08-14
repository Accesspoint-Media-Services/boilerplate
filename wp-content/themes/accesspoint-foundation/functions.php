<?php
/**
 * Accesspoint-foundation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Accesspoint-foundation
 */


/**
 * Setup
 */

require get_template_directory() . '/inc/components/setup.php';

/**
 * Blog AJAX search bar
 */

require get_template_directory() . '/inc/components/blog-search-bar.php';

/**
 * Header & Footer Scripts
 */

require get_template_directory() . '/inc/components/content-widths.php';

/**
 * Content widths
 */

require get_template_directory() . '/inc/components/content-widths.php';

/**
 * Widgets
 */

require get_template_directory() . '/inc/components/widgets.php';

/**
 * Excerpt settings
 */

require get_template_directory() . '/inc/components/excerpt.php';

/**
 * Enqueue
 */

require get_template_directory() . '/inc/components/enqueue.php';


/**
 * navwalker
 */

require get_template_directory() . '/inc/components/nav-walker.php';

/**
 * Custom Post Types.
 */

require_once get_stylesheet_directory() . '/inc/custom-post-types/index.php';

/**
 * Implement the Custom Header feature.
 */

require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

