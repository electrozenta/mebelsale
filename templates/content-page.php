<?php
$thecontent = trim(get_the_content());

if (!empty($thecontent)) : ?>
    <div class="mb-content mb-box"><?php the_content(); ?></div>
<?php endif ?>

<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>