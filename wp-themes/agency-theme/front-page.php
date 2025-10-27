<?php get_header(); ?>

<main class="wrap">
    <section class="hero">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
        <div class="hero-stats">
            <?php
            $property_count = wp_count_posts('property');
            $total_properties = isset($property_count->publish) ? $property_count->publish : 0;
            $sold_properties = get_posts([
                'post_type' => 'property',
                'meta_key' => '_property_status',
                'meta_value' => 'venduto',
                'numberposts' => -1
            ]);
            ?>
            <div class="stat-item">
                <span class="stat-number"><?php echo esc_html($total_properties); ?></span>
                <span class="stat-label"><?php _e('Proprietà Disponibili', 'agency-theme'); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number"><?php echo esc_html(count($sold_properties)); ?></span>
                <span class="stat-label"><?php _e('Proprietà Vendute', 'agency-theme'); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number">15+</span>
                <span class="stat-label"><?php _e('Anni di Esperienza', 'agency-theme'); ?></span>
            </div>
        </div>
    </section>

    <?php get_template_part('parts/search-form'); ?>

    <section class="featured-properties">
        <div class="section-header">
            <h2><?php _e('Proprietà in Evidenza', 'agency-theme'); ?></h2>
            <p><?php _e('Scopri le nostre migliori offerte immobiliari', 'agency-theme'); ?></p>
        </div>
        
        <?php
        $featured_query = new WP_Query([
            'post_type' => 'property',
            'posts_per_page' => 6,
            'meta_query' => [
                [
                    'key' => '_property_status',
                    'value' => 'venduto',
                    'compare' => '!='
                ]
            ],
            'orderby' => 'date',
            'order' => 'DESC'
        ]);
        
        if ($featured_query->have_posts()) : ?>
            <div class="listings-grid">
                <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                    <?php get_template_part('templates-parts/property/card'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            
            <div class="section-cta">
                <a href="<?php echo esc_url(get_post_type_archive_link('property')); ?>" class="cta-button">
                    <?php _e('Vedi Tutte le Proprietà', 'agency-theme'); ?>
                </a>
            </div>
        <?php else : ?>
            <div class="no-properties">
                <h3><?php _e('Nessuna proprietà disponibile', 'agency-theme'); ?></h3>
                <p><?php _e('Torna presto per vedere le nostre nuove offerte!', 'agency-theme'); ?></p>
            </div>
        <?php endif; ?>
    </section>

    <section class="services-preview">
        <div class="section-header">
            <h2><?php _e('I Nostri Servizi', 'agency-theme'); ?></h2>
        </div>
        
        <div class="services-grid">
            <div class="service-item">
                <div class="service-icon">🏠</div>
                <h3><?php _e('Vendita Immobili', 'agency-theme'); ?></h3>
                <p><?php _e('Assistenza completa nella vendita della tua proprietà', 'agency-theme'); ?></p>
            </div>
            <div class="service-item">
                <div class="service-icon">🔑</div>
                <h3><?php _e('Affitti', 'agency-theme'); ?></h3>
                <p><?php _e('Gestione professionale di affitti residenziali e commerciali', 'agency-theme'); ?></p>
            </div>
            <div class="service-item">
                <div class="service-icon">📊</div>
                <h3><?php _e('Valutazioni', 'agency-theme'); ?></h3>
                <p><?php _e('Valutazioni accurate del valore di mercato', 'agency-theme'); ?></p>
            </div>
        </div>
    </section>
</main>

<style>
.hero-stats {
    display: flex;
    justify-content: center;
    gap: 3rem;
    margin-top: 2rem;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--gold);
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-header h2 {
    font-size: 2.5rem;
    color: var(--primary);
    margin-bottom: 1rem;
}

.section-header p {
    font-size: 1.1rem;
    color: #7f8c8d;
}

.section-cta {
    text-align: center;
    margin-top: 3rem;
}

.cta-button {
    display: inline-block;
    background: var(--accent);
    color: white;
    padding: 1rem 2rem;
    text-decoration: none;
    border-radius: var(--border-radius);
    font-weight: 600;
    transition: var(--transition);
}

.cta-button:hover {
    background: #c0392b;
    transform: translateY(-2px);
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.service-item {
    text-align: center;
    padding: 2rem;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.service-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
}

.service-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.service-item h3 {
    color: var(--primary);
    margin-bottom: 1rem;
}

.no-properties {
    text-align: center;
    padding: 3rem;
    background: var(--light);
    border-radius: var(--border-radius);
}

@media (max-width: 768px) {
    .hero-stats {
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>
