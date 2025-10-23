<?php
add_action("wp_enqueue_scripts", function() {
      $theme_dir = get_template_directory_uri();
      $theme_path = get_template_directory();

      $css_file = $theme_path . "/assets/css/main.css";
      $css_ver = file_exists($css_file) ? filemtime($css_file) : wp_get_theme()->get("Version");
      wp_enqueue_style("agency-main", $theme_dir . "/assets/css/main.css", [], $css_ver);

      $js_file = $theme_path . "/assets/js/main.js";
      $js_ver = file_exists($js_file) ? filemtime($js_file) : wp_get_theme()->get("Version");
      wp_enqueue_script("agency-main", $theme_dir . "/assets/js/main.js", [], $js_ver, true);
});
