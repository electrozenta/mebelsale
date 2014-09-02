<?php

// Register Custom Post Type
function cpt_furniture() {

    $labels = array(
        'name'                => _x( 'Мебель', 'Post Type General Name', 'mebel' ),
        'singular_name'       => _x( 'Мебель', 'Post Type Singular Name', 'mebel' ),
        'menu_name'           => __( 'Мебель', 'mebel' ),
        'parent_item_colon'   => __( 'Родитель:', 'mebel' ),
        'all_items'           => __( 'Вся мебель', 'mebel' ),
        'view_item'           => __( 'Посмотреть мебель', 'mebel' ),
        'add_new_item'        => __( 'Добавить новый мебель', 'mebel' ),
        'add_new'             => __( 'Добавить новую', 'mebel' ),
        'edit_item'           => __( 'Изменить мебель', 'mebel' ),
        'update_item'         => __( 'Обновить мебель', 'mebel' ),
        'search_items'        => __( 'Поиск мебели', 'mebel' ),
        'not_found'           => __( 'Не найдено', 'mebel' ),
        'not_found_in_trash'  => __( 'Не найдено в корзине', 'mebel' ),
    );
    $args = array(
        'label'               => __( 'furniture', 'mebel' ),
        'description'         => __( 'Мебель', 'mebel' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => true,
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
    register_post_type( 'furniture', $args );

}

// Hook into the 'init' action
add_action( 'init', 'cpt_furniture', 0 );