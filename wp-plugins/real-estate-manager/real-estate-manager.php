<?php
add_action('wp_enqueue_scripts','agency_enqueue');
function agency_enqueue(){
    $version = filemtime(get_template_directory() . '/style.css');
    wp_enqueue_style('agency-style', get_template_directory_uri() . '/style.css', [], $version);
    wp_enqueue_script('agency-main', get_template_directory_uri() . '/assets/main.js', ['jquery'], $version, true);
}
