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
                        class="text-xs flex-1 border-b border-transparent duration-300 ease-in-out hover:scale-[1.01] hover:border-b-1 hover:border-(--primary)">
                        <?php echo esc_html($email); ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if ($address) : ?>
                <div class="flex gap-1">
                    <span
                        class="ccluster-topbar__icon self-center">
                        <i data-lucide="map-pin"></i>
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
                'facebook' => [
                    'label' => 'Facebook',
                    'icon'  => 'facebook',
                ],
                'instagram' => [
                    'label' => 'Instagram',
                    'icon'  => 'instagram',
                ],
                'linkedin' => [
                    'label' => 'LinkedIn',
                    'icon'  => 'linkedin',
                ],
                'x' => [
                    'label' => 'X',
                    'icon'  => 'x',
                ],
                'youtube' => [
                    'label' => 'YouTube',
                    'icon'  => 'youtube',
                ],
            ];
            ?>
            <?php foreach ($social_networks as $network => $social) : ?>
                <?php
                $url = ccluster_get_theme_option($network);
                ?>
                <?php if ($url) : ?>
                    <a
                        href="<?php echo esc_url($url); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="<?php echo esc_attr($social['label']); ?>"
                        class="ccluster-topbar__social"
                        data-social="<?php echo esc_attr($social['icon']); ?>"></a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>