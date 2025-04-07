<?php
/**
 * WooCommerce 用の基本テンプレート
 */
get_header(); ?>

<main id="primary" class="site-main">
    <?php woocommerce_content(); ?>
</main>

<?php get_footer();
