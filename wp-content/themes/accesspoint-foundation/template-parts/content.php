<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Accesspoint-foundation
 */

?>

<article>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				accesspoint_foundation_posted_on();
				accesspoint_foundation_posted_by();
				?>
			</div>
		<?php endif; ?>
	</header>

	<?php accesspoint_foundation_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'accesspoint-foundation' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'accesspoint-foundation' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="entry-footer">
		<?php accesspoint_foundation_entry_footer(); ?>
		</footer>
</article>
