<?php

$background_id = absint(
    get_post_meta(get_the_ID(), 'firma_background', true)
);

$stat_icon_id = absint(
    get_post_meta(get_the_ID(), 'firma_stat_icon', true)
);

$stat_number = get_post_meta(
    get_the_ID(),
    'firma_stat_number',
    true
);

$stat_label = get_post_meta(
    get_the_ID(),
    'firma_stat_label',
    true
);

$badge_icon_id = absint(
    get_post_meta(get_the_ID(), 'firma_badge_icon', true)
);

$badge_text = get_post_meta(
    get_the_ID(),
    'firma_badge_text',
    true
);

$title = get_post_meta(
    get_the_ID(),
    'firma_title',
    true
);

$description = get_post_meta(
    get_the_ID(),
    'firma_description',
    true
);

$features = [
    get_post_meta(get_the_ID(), 'firma_feature_1', true),
    get_post_meta(get_the_ID(), 'firma_feature_2', true),
    get_post_meta(get_the_ID(), 'firma_feature_3', true),
    get_post_meta(get_the_ID(), 'firma_feature_4', true),
];

$text_1 = get_post_meta(
    get_the_ID(),
    'firma_text_1',
    true
);

$text_2 = get_post_meta(
    get_the_ID(),
    'firma_text_2',
    true
);

$cta_label = get_post_meta(
    get_the_ID(),
    'firma_cta_label',
    true
);

$cta_url = get_post_meta(
    get_the_ID(),
    'firma_cta_url',
    true
);

$signature_name = get_post_meta(
    get_the_ID(),
    'firma_signature_name',
    true
);

$signature_role = get_post_meta(
    get_the_ID(),
    'firma_signature_role',
    true
);
?>
// HTML
<section
    id="la-firma"
    class="ccluster-la-firma">
    <div class="ccluster-la-firma__inner">

        <!-- LEFT COLUMN -->
        <div class="ccluster-la-firma__media">

            <?php
            if ($background_id) {
                echo wp_get_attachment_image(
                    $background_id,
                    'large',
                    false,
                    [
                        'class' => 'ccluster-la-firma__background',
                    ]
                );
            }
            ?>

            <div class="ccluster-la-firma__experience">

                <?php
                if ($stat_icon_id) {
                    echo wp_get_attachment_image(
                        $stat_icon_id,
                        'thumbnail',
                        false,
                        [
                            'class' => 'ccluster-la-firma__experience-icon',
                        ]
                    );
                }
                ?>

                <span class="ccluster-la-firma__experience-number">
                    <?php echo esc_html($stat_number); ?>
                </span>

                <span class="ccluster-la-firma__experience-label">
                    <?php echo esc_html($stat_label); ?>
                </span>

            </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="ccluster-la-firma__content">

            <!-- BADGE -->
            <div class="ccluster-la-firma__badge">

                <?php
                if ($badge_icon_id) {
                    echo wp_get_attachment_image(
                        $badge_icon_id,
                        'thumbnail',
                        false,
                        [
                            'class' => 'ccluster-la-firma__badge-icon',
                        ]
                    );
                }
                ?>

                <span class="ccluster-la-firma__badge-line"></span>

                <span class="font-badge">
                    <?php echo esc_html($badge_text); ?>
                </span>

            </div>

            <!-- HEADING -->
            <h2 class="font-heading">
                <?php echo esc_html($title); ?>
            </h2>

            <p class="font-body">
                <?php echo esc_html($description); ?>
            </p>

            <!-- FEATURES -->
            <div class="ccluster-la-firma__features">

                <?php foreach ($features as $feature) : ?>

                    <?php if (!$feature) continue; ?>

                    <div class="ccluster-la-firma__feature">

                        <span
                            class="ccluster-la-firma__feature-icon"
                            aria-hidden="true">
                            ✓
                        </span>

                        <span class="font-body">
                            <?php echo esc_html($feature); ?>
                        </span>

                    </div>

                <?php endforeach; ?>

            </div>

            <!-- TEXT -->
            <div class="ccluster-la-firma__texts">

                <?php if ($text_1) : ?>
                    <p class="font-body">
                        <?php echo esc_html($text_1); ?>
                    </p>
                <?php endif; ?>

                <?php if ($text_2) : ?>
                    <p class="font-body">
                        <?php echo esc_html($text_2); ?>
                    </p>
                <?php endif; ?>

            </div>

            <!-- FOOTER -->
            <div class="ccluster-la-firma__footer">

                <?php if ($cta_label && $cta_url) : ?>

                    <a
                        href="<?php echo esc_url($cta_url); ?>"
                        class="ccluster-la-firma__cta font-body">
                        <?php echo esc_html($cta_label); ?>
                    </a>

                <?php endif; ?>

                <?php if ($signature_name || $signature_role) : ?>

                    <div class="ccluster-la-firma__signature">

                        <?php if ($signature_name) : ?>
                            <span class="font-body">
                                <?php echo esc_html($signature_name); ?>
                            </span>
                        <?php endif; ?>

                        <?php if ($signature_role) : ?>
                            <small class="font-badge">
                                <?php echo esc_html($signature_role); ?>
                            </small>
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>
</section>