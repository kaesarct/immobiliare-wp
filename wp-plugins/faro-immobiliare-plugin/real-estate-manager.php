<?php
/**
 * Plugin Name: Faro Immobiliare Plugin
 * Description: Plugin per gestione annunci immobiliari
 * Version: 1.0.0
 * Author: Faro Agency
 * Text Domain: faro-immobiliare
 * Update URI: false
 */

if (!defined('ABSPATH')) {
    exit;
}

// Carica i file direttamente
require_once plugin_dir_path(__FILE__) . 'inc/cpt.php';
require_once plugin_dir_path(__FILE__) . 'inc/meta.php';
require_once plugin_dir_path(__FILE__) . 'inc/admin.php';
require_once plugin_dir_path(__FILE__) . 'inc/rest.php';

// Hook di attivazione
register_activation_hook(__FILE__, function() {
    flush_rewrite_rules();
});

// Disabilita aggiornamenti
add_filter('pre_set_site_transient_update_plugins', function($transient) {
    if (isset($transient->response[plugin_basename(__FILE__)])) {
        unset($transient->response[plugin_basename(__FILE__)]);
    }
    return $transient;
});
