<?php
/*
Template Name: Мебель
*/
?>
<div class="mb-furniture-full">
    <?php

    the_title( '<h1>', '</h1>' );

    $about_label = CFS()->get_field_info('furniture_about')['label'];
    $about = CFS()->get('furniture_about');

    echo '<h2>'.$about_label.':</h2> '.$about;


    $info_label = CFS()->get_field_info('furniture_info')['label'];
    $info = CFS()->get('furniture_info');

    echo '<h2>'.$info_label.':</h2> '.$info;


    $price_label = CFS()->get_field_info('furniture_price')['label'];
    $price = CFS()->get('furniture_price');

    echo '<p>'.$price_label.': '.$price.' руб.</p>';

    ?>

</div>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
