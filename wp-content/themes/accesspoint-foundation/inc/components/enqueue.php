<?php

/**
 * Enqueue scripts and styles.
 */
function accesspoint_foundation_scripts() {

    $theme_version  = '1.0.0';
    $script_version = '1.0.0';

    wp_enqueue_style(
        'main-styles',
        get_template_directory_uri() . '/dist/styles.css',
        [],
        $theme_version
    );

    wp_enqueue_style(
        'accesspoint-foundation-style',
        get_stylesheet_uri(),
        [],
        _S_VERSION
    );

    wp_style_add_data(
        'accesspoint-foundation-style',
        'rtl',
        'replace'
    );

    wp_enqueue_style(
        'font-awesome-6',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
        [],
        '6.5.2'
    );

    wp_enqueue_script(
        'accesspoint-foundation-navigation',
        get_template_directory_uri() . '/js/navigation.js',
        [],
        _S_VERSION,
        true
    );

    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/dist/main.js',
        [],
        $script_version,
        true
    );

    wp_localize_script(
        'main-js',
        'ajaxSearchData',
        [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('ajax_search_nonce'),
        ]
    );

    wp_enqueue_script('jquery');

    if (
        is_singular()
        && comments_open()
        && get_option('thread_comments')
    ) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'accesspoint_foundation_scripts');