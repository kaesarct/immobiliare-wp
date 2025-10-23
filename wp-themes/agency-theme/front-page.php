<?php get_header(); ?>

<main class="wrap">
      <section class="hero">
            <h1><?php bloginfo("name"); ?></h1>
            <p><?php bloginfo("description"); ?></p>
      </section>

      <section class="latest-listings">
            <h2><?php esc_html_e("Ultime proprietà ", "agency-theme"); ?></h2>
<?php
            $query = new WP_Query(["post_type" => "property", "posts_per_page" => 6]);
            if ($query->have_posts()) : ?>
                  <div class="listings-grid">
<?php while ($query->have_posts()) : $query->the_post(); ?>
<?php get_template_part("templates-parts/property/card"); ?>
<?php endwhile; wp_reset_postdata(); ?>
                  </div>
<?php else : ?>
                  <p><?php esc_html_e("Nessuna proprietà  disponibile.", "agency-theme"); ?></p>
<?php endif; ?>
      </section>
</main>
<?php get_footer(); ?>
