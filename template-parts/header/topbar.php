<?php

if (
    ccluster_get_theme_option('topbar_enabled', '0') !== '1'
) {
    return;
}

$phone   = ccluster_get_theme_option('phone');
$email   = ccluster_get_theme_option('email');
$address = ccluster_get_theme_option('address');
?>
<div
    id="site-topbar"
    class="border-1 border-b-neutral-700">
    <div
        class="mx-auto flex max-w-7xl items-center justify-between px-6 py-2">
        <div class="flex items-center gap-6">
            <?php if ($phone) : ?>
                <a
                    href="tel:<?php echo esc_attr($phone); ?>"
                    class="text-sm">
                    <?php echo esc_html($phone); ?>
                </a>
            <?php endif; ?>
            <?php if ($email) : ?>
                <a
                    href="mailto:<?php echo esc_attr($email); ?>"
                    class="text-sm">
                    <?php echo esc_html($email); ?>
                </a>
            <?php endif; ?>
            <?php if ($address) : ?>
                <span class="text-sm">
                    <?php echo esc_html($address); ?>
                </span>
            <?php endif; ?>
        </div>
        <div class="flex items-center gap-4">
            <?php
            $social_networks = [
                'facebook'  => 'Facebook',
                'instagram' => 'Instagram',
                'linkedin'  => 'LinkedIn',
                'youtube'   => 'YouTube',
            ];
            ?>
            <?php foreach ($social_networks as $network => $label) : ?>
                <?php
                $url = ccluster_get_theme_option($network);
                ?>
                <?php if ($url) : ?>
                    <a
                        href="<?php echo esc_url($url); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-sm">
                        <?php echo esc_html($label); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>