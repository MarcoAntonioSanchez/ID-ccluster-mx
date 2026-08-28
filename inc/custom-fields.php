<?php
// REGISTER METABOX
function ccluster_add_home_hero_meta_box()
{

    add_meta_box(
        'ccluster_home_hero',
        __('Home Hero', 'ccluster'),
        'ccluster_render_home_hero_meta_box',
        'page',
        'normal',
        'high'
    );
}
add_action(
    'add_meta_boxes',
    'ccluster_add_home_hero_meta_box'
);
// RENDER CUSTOM FIELDS
function ccluster_render_home_hero_meta_box($post)
{
    wp_nonce_field(
        'ccluster_save_home_hero',
        'ccluster_home_hero_nonce'
    );
    $fields = [
        'hero_badge_icon',
        'hero_badge_text',
        'hero_title',
        'hero_description',
        'hero_cta_label',
        'hero_cta_url',
        'hero_image',
        'hero_background',
    ];
    $values = [];
    foreach ($fields as $field) {

        $values[$field] = get_post_meta(
            $post->ID,
            $field,
            true
        );
    }
?>
    <!-- BADGE -->
    <div>
        <p>
            <label for="hero_badge_icon">
                <strong>
                    <?php esc_html_e('Badge Icon', 'ccluster'); ?>
                </strong>
            </label>
        </p>
        <input
            type="text"
            id="hero_badge_icon"
            name="hero_badge_icon"
            value="<?php echo esc_attr($values['hero_badge_icon']); ?>"
            class="widefat" />
        <p>
            <label for="hero_badge_text">
                <strong>
                    <?php esc_html_e('Badge Text', 'ccluster'); ?>
                </strong>
            </label>
        </p>
        <input
            type="text"
            id="hero_badge_text"
            name="hero_badge_text"
            value="<?php echo esc_attr($values['hero_badge_text']); ?>"
            class="widefat" />
        <!-- TITLE -->
        <p>
            <label for="hero_title">
                <strong>
                    <?php esc_html_e('Hero Title', 'ccluster'); ?>
                </strong>
            </label>
        </p>
        <input
            type="text"
            id="hero_title"
            name="hero_title"
            value="<?php echo esc_attr($values['hero_title']); ?>"
            class="widefat" />
        <!-- DESCRIPTION -->
        <p>
            <label for="hero_description">
                <strong>
                    <?php esc_html_e('Hero Description', 'ccluster'); ?>
                </strong>
            </label>
        </p>
        <textarea
            id="hero_description"
            name="hero_description"
            rows="4"
            class="widefat"><?php echo esc_textarea($values['hero_description']); ?></textarea>
        <!-- CTA -->
        <p>
            <label for="hero_cta_label">
                <strong>
                    <?php esc_html_e('CTA Label', 'ccluster'); ?>
                </strong>
            </label>
        </p>
        <input
            type="text"
            id="hero_cta_label"
            name="hero_cta_label"
            value="<?php echo esc_attr($values['hero_cta_label']); ?>"
            class="widefat" />
        <p>
            <label for="hero_cta_url">
                <strong>
                    <?php esc_html_e('CTA URL', 'ccluster'); ?>
                </strong>
            </label>
        </p>
        <input
            type="url"
            id="hero_cta_url"
            name="hero_cta_url"
            value="<?php echo esc_attr($values['hero_cta_url']); ?>"
            class="widefat" />
        <!-- IMAGE -->
        <p>
            <label for="hero_image">
                <strong>
                    <?php esc_html_e('Hero Image', 'ccluster'); ?>
                </strong>
            </label>
        </p>
        <input
            type="text"
            id="hero_image"
            name="hero_image"
            value="<?php echo esc_attr($values['hero_image']); ?>"
            class="widefat" />
        <!-- BACKGROUND -->
        <p>
            <label for="hero_background">
                <strong>
                    <?php esc_html_e('Hero Background', 'ccluster'); ?>
                </strong>
            </label>
        </p>
        <input
            type="text"
            id="hero_background"
            name="hero_background"
            value="<?php echo esc_attr($values['hero_background']); ?>"
            class="widefat" />
    </div>
<?php
}
// SAVE CUSTOM FIELDS VALUES
function ccluster_save_home_hero($post_id)
{
    if (
        !isset($_POST['ccluster_home_hero_nonce'])
        || !wp_verify_nonce(
            $_POST['ccluster_home_hero_nonce'],
            'ccluster_save_home_hero'
        )
    ) {
        return;
    }
    if (
        defined('DOING_AUTOSAVE')
        && DOING_AUTOSAVE
    ) {
        return;
    }
    if (
        !current_user_can(
            'edit_post',
            $post_id
        )
    ) {
        return;
    }
    $fields = [
        'hero_badge_icon'   => 'sanitize_text_field',
        'hero_badge_text'   => 'sanitize_text_field',
        'hero_title'        => 'sanitize_text_field',
        'hero_description'  => 'sanitize_textarea_field',
        'hero_cta_label'    => 'sanitize_text_field',
        'hero_cta_url'      => 'esc_url_raw',
        'hero_image'        => 'esc_url_raw',
        'hero_background'   => 'esc_url_raw',
    ];
    foreach ($fields as $field => $sanitize_callback) {
        if (!isset($_POST[$field])) {
            continue;
        }
        $value = call_user_func(
            $sanitize_callback,
            wp_unslash($_POST[$field])
        );
        update_post_meta(
            $post_id,
            $field,
            $value
        );
    }
}
add_action(
    'save_post_page',
    'ccluster_save_home_hero'
);
