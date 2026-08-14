<?php 
	$site_logo = get_field('site_logo', 'options'); 
	$company_name = get_field('company_name', 'option') ?: get_bloginfo('name'); 
?> 

<footer class="site-footer test-class">
	<div class="site-footer__inner container">
		
		<div class="site-footer__inner--legal">
			<?php if ( ! empty( $site_logo ) ) : ?>
				<div class="site-footer__inner--logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo esc_url( $site_logo['url'] ); ?>" alt="<?php echo esc_attr( $site_logo['alt'] ?: $site_title ); ?>" />
					</a>
				</div>
			<?php endif; ?>
			<div class="site-footer__inner--copyright">
				<p>&copy; <?php echo date('Y'); ?> <?php echo $company_name; ?>. All rights reserved.</p>
			</div>
		</div>
		
		<?php if( have_rows('footer_links', 'options') || have_rows('social_links', 'options') ): ?>
			<div class="site-footer__inner--links">

				<?php if( have_rows('footer_links', 'options') ): ?>
					<div class="site-footer__inner--page-links">
						<ul class="site-footer__inner--link-list">
							<?php while( have_rows('footer_links', 'options') ) : the_row(); ?>
								<?php $link = get_sub_field('link', 'options');
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<li class="site-footer__inner--link-item"><a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
								<?php endif; ?>
							<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if( have_rows('social_links', 'options') ): ?>
					<div class="site-footer__inner--social">
						<ul class="site-footer__inner--social-list">
							<?php while( have_rows('social_links', 'options') ) : the_row(); 
								$icon = get_sub_field('social_icon', 'options');
							?>
								<?php $link = get_sub_field('link', 'options');
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<li class="site-footer__inner--social-item"><a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $link_title ); ?></li></a>
								<?php endif; ?>
							<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>

			</div>
		<?php endif; ?>

	</div>

	<button id="back-to-top" aria-label="Back to top" class="back-to-top">
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
			<path d="M12 19V5M12 5L5 12M12 5L19 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</button>
</footer>

<?php wp_footer(); ?>

</body>
</html>
