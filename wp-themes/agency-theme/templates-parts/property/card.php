<article id="post-<?php the_ID(); ?>" <?php post_class('property-card'); ?> itemscope itemtype="https://schema.org/RealEstateListing">
    <a href="<?php the_permalink(); ?>" class="property-link">
        <?php if (has_post_thumbnail()) : ?>
            <div class="property-thumb">
                <?php the_post_thumbnail('property-card', ['itemprop' => 'image']); ?>
            </div>
        <?php endif; ?>
        <div class="property-body">
            <h2 class="property-title" itemprop="name"><?php the_title(); ?></h2>
            <div class="property-meta">
                <?php
                $price = get_post_meta(get_the_ID(), '_property_price', true);
                $sqm = get_post_meta(get_the_ID(), '_property_sqm', true);
                $rooms = get_post_meta(get_the_ID(), '_property_rooms', true);
                $status = get_post_meta(get_the_ID(), '_property_status', true);
                
                if ($price) {
                    echo '<span class="property-price" itemprop="price">' . esc_html(number_format($price, 0, ',', '.')) . ' €</span>';
                }
                if ($sqm) {
                    echo '<span class="property-sqm">' . esc_html($sqm) . ' m²</span>';
                }
                if ($rooms) {
                    echo '<span class="property-rooms">' . esc_html($rooms) . ' camere</span>';
                }
                if ($status) {
                    echo '<span class="property-status status-' . esc_attr($status) . '">' . esc_html(ucfirst($status)) . '</span>';
                }
                ?>
            </div>
            <div class="property-excerpt" itemprop="description">
                <?php echo wp_kses_post(agency_trim_words(get_the_excerpt(), 20)); ?>
            </div>
        </div>
    </a>
</article>
