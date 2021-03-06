<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>

  <div class="wrap">
      <div class="container" role="document">
          <div class="content row">
              <?php if (roots_display_sidebar()) : ?>
                  <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
                      <?php include roots_sidebar_path(); ?>
                  </aside><!-- /.sidebar -->
              <?php endif; ?>
              <main class="main <?php echo roots_main_class(); ?>" role="main">
                  <?php
                  if ( function_exists('roots_bs3_breadcrumb') ) {
                      roots_bs3_breadcrumb();
                  }
                  ?>
                  <?php include roots_template_path(); ?>
              </main><!-- /.main -->
          </div><!-- /.content -->
      </div><!-- /.wrap -->
  </div>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
