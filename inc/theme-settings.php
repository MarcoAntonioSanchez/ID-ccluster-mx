<?php

function ccluster_register_theme_settings()
{

    register_setting(
        'ccluster_theme_settings',
        'ccluster_theme_options',
        [
            'sanitize_callback' => 'ccluster_sanitize_theme_options',
        ]
    );

    add_settings_section(
        'ccluster_site_identity',
        __('Site Identity', 'ccluster'),
        '__return_false',
        'ccluster-theme-settings'
    );

    add_settings_field(
        'logo',
        __('Logo', 'ccluster'),
        'ccluster_logo_field',
        'ccluster-theme-settings',
        'ccluster_site_identity'
    );

    add_settings_field(
        'favicon',
        __('Favicon', 'ccluster'),
        'ccluster_favicon_field',
        'ccluster-theme-settings',
        'ccluster_site_identity'
    );

    add_settings_section(
        'ccluster_contact',
        __('Contact', 'ccluster'),
        '__return_false',
        'ccluster-theme-settings'
    );

    add_settings_field(
        'phone',
        __('Phone', 'ccluster'),
        'ccluster_text_field',
        'ccluster-theme-settings',
        'ccluster_contact',
        [
            'field' => 'phone',
        ]
    );

    add_settings_field(
        'email',
        __('Email', 'ccluster'),
        'ccluster_text_field',
        'ccluster-theme-settings',
        'ccluster_contact',
        [
            'field' => 'email',
            'type'  => 'email',
        ]
    );

    add_settings_field(
        'address',
        __('Address', 'ccluster'),
        'ccluster_text_field',
        'ccluster-theme-settings',
        'ccluster_contact',
        [
            'field' => 'address',
        ]
    );

    add_settings_section(
        'ccluster_social',
        __('Social Networks', 'ccluster'),
        '__return_false',
        'ccluster-theme-settings'
    );

    foreach (
        [
            'facebook'  => 'Facebook',
            'instagram' => 'Instagram',
            'linkedin'  => 'LinkedIn',
            'youtube'   => 'YouTube',
        ] as $field => $label
    ) {

        add_settings_field(
            $field,
            __($label, 'ccluster'),
            'ccluster_text_field',
            'ccluster-theme-settings',
            'ccluster_social',
            [
                'field' => $field,
                'type'  => 'url',
            ]
        );
    }

    add_settings_section(
        'ccluster_header',
        __('Header', 'ccluster'),
        '__return_false',
        'ccluster-theme-settings'
    );

    add_settings_field(
        'topbar_enabled',
        __('Topbar', 'ccluster'),
        'ccluster_checkbox_field',
        'ccluster-theme-settings',
        'ccluster_header'
    );

    add_settings_field(
        'navbar_cta_enabled',
        __('Navbar CTA', 'ccluster'),
        'ccluster_checkbox_field',
        'ccluster-theme-settings',
        'ccluster_header'
    );

    add_settings_field(
        'navbar_cta_label',
        __('CTA Label', 'ccluster'),
        'ccluster_text_field',
        'ccluster-theme-settings',
        'ccluster_header',
        [
            'field' => 'navbar_cta_label',
        ]
    );

    add_settings_field(
        'navbar_cta_url',
        __('CTA URL', 'ccluster'),
        'ccluster_text_field',
        'ccluster-theme-settings',
        'ccluster_header',
        [
            'field' => 'navbar_cta_url',
            'type'  => 'url',
        ]
    );
}

add_action(
    'admin_init',
    'ccluster_register_theme_settings'
);


function ccluster_add_theme_settings_page()
{

    add_theme_page(
        __('Theme Settings', 'ccluster'),
        __('Theme Settings', 'ccluster'),
        'manage_options',
        'ccluster-theme-settings',
        'ccluster_render_theme_settings_page'
    );
}

add_action(
    'admin_menu',
    'ccluster_add_theme_settings_page'
);


function ccluster_render_theme_settings_page()
{
?>

    <div class="wrap">

        <h1>
            <?php esc_html_e('Theme Settings', 'ccluster'); ?>
        </h1>

        <form method="post" action="options.php">

            <?php

            settings_fields('ccluster_theme_settings');

            do_settings_sections('ccluster-theme-settings');

            submit_button();

            ?>

        </form>

    </div>

<?php
}


function ccluster_get_theme_option($key, $default = '')
{

    $options = get_option(
        'ccluster_theme_options',
        []
    );

    return $options[$key] ?? $default;
}


function ccluster_text_field($args)
{

    $field = $args['field'];
    $type  = $args['type'] ?? 'text';

    $value = ccluster_get_theme_option($field);

?>

    <input
        type="<?php echo esc_attr($type); ?>"
        name="ccluster_theme_options[<?php echo esc_attr($field); ?>]"
        value="<?php echo esc_attr($value); ?>"
        class="regular-text">

<?php
}


function ccluster_checkbox_field($args)
{

    $field = $args['field'] ?? '';

    $value = ccluster_get_theme_option(
        $field,
        '0'
    );

?>

    <label>

        <input
            type="hidden"
            name="ccluster_theme_options[<?php echo esc_attr($field); ?>]"
            value="0">

        <input
            type="checkbox"
            name="ccluster_theme_options[<?php echo esc_attr($field); ?>]"
            value="1"
            <?php checked($value, '1'); ?>>

        <?php esc_html_e('Enabled', 'ccluster'); ?>

    </label>

<?php
}


function ccluster_logo_field()
{

    $value = ccluster_get_theme_option('logo');

?>

    <input
        type="url"
        name="ccluster_theme_options[logo]"
        value="<?php echo esc_attr($value); ?>"
        class="regular-text"
        placeholder="https://...">

<?php
}


function ccluster_favicon_field()
{

    $value = ccluster_get_theme_option('favicon');

?>

    <input
        type="url"
        name="ccluster_theme_options[favicon]"
        value="<?php echo esc_attr($value); ?>"
        class="regular-text"
        placeholder="https://...">

<?php
}


function ccluster_sanitize_theme_options($input)
{

    $output = [];

    $text_fields = [
        'phone',
        'address',
        'navbar_cta_label',
    ];

    foreach ($text_fields as $field) {

        $output[$field] = isset($input[$field])
            ? sanitize_text_field($input[$field])
            : '';
    }

    $url_fields = [
        'logo',
        'favicon',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'navbar_cta_url',
    ];

    foreach ($url_fields as $field) {

        $output[$field] = isset($input[$field])
            ? esc_url_raw($input[$field])
            : '';
    }

    $output['email'] = isset($input['email'])
        ? sanitize_email($input['email'])
        : '';

    $output['topbar_enabled'] = isset($input['topbar_enabled'])
        ? '1'
        : '0';

    $output['navbar_cta_enabled'] = isset($input['navbar_cta_enabled'])
        ? '1'
        : '0';

    return $output;
}
