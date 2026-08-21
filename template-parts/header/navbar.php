<?php

$logo = ccluster_get_theme_option('logo');

$cta_enabled = ccluster_get_theme_option(
    'navbar_cta_enabled',
    '0'
);

$cta_label = ccluster_get_theme_option(
    'navbar_cta_label'
);

$cta_url = ccluster_get_theme_option(
    'navbar_cta_url'
);

?>

<nav
    id="site-navbar"
    class="bg-white">

    <div
        class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <!-- Logo -->

        <div class="shrink-0">

            <?php if ($logo) : ?>

                <a
                    href="<?php echo esc_url(home_url('/')); ?>"
                    aria-label="<?php bloginfo('name'); ?>">

                    <img
                        src="<?php echo esc_url($logo); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                        class="h-10 w-auto">

                </a>

            <?php else : ?>

                <a
                    href="<?php echo esc_url(home_url('/')); ?>"
                    class="text-xl font-bold">
                    <?php bloginfo('name'); ?>
                </a>

            <?php endif; ?>

        </div>


        <!-- Primary Navigation -->

        <div class="flex items-center gap-8">

            <?php
            wp_nav_menu(
                [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'menu_class'     => 'flex items-center gap-6',
                ]
            );
            ?>


            <!-- CTA -->

            <?php if (
                $cta_enabled === '1'
                && $cta_label
                && $cta_url
            ) : ?>

                <a
                    href="<?php echo esc_url($cta_url); ?>"
                    class="rounded-lg bg-black px-5 py-2.5 text-sm font-medium text-white">
                    <?php echo esc_html($cta_label); ?>
                </a>

            <?php endif; ?>

        </div>

    </div>

</nav>