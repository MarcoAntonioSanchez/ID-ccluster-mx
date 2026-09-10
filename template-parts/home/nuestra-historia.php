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
?>
<section class="ccluster-nuestra-historia">
    <!-- TOP ROW -->
    <div class="ccluster-nuestra-historia__timeline">
        <div
            class="ccluster-nuestra-historia__timeline"
            <?php if ($background_url) : ?>
            style="background-image: url('<?php echo esc_url($background_url); ?>');"
            <?php endif; ?>>
        </div>
    </div>
    <!-- BOTTOM ROW -->
    <div class="ccluster-nuestra-historia__stats">
    </div>
</section>