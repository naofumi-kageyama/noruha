<?php
/*
Template Name: top
*/
?>

<?php get_header(); ?>
<div class="renewal">
    <main class="p-top">
        <section class="p-top__section p-top__left">
            <div class="p-top__section-inner p-top-next-section">
                <h2 class="p-top-next-section__heading top-left-title">Next Exhibition Information</h2>
                <div class="p-top-next-section__main-visual">
                    <a href="<?php echo esc_url($cfs->get('link')); ?>"><img src="<?php echo esc_url($cfs->get('next-mainvisual')); ?>"></a>
                </div>
                <div class="p-top-next-section__title-container">
                    <h3 class="p-top-next-section__title"><?php echo $cfs->get('title'); ?></h3>
                    <?php if(!empty($cfs->get('subtitle'))) : ?>
                        <p class="p-top-next-section__subtitle"><?php echo $cfs->get('subtitle'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="p-top-next-section__description-container">
                    <div class="p-top-next-section__description-section">
                        <h4 class="p-top-next-section__description-heading">会期</h4>
                        <div class="p-top-next-section__description-text-container">
                            <p class="p-top-next-section__date"><?php echo esc_html($cfs->get('date')); ?></p>
                        </div>
                    </div>
                    <div class="p-top-next-section__description-section">
                    <h4 class="p-top-next-section__description-heading">会場</h4>
                        <div class="p-top-next-section__description-text-container">
                            <p class="p-top-next-section__venue-name"><?php echo esc_html($cfs->get('venue')); ?></p>
                            <p class="p-top-next-section__venue-detail"><?php echo nl2br(esc_textarea($cfs->get('venue-detail'))); ?></p>
                            <p class="p-top-next-section__venue-url"><a href="<?php echo esc_url($cfs->get('venue-url')); ?>" target="blank"><?php echo esc_url($cfs->get('venue-url')); ?></a></p>
                        </div>
                    </div>
                    <?php
                        $fields = cfs()->get('people');
                        if(!empty($fields)) :
                    ?>
                        <div class="p-top-next-section__description-section">
                        <h4 class="p-top-next-section__description-heading">人々</h4>
                            <div class="p-top-next-section__description-text-container">
                                <?php foreach ($fields as $field) : ?>
                                    <dl class="p-top-next-section__people-list">
                                        <dt class="p-top-next-section__people-term"><?php echo esc_html($field['role']); ?></dt>
                                        <dd class="p-top-next-section__people-description"><?php echo nl2br(esc_textarea($field['name'])); ?></dd>
                                    </dl>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif ; ?>
                </div>
                <a class="p-top-next-section__button" href="<?php echo esc_url($cfs->get('link')); ?>">詳細</a>
            </div>
        </section>
        <section class="p-top__section p-top__right">
            <div class="p-top__section-inner p-top-main-section">
                <?php include('menu.php'); ?>
                <div class="p-top-main-section__copy-container js-marquee">
                    <p class="p-top-main-section__copy"><?php echo $cfs->get('catch'); ?></p>
                </div>
                <div class="p-top-main-section__main-visual-container">
                    <figure class="p-top-main-section__main-visual">
                        <img src="<?php echo esc_url($cfs->get('mainvisual')); ?>">
                        <figcaption><?php echo esc_url($cfs->get('mainvisual-credit')); ?></figcaption>
                    </figure>
                </div>
                <div id="declaration" class="p-top-main-section__section">
                    <h2 class="p-top-main-section__section-heading">円盤に乗る派宣言</h2>
                    <div class="p-top-main-section__section-content">
                        <p><?php echo esc_html($cfs->get('declaration')); ?></p>
                    </div>
                </div>
                <div class="p-top-main-section__section">
                    <h2 class="p-top-main-section__section-heading">円盤に乗る派について</h2>
                    <div class="p-top-main-section__section-content p-top-main-section__about-content">
                        <?php echo apply_filters('the_content', $cfs->get('noruha-profile')); ?>
                    </div>
                </div>
                <div class="p-top-main-section__section">
                    <h2 class="p-top-main-section__section-heading">プロジェクトメンバー</h2>
                    <div class="p-top-main-section__section-content p-top-main-section__members-content">
                        <div class="p-top-main-section__members-image">
                            <img src="<?php echo esc_url($cfs->get('artistphoto_members')); ?>">
                        </div>
                        <div class="p-top-main-section__members-column-wrapper">
                            <?php
                                $fields = cfs()->get('members-column'); //親ループ
                                foreach ($fields as $field) :
                            ?>
                                <div class="p-top-main-section__members-column js-member-open-column">
                                    <?php
                                        $fields = $field['member-wrapper']; //子ループ
                                        foreach ((array)$fields as $field):
                                    ?>
                                        <div class="p-top-main-section__member-container js-member-open-container">
                                            <div class="p-top-main-section__member-image-container js-member-open-button">
                                                <img class="p-top-main-section__member-image--off" src="<?php echo esc_url($field['artistphoto_off']); ?>">
                                                <img class="p-top-main-section__member-image--on" src="<?php echo esc_url($field['artistphoto_on']); ?>">
                                            </div>
                                            <h3 class="p-top-main-section__member-heading"><?php echo esc_html($field['member-name']); ?></h3>
                                            <div class="p-top-main-section__member-description js-member-open-target">
                                                <?php echo apply_filters('the_content', $field['member-description']); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <p class="p-top-main-section__members-image-credit js-member-open-next-element">Photography by Arata Mino</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>