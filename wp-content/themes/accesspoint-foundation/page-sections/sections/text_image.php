<?php 

  $background = get_sub_field ('background_colour');
  $alignment = get_sub_field('allignment');
  $image = get_sub_field('image');
  $content = get_sub_field('content');
  $link = get_sub_field('link');
  $title = get_sub_field('title');
  $image = get_sub_field('image');
  $imagePosition = get_sub_field('image_left');
  $padding = get_sub_field('padding_size');

?>

<section class="text-image background-<?php echo $background ?> padding-<?php echo $padding ?>">
  <div class="container">
    <div class="row justify-content-between <?php echo esc_attr($alignment); ?> <?php echo $imagePosition ? 'orientation-left' : 'orientation-right'; ?>">
        <?php if ( $image ) : ?>
          <div class="col-12 col-lg-6">
            <div class="text-image__image">
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid image"/>
            </div>
          </div>
        <?php endif; ?>
        <?php if ($title or $content) : ?>
          <div class="<?php echo !empty($image) ? 'col-12 col-lg-5' : 'col-12' ;?>">
            <div class="text-image__content">
              <?php if ($title): ?>
                <h2><?php echo $title ?></h2>
              <?php endif ; ?>
              <?php if ($content or $link ): ?>
                <div class="text-image__content--copy">
                  <?php echo $content ?>
                  <?php if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                    <a class="button button-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>