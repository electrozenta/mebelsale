<?php

//echo do_shortcode('[contact-form-7 id="228" title="Заказ"]');

?>

<!-- Modal -->
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">отправить заявку</h4>
            </div>
            <div class="modal-body">
                <p>Если вы определились с выбором и хотите узнать сколько стоит готовая
                    продукция, вы можете отправить нам сообщение и мы свяжемся с вами.</p>
                <?php echo do_shortcode('[contact-form-7 id="228" title="Заказ"]'); ?>
                <p>Если вы определились с выбором и хотите узнать сколько стоит ваш шкаф,
                    вы можете отправить нам сообщение и мы свяжемся с вами.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">отправить заявку</button>
            </div>
        </div>
    </div>
</div>