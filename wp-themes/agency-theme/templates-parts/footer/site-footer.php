<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="footer-inner">
    <nav class="footer-nav" aria-label="<?php esc_attr_e('Footer', 'agency-theme'); ?>">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer',
            'container' => false,
            'menu_class' => 'footer-menu',
            'fallback_cb' => false,
        ));
        ?>
    </nav>
    <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
</div>