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
                </section>
                <section class="c-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-description', 'null', $args);
                    ?>
                </section>
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
                    <div id="club" class="c-works__info-section c-white-area c-content p-26tamashii-club">
                        <h2>乗る派クラブ#2「♨︎」1日限定オープン!</h2>
                        <p>演劇プロジェクト《円盤に乗る派》の作品を観たあとには、一定数の不思議な声が寄せられています。</p>
                        <p>「頭痛が治った」「整った」「健康になった」</p>
                        <p>演劇作品を観て、健康がもたらされるとは……?<br>そんな噂に着想を得て、第二回《乗る派クラブ》を開催します。</p>
                        <p>《乗る派クラブ》が、『「いまのところまだ存在しているわたしのたましいが……」』の上演されていない劇場空間を"間借り"。サウンド・プラクティショナー（音響実践家）の増田義基さんをお招きして、一日限りのサウンドシアターを開演します。</p>
                        <p>《乗る派》×「健康」をテーマに、テキスト・音楽・声をリミックスしながら、劇場型温泉♨︎をお届けします。どうぞ肩の力を抜いて、本編と合わせてお楽しみください。</p>
                        <h3>乗る派クラブ#2「♨︎」</h3>
                        <p>
                            日時：3月13日（金）19:00〜<br>
                            会場：吉祥寺シアター<br>
                            料金：2,000円<br>
                            お申込み：<a href="https://noruha-club-2.peatix.com" target="_blank" ref="noreferrer noopener">https://noruha-club-2.peatix.com</a>
                        </p>
                        <p>企画：中條玲、中村みなみ</p>
                        <div class="c-white-area">
                            <h3 class="js-open-profile-button">増田義基（Yoshiki Masuda）</h3>
                            <p>音響実践家 / サウンド・プラクティショナー<br>1996年栃木県生。東京藝術大学音楽環境創造科卒業後、演劇や映像作品、インスタレーション等のサウンドデザイン・作曲・PA・システム開発などを行う。<br>「かさねぎリストバンド」主宰。主な作品に「絶滅種の側から」「とてもとても大きな音が鳴らせるピンポン」「国歌斉唱」「ビオトープ探して」など。<br>昨年関わった作品に、植村真「夢の街」、オル太「Eternal Labor」、布施砂丘彦「まがとき」など。<br><a href="https://yoshikimasuda.com" target="_blank" ref="noreferrer noopener">https://yoshikimasuda.com</a></p>
                            <div class="p-26tamashii-club__image">
                                <img src="<?php echo esc_attr(get_template_directory_uri() . '/assets/images/image_masuda.jpg'); ?>" alt="増田義基のプロフィール画像" width="1200" height="800">
                            </div>
                        </div>
                        <div class="p-26tamashii-club__about">
                            <div class="p-26tamashii-club__about-left">
                                <h3>《乗る派クラブ》とは？</h3>
                                <p class="p-26tamashii-club__about-text">《円盤に乗る派》から派生して立ち上げられた企画チーム。創作チームとは異なる視点で多様な企画を行うことで、演劇公演を単なる作品発表の場から、ここに集う様々な人たちのための《場所》へと展開させることを目指す。</p>
                            </div>
                            <div class="p-26tamashii-club__about-right">
                                <div class="p-26tamashii-club__logo"><img src="<?php echo esc_attr(get_template_directory_uri() . '/assets/images/logo_club.png'); ?>" alt="乗る派クラブ" width="400" height="196"></div>
                            </div>
                        </div>
                    </div>
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