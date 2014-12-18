<?php

/**
 * Navigation Menu widget class for furniture
 *
 *
 */
class Mebel_Nav_Menu_Widget extends WP_Widget {

    public function __construct() {
        $widget_ops = array( 'description' => __('Add a custom menu for furniture to your sidebar.') );
        parent::__construct( 'mebel_nav_menu', __('Custom Menu for Furniture'), $widget_ops );
    }

    public function widget($args, $instance) {
        // Get menu
        $nav_menu = ! empty( $instance['mebel_nav_menu'] ) ? wp_get_nav_menu_object( $instance['mebel_nav_menu'] ) : false;

        if ( !$nav_menu )
            return;

        /** This filter is documented in wp-includes/default-widgets.php */
        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( !empty($instance['title']) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];

        wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu ) );

        echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        if ( ! empty( $new_instance['title'] ) ) {
            $instance['title'] = strip_tags( stripslashes($new_instance['title']) );
        }
        if ( ! empty( $new_instance['mebel_nav_menu'] ) ) {
            $instance['mebel_nav_menu'] = (int) $new_instance['mebel_nav_menu'];
        }
        return $instance;
    }

    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $nav_menu = isset( $instance['mebel_nav_menu'] ) ? $instance['mebel_nav_menu'] : '';

        // Get menus
        $menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );

        // If no menus exists, direct the user to go and create some.
        if ( !$menus ) {
            echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
            return;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('mebel_nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
            <select id="<?php echo $this->get_field_id('mebel_nav_menu'); ?>" name="<?php echo $this->get_field_name('mebel_nav_menu'); ?>">
                <option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
                <?php
                foreach ( $menus as $menu ) {
                    echo '<option value="' . $menu->term_id . '"'
                        . selected( $nav_menu, $menu->term_id, false )
                        . '>'. esc_html( $menu->name ) . '</option>';
                }
                ?>
            </select>
        </p>
    <?php
    }
}

add_action( 'widgets_init', function(){
    register_widget( 'Mebel_Nav_Menu_Widget' );
});



//Other Widgets

/**
 * Register sidebars
 */
function roots_widgets_init()
{
    register_sidebar(array(
        'name' => __('Боковая - первичный', 'roots'),
        'id' => 'sidebar-primary',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Боковая - вторичный', 'roots'),
        'id' => 'sidebar-secondary',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Боковая - Записи', 'roots'),
        'id' => 'sidebar-posts',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    //Header

    register_sidebar(array(
        'name' => __('Шапка - верхняя область', 'roots'),
        'id' => 'header-top',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    //Footer

    register_sidebar(array(
        'name' => __('Подвал - верхняя область', 'roots'),
        'id' => 'footer-top',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Подвал - середина 1/3', 'roots'),
        'id' => 'footer-mid-1',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Подвал - середина 2/3', 'roots'),
        'id' => 'footer-mid-2',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Подвал - середина 3/3', 'roots'),
        'id' => 'footer-mid-3',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Подвал - Нижняя область', 'roots'),
        'id' => 'footer-bottom',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'roots_widgets_init');

