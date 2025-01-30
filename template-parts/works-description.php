<div class="p-template-works-description">
    <p class="p-template-works-description__copy"><?php echo $args['cfs']->get('catch'); ?></p>
    <div class="p-template-works-description__text c-rich-text next-description">
        <?php echo apply_filters("the_content",$args['cfs']->get('description')); ?>
    </div>
    <?php if(!empty($post->post_content)): ?>
        <div class="p-template-works-description__content c-content">
            <?php the_content(); ?>
        </div>
    <?php endif; ?>
</div>