<?php if ( is_active_sidebar("primary-sidebar") ) : ?>
<?php dynamic_sidebar("primary-sidebar"); ?>
<?php else : ?>
            <section class="widget">
                  <h3><?php esc_html_e("Ricerca", "agency-theme"); ?></h3>
<?php get_template_part("parts/search-form"); ?>
            </section>
<?php endif; ?>
</aside>
