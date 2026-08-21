<?php

function ccluster_enqueue_assets()
{

    $manifest_path = get_theme_file_path('dist/.vite/manifest.json');

    if (!file_exists($manifest_path)) {
        return;
    }

    $manifest = json_decode(
        file_get_contents($manifest_path),
        true
    );

    // CSS
    if (
        isset($manifest['src/css/main.css']['file'])
    ) {
        wp_enqueue_style(
            'ccluster-main',
            get_theme_file_uri('dist/' . $manifest['src/css/main.css']['file']),
            [],
            null
        );
    }

    // JS
    if (
        isset($manifest['src/js/main.js']['file'])
    ) {
        wp_enqueue_style(
            'ccluster-main',
            get_theme_file_uri('dist/' . $manifest['src/js/main.js']['file']),
            [],
            null
        );
    }
}

add_action(
    'wp_enqueue_scripts',
    'ccluster_enqueue_assets'
);
