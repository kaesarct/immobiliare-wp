<?php get_header(); ?>
<main class="wrap">
<?php
      while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                  <h1><?php the_title(); ?></h1>
                  <div class="entry-meta"><?php the_date(); ?> â€” <?php the_author(); ?></div>
<?php if ( has_post_thumbnail() ) : ?>
                        <div class="single-thumb"><?php the_post_thumbnail("property-gallery"); ?></div>
<?php endif; ?>
                  <div class="entry-content"><?php the_content(); ?></div>
<?php get_template_part("templates-parts/property/meta"); ?>
            </article>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
