<?php

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css', ['bootstrap'], wp_get_theme()->get('Version'));
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], wp_get_theme()->get('Version'));
});

add_action('after_setup_theme', function (){
    add_theme_support('title-tag'); // Balise title dans le head
    add_theme_support('post-thumbnails'); // Image mise en avant
    add_theme_support('html5'); //Support HTML
    add_theme_support('custom-header');
    add_theme_support('custom-logo');
    //require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

    //Menu
    register_nav_menu('navbar', 'Menu de haut de page');
    register_nav_menu('footer', 'Menu de pied de page');
});

add_filter('upload_mimes', 'wpc_mime_types');
function wpc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
