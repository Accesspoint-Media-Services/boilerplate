<?php
    $image = get_field( 'hero_image' ) ?: get_field( 'fallback_team_image', 'option' );
    $team_roles = implode( ', ', wp_get_post_terms( get_the_ID(), 'team_category', array( 'fields' => 'names' ) ) );
    $team_locations = implode( ', ', wp_get_post_terms( get_the_ID(), 'team_locations', array( 'fields' => 'names' ) ) );
?>

<section
	class="hero-team-members"
	style="background-image: url('<?php echo esc_url( $image ); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;"
>
	<div class="container">
		<div class="hero-team-members__content">

			<h1 class="hero-team-members__content--title">
				<?php the_title(); ?>
			</h1>

            <?php if ( $team_roles ) : ?>
                <h3 class="hero-team-members__content--role">
                    <?php echo esc_html( $team_roles ); ?>
                </h3>
            <?php endif; ?>

            <?php if ( $team_locations ) : ?>
                <h3 class="hero-team-members__content--location">
                    <?php echo esc_html( $team_locations ); ?>
                </h3>
            <?php endif; ?>

			<div class="hero-team-members__content--copy">
			</div>

		</div>
	</div>
</section>