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
        <!-- HEADER -->
        <div class="ccluster-nuestra-historia__header mt-[150px]">
            <!-- BADGE -->
            <div class="ccluster-nuestra-historia__badge">
                <?php
                if ($badge_icon_id) {
                    echo wp_get_attachment_image(
                        $badge_icon_id,
                        'thumbnail',
                        false,
                        [
                            'class' => 'ccluster-nuestra-historia__badge-icon',
                        ]
                    );
                }
                ?>
                <span
                    class="h-[2px] w-[25px] bg-secondary"
                    aria-hidden="true"></span>

                <span class="font-badge">
                    <?php echo esc_html($badge_text); ?>
                </span>
            </div>
            <!-- HEADING -->
            <?php if ($history_title) : ?>
                <h2 class="ccluster-section-heading">
                    <?php echo esc_html($history_title); ?>
                </h2>
            <?php endif; ?>
            <div class="ccluster-nuestra-historia__events">
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
                        <div class="ccluster-nuestra-historia__event-header">
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
                            <span class="ccluster-nuestra-historia__event-dot"></span>
                        </div>
                        <div class="ccluster-nuestra-historia__event-date">
                            <?php if ($event_year) : ?>
                                <span class="ccluster-nuestra-historia__event-date year">
                                    <?php echo esc_html($event_year); ?>
                                </span>
                            <?php endif; ?>
                            <?php if ($event_date) : ?>
                                <span class="ccluster-nuestra-historia__event-date date">
                                    <?php echo esc_html($event_date); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <!-- BOTTOM ROW -->
    <div class="ccluster-nuestra-historia__stats">
        <!-- VALUE -->
        <article class="ccluster-nuestra-historia__stat ccluster-nuestra-historia__stat--value">
            <?php
            $value_label = get_post_meta(
                get_the_ID(),
                'historia_value_label',
                true
            );
            $value_number = get_post_meta(
                get_the_ID(),
                'historia_value_number',
                true
            );
            $value_subtitle = get_post_meta(
                get_the_ID(),
                'historia_value_subtitle',
                true
            );
            $value_description = get_post_meta(
                get_the_ID(),
                'historia_value_description',
                true
            );
            ?>
            <?php if ($value_label) : ?>
                <span class="ccluster-nuestra-historia__stat-label">
                    <?php echo esc_html($value_label); ?>
                </span>
            <?php endif; ?>
            <?php if ($value_number) : ?>
                <span class="ccluster-nuestra-historia__stat-number">
                    <?php echo esc_html($value_number); ?>
                </span>
            <?php endif; ?>
            <?php if ($value_subtitle) : ?>
                <h3 class="ccluster-nuestra-historia__stat-subtitle">
                    <?php echo esc_html($value_subtitle); ?>
                </h3>
            <?php endif; ?>
            <?php if ($value_description) : ?>
                <p class="ccluster-nuestra-historia__stat-description">
                    <?php echo esc_html($value_description); ?>
                </p>
            <?php endif; ?>
        </article>
        <!-- STRENGTH -->
        <article class="ccluster-nuestra-historia__stat ccluster-nuestra-historia__stat--strength">
            <?php
            $strength_label = get_post_meta(
                get_the_ID(),
                'historia_strength_label',
                true
            );
            $strength_number = get_post_meta(
                get_the_ID(),
                'historia_strength_number',
                true
            );
            $strength_subtitle = get_post_meta(
                get_the_ID(),
                'historia_strength_subtitle',
                true
            );
            $strength_description = get_post_meta(
                get_the_ID(),
                'historia_strength_description',
                true
            );
            ?>
            <?php if ($strength_label) : ?>
                <span class="ccluster-nuestra-historia__stat-label">
                    <?php echo esc_html($strength_label); ?>
                </span>
            <?php endif; ?>
            <?php if ($strength_number) : ?>
                <span class="ccluster-nuestra-historia__stat-number">
                    <?php echo esc_html($strength_number); ?>
                </span>
            <?php endif; ?>
            <?php if ($strength_subtitle) : ?>
                <h3 class="ccluster-nuestra-historia__stat-subtitle">
                    <?php echo esc_html($strength_subtitle); ?>
                </h3>
            <?php endif; ?>
            <?php if ($strength_description) : ?>
                <p class="ccluster-nuestra-historia__stat-description w-[75%]">
                    <?php echo esc_html($strength_description); ?>
                </p>
            <?php endif; ?>
        </article>
    </div>
</section>