<?php

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
?>
<section
    id="home-hero"
    class="px-6 py-24">
    <div class="mx-auto max-w-7xl">
        <?php if ($hero_title) : ?>
            <h1 class="text-4xl font-bold">
                <?php echo esc_html($hero_title); ?>
            </h1>
        <?php endif; ?>
        <?php if ($hero_description) : ?>
            <p class="mt-6 max-w-2xl text-lg">
                <?php echo esc_html($hero_description); ?>
            </p>
        <?php endif; ?>
    </div>
</section>