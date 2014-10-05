<?php
$thecontent = trim(get_the_content());

$top_content = CFS()->get('content_top_rows');
$bottom_content = CFS()->get('content_bottom_rows');

print('<div class="mb-content-page">');
print('<div class="row">');

foreach ($top_content as $content) :
    $size = key($content['content_top_size']);
    $text = $content['content_top_row'];
    printf('<div class="col-sm-%s"><div class="mb-content mb-box">%s</div></div>', $size, $text);
endforeach;

if (!empty($thecontent)) :
?>
    <div class="col-sm-12"><div class="mb-content mb-box"><?php the_content(); ?></div></div>
<?php
endif;

foreach ($bottom_content as $content) :
    $size = key($content['content_bottom_size']);
    $text = $content['content_bottom_row'];
    printf('<div class="col-sm-%s"><div class="mb-content mb-box">%s</div></div>', $size, $text);
endforeach;

print('</div>');
print('</div>');
?>

<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>