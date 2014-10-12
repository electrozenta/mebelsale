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
        <?php dynamic_sidebar('footer-bottom'); ?>
    </div>
</footer>

<?php get_template_part('templates/form', 'order'); ?>
<?php get_template_part('templates/form', 'call'); ?>
<?php get_template_part('templates/form', 'measure'); ?>

<?php wp_footer(); ?>
