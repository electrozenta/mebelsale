<?php
/*
Template Name: Шаблон Каталога
*/
?>
<div class="mb-catalog">
    <h1>КАТАЛОГ ПРОДУКЦИИ</h1>

    <?php
    $children = get_pages(array('child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc'));

    ?>
    <div class="row">
        <?php

        foreach ($children as $child) {
            $url = wp_get_attachment_url( get_post_thumbnail_id($child->ID) );
            ?>
            <div class="col-xs-6 col-md-4">
                <h2><a href="<?php echo get_page_link($child->ID); ?>" style="background-image:url(<?php echo $url; ?>);"><?php echo $child->post_title; ?></a></h2>
            </div>
        <?php
        }

        ?>
    </div>
</div>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
