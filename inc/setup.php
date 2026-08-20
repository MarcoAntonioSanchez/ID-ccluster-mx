<?php

function ccluster_theme_setup()
{

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable featured images.
    add_theme_support('post-thumbnails');

    // Enable HTML5 markup.
    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]
    );

    // Enable custom logo.
    add_theme_support(
        'custom-logo',
        [
            'height'      => 80,
            'width'       => 240,
            'flex-height' => true,
            'flex-width'  => true,
        ]
    );

    // Enable automatic feed links.
    add_theme_support('automatic-feed-links');

    // Register navigation menus.
    register_nav_menus(
        [
            'primary' => __('Primary Navigation', 'ccluster'),
            'footer'  => __('Footer Navigation', 'ccluster'),
        ]
    );
}

add_action(
    'after_setup_theme',
    'ccluster_theme_setup'
);
