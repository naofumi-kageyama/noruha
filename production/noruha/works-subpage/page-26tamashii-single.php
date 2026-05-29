<?php
/*
Template Name: 26tamashii-single
*/
?>
<?php get_header(); ?>
<main class="l-main">
    <?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
        <article class="c-article">
            <?php if(has_post_thumbnail()) : ?>
                <div class="c-article__thumbnail">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>
            <h1 class="c-article__title"><?php the_title(); ?></h1>
            <div class="c-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
    <?php else: ?>
        <p>投稿がありません。</p>
    <?php endif; ?>
    <section class="mt-16 block md:flex md:gap-8 md:items-start">
        <div class="w-full mb-4 shrink-0 md:w-1/2 md:mb-0">
            <div class="[&_img]:m-0">
                <?php
                    if(has_post_thumbnail( 478 )) {
                        echo get_the_post_thumbnail( 478, 'large' );
                    }
                ?>
            </div>
        </div>
        <div>
            <h2 class="text-xl mb-4!">「いまのところまだ存在しているわたしのたましいが……」</h2>
            <dl class="text-base">
                <dt class="mb-2 c-heading--black">会期</dt>
                <dd class="mb-4">2026年3月12日（木）～15日（日）</dd>
                <dt class="mb-2 c-heading--black">会場</dt>
                <dd class="mb-4">吉祥寺シアター（東京都武蔵野市）</dd>
            </dl>
            <a href="<?php echo esc_url(home_url('/tamashii/')); ?>" class="c-button text-base block w-fit mx-auto md:inline-block md:w-auto md:mx-0">公演詳細</a>
        </div>
    </section>
</main>
<?php get_footer(); ?>
