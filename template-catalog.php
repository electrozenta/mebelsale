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
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <h2><a href="<?php echo get_page_link($catalog->ID); ?>" style="background-image:url(<?php echo $url; ?>);" class="mb-box"><?php echo $catalog->post_title; ?></a></h2>
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
            //$alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
            $alt = get_post_meta($item->ID, _aioseop_title, true);

            $price = CFS()->get('furniture_price', $item->ID);

            ?>
            <li class="col-xs-6 col-sm-4 col-lg-3">
                <div class="mb-furniture-item mb-box">
                    <a href="<?php echo get_page_link($item->ID); ?>">
                        <?php echo get_the_post_thumbnail( $item->ID, 'furniture thumbnail', array(
                            'class' => "img-responsive",
                            'alt' => $alt
                        )); ?>
                    </a>
                    <h3><a href="<?php echo get_page_link($item->ID); ?>"><?php echo $item->post_title; ?></a></h3>
                    <p><?php echo "Цена: ".$price." руб."; ?></p>
                    <a href="<?php echo get_page_link($item->ID); ?>" class="mb-details">подробнее...</a>
                    <a href="#" class="mb-btn-buy" role="button" data-toggle="modal" data-target="#order">купить</a>
                </div>
            </li>
        <?php
        }

        ?>
    </ul>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
