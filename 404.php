<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-warning">
  <?php _e('Извините, но страница, которую вы пытаетесь просмотреть, не существует.', 'roots'); ?>
</div>

<p><?php _e('Похоже, что это было результатом либо:', 'roots'); ?></p>
<ul>
  <li><?php _e('некорректный адрес', 'roots'); ?></li>
  <li><?php _e('устаревшая ссылка', 'roots'); ?></li>
</ul>

<?php get_search_form(); ?>
