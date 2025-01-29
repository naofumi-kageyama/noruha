<?php get_header(); ?>

<section class="global-wrapper">
    <?php get_template_part('template-parts/nav'); ?>

    <div class="contents-wrapper">
        <?php if (have_posts()): ?>
        <?php while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <h1><?php echo get_the_title(); ?></h1>

                <article class="basicContent">
                    <?php the_content(); ?>
                </article>
                
            </div>
        <?php endwhile; ?>
        <?php else: ?>
        <!-- 投稿が無い場合の処理 -->
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>