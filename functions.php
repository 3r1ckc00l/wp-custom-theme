<?php
    function customtheme_theme_support() {
        // add dynamic title tag support
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
    }

    add_action('after_setup_theme', 'customtheme_theme_support');

    function customtheme_menus() {
        $locations = array(
            "primary" => "Desktop Primary Left Sidebar",
            "footer" => "Footer Menu Items"
        );

        register_nav_menus($locations);
    }

    add_action("init", "customtheme_menus");

    function customtheme_register_style() {
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('customtheme-style', get_template_directory_uri(). "/style.css", array('customtheme-bootstrap'), $version, "all");
        wp_enqueue_style('customtheme-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), "4.4.1", "all");
        wp_enqueue_style('customtheme-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), "5.13.0", "all");
    }

    add_action("wp_enqueue_scripts", "customtheme_register_style");

    function customtheme_register_scripts() {
        wp_enqueue_script('customtheme-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "3.4.1", true);
        wp_enqueue_script('customtheme-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "1.16.0", true);
        wp_enqueue_script('customtheme-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "4.4.1", true);
        wp_enqueue_script('customtheme-main', get_template_directory_uri(). "/assets/js/main.js", array(), "1.0", true);
    }

    add_action("wp_enqueue_scripts", "customtheme_register_scripts");
?>