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
                <h2 class="p-top-next-section__heading top-left-title">
                    <?php
                        $values = cfs()->get('label');
                        foreach ( $values as $key => $label ):
                    ?>
                        <?php echo $label; ?>
                    <?php endforeach; ?>
                </h2>
                <div class="p-top-next-section__main-visual">
                    <a href="<?php echo get_page_link('392'); ?>"><img src="<?php echo $cfs->get('next-mainvisual'); ?>"></a>
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
                            <p class="p-top-next-section__date"><?php echo $cfs->get('date'); ?></p>
                        </div>
                    </div>
                    <div class="p-top-next-section__description-section">
                    <h4 class="p-top-next-section__description-heading">会場</h4>
                        <div class="p-top-next-section__description-text-container">
                            <p class="p-top-next-section__venue-name"><?php echo $cfs->get('venue'); ?></p>
                            <p class="p-top-next-section__venue-detail"><?php echo $cfs->get('venue-detail'); ?></p>
                            <p class="p-top-next-section__venue-url"><a href="<?php $venueUrl = $cfs->get('venue-url'); echo esc_url($venueUrl); ?>" target="blank"><?php $venueUrl = $cfs->get('venue-url'); echo esc_url($venueUrl); ?></a></p>
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
                                        <dt class="p-top-next-section__people-term"><?php echo $field['role']; ?></dt>
                                        <dd class="p-top-next-section__people-description"><?php echo $field['name']; ?></dd>
                                    </dl>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif ; ?>
                </div>
                <a class="p-top-next-section__button" href="<?php echo get_page_link('392'); ?>">詳細</a>
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
                        <img src="<?php echo $cfs->get('mainvisual'); ?>">
                        <figcaption><?php echo $cfs->get('mainvisual-credit'); ?></figcaption>
                    </figure>
                </div>
                <div id="declaration" class="p-top-main-section__section">
                    <h2 class="p-top-main-section__section-heading">円盤に乗る派宣言</h2>
                    <div class="p-top-main-section__section-content">
                        <p><?php echo $cfs->get('declaration'); ?></p>
                    </div>
                </div>
                <div class="p-top-main-section__section">
                    <h2 class="p-top-main-section__section-heading">円盤に乗る派について</h2>
                    <div class="p-top-main-section__section-content p-top-main-section__about-content">
                        <?php echo $cfs->get('noruha-profile'); ?>
                    </div>
                </div>
                <div class="p-top-main-section__section">
                    <h2 class="p-top-main-section__section-heading">プロジェクトメンバー</h2>
                    <div class="p-top-main-section__section-content p-top-main-section__members-content">
                        <div class="p-top-main-section__members-image">
                            <img src="<?php echo $cfs->get('artistphoto_members'); ?>">
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
                                                <img class="p-top-main-section__member-image--off" src="<?php echo $field['artistphoto_off']; ?>">
                                                <img class="p-top-main-section__member-image--on" src="<?php echo $field['artistphoto_on']; ?>">
                                            </div>
                                            <h3 class="p-top-main-section__member-heading"><?php echo $field['member-name']; ?></h3>
                                            <div class="p-top-main-section__member-description js-member-open-target">
                                                <?php echo $field['member-description']; ?>
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