<?php get_header(); ?>
<main class="wrap">
<?php
      while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                  <h1><?php the_title(); ?></h1>
                  <div class="entry-content"><?php the_content(); ?></div>
            </article>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
