<div class="p-template-works-main-visual">
    <figure class="p-template-works-main-visual__main-visual<?php if($args['cfs']->get('horizontal')) echo " p-template-works-main-visual__main-visual--horizontal"; ?>">
        <img src="<?php echo esc_url($args['cfs']->get('mainvisual')); ?>">
        <?php if($args['cfs']->get('caption')): ?>
            <figcaption><?php echo $args['cfs']->get('caption'); ?></figcaption>
        <?php endif; ?>
    </figure>
    <div class="p-template-works-main-visual__title-container">
        <h1 class="p-template-works-main-visual__title"><?php the_title(); ?></h1>
        <p class="p-template-works-main-visual__subtitle"><?php echo $args['cfs']->get('subtitle'); ?></p>
    </div>
    <div class="p-template-works-main-visual__info-wrapper">
        <div class="p-template-works-main-visual__info-container">
            <h3 class="p-template-works-main-visual__info-heading c-heading-black-background">会期</h3>
            <p class="p-template-works-main-visual__info-text next-detail-text"><?php echo esc_html($args['cfs']->get('date')); ?></p>
        </div>
        <div class="p-template-works-main-visual__info-container">
        <h3 class="p-template-works-main-visual__info-heading c-heading-black-background">会場</h3>
            <p class="p-template-works-main-visual__info-text"><?php echo esc_html($args['cfs']->get('venue')); ?></p>
        </div>
    </div>
</div>