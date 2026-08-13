<?php

add_action('wp_ajax_ajax_search_posts', 'ajax_search_posts');
add_action('wp_ajax_nopriv_ajax_search_posts', 'ajax_search_posts');

function ajax_search_posts() {
    check_ajax_referer('ajax_search_nonce', 'nonce');

    $term = isset($_POST['term'])
        ? sanitize_text_field(wp_unslash($_POST['term']))
        : '';

    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'no_found_rows'  => true,
    ];

    if ($term !== '') {
        $args['s'] = $term;
        $args['search_columns'] = ['post_title'];
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('page-sections/body/blogs/preview');
        }
    } else {
        ?>
        <div class="blog__archive--empty">
            <p>No posts found.</p>
        </div>
        <?php
    }

    wp_reset_postdata();

    wp_send_json_success([
        'html' => ob_get_clean(),
    ]);
}