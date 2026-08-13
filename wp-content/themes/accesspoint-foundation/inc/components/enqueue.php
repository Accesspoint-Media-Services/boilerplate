<?php

/**
 * Enqueue scripts and styles.
 */
function accesspoint_foundation_scripts() {

    $theme_version  = '1.0.0';
    $script_version = '1.0.0';

    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Unbounded:wght@200..900&display=swap', [], null );

    wp_enqueue_style ('main-styles', get_template_directory_uri() . '/dist/styles.css',[],$theme_version);

    wp_enqueue_style( 'accesspoint-foundation-style', get_stylesheet_uri(), [], _S_VERSION );

    wp_style_add_data( 'accesspoint-foundation-style', 'rtl', 'replace');

    wp_enqueue_style( 'font-awesome-7', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css', [], '7.3.0');

    wp_enqueue_style( 'slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', [], '1.8.1');

    wp_enqueue_style( 'slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', [], '1.8.1');

    wp_enqueue_script( 'accesspoint-foundation-navigation', get_template_directory_uri() . '/js/navigation.js', [], _S_VERSION, true );

    wp_enqueue_script('jquery');

    wp_enqueue_script( 'slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', ['jquery'], '1.8.1', true);

    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/dist/main.js', ['jquery', 'slick-js'], $script_version, true);

    wp_localize_script('main-js', 'ajaxSearchData',['ajax_url' => admin_url('admin-ajax.php'), 'nonce'    => wp_create_nonce('ajax_search_nonce'),]);

    if (is_singular()&& comments_open()&& get_option('thread_comments')) {wp_enqueue_script('comment-reply');}
}

add_action('wp_enqueue_scripts', 'accesspoint_foundation_scripts');