<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

<main class="wrap">
    <header class="archive-header">
        <h1 class="archive-title"><?php _e('Tutte le Proprietà', 'agency-theme'); ?></h1>
        <?php if (is_tax()) : ?>
            <p class="archive-description"><?php echo esc_html(get_queried_object()->description); ?></p>
        <?php endif; ?>
    </header>

    <?php get_template_part('parts/search-form'); ?>

    <?php if (have_posts()) : ?>
        <div class="listings-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('templates-parts/property/card'); ?>
            <?php endwhile; ?>
        </div>
        
        <?php
        the_posts_pagination([
            'prev_text' => __('« Precedente', 'agency-theme'),
            'next_text' => __('Successivo »', 'agency-theme'),
        ]);
        ?>
    <?php else : ?>
        <div class="no-results">
            <h2><?php _e('Nessuna proprietà trovata', 'agency-theme'); ?></h2>
            <p><?php _e('Prova a modificare i criteri di ricerca.', 'agency-theme'); ?></p>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>