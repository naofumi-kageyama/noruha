<div class="renewal">
    <footer class="l-footer">
        <?php if(is_home() || is_front_page()) : ?>
            <div class="l-footer__form-container js-form-container">
                <button class="l-footer__close-button js-form-close"></button>
                <?php
                    echo do_shortcode('[contact-form-7 id="25" title="コンタクトフォーム 1" html_class="l-footer__form"]');
                ?>
            </div>
        <?php endif; ?>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>