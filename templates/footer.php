<footer class="content-info" role="contentinfo">
    <div class="container">
        <?php dynamic_sidebar('footer-top'); ?>
        <div class="row">
            <div class="col-md-4">
                <?php dynamic_sidebar('footer-mid-1'); ?>
            </div>
            <div class="col-md-4">
                <?php dynamic_sidebar('footer-mid-2'); ?>
            </div>
            <div class="col-md-4">
                <?php dynamic_sidebar('footer-mid-3'); ?>
            </div>
        </div>
        <div class="row">
            <nav role="navigation" class="mb-footer-nav pull-right">
                <?php
                if (has_nav_menu('secondary_navigation')) :
                    wp_nav_menu(array(
                        'theme_location' => 'secondary_navigation',
                        'menu_class' => 'list-inline',
                        'link_after' => '<span>&nbsp;/</span>'
                    ));
                endif;
                ?>
            </nav>
        </div>
        <?php dynamic_sidebar('footer-bottom'); ?>
    </div>
</footer>

<?php get_template_part('templates/form', 'order'); ?>
<?php get_template_part('templates/form', 'call'); ?>
<?php get_template_part('templates/form', 'measure'); ?>

<?php wp_footer(); ?>
