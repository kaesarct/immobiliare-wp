<?php the_ID(); ?>" <?php post_class("property-card"); ?>>
      <a href="<?php the_permalink(); ?>" class="property-link">
<?php if ( has_post_thumbnail() ) : ?>
                  <div class="property-thumb"><?php the_post_thumbnail("property-card"); ?></div>
<?php endif; ?>
            <div class="property-body">
                  <h2 class="property-title"><?php the_title(); ?></h2>
                  <div class="property-meta">
<?php
                        $price = get_post_meta(get_the_ID(), "price", true);
                        if ( $price ) {
                              echo "<span class=\"property-price\">" . esc_html($price) . "</span>";
                        }
                        ?>
                  </div>
                  <div class="property-excerpt"><?php echo agency_trim_words(get_the_excerpt(), 20); ?></div>
            </div>
      </a>
</article>
