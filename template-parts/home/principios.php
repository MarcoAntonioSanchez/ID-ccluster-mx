<section class="ccluster-principios">
    <!-- HEADER -->
    <div class="ccluster-principios__header">
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
        <?php foreach ($principios as $principio) : ?>
            <article class="ccluster-principios__card">
                <!-- ICON -->
                <div class="ccluster-principios__card-icon">
                    <img
                        src="https://placehold.co/80x80"
                        alt="">
                </div>
                <!-- TITLE -->
                <h3 class="ccluster-principios__card-title">
                    <?php echo esc_html($principio['title']); ?>
                </h3>
                <!-- DESCRIPTION -->
                <p class="ccluster-principios__card-description">
                    <?php echo esc_html($principio['description']); ?>
                </p>
                <!-- LINK -->
                <a
                    href="#"
                    class="ccluster-principios__card-link">
                    <span>Leer más</span>
                    <span aria-hidden="true">→</span>
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</section>