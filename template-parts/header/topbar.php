<?php

$phone = ccluster_get_theme_option('phone');
$email = ccluster_get_theme_option('email');

?>

<div id="site-topbar">

    <?php if ($phone) : ?>

        <span>
            <?php echo esc_html($phone); ?>
        </span>

    <?php endif; ?>

    <?php if ($email) : ?>

        <span>
            <?php echo esc_html($email); ?>
        </span>

    <?php endif; ?>

</div>