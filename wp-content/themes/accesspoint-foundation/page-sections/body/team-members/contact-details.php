<?php 
	$email_address = get_field('email_address');
	$phone_number = get_field('phone_number');
	$social_media_links = get_field('social_media_links');
?>

<?php if ( $email_address || $phone_number || $social_media_links ) : ?>
	<div class="team-members__single--contact-details">
		
		<h3 class="team-members__single--contact-title">Contact <?php echo esc_html( strtok( get_the_title(), ' ' ) ); ?></h3>
		
		<div class="team-members__single--contact-list">
			<?php if ( $phone_number ) : ?>
				<div class="team-members__single--contact-item phone-number">
					<a href="tel:<?php echo esc_attr( $phone_number ); ?>"><?php echo esc_html( $phone_number ); ?></a>
				</div>
			<?php endif;?>
			<?php if ( $email_address ) : ?>
				<div class="team-members__single--contact-item email-address">
					<a href="mailto:<?php echo esc_attr( $email_address ); ?>"><?php echo esc_html( $email_address ); ?></a>
				</div>
			<?php endif;?>

			<?php if ( $social_media_links ) : ?>
				<?php foreach ( $social_media_links as $row ) :
					$icon = $row['social_media_icon'];
					$link = $row['link'];
				?>
					<div class="team-members__single--social-item">
						<?php if ( $link ) :
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><i class="<?php echo esc_attr( $icon ); ?>"></i> <?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

		</div>
	</div>
<?php endif;?>