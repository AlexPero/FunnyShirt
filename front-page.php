<?php get_header(); ?>
<?php
$slider = new WP_Query([
    'post_type' => 'slider',
    'posts_per_page' => 2,
]);

$magasinsVille = new WP_Query([
    'post_type' => 'magasin',
    'posts_per_page' => 3,
]);
$products = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => 3,
]);

$posts = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
]);
?>

<div class="container-fluid slider-front">
    <?php if ($slider->have_posts()) : while ($slider->have_posts()) : $slider->the_post(); ?>
        <div class="slide" style="background-image: url('<?= the_post_thumbnail_url($slider, 'full'); ?>');">

        </div>
    <?php endwhile; else : ?>
        <p> A pas de slide</p>
    <?php endif; ?>
</div>


<div class="container mt-3 mb-3">
    <h2> <?= carbon_get_theme_option('title'); ?> </h2>
    <p> <?= carbon_get_theme_option('description'); ?></p>
</div>

<div class="container">
    <div class="row">
        <h2> <?= carbon_get_theme_option('title-actu'); ?></h2>
        <?php if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post(); ?>
            <div class="col-md-4">
                <div class="m-3 post-card">
                    <div>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="post-card__img"
                             alt="Image de l'article :<?php the_title(); ?>">
                    </div>
                    <div class="post-card__content">
                        <h3 class="post-card__title"> <?php the_title(); ?></h3>
                        <p class="post-card__excerpt"> <?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="post-card__link btn btn-success">
                            Lire la suite ...
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; else : ?>
            <p> Il n'y a pas d'article à afficher.</p>
        <?php endif; ?>
    </div>
    <h2> <?= carbon_get_theme_option('title-mag'); ?></h2>
    <div class="row">
        <?php if ($magasinsVille->have_posts()) : while ($magasinsVille->have_posts()) : $magasinsVille->the_post(); ?>
            <div class="col-md-4">
                <div class="m-3 post-card">
                    <div>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="post-card__img"
                             alt="Image de l'article :<?php the_title(); ?>">
                    </div>
                    <div class="post-card__content">
                        <h3 class="post-card__title"> <?php the_title(); ?></h3>
                        <?php $villes = get_the_terms(get_the_ID(), 'sell_ville'); ?>
                        <div class="post-card__ville">
                            <?php if ($villes): ?>
                                <?php foreach ($villes as $ville) : ?>
                                    <p style="display: inline"><b> <?php echo $ville->name; ?></b></p>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="post-card__link btn btn-success">
                            Aller voir le magasin
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; else : ?>
            <p>Il n'y a pas de magasins</p>
        <?php endif; ?>
        <h2> <?= carbon_get_theme_option('title-sell'); ?></h2>
        <div class="row">
            <?php if ($products->have_posts()) : while ($products->have_posts()) : $products->the_post(); ?>
                <div class="col-md-4">
                    <div class="m-3 post-card">
                        <div>
                            <img src="<?php the_post_thumbnail_url(); ?>" class="post-card__img"
                                 alt="Image de l'article :<?php the_title(); ?>">
                        </div>
                        <div class="post-card__content">
                            <h3 class="post-card__title"> <?php the_title(); ?></h3>
                            <?php $product = wc_get_product(get_the_ID()); ?>
                            <h2><?= $product->get_price(); ?> €</h2>
                            <a href="<?php the_permalink(); ?>" class="post-card__link btn btn-success">
                                Aller voir le magasin
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p> Il n'y a pas de produits à afficher</p>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
