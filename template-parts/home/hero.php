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
    class="relative overflow-hidden bg-cover bg-center bg-no-repeat"
    <?php if ($hero_background) : ?>
    style="background-image: url('<?php echo esc_url($hero_background); ?>');"
    <?php endif; ?>>
    <div
        class="mx-auto flex max-w-7xl items-center px-6 py-24">
        <div class="w-full max-w-2xl">
            <!-- Badge -->
            <?php if ($hero_badge_text) : ?>
                <div class="mb-6 flex items-center gap-3">
                    <?php if ($hero_badge_icon) : ?>
                        <img
                            src="<?php echo esc_url($hero_badge_icon); ?>"
                            alt=""
                            class="h-6 w-6 object-contain">
                    <?php endif; ?>
                    <span
                        class="h-px w-10 bg-[#0F143A]"
                        aria-hidden="true"></span>
                    <span class="text-sm font-medium">
                        <?php echo esc_html($hero_badge_text); ?>
                    </span>
                </div>
            <?php endif; ?>
            <!-- Title -->
            <?php if ($hero_title) : ?>
                <h1 class="text-4xl font-bold md:text-6xl">
                    <?php echo esc_html($hero_title); ?>
                </h1>
            <?php endif; ?>
            <!-- Description -->
            <?php if ($hero_description) : ?>
                <p class="mt-6 max-w-xl text-lg leading-8">
                    <?php echo esc_html($hero_description); ?>
                </p>
            <?php endif; ?>
            <!-- CTA -->
            <?php if (
                $hero_cta_label
                && $hero_cta_url
            ) : ?>
                <a
                    href="<?php echo esc_url($hero_cta_url); ?>"
                    class="mt-8 inline-flex items-center rounded-lg bg-[#0F143A] px-6 py-3 text-sm font-semibold text-white transition hover:opacity-90">
                    <?php echo esc_html($hero_cta_label); ?>
                </a>
            <?php endif; ?>
        </div>
        <!-- Hero Image -->
        <?php if ($hero_image) : ?>
            <div class="hidden w-full justify-center md:flex">
                <img
                    src="<?php echo esc_url($hero_image); ?>"
                    alt=""
                    class="max-w-md object-contain">
            </div>
        <?php endif; ?>
    </div>
</section>