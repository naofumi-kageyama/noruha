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
                            'key'   => '_wp_page_template',
                            'value' => 'page-works-single.php',
                        ),
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

                // side-projectがfalseのものを先に、trueのものを後に表示する（それぞれの中ではmenu_order順のまま）
                // 見出しは2グループ目以降のみ表示する
                $groups = array(
                    array(
                        'works'   => array_filter($query->posts, function ($work) {
                            return !get_field('side-project', $work->ID);
                        }),
                    ),
                    array(
                        'works'   => array_filter($query->posts, function ($work) {
                            return get_field('side-project', $work->ID);
                        }),
                    ),
                );
            ?>
            <?php if($query->have_posts()) : ?>
                <?php foreach ($groups as $index => $group) : ?>
                    <?php if (empty($group['works'])) continue; ?>
                    <?php if ($index > 0) : ?>
                        <h2 class="p-works-archive__subtitle c-heading--h2">SIDE PROJECT</h2>
                    <?php endif; ?>
                    <ul class="p-works-archive__list">
                        <?php
                            foreach ($group['works'] as $work) :
                                $post = $work;
                                setup_postdata($post);

                                $key = array_search(get_the_ID(), array_column($exerpt_url, 'id'));
                                $url = ($key !== false) ? $exerpt_url[$key]['url'] : esc_url(get_the_permalink());

                                $photo_1_id = get_field('photo_1', false, false);
                                $main_visual_class = 'p-works-archive__item-main-visual';
                                if (!empty($photo_1_id)) {
                                    $image = wp_get_attachment_image($photo_1_id, 'large');
                                    $main_visual_class .= ' p-works-archive__item-main-visual--horizontal';
                                } elseif (has_post_thumbnail()) {
                                    $image = get_the_post_thumbnail(null, 'large');
                                    if (get_field('horizontal')) $main_visual_class .= ' p-works-archive__item-main-visual--horizontal';
                                } else {
                                    $image = '<img src="' . get_template_directory_uri() . '/dist/images/image_coming-soon.webp" alt="coming soon" width="1080" height="1080" loading="lazy" decoding="async">';
                                }
                                ?>
                                <li class="p-works-archive__item">
                                    <div class="p-works-archive__item-image">
                                        <?php if(!empty($url)) : ?>
                                            <a class="<?php echo $main_visual_class; ?>" href="<?php echo $url; ?>"><?php echo $image; ?></a>
                                        <?php else : ?>
                                            <div class="<?php echo $main_visual_class; ?>"><?php echo $image; ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="p-works-archive__item-info">
                                        <div class="p-works-archive__item-heading-container">
                                            <?php if (get_field('header')): ?>
                                                <p class="p-works-archive__item-title-header"><?php echo get_field('header'); ?></p>
                                            <?php endif; ?>
                                            <h3 class="p-works-archive__item-title"><?php the_title(); ?></h3>
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
                            endforeach;
                            wp_reset_postdata();
                        ?>
                    </ul>
                <?php endforeach; ?>
            <?php else : ?>
                <p>公演情報がありません。</p>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif;  ?>
</main>
<?php get_footer(); ?>