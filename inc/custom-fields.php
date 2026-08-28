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
        <?php
        $badge_icon_id = absint(
            $values['hero_badge_icon']
        );
        ?>
        <div class="ccluster-media-field">
            <p>
                <strong>
                    <?php esc_html_e('Badge Icon', 'ccluster'); ?>
                </strong>
            </p>
            <input
                type="hidden"
                id="hero_badge_icon"
                name="hero_badge_icon"
                value="<?php echo esc_attr($badge_icon_id); ?>" />
            <div
                id="hero_badge_icon_preview"
                class="ccluster-media-preview">
                <?php
                if ($badge_icon_id) {
                    echo wp_get_attachment_image(
                        $badge_icon_id,
                        'thumbnail'
                    );
                }
                ?>
            </div>
            <button
                type="button"
                class="button ccluster-media-select"
                data-target="hero_badge_icon"
                data-preview="hero_badge_icon_preview">
                <?php esc_html_e('Select Image', 'ccluster'); ?>
            </button>
            <button
                type="button"
                class="button ccluster-media-remove"
                data-target="hero_badge_icon"
                data-preview="hero_badge_icon_preview">
                <?php esc_html_e('Remove Image', 'ccluster'); ?>
            </button>
        </div>
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
        <div class="ccluster-media-field">
            <p>
                <strong>
                    <?php esc_html_e('Hero Image', 'ccluster'); ?>
                </strong>
            </p>
            <input
                type="hidden"
                id="hero_image"
                name="hero_image"
                value="<?php echo esc_attr(absint($values['hero_image'])); ?>" />
            <div
                id="hero_image_preview"
                class="ccluster-media-preview">
                <?php
                if ($values['hero_image']) {
                    echo wp_get_attachment_image(
                        absint($values['hero_image']),
                        'medium'
                    );
                }
                ?>
            </div>
            <button
                type="button"
                class="button ccluster-media-select"
                data-target="hero_image"
                data-preview="hero_image_preview">
                <?php esc_html_e('Select Image', 'ccluster'); ?>
            </button>
            <button
                type="button"
                class="button ccluster-media-remove"
                data-target="hero_image"
                data-preview="hero_image_preview">
                <?php esc_html_e('Remove Image', 'ccluster'); ?>
            </button>
        </div>
        <!-- BACKGROUND -->
        <div class="ccluster-media-field">
            <p>
                <strong>
                    <?php esc_html_e('Hero Background', 'ccluster'); ?>
                </strong>
            </p>
            <input
                type="hidden"
                id="hero_background"
                name="hero_background"
                value="<?php echo esc_attr(absint($values['hero_background'])); ?>" />
            <div
                id="hero_background_preview"
                class="ccluster-media-preview">
                <?php
                if ($values['hero_background']) {
                    echo wp_get_attachment_image(
                        absint($values['hero_background']),
                        'large'
                    );
                }
                ?>
            </div>
            <button
                type="button"
                class="button ccluster-media-select"
                data-target="hero_background"
                data-preview="hero_background_preview">
                <?php esc_html_e('Select Image', 'ccluster'); ?>
            </button>
            <button
                type="button"
                class="button ccluster-media-remove"
                data-target="hero_background"
                data-preview="hero_background_preview">
                <?php esc_html_e('Remove Image', 'ccluster'); ?>
            </button>
        </div>
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
        'hero_badge_icon'   => 'absint',
        'hero_badge_text'   => 'sanitize_text_field',
        'hero_title'        => 'sanitize_text_field',
        'hero_description'  => 'sanitize_textarea_field',
        'hero_cta_label'    => 'sanitize_text_field',
        'hero_cta_url'      => 'esc_url_raw',
        'hero_image'        => 'absint',
        'hero_background'   => 'absint',
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
// MEDIA LIBRARY SELECTOR
function ccluster_enqueue_media_library($hook)
{
    if (
        $hook !== 'post.php'
        && $hook !== 'post-new.php'
    ) {
        return;
    }
    wp_enqueue_media();

    wp_enqueue_script(
        'ccluster-admin-media',
        get_theme_file_uri(
            'src/js/admin-media.js'
        ),
        ['jquery'],
        null,
        true
    );
}
add_action(
    'admin_enqueue_scripts',
    'ccluster_enqueue_media_library'
);
