<?php

$hideSidebar = CFS()->get('hide_sidebar');

if(!$hideSidebar) {
    if(is_single()) {
        $sidebar = 'sidebar-posts';
    }
    elseif(is_front_page()) {
        $sidebar = 'sidebar-primary';
    }
    elseif(is_page()) {
        $sidebar = 'sidebar-secondary';
    }
    else {
        $sidebar = 'sidebar-secondary';
    }

    dynamic_sidebar($sidebar);
}

?>
