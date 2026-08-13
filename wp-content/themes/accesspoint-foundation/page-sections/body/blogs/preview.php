<?php
	$blog_preview_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), '' ) : get_field( 'blog_hero_image', 'option' );
?>

<div class="blog__preview" data-post-id="<?php echo get_the_ID(); ?>">

	<div class="blog__preview--image" style="background-image: url('<?php echo esc_url( $blog_preview_image ); ?>');"></div>

	<div class="blog__preview--content">
		<div class="blog__preview--meta">

			<?php if ( has_category() ) : ?>
				<div class="blog__preview--category">
					<?php the_category( ', ' ); ?>
				</div>
			<?php endif; ?>

			<?php the_title( '<h2 class="blog__preview--title">', '</h2>' ); ?>

			<div class="blog__preview--date">
				<?php echo esc_html( get_the_date() ); ?>
			</div>

			<?php if ( get_the_excerpt() ) : ?>
				<div class="blog__preview--excerpt">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="blog__preview--link">
			<a href="<?php the_permalink()?>" class="button button-primary">Read blog</a>
		</div>
	</div>

</div>