<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header" role="banner">
    <div class="wrap header-inner">
        <?php get_template_part('templates-parts/header/site-branding'); ?>
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">Menu</button>
        <?php get_template_part('templates-parts/header/nav'); ?>
        <?php get_template_part('parts/search-form'); ?>
    </div>
</header>
