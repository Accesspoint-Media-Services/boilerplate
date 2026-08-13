<?php

    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array (
            'page_title' => 'Global Options',
            'menu_title' => 'Global Options',
            'menu_slup'  => 'global-options',
            'capability' => 'edit_posts',
            'redirect'   => false,
        ));

    }