<?php get_header(); ?>
<main class="l-main">
    <?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
        <article class="c-content">
            <?php if(has_post_thumbnail()) : ?>
                <div class="c-content__thumbnail">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </article>
    <?php endwhile; ?>
    <?php else: ?>
        <p>投稿がありません。</p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>