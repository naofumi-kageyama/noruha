<?php
/*
Template Name: 24kasou-child
*/
?>
<?php get_header(); ?>
<main class="l-main">
    <?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="my-[100px] first:mt-0 last:mb-0">
            <?php if(has_post_thumbnail()) : ?>
                <div class="mb-[80px]">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <h1 class="text-2xl mb-[50px] md:text-3xl">
                <?php echo get_the_title(); ?>
            </h1>
            <article class="mb-[80px] c-content">
                <?php the_content(); ?>
            </article>
            <div class="flex flex-col gap-[1em] text-sm md:flex-row md:gap-[30px]">

                <?php
                    $image = get_field('image');
                    if(!empty($image)) :
                        ?>
                        <div class="w-full shrink-0 md:w-[300px]">
                            <img
                                src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_html($image['alt']); ?>"
                                width="<?php echo esc_attr($image['sizes'][ 'large-width' ]); ?>"
                                height="<?php echo esc_attr($image['sizes'][ 'large-height' ]); ?>"
                            >
                        </div>
                        <?php
                    endif;
                ?>
                <div>
                    <p class="mb-[1em]"><?php echo esc_html(get_field('name')); ?></p>
                    <div class="c-content">
                        <?php echo apply_filters('the_content', get_field('profile-text')); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
    <?php else: ?>
        <p>コンテンツがありません</p>
    <?php endif; ?>
    <section class="my-[100px] first:mt-0 last:mb-0 text-sm">
        <h2 class="text-2xl mb-[20px] md:text-3xl">公演情報</h2>
        <div class="mb-[10px]">
            <?php echo wp_get_attachment_image(254, 'large'); ?>
        </div>
        <p class="text-sm md:text-base">「東京芸術祭 2024」参加</p>
        <p class="text-xl md:text-2xl">『仮想的な失調』</p>
        <div class="mt-[30px]">
            <div class="my-[1em] first:mt-0 last:mb-0">
                <h3 class="w-fit p-[5px] leading-none bg-black text-[#d6d6d6] font-semibold mb-[0.5em]">会期</h3>
                <div>
                    <p class="my-[1em] first:mt-0 last:mb-0">2024年9月19日（木）〜9月22日（日・祝）</p>
                </div>
            </div>
            <div class="my-[1em] first:mt-0 last:mb-0">
                <h3 class="w-fit p-[5px] leading-none bg-black text-[#d6d6d6] font-semibold mb-[0.5em]">会場</h3>
                <div>
                    <p class="my-[1em] first:mt-0 last:mb-0">
                        東京芸術劇場 シアターウエスト
                    </p>
                    <p class="my-[1em] first:mt-0 last:mb-0">
                        JR・東京メトロ・東武東上線・西武池袋線 池袋駅西口より徒歩2分。駅地下通路2b出口と直結しています。<br>
                        〒171-0021 東京都豊島区西池袋1-8-1<br>
                        <a href="https://www.geigeki.jp/" target="_blank">https://www.geigeki.jp/</a>
                    </p>
                </div>
            </div>
            <div class="my-[1em] first:mt-0 last:mb-0">
                <h3 class="w-fit p-[5px] leading-none bg-black text-[#d6d6d6] font-semibold mb-[0.5em]">人々</h3>
                <div>
                    <dl class="grid grid-cols-[auto_1fr] gap-x-[1em]">
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
            <div class="my-[1em] first:mt-0 last:mb-0">
                <div>
                    <p class="my-[1em] first:mt-0 last:mb-0">公演特設ページ：<a href="<?php echo esc_url(home_url('/kasou2024/')); ?>"><?php echo esc_url(home_url('/kasou2024/')); ?></a></p>
                </div>
            </div>
        </div>
    </section>
</main>
<a class="c-floating-button" href="<?php echo esc_url(home_url('/kasou2024/')); ?>#ticket">TICKET</a>
<?php get_footer(); ?>
