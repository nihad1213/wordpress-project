<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    
    <h2><a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a></h2>
    <p><?= get_the_content(); ?></p>
    <hr>

<?php endwhile; ?>

<?php get_footer(); ?>