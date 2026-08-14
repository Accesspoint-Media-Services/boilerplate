<?php
/**
 * The template for displaying the Team Members
 *
 * @package Accesspoint-foundation
 */

get_header();
?>
    <main>

		<?php get_template_part( 'page-sections/body/team-members/search-bar' ); ?>
		<?php get_template_part( 'page-sections/body/team-members/single' ); ?>

	</main>

<?php
get_footer();