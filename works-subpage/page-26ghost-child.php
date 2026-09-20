<?php
/*
Template Name: 26ghost-child
*/
?>
<?php get_header(); ?>
<main class="l-main">
    <?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="c-article">
            <?php if(has_post_thumbnail()) : ?>
                <div class="c-article__thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <h1 class="c-article__title">
                <?php echo get_the_title(); ?>
            </h1>
            <article class="mb-[80px] c-content">
                <?php the_content(); ?>
            </article>
        </section>
    <?php endwhile; ?>
    <?php else: ?>
        <p>コンテンツがありません</p>
    <?php endif; ?>
    <section class="my-[100px] first:mt-0 last:mb-0 text-sm">
        <h2 class="c-heading--h2">公演情報</h2>
        <div class="flex flex-col gap-[30px] md:flex-row md:gap-[50px]">
            <div class="max-w-[450px]">
                <div class="mb-[10px]">
                    <?php echo wp_get_attachment_image(632, 'large'); ?>
                </div>
            </div>
            <div>
                <p class="text-sm md:text-base">資本主義社会で生きるアナタに…</p>
                <p class="text-lg md:text-xl">幽霊はここにいる（作・安部公房）</p>
                <div class="my-[1em] first:mt-0 last:mb-0">
                    <h2 class="w-fit p-[5px] leading-none bg-black text-[#d6d6d6] font-semibold mb-[0.5em]">会期</h2>
                    <div>
                        <p class="my-[1em] first:mt-0 last:mb-0">2026年9月23日（水・祝）〜9月26日（土）</p>
                    </div>
                </div>
                <div class="my-[1em] first:mt-0 last:mb-0">
                    <h2 class="w-fit p-[5px] leading-none bg-black text-[#d6d6d6] font-semibold mb-[0.5em]">会場</h2>
                    <div>
                        <p class="my-[1em] first:mt-0 last:mb-0">森下スタジオ Cスタジオ（東京都江東区）</p>
                    </div>
                </div>
                <div class="my-[1em] first:mt-0 last:mb-0">
                    <h2 class="w-fit p-[5px] leading-none bg-black text-[#d6d6d6] font-semibold mb-[0.5em]">人々</h2>
                    <div>
                        <dl class="grid grid-cols-[auto_1fr] gap-x-[1em]">
                            <dt>演出</dt>
                            <dd>カゲヤマ気象台*</dd>
                            <dt>出演</dt>
                            <dd>
                                キヨスヨネスク（humunus）<br>
                                瀧腰教寛<br>
                                畠山峻*（PEOPLE太）<br>
                                日和下駄*<br>
                                深澤しほ<br>
                                油井文寧（Dr. Holiday Laboratory）
                            </dd>
                        </dl>
                        <p>*＝円盤に乗る派プロジェクトチーム</p>
                    </div>
                </div>
                <a class="c-button" href="<?php echo esc_url(home_url('/the-ghost-is-here/')); ?>">公演詳細</a>
            </div>
        </div>
    </section>
</main>
<a class="c-floating-button" href="<?php echo esc_url(home_url('/the-ghost-is-here/')); ?>#ticket">TICKET</a>
<?php get_footer(); ?>