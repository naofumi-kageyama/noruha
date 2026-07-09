<footer class="l-footer">
    <?php if(is_home() || is_front_page()) : ?>
        <div class="l-footer__form-container js-form-container">
            <div class="l-footer__form-inner">
                <button class="c-close-button l-footer__close-button js-form-close"><span class="u-visually-hidden">close</span></button>
                <?php
                    echo do_shortcode('[contact-form-7 id="d704324" title="メルマガ登録" html_class="l-footer__form"]');
                ?>
            </div>
        </div>
    <?php else : ?>
        <p class="l-footer__copyright">&copy; <?php echo date('Y'); ?> noruha</p>
    <?php endif; ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>