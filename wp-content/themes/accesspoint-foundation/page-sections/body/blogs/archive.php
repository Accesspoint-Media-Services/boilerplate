<div class="blog__archive">
    <div class="blog__archive--inner container">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('page-sections/body/blogs/preview'); ?>
            <?php endwhile; ?>

            <?php if ( $GLOBALS['wp_query']->max_num_pages > 1 ) : ?>
                <div class="blog__archive--navigation">
                    <?php get_template_part('components/pagination'); ?>
                </div>
            <?php endif; ?>

        <?php else : ?>

            <div class="blog__archive--empty">
                <p>No posts found.</p>
            </div>

        <?php endif; ?>

    </div>
</div>