<div class="blog__archive">
    <div class="blog__archive--inner container">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('page-sections/body/blogs/preview'); ?>
            <?php endwhile; ?>

            <div class="blog__archive--navigation">
                <?php the_posts_navigation(); ?>
            </div>

        <?php else : ?>

            <div class="blog__archive--empty">
                <p>No posts found.</p>
            </div>

        <?php endif; ?>

    </div>
</div>