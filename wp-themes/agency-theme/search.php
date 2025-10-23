<?php get_header(); ?>
<main class="wrap">
      <h1><?php printf(esc_html__("Risultati per: %s", "agency-theme"), "<span>" . get_search_query() . "</span>"); ?></h1>
<?php if ( have_posts() ) : ?>
            <div class="posts-grid">
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part("templates-parts/property/card"); ?>
<?php endwhile; ?>
            </div>
<?php the_posts_pagination(); ?>
<?php else : ?>
            <p><?php esc_html_e("Nessun risultato trovato.", "agency-theme"); ?></p>
<?php endif; ?>
</main>
<?php get_footer(); ?>
