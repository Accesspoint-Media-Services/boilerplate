<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Accesspoint-foundation
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php get_template_part ('page-sections/body/blogs/hero') ;?>
		<?php get_template_part( 'page-sections/body/blogs/single' ); ?>

	</main>

<?php
get_footer();
