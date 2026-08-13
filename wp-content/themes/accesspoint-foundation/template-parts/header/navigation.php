<?php 
  $site_logo = get_field('site_logo', 'options'); 
?> 

  <div class="site-header__inner container testing">
    <?php if ( ! empty( $site_logo ) ) : ?>
      <div class="site-header__logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img src="<?php echo esc_url( $site_logo['url'] ); ?>" alt="<?php echo esc_attr( $site_logo['alt'] ?: $site_title ); ?>" />
        </a>
      </div>
    <?php endif; ?>

    <div class="site-header__navigation">

      <button class="nav-toggle" aria-controls="primary-menu" aria-expanded="false">
        <span class="nav-toggle__bar"></span>
        <span class="nav-toggle__bar"></span>
        <span class="nav-toggle__bar"></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'ap' ); ?></span>
      </button>

      <?php
        wp_nav_menu( array(
          'theme_location'  => 'main-menu', 
          'container'       => 'nav',
          'container_class' => 'nav',
          'container_id'    => 'primary-menu',
          'menu_class'      => 'nav__list',
          'walker'          => new AP_Nav_Walker(),
          'depth'           => 0,
          'fallback_cb'     => false,
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        ) );
      ?>
    </div>
  </div>