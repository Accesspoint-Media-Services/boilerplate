<?php
/**
 * The template for displaying the blog posts index
 *
 * @package Accesspoint-foundation
 */

get_header();
?>

	<main>

		<?php get_template_part ('template-parts/site-wide/content', 'hero') ;?>
		<?php get_template_part( 'page-sections/body/blogs/search-bar' ); ?>
		<?php get_template_part( 'page-sections/body/blogs/archive' ); ?>

	</main>

<?php
get_footer();