<?php 
  $title = get_field('title') ?: get_the_title(); 
  $content = get_field('content');
  $image = get_field('hero_image') ?: get_field('fallback_hero_image', 'option');
  $link = get_field('link')
?>

<section class="hero" style="background-image: url('<?php echo esc_url($image); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat">
  <div class="container">
      <div class="hero__content">
          <h1 class="hero__content--title"><?php echo esc_html($title); ?></h1>

          <?php if($content): ?>
            <div class="hero__content--copy">
              <?php echo ($content) ?>
            </div>
          <?php endif ?>

          <?php if( $link ): 
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="button button-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
      </div>
  </div>
</section>
