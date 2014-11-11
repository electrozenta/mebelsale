<?php
/*
Template Name: Галерея
*/
?>
<div class="mb-gallery">

    <?php
    $galleries = get_pages(array(
        'child_of' => $post->ID,
        'parent' => $post->ID,
        'hierarchical' => 1,
        //'meta_key' => '_wp_page_template',
        //'meta_value' => 'template-gallery.php',
        'sort_column' => 'menu_order',
        'sort_order' => 'asc',
    ));

    ?>
    <div class="row">
        <?php

        foreach ($galleries as $gallery) {
            $url = wp_get_attachment_url( get_post_thumbnail_id($gallery->ID) );
            $img = get_the_post_thumbnail( $gallery->ID, "furniture gallery", array(
                'class' => 'img-responsive'
            ) );
            $title = $gallery->post_title;
            ?>
            <div class="col-xs-6 col-sm-4">
                <div class="mb-gallery-item mb-box">
                    <h2><a href="<?php echo get_page_link($gallery->ID); ?>"><?php echo $img; ?><?php echo $title; ?></a></h2>
                </div>
            </div>
        <?php
        }

        ?>
    </div>
</div>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
