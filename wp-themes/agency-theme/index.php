<?php get_header(); ?>

<main id="site-content" role="main" class="wrap">
<?php if ( have_posts() ) : ?>
            <div class="posts-grid">
<?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class("post-card"); ?>>
<?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php the_permalink(); ?>" class="post-thumb"><?php the_post_thumbnail("property-card"); ?></a>
<?php endif; ?>
                              <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                              <div class="post-excerpt"><?php echo agency_trim_words(get_the_excerpt(), 25); ?></div>
                        </article>
<?php endwhile; ?>
            </div>
<?php the_posts_pagination(); ?>
<?php else : ?>
            <p><?php esc_html_e("Nessun contenuto trovato.", "agency-theme"); ?></p>
<?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
