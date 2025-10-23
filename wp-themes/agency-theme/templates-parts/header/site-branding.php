<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="site-branding">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
        <?php bloginfo('name'); ?>
    </a>
    <p class="site-description">
        <?php bloginfo('description'); ?>
    </p>
</div>
