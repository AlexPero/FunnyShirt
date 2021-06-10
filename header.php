<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1"
                    aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="logo">
                <?php the_custom_logo(); ?>
                <div class="titleHeader">
                    <h1 class="titleSite"><?= bloginfo('name'); ?></h1>
                    <p><?= bloginfo('description'); ?></p>
                </div>
            </div>
            <div class="flexHeader">

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'navbar',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'bs-example-navbar-collapse-1',
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </div>
        </div>
    </nav>
</header>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

