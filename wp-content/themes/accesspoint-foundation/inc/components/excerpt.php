<?php

add_filter('get_the_excerpt', function($excerpt) {
    $char_limit = 150; // set your character limit here

    $excerpt = strip_shortcodes($excerpt);
    $excerpt = wp_strip_all_tags($excerpt);

    if (mb_strlen($excerpt) <= $char_limit) {
        return $excerpt;
    }

    $trimmed = mb_substr($excerpt, 0, $char_limit);
    $trimmed = mb_substr($trimmed, 0, mb_strrpos($trimmed, ' '));

    return $trimmed . '...';
});

// Also override the "more" string in case anything falls back to default trimming
add_filter('excerpt_more', function() {
    return '...';
});