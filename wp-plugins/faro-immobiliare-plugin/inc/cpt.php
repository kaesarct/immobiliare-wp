<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'rem_register_property_cpt');
function rem_register_property_cpt() {
    register_post_type('property', [
        'labels' => [
            'name' => __('Proprietà', 'faro-immobiliare'),
            'singular_name' => __('Proprietà', 'faro-immobiliare'),
            'add_new' => __('Aggiungi Proprietà', 'faro-immobiliare'),
            'add_new_item' => __('Aggiungi Nuova Proprietà', 'faro-immobiliare'),
            'edit_item' => __('Modifica Proprietà', 'faro-immobiliare'),
            'new_item' => __('Nuova Proprietà', 'faro-immobiliare'),
            'view_item' => __('Visualizza Proprietà', 'faro-immobiliare'),
            'search_items' => __('Cerca Proprietà', 'faro-immobiliare'),
            'not_found' => __('Nessuna proprietà trovata', 'faro-immobiliare'),
            'menu_name' => __('Immobili', 'faro-immobiliare')
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-home',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite' => ['slug' => 'proprieta'],
        'show_in_rest' => true
    ]);

    register_taxonomy('property_type', 'property', [
        'labels' => [
            'name' => __('Tipologie', 'faro-immobiliare'),
            'singular_name' => __('Tipologia', 'faro-immobiliare')
        ],
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'tipologia']
    ]);

    register_taxonomy('property_location', 'property', [
        'labels' => [
            'name' => __('Località', 'faro-immobiliare'),
            'singular_name' => __('Località', 'faro-immobiliare')
        ],
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'localita']
    ]);
}