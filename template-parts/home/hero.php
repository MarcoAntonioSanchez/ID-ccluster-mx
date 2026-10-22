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
        'thumbnail'
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
        class="mx-auto grid h-[calc(100vh-135px)] min-h-[calc(100vh-135px)] max-w-7xl grid-cols-1 items-center gap-12 px-6 py-16 md:grid-cols-2 md:gap-8">
        <!-- Content -->
        <div class="ccluster-hero__content text-left pb-[125px]">
            <?php if ($hero_badge_text) : ?>
                <div class="mb-6 flex items-center gap-3">
                    <?php if ($hero_badge_icon) : ?>
                        <img
                            src="<?php echo esc_url($hero_badge_icon); ?>"
                            alt=""
                            class="ccluster-hero__sequence-item ccluster-hero__logo h-[150px] w-[150px] shrink-0 object-contain"
                            data-hero-sequence="logo">
                    <?php endif; ?>
                </div>
            <?php elseif ($hero_badge_icon) : ?>
                <div class="mb-6 flex items-center gap-3">
                    <img
                        src="<?php echo esc_url($hero_badge_icon); ?>"
                        alt=""
                        class="ccluster-hero__sequence-item ccluster-hero__logo h-[150px] w-[150px] shrink-0 object-contain"
                        data-hero-sequence="logo">
                </div>
            <?php endif; ?>

            <h1
                class="ccluster-hero__sequence-item ccluster-hero__heading max-w-2xl text-9xl capitalize leading-tight md:text-7xl font-heading text-primary"
                data-hero-sequence="heading">
                <span class="ccluster-title__gradient-light">Evoluciona</span> a Compliance Cluster
            </h1>

            <?php if ($hero_description) : ?>
                <div
                    class="ccluster-hero__sequence-group"
                    data-hero-sequence-group="description-cta">
                    <p class="mt-6 max-w-xl text-lg leading-8 font-body ccluster-hero__description"
                        data-hero-sequence="description">
                        <?php echo esc_html($hero_description); ?>
                    </p>

                    <?php if ($hero_cta_label && $hero_cta_url) : ?>
                        <a
                            href="<?php echo esc_url($hero_cta_url); ?>"
                            class="mt-8 inline-flex items-center bg-[#0F143A] px-6 py-3 text-sm font-semibold text-white transition-opacity hover:opacity-90"
                            data-hero-sequence="cta">
                            <?php echo esc_html($hero_cta_label); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php elseif ($hero_cta_label && $hero_cta_url) : ?>
                <a
                    href="<?php echo esc_url($hero_cta_url); ?>"
                    class="ccluster-hero__sequence-item mt-8 inline-flex items-center bg-[#0F143A] px-6 py-3 text-sm font-semibold text-white transition-opacity hover:opacity-90"
                    data-hero-sequence="cta">
                    <?php echo esc_html($hero_cta_label); ?>
                </a>
            <?php endif; ?>
        </div>
        <!-- Visual -->
        <div class="relative flex items-center justify-center">
            <div class="ccluster-hero-orb">
                <video
                    class="ccluster-hero-image"
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