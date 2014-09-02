<?php

// Register Custom Post Type
function cpt_color_palette() {

    $labels = array(
        'name'                => _x( 'Цветовые палитры', 'Post Type General Name', 'mebel' ),
        'singular_name'       => _x( 'Цветовая палитра', 'Post Type Singular Name', 'mebel' ),
        'menu_name'           => __( 'Цветовая палитра', 'mebel' ),
        'parent_item_colon'   => __( 'Родитель:', 'mebel' ),
        'all_items'           => __( 'Вся палитра', 'mebel' ),
        'view_item'           => __( 'Посмотреть палитру', 'mebel' ),
        'add_new_item'        => __( 'Добавить новую палитру', 'mebel' ),
        'add_new'             => __( 'Добавить новую', 'mebel' ),
        'edit_item'           => __( 'Изменить палитру', 'mebel' ),
        'update_item'         => __( 'Обновить палитру', 'mebel' ),
        'search_items'        => __( 'Поиск палитри', 'mebel' ),
        'not_found'           => __( 'Не найдено', 'mebel' ),
        'not_found_in_trash'  => __( 'Не найдено в корзине', 'mebel' ),
    );
    $args = array(
        'label'               => __( 'color_palette', 'mebel' ),
        'description'         => __( 'Цветовые палитры для мебели', 'mebel' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'color_palette', $args );

}

// Hook into the 'init' action
add_action( 'init', 'cpt_color_palette', 0 );