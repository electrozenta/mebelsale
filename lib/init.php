<?php
/**
 * Roots initial setup and constants
 */
function roots_setup()
{
    // Make theme available for translation
    // Community translations can be found at https://github.com/roots/roots-translations
    load_theme_textdomain('roots', get_template_directory() . '/lang');

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus(array(
        'primary_navigation' => __('Главная', 'roots')
    ));

    register_nav_menus(array(
        'secondary_navigation' => __('Подвал', 'roots')
    ));

    // Add post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    add_image_size('furniture thumbnail', 150, 200, array('center', 'center'));
    add_image_size('furniture details', 200, 260, array('center', 'center'));
    add_image_size('furniture small', 85, 115, array('center', 'center'));

    // Add post formats
    // http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

    // Add HTML5 markup for captions
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', array('caption'));

    // Tell the TinyMCE editor to use a custom stylesheet
    add_editor_style('/assets/css/editor-style.css');
}

add_action('after_setup_theme', 'roots_setup');

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



//Shortcodes

// Add Shortcode
function bs3_row_shortcode( $atts , $content = null ) {

    // Code
    return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'row', 'bs3_row_shortcode' );


// Add Shortcode
function bs3_col_shortcode( $atts , $content = null ) {

    // Attributes
    extract( shortcode_atts(
            array(
                'n' => '2',
            ), $atts )
    );

    // Code
    //return printf( '<div class="col-sm-%s">%s</div>', 12 / $atts['n'], $c );
    return '<div class="col-md-' . 12 / $n . '">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'col', 'bs3_col_shortcode' );


//Disable HTML in comments
function disable_html_in_comments()
{
    global $allowedtags;
    $allowedtags = array();
}
disable_html_in_comments();

//disable website field in comments
add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
    if(isset($fields['url']))
        unset($fields['url']);
    return $fields;
}