<?php
/*
Template Name: Каталог
*/
?>
<div class="mb-catalog">

    <?php
    $catalogues = get_pages(array(
        'child_of' => $post->ID,
        'hierarchical' => 1,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-catalog.php',
        'sort_column' => 'menu_order',
        'sort_order' => 'asc',
    ));

    ?>
    <div class="row">
        <?php

        foreach ($catalogues as $catalog) {
            $url = wp_get_attachment_url( get_post_thumbnail_id($catalog->ID) );
            ?>
            <div class="col-xs-6 col-md-4">
                <h2><a href="<?php echo get_page_link($catalog->ID); ?>" style="background-image:url(<?php echo $url; ?>);"><?php echo $catalog->post_title; ?></a></h2>
            </div>
        <?php
        }

        ?>
    </div>
</div>


    <?php
    $furniture = get_pages(array(
        'child_of' => $post->ID,
        'hierarchical' => 1,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-furniture.php',
        'sort_column' => 'menu_order',
        'sort_order' => 'asc',
    ));

    ?>
    <ul class="row mb-furniture">
        <?php

        foreach ($furniture as $item) {

            $post_thumbnail_id = get_post_thumbnail_id($item->ID);
            $attachment_url = wp_get_attachment_url($post_thumbnail_id);
            $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);

            $price = CFS()->get('furniture_price', $item->ID);

            ?>
            <li class="col-sm-6 col-md-4">
                <div class="mb-furniture-item">
                    <?php echo get_the_post_thumbnail( $item->ID, array(200, 200) ); ?>
<!--                    <img src="--><?php //echo $attachment_url; ?><!--" alt="--><?php //if (count($alt)) echo $alt; ?><!--"/>-->
                    <h2><a href="<?php echo get_page_link($item->ID); ?>"><?php echo $item->post_title; ?></a></h2>
                    <p><?php echo "Цена: ".$price." руб."; ?></p>
                    <a href="<?php echo get_page_link($item->ID); ?>">подробнее...</a>
                    <a href="#" class="btn" role="button">купить</a>
                </div>
            </li>
        <?php
        }

        ?>
    </ul>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
