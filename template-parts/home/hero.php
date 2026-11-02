<?php
// CUSTOM FIELD'S VALUES
$hero_badge_icon_id = absint(
    get_post_meta(
        get_the_ID(),
        'hero_badge_icon',
        true
    )
);
$hero_badge_icon = $hero_badge_icon_id
    ? wp_get_attachment_image_url(
        $hero_badge_icon_id,
        'full-size'
    )
    : '';
$hero_badge_text = get_post_meta(
    get_the_ID(),
    'hero_badge_text',
    true
);
$hero_title = get_post_meta(
    get_the_ID(),
    'hero_title',
    true
);
$hero_description = get_post_meta(
    get_the_ID(),
    'hero_description',
    true
);
$hero_cta_label = get_post_meta(
    get_the_ID(),
    'hero_cta_label',
    true
);
$hero_cta_url = get_post_meta(
    get_the_ID(),
    'hero_cta_url',
    true
);
$hero_image_id = absint(
    get_post_meta(
        get_the_ID(),
        'hero_image',
        true
    )
);
$hero_image = $hero_image_id
    ? wp_get_attachment_image_url(
        $hero_image_id,
        'full'
    )
    : '';
$hero_background_id = absint(
    get_post_meta(
        get_the_ID(),
        'hero_background',
        true
    )
);
$hero_background = $hero_background_id
    ? wp_get_attachment_image_url(
        $hero_background_id,
        'full'
    )
    : '';
?>
<!-- CUSTOM FIELDS RENDER -->
<section
    id="home-hero"
    class="ccluster-hero relative overflow-hidden bg-cover bg-center bg-no-repeat"
    <?php if ($hero_background) : ?>
    style="background-image: url('<?php echo esc_url($hero_background); ?>');"
    <?php endif; ?>>
    <canvas
        class="ccluster-hero__particles"
        aria-hidden="true">
    </canvas>
    <div
        class="mx-auto grid h-[calc(100vh-135px)] min-h-[calc(100vh-135px)] max-w-screen-2xl grid-cols-1 items-center gap-1 md:gap-12 md:px-6 py-16 md:grid-cols-2 md:gap-8">
        <!-- Content -->
        <div class="ccluster-hero__content relative flex mt-[8.5rem] md:mt-0 h-90 md:h-full md:min-h-[500px] items-start justify-center w-full">
            <div class="mb-6 flex items-center md:items-start lg:items-start xl:items-start 2xl:items-start sm:gap-3 md:gap-3 lg:gap-3 xl:gap-3 2xl:gap-3">
                <?php if ($hero_badge_icon) : ?>
                    <img
                        src="<?php echo esc_url($hero_badge_icon); ?>"
                        alt=""
                        class="ccluster-hero__sequence-item ccluster-hero__logo self-center md:self-start h-[180px] w-[180px] sm:h-[180px] sm:w-[180px] md:h-[180px] md:w-[180px] lg:h-[180px] lg:w-[180px] xl:h-[180px] xl:w-[180px] 2xl:h-[180px] 2xl:w-[180px] shrink-0 object-contain"
                        data-hero-sequence="logo">
                <?php endif; ?>
            </div>
            <h1
                class="ccluster-hero__sequence-item ccluster-hero__heading max-w-full md:max-w-2xl text-5xl md:text-9xl capitalize leading-tight font-heading text-primary text-center md:text-start"
                data-hero-sequence="heading">
                <span class="text-secondary">Evoluciona</span> a Compliance Cluster
            </h1>

            <?php if ($hero_description) : ?>
                <div
                    class="ccluster-hero__sequence-group"
                    data-hero-sequence-group="description-cta">
                    <p class="ccluster-hero__description mt-6 max-w-full md:max-w-xl text-2xl md:text-4xl leading-7 font-body text-center md:text-start"
                        data-hero-sequence="description">
                        <?php echo esc_html($hero_description); ?>
                    </p>

                    <?php if ($hero_cta_label && $hero_cta_url) : ?>
                        <a
                            href="<?php echo esc_url($hero_cta_url); ?>"
                            class="mt-8 inline-flex w-fit items-center self-center md:self-start bg-[#0F143A] px-6 py-3 text-sm font-semibold text-white transition-opacity hover:opacity-90"
                            data-hero-sequence="cta">
                            <?php echo esc_html($hero_cta_label); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php elseif ($hero_cta_label && $hero_cta_url) : ?>
                <a
                    href="<?php echo esc_url($hero_cta_url); ?>"
                    class="ccluster-hero__sequence-item ccluster-button--shiny mt-8 w-fit self-center md:self-start text-sm font-semibold"
                    data-hero-sequence=" cta">
                    <?php echo esc_html($hero_cta_label); ?>
                </a>
            <?php endif; ?>
        </div>
        <!-- Visual -->
        <div class="relative flex items-center justify-center w-full ccluster-hero__media">
            <div class="ccluster-hero-orb">
                <video
                    class="ccluster-hero-image rotate-35"
                    autoplay
                    muted
                    loop
                    playsinline
                    aria-hidden="true">
                    <source
                        src="https://stage.ccluster.mx/wp-content/uploads/2026/10/esfera_nodos_loop_0001-1800.mp4"
                        type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</section>