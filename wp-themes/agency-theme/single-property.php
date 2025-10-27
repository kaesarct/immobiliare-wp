<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

<main class="wrap">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('property-single'); ?> itemscope itemtype="https://schema.org/RealEstateListing">
            <header class="property-header">
                <h1 class="property-title" itemprop="name"><?php the_title(); ?></h1>
                <?php
                $price = get_post_meta(get_the_ID(), '_property_price', true);
                $status = get_post_meta(get_the_ID(), '_property_status', true);
                if ($price || $status) :
                ?>
                    <div class="property-price-status">
                        <?php if ($price) : ?>
                            <span class="property-price" itemprop="price"><?php echo esc_html(number_format($price, 0, ',', '.')); ?> €</span>
                        <?php endif; ?>
                        <?php if ($status) : ?>
                            <span class="property-status status-<?php echo esc_attr($status); ?>"><?php echo esc_html(ucfirst($status)); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="property-featured-image">
                    <?php the_post_thumbnail('large', ['itemprop' => 'image']); ?>
                </div>
            <?php endif; ?>

            <div class="property-details">
                <?php
                $sqm = get_post_meta(get_the_ID(), '_property_sqm', true);
                $rooms = get_post_meta(get_the_ID(), '_property_rooms', true);
                $bathrooms = get_post_meta(get_the_ID(), '_property_bathrooms', true);
                $address = get_post_meta(get_the_ID(), '_property_address', true);
                ?>
                <div class="property-meta-grid">
                    <?php if ($sqm) : ?>
                        <div class="meta-item">
                            <strong><?php _e('Superficie:', 'agency-theme'); ?></strong>
                            <span><?php echo esc_html($sqm); ?> m²</span>
                        </div>
                    <?php endif; ?>
                    <?php if ($rooms) : ?>
                        <div class="meta-item">
                            <strong><?php _e('Camere:', 'agency-theme'); ?></strong>
                            <span><?php echo esc_html($rooms); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if ($bathrooms) : ?>
                        <div class="meta-item">
                            <strong><?php _e('Bagni:', 'agency-theme'); ?></strong>
                            <span><?php echo esc_html($bathrooms); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if ($address) : ?>
                        <div class="meta-item">
                            <strong><?php _e('Indirizzo:', 'agency-theme'); ?></strong>
                            <span itemprop="address"><?php echo esc_html($address); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="property-content" itemprop="description">
                <?php the_content(); ?>
            </div>

            <div class="property-contact">
                <h3><?php _e('Contattaci per questa proprietà', 'agency-theme'); ?></h3>
                <p><?php _e('Interessato? Contattaci per maggiori informazioni.', 'agency-theme'); ?></p>
                <a href="mailto:<?php echo esc_attr(get_option('rem_contact_email', get_option('admin_email'))); ?>?subject=<?php echo esc_attr('Richiesta info: ' . get_the_title()); ?>" class="contact-btn">
                    <?php _e('Contatta Agenzia', 'agency-theme'); ?>
                </a>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>