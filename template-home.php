<?php
/*
Template Name: Главная Страница
*/
?>

<div class="mb-home-carousel owl-carousel">
    <?php
    $slides = CFS()->get('home_slides');

    foreach ($slides as $slide) :
        $title = $slide['home_slide_title'];
        $content = $slide['home_slide_content'];
        $img_url = $slide['home_slide_image'];

        printf(
            '<div class="item" style="background: url(%s)"><h4>%s</h4><div class="mb-slide-content">%s</div></div>',
            trim($img_url), trim($title), trim($content)
        );
    endforeach;
    ?>
</div>

<div class="mb-catalog">
    <h2>КАТАЛОГ МЕБЕЛИ</h2>

    <div class="row">
        <?php
        $pages = CFS()->get('home_catalogues');

        foreach ($pages as $page_id) :
            $page = get_post($page_id);
            $post_thumbnail_id = get_post_thumbnail_id($page_id);
            $attachment_url = wp_get_attachment_url($post_thumbnail_id);
            //$alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);

            if (has_post_thumbnail($page->ID)) :

                ?>
                <div class="col-xs-6 col-sm-4 text-center">
                    <a href="<?php echo get_page_link($page_id); ?>">
                        <div class="mb-home-bigbtn mb-box"
                             style="background-image:url(<?php echo $attachment_url; ?>);"></div>
                        <h3><?php echo $page->post_title; ?></h3>
                    </a>
                </div>
            <?php

            endif;

        endforeach;
        ?>
    </div>
</div>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
