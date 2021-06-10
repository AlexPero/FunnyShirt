<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('init', function () {
    register_post_type('slider', [
        'labels' => [
            'name' => _x('Sliders', 'Post type general name', 'bikeshop_theme'),
            'singular_name' => _x('Slider', 'Post type singular name', 'bikeshop_theme'),
            'menu_name' => _x('Sliders', 'Admin Menu text', 'bikeshop_theme'),
            'name_admin_bar' => _x('Slider', 'Add New on Toolbar', 'bikeshop_theme'),
            'add_new' => __('Ajouter Nouveau', 'bikeshop_theme'),
            'add_new_item' => __('Ajouter Nouveau Slider', 'bikeshop_theme'),
            'new_item' => __('Nouveau Slider', 'bikeshop_theme'),
            'edit_item' => __('Modifier Slider', 'bikeshop_theme'),
            'view_item' => __('Voir Slider', 'bikeshop_theme'),
            'all_items' => __('Tous les Sliders', 'bikeshop_theme'),
            'search_items' => __('Recherché Sliders', 'bikeshop_theme'),
            'parent_item_colon' => __('Sliders Parent :', 'bikeshop_theme'),
            'not_found' => __('Sliders introuvable.', 'bikeshop_theme'),
            'not_found_in_trash' => __('Sliders introuvables dans la corbeille.', 'bikeshop_theme'),
            'featured_image' => _x('Photo de l\'Slider', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'bikeshop_theme'),
            'set_featured_image' => _x('Définir la photo', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'bikeshop_theme'),
            'remove_featured_image' => _x('Supprimer la photo', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'bikeshop_theme'),
            'use_featured_image' => _x('Utiliser comme photo', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'bikeshop_theme'),
            'archives' => _x('Slider archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'bikeshop_theme'),
            'insert_into_item' => _x('Insérer dans Slider', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'bikeshop_theme'),
            'uploaded_to_this_item' => _x('Uploadé à ce Slider', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'bikeshop_theme'),
            'filter_items_list' => _x('Filtrer la liste des Sliders', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'bikeshop_theme'),
            'items_list_navigation' => _x('Sliders navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'bikeshop_theme'),
            'items_list' => _x('Sliders liste', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'bikeshop_theme'),
        ],
        'show_in_menu' => true,
        'public' => true,
        'supports' => ['title', 'thumbnail'],
        'rewrite' => ['slug' => 'employe'],
        'menu_icon' => 'dashicons-buddicons-buddypress-logo'
    ]);
});

add_action('carbon_fields_register_fields', function () {
    Container::make('post_meta', 'Slider')
        ->where('post_type', '=', 'slider')
        ->add_fields([
            Field::make('text', 'description', __('Slide Description (facultatif)')),
            Field::make('complex', 'btnslider')
                ->add_fields([
                    Field::make('text', 'text')
                ])
        ]);
});