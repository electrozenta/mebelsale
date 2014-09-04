<?php
/*
Template Name: Главная Страница
*/
?>
<div class="mb-catalog">
    <h1>КАТАЛОГ ПРОДУКЦИИ</h1>
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
                <div class="col-xs-6 col-md-4">
                    <h2><a href="<?php echo get_page_link($page_id); ?>"
                           style="background-image:url(<?php echo $attachment_url; ?>);"  class="mb-box"><?php echo $page->post_title; ?></a>
                    </h2>
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
