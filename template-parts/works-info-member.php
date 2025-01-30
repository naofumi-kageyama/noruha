<div class="c-works__info-section p-template-works-info-member">
    <h2 class="c-works__info-section-heading c-heading-black-background">人々</h2>
    <div class="p-template-works-info-member__list-container">
        <dl class="p-template-works-info-member__list js-open-profile-parent-wrapper">
            <?php
                $fields = cfs()->get('people');
                foreach ($fields as $field) :
            ?>
                <div class="p-template-works-info-member__terms-container js-open-profile-parent">
                    <dt class="p-template-works-info-member__terms"><?php echo esc_html($field['role']); ?></dt>
                    <dd class="p-template-works-info-member__description js-open-profile-children-wrapper">
                        <?php
                            $fields = $field['individual'];
                            foreach ((array)$fields as $field):
                        ?>
                            <div class="p-template-works-info-member__container js-open-profile-container js-open-profile-child">
                                <p class="p-template-works-info-member__name js-open-profile-button"><?php echo esc_html($field['name']); ?></p>
                                <?php if(!empty($field['profile'])): ?>
                                    <div class="p-template-works-info-member__profile-container c-white-area js-open-profile-target">
                                        <button class="c-white-area__close-button js-open-profile-button"></button>
                                        <div class="p-template-works-info-member__profile c-rich-text">
                                            <?php echo apply_filters("the_content", $field['profile']); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </dd>
                </div>
            <?php endforeach; ?>
        </dl>
        <p class="p-template-works-info-member__remarks js-open-profile-next-element"><?php echo esc_html($args['cfs']->get('remarks')); ?></p>
    </div>
    <div class="p-template-works-info-member__organizer-list-container">
        <dl class="p-template-works-info-member__organizer-list">
            <?php
                $fields = cfs()->get('organizer'); //親ループ
                foreach ($fields as $field) :
            ?>
                <div class="p-template-works-info-member__organizer-terms-container">
                    <dt class="p-template-works-info-member__organizer-terms"><?php echo esc_html($field['role']); ?></dt>
                    <dd class="p-template-works-info-member__organizer-description">
                        <?php echo nl2br(esc_textarea($field['name'])); ?>
                    </dd>
                </div>
            <?php endforeach; ?>
        </dl>
        <?php if(!empty($args['cfs']->get('organizer-others'))) : ?>
            <div class="p-template-works-info-member__organizer-others">
                <?php echo nl2br(esc_textarea($args['cfs']->get('organizer-others'))); ?>
            </div>
        <?php endif ; ?>
        <?php if(!empty($args['cfs']->get('logo-pc'))) : ?>
            <div class="p-template-works-info-member__logo-pc js-set-attr-size">
                <?php echo apply_filters('the_content', $args['cfs']->get('logo-pc')); ?>
            </div>
            <div class="p-template-works-info-member__logo-sp js-set-attr-size">
                <?php echo apply_filters('the_content', $args['cfs']->get('logo-sp')); ?>
            </div>
        <?php endif ; ?>
    </div>
</div>