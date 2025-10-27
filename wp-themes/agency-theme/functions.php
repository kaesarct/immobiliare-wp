<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/inc/setup.php';
require_once __DIR__ . '/inc/enqueue.php';
require_once __DIR__ . '/inc/helpers.php';

// Ricerca avanzata proprietà
add_action('pre_get_posts', 'agency_modify_property_search');
function agency_modify_property_search($query) {
    if (!is_admin() && $query->is_main_query()) {
        if (is_search() && isset($_GET['post_type']) && $_GET['post_type'] === 'property') {
            $query->set('post_type', 'property');
            
            $meta_query = [];
            $tax_query = [];
            
            if (!empty($_GET['property_status'])) {
                $meta_query[] = [
                    'key' => '_property_status',
                    'value' => sanitize_text_field($_GET['property_status']),
                    'compare' => '='
                ];
            }
            
            if (!empty($_GET['property_type'])) {
                $tax_query[] = [
                    'taxonomy' => 'property_type',
                    'field' => 'slug',
                    'terms' => sanitize_text_field($_GET['property_type'])
                ];
            }
            
            if (!empty($meta_query)) {
                $query->set('meta_query', $meta_query);
            }
            
            if (!empty($tax_query)) {
                $query->set('tax_query', $tax_query);
            }
        }
    }
}

// Sicurezza: rimuovi versione WP
remove_action('wp_head', 'wp_generator');

// Sicurezza: disabilita XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Performance: rimuovi emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');