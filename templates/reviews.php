<?php
if (post_password_required()) {
    return;
}
?>

<section id="comments">
    <?php if (have_comments()) : ?>

        <ol class="media-list">
            <?php wp_list_comments(array('walker' => new Roots_Walker_Comment)); ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav>
                <ul class="pager">
                    <?php if (get_previous_comments_link()) : ?>
                        <li class="previous"><?php previous_comments_link(__('&larr; Ранние отзывы', 'roots')); ?></li>
                    <?php endif; ?>
                    <?php if (get_next_comments_link()) : ?>
                        <li class="next"><?php next_comments_link(__('Новые отзывы &rarr;', 'roots')); ?></li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
            <div class="alert alert-warning">
                <?php _e('Отзывы закрыты.', 'roots'); ?>
            </div>
        <?php endif; ?>
    <?php elseif(!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
        <div class="alert alert-warning">
            <?php _e('Отзывы закрыты.', 'roots'); ?>
        </div>
    <?php endif; ?>
</section><!-- /#comments -->

<section id="respond">
    <?php if (comments_open()) : ?>
        <h3><?php comment_form_title(__('Оставить отзыв', 'roots'), __('Оставить отзыв к %s', 'roots')); ?></h3>
        <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
        <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
            <p><?php printf(__('Вы должны быть <a href="%s">авторизованы</a> чтобы оставить отзыв.', 'roots'), wp_login_url(get_permalink())); ?></p>
        <?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <?php if (is_user_logged_in()) : ?>
                    <p>
                        <?php printf(__('Авторизованы как <a href="%s/wp-admin/profile.php">%s</a>.', 'roots'), get_option('siteurl'), $user_identity); ?>
                        <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Выйти из этой учетной записи', 'roots'); ?>"><?php _e('Выйти &raquo;', 'roots'); ?></a>
                    </p>
                <?php else : ?>
                    <div class="form-group">
                        <label for="author"><?php _e('Имя', 'roots'); if ($req) _e(' (обязательно)', 'roots'); ?></label>
                        <input type="text" class="form-control" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
                    </div>
                    <div class="form-group">
                        <label for="email"><?php _e('E-mail (не будет опубликован)', 'roots'); if ($req) _e(' (обязательно)', 'roots'); ?></label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="comment"><?php _e('Отзыв', 'roots'); ?></label>
                    <textarea name="comment" id="comment" class="form-control" rows="5" aria-required="true"></textarea>
                </div>
                <p><input name="submit" class="mb-btn-buy" type="submit" id="submit" value="<?php _e('Отправить отзыв', 'roots'); ?>"></p>
                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
        <?php endif; ?>
    <?php endif; ?>
</section><!-- /#respond -->
