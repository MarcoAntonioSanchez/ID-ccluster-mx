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
                        class="h-20 w-auto">

                </a>

            <?php else : ?>

                <a
                    href="<?php echo esc_url(home_url('/')); ?>"
                    class="text-xl font-bold">
                    <?php bloginfo('name'); ?>
                </a>

            <?php endif; ?>

        </div>


        <!-- Desktop Navigation -->

        <div class="hidden items-center gap-8 md:flex">

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


            <?php if (
                $cta_enabled === '1'
                && $cta_label
                && $cta_url
            ) : ?>

                <a
                    href="<?php echo esc_url($cta_url); ?>"
                    class="bg-[#0F143A] px-6 py-3 text-sm font-semibold text-white transition-opacity capitalize hover:opacity-90">
                    <?php echo esc_html($cta_label); ?>
                </a>

            <?php endif; ?>

        </div>


        <!-- Mobile Menu Button -->

        <button
            type="button"
            data-menu-toggle
            aria-expanded="false"
            aria-controls="mobile-navigation"
            class="inline-flex items-center justify-center rounded-md p-2 md:hidden">

            <span class="sr-only">
                <?php esc_html_e('Open navigation menu', 'ccluster'); ?>
            </span>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
                aria-hidden="true">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>

        </button>

    </div>


    <!-- Mobile Navigation -->

    <div
        id="mobile-navigation"
        data-mobile-menu
        hidden
        class="border-t border-gray-200 md:hidden">

        <div class="px-6 py-4">

            <?php

            wp_nav_menu(
                [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'menu_class'     => 'flex flex-col gap-4',
                ]
            );

            ?>


            <?php if (
                $cta_enabled === '1'
                && $cta_label
                && $cta_url
            ) : ?>

                <a
                    href="<?php echo esc_url($cta_url); ?>"
                    class="mt-4 block bg-[#0F143A] px-6 py-3 text-sm font-semibold text-white transition-opacity hover:opacity-90">
                    <?php echo esc_html($cta_label); ?>
                </a>

            <?php endif; ?>

        </div>

    </div>

</nav>