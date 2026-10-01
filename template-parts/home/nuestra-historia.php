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
            <span class="ccluster-nuestra-historia__badge-separator"></span>
            <?php if ($badge_text) : ?>
                <span class="ccluster-nuestra-historia__badge-text">
                    <?php echo esc_html($badge_text); ?>
                </span>
            <?php endif; ?>
        </div>
        <?php if ($history_title) : ?>
            <h2 class="ccluster-nuestra-historia__title">
                <?php echo esc_html($history_title); ?>
            </h2>
        <?php endif; ?>
    </div>
    <?php for ($i = 1; $i <= 5; $i++) : ?>
        <?php
        $event_title = get_post_meta(
            get_the_ID(),
            "historia_event_{$i}_title",
            true
        );
        $event_description = get_post_meta(
            get_the_ID(),
            "historia_event_{$i}_description",
            true
        );
        $event_year = get_post_meta(
            get_the_ID(),
            "historia_event_{$i}_year",
            true
        );
        $event_date = get_post_meta(
            get_the_ID(),
            "historia_event_{$i}_date",
            true
        );
        ?>
        <article class="ccluster-nuestra-historia__event">
            <div class="ccluster-nuestra-historia__event-head">
                <?php if ($event_title) : ?>
                    <h3 class="ccluster-nuestra-historia__event-title">
                        <?php echo esc_html($event_title); ?>
                    </h3>
                <?php endif; ?>
                <?php if ($event_description) : ?>
                    <p class="ccluster-nuestra-historia__event-description">
                        <?php echo esc_html($event_description); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="ccluster-nuestra-historia__event-line">
                <span
                    class="ccluster-nuestra-historia__event-point"
                    aria-hidden="true">
                </span>
            </div>
            <div class="ccluster-nuestra-historia__event-date">
                <?php if ($event_year) : ?>
                    <span class="ccluster-nuestra-historia__event-year">
                        <?php echo esc_html($event_year); ?>
                    </span>
                <?php endif; ?>
                <?php if ($event_date) : ?>
                    <span class="ccluster-nuestra-historia__event-date-text">
                        <?php echo esc_html($event_date); ?>
                    </span>
                <?php endif; ?>
            </div>
        </article>
    <?php endfor; ?>
    <!-- BOTTOM ROW -->
    <div class="ccluster-nuestra-historia__stats">
    </div>
</section>