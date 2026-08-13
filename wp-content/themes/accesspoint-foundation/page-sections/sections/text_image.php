<?php 

  $background = get_sub_field ('background_colour');
  $image = get_sub_field('image');
  $content = get_sub_field('content');
  $link = get_sub_field('link');
  $title = get_sub_field('title');
  $image = get_sub_field('image');
  $imagePosition = get_sub_field('image_position');
  $button_class = $background === 'primary-colour' ? 'white' : ($background === 'secondary-colour' ? 'button-primary' : 'primary-colour');

?>

<section class="text-image background-<?php echo $background ?>">
  <div class="text-image__inner container <?php echo $imagePosition === 'right' ? 'orientation-right' : 'orientation-left'; ?>">
        <?php if ( $image ) : ?>
          <div class="text-image__inner--image">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="image"/>
          </div>
        <?php endif; ?>
        <?php if ($title or $content) : ?>

            <div class="text-image__inner--content">
              <?php if ($title): ?>
                <h2 class="text-image__inner--title"><?php echo $title ?></h2>
              <?php endif ; ?>

              <?php if ($content or $link ): ?>
                <div class="text-image__inner--copy wys-reset">
                  <?php echo $content ?>

                  <?php if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                      <a class="button button-<?php echo($button_class)?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  <?php endif; ?>
                  
                </div>
              <?php endif; ?>
            </div>
        <?php endif; ?>
      </div>
    </div>
</section>