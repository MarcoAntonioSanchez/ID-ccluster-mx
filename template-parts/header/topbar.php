<?php

if (
    ccluster_get_theme_option('topbar_enabled', '0') !== '1'
) {
    return;
}

$email   = ccluster_get_theme_option('email');
$address = ccluster_get_theme_option('address');
?>

<div
    id="site-topbar"
    class="border-1 border-b-slate-200">
    <div
        class="mx-auto flex max-w-7xl items-center justify-between px-6 py-2">
        <div class="flex items-center gap-6">
            <?php if ($email) : ?>
                <div class="flex gap-1">
                    <span
                        class="ccluster-topbar__icon flex-1 self-center">
                        <i data-lucide="mail"></i>
                    </span>
                    <a
                        href="mailto:<?php echo esc_attr($email); ?>"
                        class="text-xs flex-1">
                        <?php echo esc_html($email); ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if ($address) : ?>
                <div class="flex gap-1">
                    <span
                        class="ccluster-topbar__icon self-center">
                        <i data-lucide="mail"></i>
                    </span>
                    <span class="text-xs">
                        <?php echo esc_html($address); ?>
                    </span>
                </div>
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
                        class="text-xs">
                        <?php echo esc_html($label); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>