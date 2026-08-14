<?php
	$team_preview_image = has_post_thumbnail()? get_the_post_thumbnail_url( get_the_ID(), 'full' ): get_field( 'team_member_fallback_image', 'option' );
	$team_categories = get_the_terms( get_the_ID(), 'team_category' );
	$team_locations = get_the_terms( get_the_ID(), 'team_location' );
?>

<div class="team-members__preview br-20" data-post-id="<?php echo esc_attr( get_the_ID() ); ?>">

	<div class="team-members__preview--image" style="background-image: url('<?php echo esc_url( $team_preview_image ); ?>');"></div>

	<div class="team-members__preview--content">
		<div class="team-members__preview--meta">

			<?php the_title( '<h2 class="team-members__preview--title">', '</h2>' ); ?>

			<?php if ( ! empty( $team_locations ) && ! is_wp_error( $team_locations ) ) : ?>
				<div class="team-members__preview--location">
					<?php $team_location_names = wp_list_pluck(
							$team_locations,
							'name'
						);

						echo esc_html(
							implode( ', ', $team_location_names )
						);
					?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $team_categories ) && ! is_wp_error( $team_categories ) ) : ?>
				<div class="team-members__preview--category">
					<?php $team_category_names = wp_list_pluck(
                            $team_categories,
                            'name'
                        );

                        echo esc_html(
                            implode( ', ', $team_category_names )
                        );
					?>
				</div>
			<?php endif; ?>

			<?php if ( has_excerpt() ) : ?>
				<div class="team-members__preview--excerpt">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>

		</div>

		<div class="team-members__preview--link">
			<a href="<?php the_permalink(); ?>" class="button button-primary-colour">
				Meet <?php echo esc_html( strtok( get_the_title(), ' ' ) ); ?>
			</a>
		</div>
	</div>

</div>