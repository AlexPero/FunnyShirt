<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php endwhile; else : ?>

<?php endif; ?>


<div class="container">
    <?php woocommerce_content(); ?>
</div>

<?php get_footer(); ?>
