<?php
/*
Template Name: top
*/
?>

<?php get_header(); ?>
<div class="renewal">
    <main class="p-top">
        <?php /* ここから左側 */ ?>
        <section class="p-top__section p-top__left">
            <div class="p-top__section-inner p-top-next-section">
                <?php while (have_posts()) :
                    the_post();
                ?>
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
                    <div class="p-top-next-section__title-area">
                        <h3 class="p-top-next-section__title"><?php echo $cfs->get('title'); ?></h3>
                        <?php if(!empty($cfs->get('subtitle'))) : ?>
                            <p class="p-top-next-section__subtitle"><?php echo $cfs->get('subtitle'); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="p-top-next-section__description-area">
                        <div class="p-top-next-section__description-section">
                            <h4 class="p-top-next-section__description-heading">会期</h4>
                            <div class="p-top-next-section__description-text-area">
                                <p class="p-top-next-section__date"><?php echo $cfs->get('date'); ?></p>
                            </div>
                        </div>
                        <div class="p-top-next-section__description-section">
                        <h4 class="p-top-next-section__description-heading">会場</h4>
                            <div class="p-top-next-section__description-text-area">
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
                                <div class="p-top-next-section__description-text-area">
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
                <?php endwhile; ?>
            </div>
        </section>

        <?php /* ここから右側 */ ?>
        <section class="p-top__section p-top__right">
            <div class="p-top__section-inner p-top-main-section">

                <?php include('menu.php'); ?>

                <div id="noruha-copy">
                    <p><?php echo $cfs->get('catch'); ?></p>
                </div>

                <div class="top-mainvisual">
                    <img src="<?php echo $cfs->get('mainvisual'); ?>">
                    <p><?php echo $cfs->get('mainvisual-credit'); ?></p>
                </div>

                <div id="declaration" class="top-right-title">
                    <p>円盤に乗る派宣言</p>
                </div>
                <div class="top-right-content">
                    <p><?php echo $cfs->get('declaration'); ?></p>
                </div>

                <div class="top-right-title">
                    <p>円盤に乗る派について</p>
                </div>
                <div class="top-right-content">
                    <?php echo $cfs->get('noruha-profile'); ?>
                </div>

                <?php /* ここからメンバー */ ?>
                <div class="members-area">
                    <div class="top-right-title">
                        <p>プロジェクトメンバー</p>
                    </div>
                    <div class="members-photo">
                        <img src="<?php echo $cfs->get('artistphoto_members'); ?>">
                    </div>
                    <div class="members-wrapper">

                        <?php
                            $fields = cfs()->get('members-column'); //親ループ
                            foreach ($fields as $field) :
                        ?>
                            <div class="members-column">
                                <?php
                                    $fields = $field['member-wrapper']; //子ループ
                                    foreach ((array)$fields as $field):
                                ?>
                                    <div class="member-wrapper">
                                        <div class="member-photo" >
                                            <img class="img-off" src="<?php echo $field['artistphoto_off']; ?>">
                                            <img class="img-on" src="<?php echo $field['artistphoto_on']; ?>">
                                        </div>
                                        <div class="member-detail">
                                            <div class="member-name">
                                                <p><?php echo $field['member-name']; ?></p>
                                            </div>
                                            <div class="member-description">
                                                <?php echo $field['member-description']; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="members-photo-credit">
                        <p>Photography by Arata Mino</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>