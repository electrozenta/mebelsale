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
    add_image_size('furniture gallery', 360, 270, array('center', 'center'));

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


//Shortcodes


// Add Shortcode
function bs3_center_shortcode($atts, $content = null)
{

    // Code
    return '<div class="text-center">' . do_shortcode($content) . '</div>';
}

add_shortcode('center', 'bs3_center_shortcode');

// Add Shortcode
function bs3_row_shortcode($atts, $content = null)
{

    // Code
    return '<div class="row">' . do_shortcode($content) . '</div>';
}

add_shortcode('row', 'bs3_row_shortcode');


// Add Shortcode
function bs3_col_shortcode($atts, $content = null)
{

    // Attributes
    extract(shortcode_atts(
            array(
                'n' => '2',
            ), $atts)
    );

    // Code
    //return printf( '<div class="col-sm-%s">%s</div>', 12 / $atts['n'], $c );
    return '<div class="col-md-' . 12 / $n . '">' . do_shortcode($content) . '</div>';
}

add_shortcode('col', 'bs3_col_shortcode');


//Furniture Shortcode
function catalog_furniture_item($atts)
{
    // Attributes
    extract(shortcode_atts(
            array(
                'id' => '',
            ), $atts)
    );

    $item = get_post($id);


    $alt = get_post_meta($item->ID, _aioseop_title, true);

    $url = get_page_link($item->ID);

    $price = CFS()->get('furniture_price', $item->ID);


    $thumbnail = get_the_post_thumbnail($item->ID, 'furniture thumbnail', array(
        "class" => "img-responsive",
        "alt" => $alt
    ));

    $title = $item->post_title;


    return sprintf('<div class="mb-furniture-item mb-box">
                        <a href="%s">%s</a>
                        <h3><a href="%s">%s</a></h3>
                        <p>Цена: %s руб.</p>
                        <a href="%s" class="mb-details">подробнее...</a>
                        <a href="#" class="mb-btn-buy" role="button" data-toggle="modal" data-target="#order" data-url="%s">купить</a>
                    </div>', $url, $thumbnail, $url, $title, $price, $url, $url);
}

add_shortcode('mebel', 'catalog_furniture_item');


//Gallery Item Shortcode

function furniture_gallery_item($atts)
{
    // Attributes
    extract(shortcode_atts(
            array(
                'id' => '',
            ), $atts)
    );

    $gallery = get_post($id);

    $url = get_page_link($gallery->ID);
    $img = get_the_post_thumbnail($gallery->ID, "furniture gallery", array(
        'class' => 'img-responsive'
    ));
    $title = $gallery->post_title;

    return sprintf(
        '<div class="mb-gallery-item mb-box">
            <h2><a href="%s">%s%s</a></h2>
        </div>', $url, $img, $title);
}

add_shortcode('mebelgallery', 'furniture_gallery_item');


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
    if (isset($fields['url']))
        unset($fields['url']);
    return $fields;
}