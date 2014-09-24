<?php
/*
Template Name: Галерея
*/
?>
<div class="mb-gallery">

    <?php
    $galleries = get_pages(array(
        'child_of' => $post->ID,
        'hierarchical' => 1,
        'meta_key' => '_wp_page_template',
        //'meta_value' => 'template-catalog.php',
        'sort_column' => 'menu_order',
        'sort_order' => 'asc',
    ));

    ?>
    <div class="row">
        <?php

        foreach ($galleries as $gallery) {
            $url = wp_get_attachment_url( get_post_thumbnail_id($gallery->ID) );
            ?>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <h2><a href="<?php echo get_page_link($gallery->ID); ?>" style="background-image:url(<?php echo $url; ?>);" class="mb-box"><?php echo $gallery->post_title; ?></a></h2>
            </div>
        <?php
        }

        ?>
    </div>
</div>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
