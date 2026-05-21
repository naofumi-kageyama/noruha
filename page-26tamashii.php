<?php
/*
Template Name: 26tamashii
*/
?>
<?php get_header(); ?>
<main class="l-main c-works p-26tamashii">
    <?php if (have_posts()): ?>
        <?php if( !post_password_required( $post->ID ) ) :  ?>
            <?php while (have_posts()): the_post(); ?>
                <section class="c-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-main-visual', 'null', $args);
                    ?>
                    <div class="c-works__additional-content c-white-area" >
                        <h3 class="p-26tamashii__toc-title">最新情報</h3>
                        <ul class="p-26tamashii__toc">
                            <li class="p-26tamashii__toc-item"><a href="<?php echo esc_url(get_page_link(575)); ?>">『「いまのところまだ存在しているわたしのたましいが……」』を観た日の日記（的なエッセイ）</a>を公開しました。(2026.5.1)</li>
                            <li class="p-26tamashii__toc-item"><a href="<?php echo esc_url(get_page_link(568)); ?>">『「いまのところまだ存在しているわたしのたましいが……」』を観た日の日記</a>を公開しました。(2026.5.1)</li>
                            <li class="p-26tamashii__toc-item">カゲヤマ気象台によるエッセイ<a href="<?php echo esc_url(get_page_link(530)); ?>">『演劇と私的』</a>に記事を追加しました。(2026.3.11)</li>
                            <li class="p-26tamashii__toc-item"><a href="<?php echo esc_url(get_page_link(548)); ?>">『「いまのところまだ存在しているわたしのたましいが……」』を観た日の日記をお寄せください</a>(2026.3.10)</li>
                            <li class="p-26tamashii__toc-item">カゲヤマ気象台によるエッセイ<a href="<?php echo esc_url(get_page_link(530)); ?>">『演劇と私的』</a>を公開しました。(2026.3.8)</li>
                            <li class="p-26tamashii__toc-item"><a href="<?php echo esc_url(get_page_link(509)); ?>">出演者変更のお知らせ</a>(2026.2.24)</li>
                            <li class="p-26tamashii__toc-item">ポッドキャスト<a href="<?php echo esc_url(get_page_link(490)); ?>" target="_blank">『日和下駄の歴史に刻め！』</a>がスタートしました。(2026.2.23)</li>
                            <li class="p-26tamashii__toc-item"><a href="<?php echo esc_url(get_page_link(518)); ?>">「乗る派クラブ#2「♨︎」」</a>の情報を公開しました。(2026.1.31)</li>
                        </ul>
                    </div>
                </section>
                <section class="c-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-description', 'null', $args);
                    ?>

                </section>
                <div id="club" class="c-works__info-section c-white-area c-content p-26tamashii-club">
                    <h2>乗る派クラブ#2「♨︎」1日限定オープン!</h2>
                    <div class="p-26tamashii-club__image">
                        <img src="<?php echo esc_attr(get_template_directory_uri() . '/assets/images/image_tamashii-club.png'); ?>" alt="いまのところまだ存在しているわたしのたましいが繰り返しこだまする空間が……" width="1080" height="1080">
                    </div>
                    <p>創作チームとは異なる視点で多様な企画を行うことで、演劇公演を単なる作品発表の場から、ここに集う様々な人たちのための《場所》へと展開させることを目指す《乗る派クラブ》。今回はサウンド・プラクティショナー（音響実践家）の増田義基さんをお招きし、『「いまのところまだ存在しているわたしのたましいが……」』の上演されていない劇場空間を"間借り"して一日限りのサウンドシアターを開演します。</p>
                    <p>
                        ●日時<br>
                        3月13日（金）19:00-21:00（入退場自由）<br>
                        ★19:30-20:00 / 20:30-21:00…コアタイム（ハウリングパフォーマンスあり）
                    </p>
                    <p>
                        ●会場<br>
                        吉祥寺シアター
                    </p>
                    <p>
                        ●料金<br>
                        一般…2,000円<br>
                        『「いまのところ…』チケットご購入の方…1,000円<br>
                        <small>※《乗る派クラブ》ロゴ入りオリジナルグッズをプレゼント（先着予約順・数量限定）</small>
                    </p>
                    <a href="<?php echo esc_url(get_page_link(518)); ?>" class="c-button p-26tamashii-club__button">詳細はこちら</a>
                    <div class="p-26tamashii-club__logo"><img src="<?php echo esc_attr(get_template_directory_uri() . '/assets/images/logo_club.png'); ?>" alt="乗る派クラブ" width="400" height="196"></div>
                    </div>
                <section class="c-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-member', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-timetable', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-price', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-ticket', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-venue', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-contact', 'null', $args);
                    ?>
                </section>
            <?php endwhile; ?>
        <?php else:  ?>
            <?php echo get_the_password_form(); ?>
        <?php endif;  ?>
    <?php endif;  ?>
</main>
<?php get_footer(); ?>