<?php
add_action('wp_enqueue_scripts', function() {
    $theme_dir = get_template_directory_uri();
    $theme_path = get_template_directory();
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap', [], null);
    
    // Main CSS
    $css_file = $theme_path . '/assets/css/main.css';
    $css_ver = file_exists($css_file) ? filemtime($css_file) : wp_get_theme()->get('Version');
    wp_enqueue_style('agency-main', $theme_dir . '/assets/css/main.css', ['google-fonts'], $css_ver);
    
    // Template Style CSS
    $template_css_file = $theme_path . '/assets/css/template-style.css';
    $template_css_ver = file_exists($template_css_file) ? filemtime($template_css_file) : wp_get_theme()->get('Version');
    wp_enqueue_style('agency-template', $theme_dir . '/assets/css/template-style.css', ['agency-main'], $template_css_ver);
    
    // Main JS
    $js_file = $theme_path . '/assets/js/main.js';
    $js_ver = file_exists($js_file) ? filemtime($js_file) : wp_get_theme()->get('Version');
    wp_enqueue_script('agency-main', $theme_dir . '/assets/js/main.js', [], $js_ver, true);
    
    // Localizzazione per JS
    wp_localize_script('agency-main', 'agencyAjax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('agency_nonce')
    ]);
});
