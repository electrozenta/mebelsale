<?php
/*
Template Name: Отзывы
*/
?>
<?php wp_list_comments(); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <div class="mb-content mb-box mb-content-page">
        <?php comments_template('/templates/reviews.php'); ?>
    </div>
<?php endwhile; ?>


