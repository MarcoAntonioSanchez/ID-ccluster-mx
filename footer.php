<?php

$logo = ccluster_get_theme_option('logo');

$phone   = ccluster_get_theme_option('phone');
$email   = ccluster_get_theme_option('email');
$address = ccluster_get_theme_option('address');

$social_networks = [
    'facebook'  => 'Facebook',
    'instagram' => 'Instagram',
    'linkedin'  => 'LinkedIn',
    'youtube'   => 'YouTube',
];

?>

<footer
    id="site-footer"
    class="bg-black text-white">
    <div class="mx-auto max-w-7xl px-6 py-16">
        <div class="grid gap-12 md:grid-cols-3">
            <!-- Brand -->
            <div>
                <?php if ($logo) : ?>
                    <a
                        href="<?php echo esc_url(home_url('/')); ?>"
                        aria-label="<?php bloginfo('name'); ?>"
                        class="inline-block">
                        <img
                            src="<?php echo esc_url($logo); ?>"
                            alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                            class="h-10 w-auto">
                    </a>
                <?php endif; ?>
                <p class="mt-6 max-w-sm text-sm leading-6 text-gray-400">
                    <?php bloginfo('description'); ?>
                </p>
            </div>
            <!-- Navigation -->
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wider">
                    <?php esc_html_e('Navigation', 'ccluster'); ?>
                </h2>
                <?php
                wp_nav_menu(
                    [
                        'theme_location' => 'footer',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'menu_class'     => 'mt-6 space-y-3',
                    ]
                );
                ?>
            </div>
            <!-- Contact -->
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wider">
                    <?php esc_html_e('Contact', 'ccluster'); ?>
                </h2>
                <div class="mt-6 space-y-3 text-sm text-gray-400">
                    <?php if ($phone) : ?>
                        <a
                            href="tel:<?php echo esc_attr($phone); ?>"
                            class="block hover:text-white">
                            <?php echo esc_html($phone); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($email) : ?>
                        <a
                            href="mailto:<?php echo esc_attr($email); ?>"
                            class="block hover:text-white">
                            <?php echo esc_html($email); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($address) : ?>
                        <span class="block">
                            <?php echo esc_html($address); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Bottom Bar -->
        <div
            class="mt-12 flex flex-col gap-4 border-t border-gray-800 pt-8 text-sm text-gray-500 md:flex-row md:items-center md:justify-between">
            <p>
                &copy;
                <?php echo esc_html(wp_date('Y')); ?>
                <?php bloginfo('name'); ?>.
                <?php esc_html_e('Todos los derechos reservados.', 'ccluster'); ?>
            </p>
        </div>
    </div>
</footer>