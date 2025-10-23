<?php get_header(); ?>
<main class="wrap">
      <h1><?php the_archive_title(); ?></h1>
<?php if ( have_posts() ) : ?>
            <div class="posts-grid">
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part("templates-parts/property/card"); ?>
<?php endwhile; ?>
            </div>
<?php the_posts_pagination(); ?>
<?php else : ?>
            <p><?php esc_html_e("Nessun contenuto in questa sezione.", "agency-theme"); ?></p>
<?php endif; ?>
</main>
<?php get_footer(); ?>
