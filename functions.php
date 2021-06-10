<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css', ['bootstrap'], wp_get_theme()->get('Version'));
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], wp_get_theme()->get('Version'));
    wp_enqueue_script('jquery', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.js/jquery.min.js', [], wp_get_theme()->get('Version'));
    wp_enqueue_script('slick', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js', ['jquery'], wp_get_theme()->get('Version'));
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', ['slick'], wp_get_theme()->get('Version'));
});

add_action('after_setup_theme', function () {
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();

    add_theme_support('title-tag'); // Balise title dans le head
    add_theme_support('post-thumbnails'); // Image mise en avant
    add_theme_support('html5'); //Support HTML
    add_theme_support('custom-header');
    add_theme_support('custom-logo');
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

    require_once get_template_directory() . '/post-type/slider.php';
    require_once get_template_directory() . '/post-type/magasin.php';

    //Menu
    register_nav_menu('navbar', 'Menu de haut de page');
    register_nav_menu('footer', 'Menu de pied de page');
});

add_filter('upload_mimes', 'wpc_mime_types');
function wpc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}

/**
 * @param string $nameCPT
 * @param int $postPerPage
 * @param string $url
 * @param string $title
 * @param string $excerpt
 * @param $link
 */
function display_card():void
{
        echo '<div>';
        echo '<img src="'.the_post_thumbnail_url().'" class="post-card__img"
                             alt="Image de l\'article : ' . the_title() . '?>">';
        echo '</div>';
        echo '<div class="post-card__content>';
        echo '<h3 class="post-card__title"> ' . the_title() . '</h3>';
        echo '<p class="post-card__excerpt"> ' . the_excerpt() . '</p>';
        echo '<a href="' . the_permalink() . '" class="post-card__link btn btn-success"> Lire la suite ... </a>';
        echo '</div>';

}

add_action( 'carbon_fields_register_fields', function() {
    Container::make( 'theme_options', 'Page d\'accueil' )
        ->add_fields( array(
            Field::make( 'text', 'title', 'Titre de la page' ),
            Field::make( 'text', 'description', 'Description' ),
            Field::make( 'text', 'title-actu', 'Titre des actus' ),
            Field::make( 'text', 'title-mag', 'Titre des magasins' ),
            Field::make( 'text', 'title-sell', 'Titre meilleures ventes' ),
        ));
} );




