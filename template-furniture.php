<?php
/*
Template Name: Мебель
*/
?>
<div class="row">
    <div class="col-md-4">
        <?php

        $furl = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $fimg = get_the_post_thumbnail($page->ID, 'furniture details');

        printf('<a href="%s" class="mb-box mb-content">%s</a>', $furl, $fimg);

        $images = CFS()->get('furniture_images');

        foreach ($images as $image) :
            $id = $image['furniture_image'];
            $img = wp_get_attachment_image($id, 'furniture small', array(
                'class' => "img-responsive",
            ));
            $url = wp_get_attachment_url($id);

            printf('<a href="%s">%s</a>', $url, $img);
        endforeach;
        ?>
    </div>

<div class="col-md-8">
    <div class="furniture-full mb-box mb-content">
        <?php

        the_title('<h1>', '</h1>');

        $about_label = CFS()->get_field_info('furniture_about')['label'];
        $about = CFS()->get('furniture_about');

        echo '<h2>' . $about_label . ':</h2> ' . $about;


        $info_label = CFS()->get_field_info('furniture_info')['label'];
        $info = CFS()->get('furniture_info');

        echo '<h2>' . $info_label . ':</h2> ' . $info;


        $price_label = CFS()->get_field_info('furniture_price')['label'];
        $price = CFS()->get('furniture_price');

        echo '<p>' . $price_label . ': ' . $price . ' руб.</p>';

        ?>

    </div>
</div>
</div>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
