<?php
/*
Template Name: Listings
*/
get_header(); ?>

<main class="wrap">
      <h1><?php the_title(); ?></h1>
<?php
      $paged = get_query_var("paged") ?: 1;
      $query = new WP_Query([
            "post_type" => "property",
            "posts_per_page" => 12,
            "paged" => $paged,
      ]);
      ?>
<?php if ( $query->have_posts() ) : ?>
            <div class="listings-grid">
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
<?php get_template_part("templates-parts/property/card"); ?>
<?php endwhile; ?>
            </div>
<?php
            echo paginate_links(["total" => $query->max_num_pages]);
            ?>
<?php else : ?>
            <p><?php esc_html_e("Nessuna proprietà  trovata.", "agency-theme"); ?></p>
<?php endif; wp_reset_postdata(); ?>

</main>
<?php get_footer(); ?>
