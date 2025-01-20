<?php
/*
Template Name: top
*/
?>

<?php get_header(); ?>
<div class="renewal">
    <main class="p-top">
        <?php /* ここから左側 */ ?>
        <section class="p-top__section p-top__left p-top-next-section">
            <div class="p-top__section-inner">
                <?php while (have_posts()) :
                    the_post();
                ?>
                    <div class="top-left-title">
                        <p>
                            <?php
                                $values = cfs()->get('label');
                                foreach ( $values as $key => $label ):
                            ?>
                                <?php echo $label; ?>
                            <?php endforeach; ?>
                        </p>
                    </div>

                    <div class="top-next-visual">
                        <a href="<?php echo get_page_link('392'); ?>"><img src="<?php echo $cfs->get('next-mainvisual'); ?>"></a>
                    </div>
                    <div class="next-title-wrapper">
                        <p class="next-title"><?php echo $cfs->get('title'); ?></p>
                        <p class="next-subtitle"><?php echo $cfs->get('subtitle'); ?></p>
                    </div>

            <div class="top-next-wrapper">
                <div class="top-next-detail">
                    <div class="top-next-date-wrapper">
                        <p class="top-next-detail-title">会期</p>
                        <div class="top-next-detail-contents">
                            <p><?php echo $cfs->get('date'); ?></p>
                        </div>
                    </div>
                    <div class="top-next-venue-wrapper">
                        <p class="top-next-detail-title">会場</p>
                        <div class="top-next-detail-contents">
                            <p class="top-next-venue-name"><?php echo $cfs->get('venue'); ?></p>
                            <p>
                                <?php echo $cfs->get('venue-detail'); ?><br>
                                <a href="<?php $venueUrl = $cfs->get('venue-url'); echo esc_url($venueUrl); ?>" target="blank"><?php $venueUrl = $cfs->get('venue-url'); echo esc_url($venueUrl); ?></a>
                            </p>
                        </div>
                    </div>
                    <?php
                        $fields = cfs()->get('people');
                        if(!empty($fields)) :
                    ?>
                        <div class="top-next-people-wrapper">
                            <p class="top-next-detail-title">人々</p>
                            <div class="top-next-detail-contents">
                                <?php
                                    foreach ($fields as $field) :
                                ?>
                                    <div class="top-next-people">
                                        <div class="top-next-role">
                                            <p><?php echo $field['role']; ?></p>
                                        </div>
                                        <div class="top-next-name">
                                            <p>
                                                <?php echo $field['name']; ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif ; ?>
                </div>

                        <div class="top-next-copy hide">
                            <p>地下室に指示を待つ殺し屋が二人。傍には料理昇降機（ダム・ウェイター）。 不条理演劇の金字塔に《円盤に乗る派》が挑む！</p>
                        </div>
                        <div class="top-next-description hide">
                            <p>
                                「まるで、海の向こうの国から届くラジオの電波みたいに、不安定なまま、振動していた。それがおれの命だった。」<br>
                                円盤に乗る派の新作公演『仮想的な失調』は、二つの古典作品を下敷きにした物語です。ひとつは、自分の名前すら忘れてしまう坊主を主人公とした狂言「名取川」。もうひとつは、源義経の西国落ちを題材にとり、涙の別れをする静御前と、かつて義経に滅ぼされた平家の亡霊を一人二役で演じる能「船弁慶」。常に複数のSNSを使い分け、様々なアイデンティティを駆使する現代の生活に向けて、これらの物語の新たな語り直しを試みます。そこから幽霊のように立ち上がってくるのは、私たちが根本的に抱えている根拠のない不安や、どこか既視感のある不気味さ。その先に、顔の見えないまま欲望が作用し合い、そのもつれが原因不明の"失調"を引き起こす現代社会のシステムを見つめ直すこともできるかもしれません。演出には、2020年の『おはようクラブ』でもコラボレーションした蜂巣ももを再び迎え、カゲヤマ気象台との新たな共同体制で挑みます。
                            </p>
                        </div>
                    </div>

                    <div class="top-next-button">
                        <a href="<?php echo get_page_link('392'); ?>">詳細</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>

        <?php /* ここから右側 */ ?>
        <section class="p-top__section p-top__right p-top-main-section">
            <div class="p-top__section-inner">

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