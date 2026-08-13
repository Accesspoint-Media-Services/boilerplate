<?php 
    $related_posts_title   = get_field('related_posts_title', 'option');
    $related_posts_content = get_field('related_posts_content', 'option');

    $related_query = new WP_Query( array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'post__not_in'   => array( get_the_ID() ),
        'posts_per_page' => -1,
    ) );
?>

<?php if ( $related_query->have_posts() ) : ?>
<section class="blog__related-posts">
    <div class="blog__related-posts--inner container">

        <?php if ($related_posts_title || $related_posts_content): ?>
            <div class="blog__related-posts--intro">

                <?php if ($related_posts_title): ?>
                    <h2 class="blog__related-posts--title"><?php echo esc_html($related_posts_title); ?></h2>
                <?php endif; ?>

                <?php if ($related_posts_content): ?>
                    <div class="blog__related-posts--content wys-reset">
                        <?php echo wp_kses_post($related_posts_content); ?>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <div class="blog__related-posts--posts">

            <div class="blog__related-posts--slider">

                <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                    <div class="blog__related-posts--slide">
                        <?php get_template_part('page-sections/body/blogs/preview'); ?>
                    </div>
                <?php endwhile; ?>

            </div>
            <div class="blog__related-posts--controlls"></div>
        </div>

    </div>
</section>
<?php endif; wp_reset_postdata(); ?>