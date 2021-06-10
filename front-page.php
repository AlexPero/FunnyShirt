<?php get_header(); ?>
<?php
$slider = new WP_Query([
    'post_type' => 'slider',
    'posts_per_page' => 2,
]);
$posts = new WP_Query([
    'post-type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
])
?>

<div class="container-fluid slider-front">
    <?php if ($slider->have_posts()) : while ($slider->have_posts()) : $slider->the_post(); ?>
        <div class="slide" style="background-image: url('<?= the_post_thumbnail_url($slider, 'full'); ?>');">

        </div>
    <?php endwhile; else : ?>
        <p> A pas de slide</p>
    <?php endif; ?>
</div>

<hr>
<!--
    Présentation du site
-->
<hr>

<div class="container">
    <div class="row">
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
</div>


<?php get_footer(); ?>
