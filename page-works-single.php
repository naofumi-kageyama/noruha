<?php
/*
Template Name: works-single
*/
?>
<?php
    $works = [
        [
            'slug' => 'the-ghost-is-here',
            'template' => '26ghost'
        ],
        [
            'slug' => 'tamashii',
            'template' => '26tamashii'
        ],
        [
            'slug' => 'club-1',
            'template' => '25club-1'
        ],
        [
            'slug' => 'kasou2024',
            'template' => '24kasou'
        ],
        [
            'slug' => 'thedumbwaiter',
            'template' => '24thedumbwaiter'
        ],
        [
            'slug' => 'kofuku',
            'template' => '23kofuku'
        ],
        [
            'slug' => 'moral',
            'template' => '22moral'
        ],
        [
            'slug' => 'kasou',
            'template' => '22kasou'
        ],
    ];
?>
<?php get_header(); ?>
<main class="l-main p-works">
    <?php if (have_posts()): ?>
        <?php if( !post_password_required() ) :  ?>
            <?php while (have_posts()): the_post(); ?>
                <section class="p-works__section">
                    <div class="p-works-main-visual">
                        <figure class="p-works-main-visual__main-visual<?php if(get_field('horizontal')) echo " p-works-main-visual__main-visual--horizontal"; ?>">
                            <?php if(has_post_thumbnail()) : ?>
                                <button type="button" class="p-works-main-visual__lightbox-trigger js-lightbox-trigger">
                                    <?php the_post_thumbnail('full', ['class' => 'js-lightbox-source']); ?>
                                </button>
                                <figcaption><?php echo nl2br(esc_html(get_field('caption'))); ?></figcaption>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/image_coming-soon.webp" alt="coming soon" width="1080" height="1080" loading="lazy" decoding="async">
                            <?php endif; ?>
                        </figure>
                        <?php if(has_post_thumbnail()) : ?>
                            <div class="c-lightbox js-lightbox">
                                <div class="c-lightbox__overlay js-lightbox-close"></div>
                                <img class="c-lightbox__image js-lightbox-image" src="" alt="">
                                <button type="button" class="c-close-button c-lightbox__close-button js-lightbox-close"><span class="u-visually-hidden">close</span></button>
                            </div>
                        <?php endif; ?>
                        <div class="p-works-main-visual__title-container">
                            <?php if (get_field('header')): ?>
                                <p class="p-works-main-visual__title-header"><?php echo get_field('header'); ?></p>
                            <?php endif; ?>
                            <h1 class="p-works-main-visual__title"><?php the_title(); ?></h1>
                            <?php if (get_field('subtitle')): ?>
                                <p class="p-works-main-visual__subtitle"><?php echo get_field('subtitle'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="p-works-main-visual__info-wrapper">
                            <div class="p-works-main-visual__info-container">
                                <h3 class="p-works-main-visual__info-heading c-heading--black">会期</h3>
                                <p class="p-works-main-visual__info-text next-detail-text"><?php echo esc_html(get_field('date')); ?></p>
                            </div>
                            <div class="p-works-main-visual__info-container">
                            <h3 class="p-works-main-visual__info-heading c-heading--black">会場</h3>
                                <p class="p-works-main-visual__info-text"><?php echo esc_html(get_field('venue')); ?></p>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                    $current_slug = get_post_field('post_name', get_the_ID());
                    $matched = array_filter($works, fn($p) => $p['slug'] === $current_slug);
                    $matched_page = reset($matched);
                    if ($matched_page) {
                        get_template_part('works/' . $matched_page['template']);
                    }
                ?>
            <?php endwhile; ?>
        <?php else:  ?>
            <?php echo get_the_password_form(); ?>
        <?php endif;  ?>
    <?php endif;  ?>
</main>
<?php get_footer(); ?>