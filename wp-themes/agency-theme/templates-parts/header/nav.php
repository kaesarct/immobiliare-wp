<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<nav class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary', 'agency-theme'); ?>">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'menu',
        'fallback_cb' => false,
    ));
    ?>
</nav>