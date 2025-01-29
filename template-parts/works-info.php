<div class="p-template-works-info">
    <div class="p-template-works-info__section">
        <h2 class="p-template-works-info__section-heading c-heading-black-background">人々</h2>
        <div class="p-template-works-info__member-list-container">
            <dl class="p-template-works-info__member-list js-open-profile-parent-wrapper">
                <?php
                    $fields = cfs()->get('people');
                    foreach ($fields as $field) :
                ?>
                    <div class="p-template-works-info__member-terms-container js-open-profile-parent">
                        <dt class="p-template-works-info__member-terms"><?php echo esc_html($field['role']); ?></dt>
                        <dd class="p-template-works-info__member-description js-open-profile-children-wrapper">
                            <?php
                                $fields = $field['individual'];
                                foreach ((array)$fields as $field):
                            ?>
                                <div class="p-template-works-info__member-container js-open-profile-container js-open-profile-child">
                                    <p class="p-template-works-info__member-name js-open-profile-button"><?php echo esc_html($field['name']); ?></p>
                                    <?php if(!empty($field['profile'])): ?>
                                        <div class="p-template-works-info__member-profile-container c-white-area js-open-profile-target">
                                            <button class="c-white-area__close-button js-open-profile-button"></button>
                                            <div class="p-template-works-info__member-profile c-rich-text">
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
            <p class="p-template-works-info__member-remarks js-open-profile-next-element"><?php echo esc_html($args['cfs']->get('remarks')); ?></p>
        </div>
        <div class="p-template-works-info__organizer-list-container">
            <dl class="p-template-works-info__organizer-list">
                <?php
                    $fields = cfs()->get('organizer'); //親ループ
                    foreach ($fields as $field) :
                ?>
                    <div class="p-template-works-info__organizer-terms-container">
                        <dt class="p-template-works-info__organizer-terms"><?php echo esc_html($field['role']); ?></dt>
                        <dd class="p-template-works-info__organizer-description">
                            <?php echo nl2br(esc_textarea($field['name'])); ?>
                            <?php if($field['imgs-true']): ?>
                                <!-- <div class="organizer-logo-wrap">
                                    <?php
                                        $fields = $field['logo-imgs']; //子ループ
                                        foreach ((array)$fields as $field):
                                    ?>
                                        <img src="<?php echo $field['logo-img']; ?>">
                                    <?php endforeach; ?>
                                </div> -->
                            <?php endif; ?>
                        </dd>
                    </div>
                <?php endforeach; ?>
            </dl>
            <?php if(!empty($args['cfs']->get('organizer-others'))) : ?>
                <div class="p-template-works-info__organizer-others">
                    <?php echo nl2br(esc_textarea($args['cfs']->get('organizer-others'))); ?>
                </div>
            <?php endif ; ?>
            <?php if(!empty($args['cfs']->get('logo-pc'))) : ?>
                <div class="p-template-works-info__logo-pc js-set-attr-size">
                    <?php echo apply_filters('the_content', $args['cfs']->get('logo-pc')); ?>
                </div>
                <div class="p-template-works-info__logo-sp js-set-attr-size">
                    <?php echo apply_filters('the_content', $args['cfs']->get('logo-sp')); ?>
                </div>
            <?php endif ; ?>
        </div>
        <?php if($args['additional_member']) : ?>
            <div class="p-template-works-info__additional">
                <?php echo $args['additional_member']; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="p-template-works-info__section">
        <h2 class="p-template-works-info__section-heading c-heading-black-background">日時</h2>
        <div class="p-template-works-info__timetable">
            <?php echo nl2br(esc_textarea($args['cfs']->get('timetable'))); ?>
        </div>
    </div>
    <div class="p-template-works-info__section">
        <h2 class="p-template-works-info__section-heading c-heading-black-background">料金</h2>
        <div class="p-template-works-info__price">
            <?php echo nl2br(esc_textarea($args['cfs']->get('price'))); ?>
        </div>
    </div>
    <div id="ticket" class="p-template-works-info__section">
        <h2 class="p-template-works-info__section-heading c-heading-black-background">チケット</h2>
        <div class="p-template-works-info__ticket">
            <?php echo apply_filters('the_content', $args['cfs']->get('ticket')); ?>
        </div>
    </div>
    <div class="p-template-works-info__section">
        <h2 class="p-template-works-info__section-heading c-heading-black-background">会場</h2>
        <div class="p-template-works-info__venue-name js-set-attr-size">
            <?php echo apply_filters('the_content', $args['cfs']->get('next-venue-logo')); ?>
        </div>
        <div class="p-template-works-info__venue-detail">
            <?php echo apply_filters('the_content', $args['cfs']->get('next-venue-detail')); ?>
        </div>
        <?php if($args['additional_venue']) : ?>
            <div class="p-template-works-info__additional">
                <?php echo $args['additional_venue']; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="p-template-works-info__section">
        <h2 class="p-template-works-info__section-heading c-heading-black-background">お問い合わせ</h2>
        <div class="p-template-works-info__contact">
            <?php echo apply_filters('the_content', $args['cfs']->get('contact')); ?>
        </div>
    </div>
</div>