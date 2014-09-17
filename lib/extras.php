<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

//add class to CF7 form

add_filter( 'wpcf7_form_class_attr', 'add_custom_form_class_attr' );

function add_custom_form_class_attr( $class ) {
    $class .= ' form-horizontal';
    return $class;
}

define ('WPCF7_AUTOP', false );   // set to false to remove <br> tags
