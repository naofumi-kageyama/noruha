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
    <h1 class="p-works-archive__heading"><?php the_title(); ?></h1>
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
                $works_query = new WP_Query($args);
            ?>
            <?php if($works_query->have_posts()) : ?>
                <ul class="p-works-archive__list">
                    <?php
                        while($works_query->have_posts()) :
                            $works_query->the_post();
                            if ($works_query->current_post == 0) continue;

                            $key = array_search(get_the_ID(), array_column($exerpt_url, 'id'));
                            $url = ($key !== false) ? $exerpt_url[$key]['url'] : esc_url(get_the_permalink());
                            ?>
                            <li class="p-works-archive__item">
                                <div class="p-works-archive__item-left">
                                    <?php if(!empty($url)) : ?>
                                        <a class="p-works-archive__item-main-visual" href="<?php echo $url; ?>">
                                            <img src="<?php echo esc_url($cfs->get('mainvisual')); ?> ">
                                        </a>
                                    <?php else : ?>
                                        <div class="p-works-archive__item-main-visual">
                                            <img src="<?php echo esc_url($cfs->get('mainvisual')); ?> ">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-works-archive__item-right">
                                    <div class="p-works-archive__item-heading-container">
                                        <h3 class="p-works-archive__item-heading"><?php the_title(); ?></h3>
                                        <?php if(!empty($cfs->get('subtitle'))) : ?>
                                            <p class="p-works-archive__item-subtitle"><?php echo $cfs->get('subtitle'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <dl class="p-works-archive__info-list">
                                        <div class="p-works-archive__info-container">
                                            <dt class="p-works-archive__info-terms c-heading-black-background">会期</dt>
                                            <dd class="p-works-archive__info-description"><?php echo esc_html($cfs->get('date')); ?></dd>
                                        </div>
                                        <div class="p-works-archive__info-container">
                                            <dt class="p-works-archive__info-terms c-heading-black-background">会場</dt>
                                            <dd class="p-works-archive__info-description"><?php echo esc_html($cfs->get('venue')); ?></dd>
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