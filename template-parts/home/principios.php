<section class="ccluster-principios">
    <?php
    $principios_badge_icon_id = absint(
        get_post_meta(
            get_the_ID(),
            'principios_badge_icon',
            true
        )
    );
    $principios_badge_text = get_post_meta(
        get_the_ID(),
        'principios_badge_text',
        true
    );
    $principios_title = get_post_meta(
        get_the_ID(),
        'principios_title',
        true
    );
    $principios_description = get_post_meta(
        get_the_ID(),
        'principios_description',
        true
    );
    ?>
    <!-- HEADER -->
    <div class="ccluster-principios__header">
        <!-- BADGE -->
        <div class="ccluster-principios__badge">
            <?php if ($principios_badge_icon_id) : ?>
                <?php
                echo wp_get_attachment_image(
                    $principios_badge_icon_id,
                    'thumbnail',
                    false,
                    [
                        'class' => 'ccluster-principios__badge-icon',
                        'alt'   => '',
                    ]
                );
                ?>
            <?php endif; ?>
            <span
                class="h-[2px] w-[25px] bg-secondary"
                aria-hidden="true"></span>
            <?php if ($principios_badge_text) : ?>
                <span class="font-badge">
                    <?php echo esc_html($principios_badge_text); ?>
                </span>
            <?php endif; ?>
        </div>
        <!-- HEADING -->
        <?php if ($principios_title) : ?>
            <h2 class="ccluster-section-heading">
                <?php echo esc_html($principios_title); ?>
            </h2>
        <?php endif; ?>
        <!-- DESCRIPTION -->
        <?php if ($principios_description) : ?>
            <p class="font-body">
                <?php echo esc_html($principios_description); ?>
            </p>
        <?php endif; ?>
    </div>
    <?php
    $principios = [
        [
            'title' => 'Excelencia',
            'description' => 'Trabajamos con altos estándares para construir soluciones sólidas y duraderas.',
        ],
        [
            'title' => 'Integridad',
            'description' => 'Actuamos con transparencia, responsabilidad y compromiso en cada proyecto.',
        ],
        [
            'title' => 'Innovación',
            'description' => 'Buscamos nuevas formas de resolver retos y generar valor para nuestros clientes.',
        ],
        [
            'title' => 'Colaboración',
            'description' => 'Construimos relaciones basadas en confianza, comunicación y trabajo conjunto.',
        ],
        [
            'title' => 'Compromiso',
            'description' => 'Nos involucramos en cada proyecto para alcanzar resultados que realmente importen.',
        ],
        [
            'title' => 'Experiencia',
            'description' => 'Nuestra trayectoria nos permite comprender cada reto desde una perspectiva integral.',
        ],
    ];
    ?>
    <div class="ccluster-principios__grid">
        <?php for ($i = 1; $i <= 6; $i++) : ?>
            <?php
            $principio_icon = get_post_meta(
                get_the_ID(),
                "principio_{$i}_icon",
                true
            );
            $principio_title = get_post_meta(
                get_the_ID(),
                "principio_{$i}_title",
                true
            );
            $principio_description = get_post_meta(
                get_the_ID(),
                "principio_{$i}_description",
                true
            );
            $principio_url = get_post_meta(
                get_the_ID(),
                "principio_{$i}_url",
                true
            );
            ?>
            <article class="ccluster-principios__card">
                <?php if ($principio_icon) : ?>
                    <?php
                    echo wp_get_attachment_image(
                        absint($principio_icon),
                        'thumbnail',
                        false,
                        [
                            'class' => 'ccluster-principios__card-icon',
                            'alt'   => '',
                        ]
                    );
                    ?>
                <?php endif; ?>
                <?php if ($principio_title) : ?>
                    <h3 class="ccluster-principios__card-title">
                        <?php echo esc_html($principio_title); ?>
                    </h3>
                <?php endif; ?>
                <?php if ($principio_description) : ?>
                    <p class="ccluster-principios__card-description">
                        <?php echo esc_html($principio_description); ?>
                    </p>
                <?php endif; ?>
                <?php if ($principio_url) : ?>
                    <a
                        href="<?php echo esc_url($principio_url); ?>"
                        class="ccluster-principios__card-link">
                        Leer más
                        <span aria-hidden="true">→</span>
                    </a>
                <?php endif; ?>
            </article>
        <?php endfor; ?>
    </div>
</section>