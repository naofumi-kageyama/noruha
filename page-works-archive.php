<?php
/*
Template Name: works-archive
*/
?>
<?php
    $exerpt_url = array(
        array(
            'id' => 416,
            'url' => ''
        ),
        array(
            'id' => 419,
            'url' => ''
        ),
        array(
            'id' => 422,
            'url' => ''
        ),
        array(
            'id' => 429,
            'url' => ''
        ),
        array(
            'id' => 425,
            'url' => 'https://chasingwaterfalls.net/2020/'
        ),
        array(
            'id' => 432,
            'url' => 'https://chasingwaterfalls.net/'
        ),
    );
?>
<?php get_header(); ?>
<main class="l-main p-works-archive">
    <h1 class="c-heading--h1"><?php the_title(); ?></h1>
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <?php
                $args = array(
                    'post_type' => 'page',
                    'meta_query'=> array(
                        array(
                            'key'     => 'mainvisual',
                            'value'   => '',
                            'compare' => '!='
                        )
                    ),
                    'post__not_in'=> array(
                        140,
                    ),
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'DESC',
                    'has_password' => false,
                );
                $query = new WP_Query($args);
            ?>
            <?php if($query->have_posts()) : ?>
                <ul class="p-works-archive__list">
                    <?php
                        while($query->have_posts()) :
                            $query->the_post();
                            if ($query->current_post == 0) continue;

                            $key = array_search(get_the_ID(), array_column($exerpt_url, 'id'));
                            $url = ($key !== false) ? $exerpt_url[$key]['url'] : esc_url(get_the_permalink());
                            ?>
                            <li class="p-works-archive__item">
                                <div class="p-works-archive__item-left">
                                    <?php if(!empty($url)) : ?>
                                        <a class="p-works-archive__item-main-visual" href="<?php echo $url; ?>">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('full'); ?>
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/image_coming-soon.webp" alt="coming soon" width="1080" height="1080" loading="lazy" decoding="async">
                                            <?php endif; ?>
                                        </a>
                                    <?php else : ?>
                                        <div class="p-works-archive__item-main-visual">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('full'); ?>
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/image_coming-soon.webp" alt="coming soon" width="1080" height="1080" loading="lazy" decoding="async">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-works-archive__item-right">
                                    <div class="p-works-archive__item-heading-container">
                                        <h3 class="p-works-archive__item-heading"><?php the_title(); ?></h3>
                                        <?php if(!empty(get_field('subtitle'))) : ?>
                                            <p class="p-works-archive__item-subtitle"><?php echo get_field('subtitle'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <dl class="p-works-archive__info-list">
                                        <div class="p-works-archive__info-container">
                                            <dt class="p-works-archive__info-terms c-heading--black">会期</dt>
                                            <dd class="p-works-archive__info-description"><?php echo esc_html(get_field('date')); ?></dd>
                                        </div>
                                        <div class="p-works-archive__info-container">
                                            <dt class="p-works-archive__info-terms c-heading--black">会場</dt>
                                            <dd class="p-works-archive__info-description"><?php echo esc_html(get_field('venue')); ?></dd>
                                        </div>
                                    </dl>
                                </div>
                            </li>
                            <?php
                        endwhile;
                    ?>
                </ul>
            <?php else : ?>
                <p>公演情報がありません。</p>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif;  ?>
</main>
<?php get_footer(); ?>