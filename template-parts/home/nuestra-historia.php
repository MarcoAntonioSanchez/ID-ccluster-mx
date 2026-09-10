<?php
$background_id = absint(
    get_post_meta(
        get_the_ID(),
        'historia_background',
        true
    )
);
$background_url = $background_id
    ? wp_get_attachment_image_url(
        $background_id,
        'full'
    )
    : '';

$badge_icon_id = absint(
    get_post_meta(
        get_the_ID(),
        'historia_badge_icon',
        true
    )
);
$badge_text = get_post_meta(
    get_the_ID(),
    'historia_badge_text',
    true
);
$history_title = get_post_meta(
    get_the_ID(),
    'historia_title',
    true
);
?>
<section class="ccluster-nuestra-historia">
    <!-- TOP ROW -->
    <div
        class="ccluster-nuestra-historia__timeline"
        <?php if ($background_url) : ?>
        style="background-image: url('<?php echo esc_url($background_url); ?>');"
        <?php endif; ?>>
        <div class="ccluster-nuestra-historia__header">
            <?php if ($badge_icon_id) : ?>
                <?php
                echo wp_get_attachment_image(
                    $badge_icon_id,
                    'thumbnail',
                    false,
                    [
                        'class' => 'ccluster-nuestra-historia__badge-icon',
                        'alt'   => '',
                    ]
                );
                ?>
            <?php endif; ?>
            <?php if ($history_title) : ?>
                <h2 class="ccluster-nuestra-historia__title">
                    <?php echo esc_html($history_title); ?>
                </h2>
            <?php endif; ?>

            <span class="ccluster-nuestra-historia__badge-separator"></span>

            <?php if ($badge_text) : ?>
                <span class="ccluster-nuestra-historia__badge-text">
                    <?php echo esc_html($badge_text); ?>
                </span>
            <?php endif; ?>

        </div>
    </div>
    <!-- BOTTOM ROW -->
    <div class="ccluster-nuestra-historia__stats">
    </div>
</section>