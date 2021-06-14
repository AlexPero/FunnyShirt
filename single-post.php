<?php get_header(); ?>
<?php
$articles = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'post__not_in' => array(get_the_ID())
]);
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="container">
        <h1 class="title"><?php the_title(); ?></h1>
        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
        <br>
        <p><?php the_content(); ?></p>
        <hr>
        <div class="row">
            <h2><b>Les articles récents</b></h2>
            <?php if ($articles->have_posts()) : while ($articles->have_posts()) : $articles->the_post(); ?>
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

            <?php endif; ?>
        </div>
    </div>
<?php endwhile; else : ?>

<?php endif; ?>


<?php get_footer(); ?>
