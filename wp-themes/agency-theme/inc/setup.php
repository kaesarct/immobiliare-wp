<?php
if (!defined("ABSPATH")) {
    exit;
}

add_action("after_setup_theme", function() {
    load_theme_textdomain("agency-theme", get_template_directory() . "/languages");

    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("html5", array("search-form", "gallery", "caption"));
    add_theme_support("responsive-embeds");

    register_nav_menus(array(
        "primary" => __("Primary Menu", "agency-theme"),
        "footer"  => __("Footer Menu", "agency-theme"),
    ));

    add_image_size("property-card", 600, 400, true);
    add_image_size("property-gallery", 1200, 800, false);
});

add_action("widgets_init", function() {
      $s="";
      register_sidebar(array(
        "name"          => __("Primary Sidebar", "agency-theme"),
        "id"            => "primary-sidebar",
        "description"   => __("Widget area principale", "agency-theme"),
        "before_widget" => "<section id=\"%1$s\" class=\"widget %2$s\">",
        "after_widget"  => "</section>",
        "before_title"  => "<h3 class=\"widget-title\">",
        "after_title"   => "</h3>",
    ));
});