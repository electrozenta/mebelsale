<?php
/*
Template Name: Мебель
*/
?>
<div class="row">
    <div class="col-md-4">
        <?php

        $furl = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $falt = CFS()->get('furniture_fimage_alt');
        $fimg = get_the_post_thumbnail($page->ID, 'furniture details', array(
            'class' => "img-responsive",
            'alt' => trim($falt),
        ));

        printf('<a href="%s" class="mb-box mb-content" rel=”lightbox[gallery-furniture]”>%s</a>', $furl, $fimg);

        $images = CFS()->get('furniture_images');

        ?>
        <div class="mb-thumbnail-carousel owl-carousel">
            <?php
            foreach ($images as $image) :
                $id = $image['furniture_image'];
                $alt = $image['furniture_image_alt'];
                $img = wp_get_attachment_image($id, 'furniture small', 0, array(
                    'class' => "img-responsive",
                    "alt" => trim($alt),
                ));
                $url = wp_get_attachment_url($id);

                printf('<a href="%s" class="mb-box mb-content mb-small item" rel=”lightbox[gallery-furniture]”>%s</a>', $url, $img);
            endforeach;
            ?>
        </div>
    </div>

    <div class="col-md-8">
        <div class="mb-furniture-full mb-box mb-content">
            <?php

            the_title('<h1>', '</h1>');

            $about_label = CFS()->get_field_info('furniture_about')['label'];
            $about = CFS()->get('furniture_about');

            printf('<h2>%s:</h2> %s', $about_label, $about);


            $info_label = CFS()->get_field_info('furniture_info')['label'];
            $info = CFS()->get('furniture_info');

            printf('<h2>%s:</h2> %s', $info_label, $info);


            $price_label = CFS()->get_field_info('furniture_price')['label'];
            $price = CFS()->get('furniture_price');

            printf('<p class="mb-price">%s: %s руб.</p>', $price_label, $price);

            ?>
            <a href="#" class="mb-btn-buy" role="button" data-toggle="modal" data-target="#order">купить</a>
            <a href="#">вызвать замерщика</a>
        </div>
    </div>
</div>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
