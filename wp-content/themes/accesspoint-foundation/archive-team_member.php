<?php
/**
 * The template for displaying the Team Members
 *
 * @package Accesspoint-foundation
 */

get_header();
?>
    <main>
	
		<?php get_template_part ('template-parts/site-wide/content', 'hero') ;?>
		<?php get_template_part( 'page-sections/body/team-members/archive' ); ?>

	</main>

<?php
get_footer();