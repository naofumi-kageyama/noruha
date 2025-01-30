<?php
/*
Template Name: 24kasou-child
*/
?>
<?php get_header(); ?>
<main class="l-main p-24kasou-child">
    <?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="p-24kasou-child__section p-24kasou-child-article">
            <?php if(has_post_thumbnail()) : ?>
                <div class="p-24kasou-child-article__thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <h1 class="p-24kasou-child-article__heading">
                <?php echo get_the_title(); ?>
            </h1>
            <article class="p-24kasou-child-article__content c-content">
                <?php the_content(); ?>
            </article>
            <div class="p-24kasou-child-article__profile-container">
                <?php
                    $profiles = cfs()->get('profile');
                    foreach ($profiles as $profile) :
                ?>
                    <?php if($profile['image']) : ?>
                        <div class="p-24kasou-child-article__profile-image">
                            <?php echo wp_get_attachment_image($profile['image'], 'medium'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="p-24kasou-child-article__profile-text-containter">
                        <p class="p-24kasou-child-article__profile-name"><?php echo esc_html($profile['name']); ?></p>
                        <div class="p-24kasou-child-article__profile-text">
                            <?php echo apply_filters('the_content', $profile['profile-text']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endwhile; ?>
    <?php else: ?>
        <p>コンテンツがありません</p>
    <?php endif; ?>
    <section class="p-24kasou-child__section p-24kasou-child-info">
        <h2 class="p-24kasou-child-info__heading">公演情報</h2>
        <div class="p-24kasou-child-info__image">
            <?php echo wp_get_attachment_image(254, 'large'); ?>
        </div>
        <p class="p-24kasou-child-info__subtitle">「東京芸術祭 2024」参加</p>
        <p class="p-24kasou-child-info__title">『仮想的な失調』</p>
        <div class="p-24kasou-child-info__content">
            <div class="p-24kasou-child-info__section">
                <h3 class="p-24kasou-child-info__section-heading">会期</h3>
                <div class="p-24kasou-child-info__text-container">
                    <p class="p-24kasou-child-info__text">2024年9月19日（木）〜9月22日（日・祝）</p>
                </div>
            </div>
            <div class="p-24kasou-child-info__section">
                <h3 class="p-24kasou-child-info__section-heading">会場</h3>
                <div class="p-24kasou-child-info__text-container">
                    <p class="p-24kasou-child-info__text">
                        東京芸術劇場 シアターウエスト
                    </p>
                    <p class="p-24kasou-child-info__text">
                        JR・東京メトロ・東武東上線・西武池袋線 池袋駅西口より徒歩2分。駅地下通路2b出口と直結しています。<br>
                        〒171-0021 東京都豊島区西池袋1-8-1<br>
                        <a href="https://www.geigeki.jp/" target="_blank">https://www.geigeki.jp/</a>
                    </p>
                </div>
            </div>
            <div class="p-24kasou-child-info__section">
                <h3 class="p-24kasou-child-info__section-heading">人々</h3>
                <div class="p-24kasou-child-info__text-container">
                    <dl class="p-24kasou-child-info__list">
                        <dt>演出</dt>
                        <dd>カゲヤマ気象台*、蜂巣もも（グループ・野原）</dd>
                        <dt>脚本</dt>
                        <dd>カゲヤマ気象台*</dd>
                        <dt>出演</dt>
                        <dd>
                            辻村優子<br>
                            鶴田理紗（白昼夢）<br>
                            橋本 清（ブルーノプロデュース／y/n）<br>
                            畠山 峻*（PEOPLE太）<br>
                            日和下駄*
                        </dd>
                    </dl>
                    <p>*＝円盤に乗る派プロジェクトチーム</p>
                </div>
            </div>
            <div class="p-24kasou-child-info__section">
                <div class="p-24kasou-child-info__text-container">
                    <p class="p-24kasou-child-info__text">公演特設ページ：<a href="<?php echo esc_url(get_page_link(239)); ?>"><?php echo esc_url(get_page_link(239)); ?></a></p>
                </div>
            </div>
        </div>
    </section>
</main>
<a class="c-floating-button" href="<?php echo esc_url(get_page_link(239)); ?>#ticket">TICKET</a>
<?php get_footer(); ?>