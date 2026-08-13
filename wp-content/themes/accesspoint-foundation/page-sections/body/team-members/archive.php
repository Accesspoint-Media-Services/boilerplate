<div class="team-members__archive">
    <div class="team-members__archive--inner container">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('page-sections/body/team-members/preview'); ?>
            <?php endwhile; ?>

            <div class="team-members__archive--navigation">
                <?php the_posts_navigation(); ?>
            </div>

        <?php else : ?>

            <div class="team-members__archive--empty">
                <p>No posts found.</p>
            </div>

        <?php endif; ?>

    </div>
</div>