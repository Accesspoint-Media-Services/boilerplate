<?php 
  $title   = get_the_title(); 
  $content = get_the_excerpt();
  $image   = get_field('blog_image') ?: get_field('blog_hero_image', 'option');
  $categories = get_the_category();
?>

<section class="hero-blog">
  <div class="hero-blog__inner container">
      <div class="hero-blog__inner--content">

          <?php if ( ! empty($categories) ): ?>
              <div class="hero-blog__inner--categories">
                  <?php foreach ($categories as $category): ?>
                      <?php echo esc_html($category->name); ?>
                  <?php endforeach; ?>
              </div>
          <?php endif; ?>

          <h1 class="hero-blog__inner--title"><?php echo esc_html($title); ?></h1>

          <?php if ($content): ?>
              <div class="hero-blog__inner--excerpt">
                  <?php echo wp_kses_post($content); ?>
              </div>
          <?php endif; ?>

          <time class="hero-blog__inner--date" datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
              <?php echo esc_html( get_the_date() ); ?>
          </time>
      </div>
  
      <div class="hero-blog__inner--image">
        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" />
      </div>
  </div>
</section>