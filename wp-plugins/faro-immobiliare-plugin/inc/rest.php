<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('rest_api_init', 'rem_register_rest_routes');
function rem_register_rest_routes() {
    register_rest_route('rem/v1', '/properties', [
        'methods' => 'GET',
        'callback' => 'rem_get_properties',
        'permission_callback' => '__return_true'
    ]);
    
    register_rest_route('rem/v1', '/properties/(?P<id>\d+)', [
        'methods' => 'GET',
        'callback' => 'rem_get_property',
        'permission_callback' => '__return_true'
    ]);
}

function rem_get_properties($request) {
    $args = [
        'post_type' => 'property',
        'posts_per_page' => $request->get_param('per_page') ?: 10,
        'paged' => $request->get_param('page') ?: 1,
        'post_status' => 'publish'
    ];
    
    if ($request->get_param('type')) {
        $args['tax_query'] = [[
            'taxonomy' => 'property_type',
            'field' => 'slug',
            'terms' => sanitize_text_field($request->get_param('type'))
        ]];
    }
    
    $query = new WP_Query($args);
    $properties = [];
    
    foreach ($query->posts as $post) {
        $properties[] = [
            'id' => $post->ID,
            'title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'price' => get_post_meta($post->ID, '_property_price', true),
            'sqm' => get_post_meta($post->ID, '_property_sqm', true),
            'rooms' => get_post_meta($post->ID, '_property_rooms', true),
            'status' => get_post_meta($post->ID, '_property_status', true),
            'thumbnail' => get_the_post_thumbnail_url($post->ID, 'property-card'),
            'link' => get_permalink($post->ID)
        ];
    }
    
    return rest_ensure_response($properties);
}

function rem_get_property($request) {
    $id = (int) $request['id'];
    $post = get_post($id);
    
    if (!$post || $post->post_type !== 'property') {
        return new WP_Error('not_found', __('Proprietà non trovata', 'faro-immobiliare'), ['status' => 404]);
    }
    
    $property = [
        'id' => $post->ID,
        'title' => $post->post_title,
        'content' => $post->post_content,
        'price' => get_post_meta($post->ID, '_property_price', true),
        'sqm' => get_post_meta($post->ID, '_property_sqm', true),
        'rooms' => get_post_meta($post->ID, '_property_rooms', true),
        'bathrooms' => get_post_meta($post->ID, '_property_bathrooms', true),
        'address' => get_post_meta($post->ID, '_property_address', true),
        'status' => get_post_meta($post->ID, '_property_status', true),
        'gallery' => wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')
    ];
    
    return rest_ensure_response($property);
}