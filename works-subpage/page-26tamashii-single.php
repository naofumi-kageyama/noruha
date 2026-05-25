<?php
/*
Template Name: 26tamashii-single
*/
?>
<?php get_header(); ?>
<main class="l-main p-26tamashii-single">
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
    <section class="p-26tamashii-single__card p-26tamashii-card">
        <div class="p-26tamashii-card__left">
            <div class="p-26tamashii-card__image">
                <?php
                    if(has_post_thumbnail( 478 )) {
                        echo get_the_post_thumbnail( 478, 'large' );
                    }
                ?>
            </div>
        </div>
        <div class="p-26tamashii-card__right">
            <h2 class="p-26tamashii-card__title">「いまのところまだ存在しているわたしのたましいが……」</h2>
            <dl class="p-26tamashii-card__info">
                <dt class="p-26tamashii-card__info-term c-heading-black-background">会期</dt>
                <dd class="p-26tamashii-card__info-description">2026年3月12日（木）～15日（日）</dd>
                <dt class="p-26tamashii-card__info-term c-heading-black-background">会場</dt>
                <dd class="p-26tamashii-card__info-description">吉祥寺シアター（東京都武蔵野市）</dd>
            </dl>
            <a href="<?php echo esc_url(home_url('/tamashii/')); ?>" class="c-button p-26tamashii-card__button">公演詳細</a>
        </div>
    </section>
</main>
<?php get_footer(); ?>