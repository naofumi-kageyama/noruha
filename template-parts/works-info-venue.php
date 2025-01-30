<div class="c-works__info-section p-template-works-info-venue">
    <h2 class="c-works__info-section-heading c-heading-black-background">会場</h2>
    <div class="p-template-works-info-venue__name c-rich-text js-set-attr-size">
        <?php echo apply_filters('the_content', $args['cfs']->get('next-venue-logo')); ?>
    </div>
    <div class="p-template-works-info-venue__detail c-rich-text js-set-attr-size">
        <?php echo apply_filters('the_content', $args['cfs']->get('next-venue-detail')); ?>
    </div>
</div>