<?php
/*
Template Name: about
*/
?>
<?php get_header(); ?>
<main class="l-main p-about">
    <h1 class="c-heading--h1"><?php the_title(); ?></h1>
    <div class="p-about__image">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_members.webp" loading="lazy" decoding="async" width="2000" height="1334">
    </div>
    <h2 class="c-heading--h2">円盤に乗る派</h2>
    <div class="c-content"><?php the_content(); ?></div>
    <ul class="p-about__list">
        <li class="p-about__item"><button class="c-button js-about-button is-on">カゲヤマ気象台</button></li>
        <li class="p-about__item"><button class="c-button js-about-button">日和下駄</button></li>
        <li class="p-about__item"><button class="c-button js-about-button">畠山峻</button></li>
        <li class="p-about__item"><button class="c-button js-about-button">渋木すず</button></li>
    </ul>
    <section id="kageyama" class="p-about__section js-about-target is-show">
        <div class="p-about__section-image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_kageyama.webp" loading="lazy" decoding="async" width="1000" height="667">
        </div>
        <h2 class="c-heading--h2">カゲヤマ気象台</h2>
        <div class="c-content">
            <?php echo  apply_filters('the_content', get_field('kageyama')); ?>
        </div>
        <?php if(get_field('kageyama-x') || get_field('kageyama-instagram') || get_field('kageyama-facebook')) : ?>
            <ul class="p-about__sns-list">
                <?php if(get_field('kageyama-x')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('kageyama-x')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_x.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(get_field('kageyama-instagram')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('kageyama-instagram')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_instagram.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(get_field('kageyama-facebook')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('kageyama-facebook')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_facebook.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </section>
    <section id="geta" class="p-about__section js-about-target">
        <div class="p-about__section-image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_geta.webp" loading="lazy" decoding="async" width="1000" height="667">
        </div>
        <h2 class="c-heading--h2">日和下駄</h2>
        <div class="c-content">
            <?php echo  apply_filters('the_content', get_field('geta')); ?>
        </div>
        <?php if(get_field('geta-x') || get_field('geta-instagram') || get_field('geta-facebook')) : ?>
            <ul class="p-about__sns-list">
                <?php if(get_field('geta-x')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('geta-x')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_x.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(get_field('geta-instagram')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('geta-instagram')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_instagram.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(get_field('geta-facebook')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('geta-facebook')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_facebook.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </section>
    <section id="hatakeyama" class="p-about__section js-about-target">
        <div class="p-about__section-image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_hatakeyama.webp" loading="lazy" decoding="async" width="1000" height="667">
        </div>
        <h2 class="c-heading--h2">畠山峻</h2>
        <div class="c-content">
            <?php echo  apply_filters('the_content', get_field('hatakeyama')); ?>
        </div>
        <?php if(get_field('hatakeyama-x') || get_field('hatakeyama-instagram') || get_field('hatakeyama-facebook')) : ?>
            <ul class="p-about__sns-list">
                <?php if(get_field('hatakeyama-x')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('hatakeyama-x')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_x.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(get_field('hatakeyama-instagram')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('hatakeyama-instagram')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_instagram.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(get_field('hatakeyama-facebook')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('hatakeyama-facebook')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_facebook.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </section>
    <section id="shibuki" class="p-about__section js-about-target">
        <div class="p-about__section-image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_shibuki.webp" loading="lazy" decoding="async" width="1000" height="667">
        </div>
        <h2 class="c-heading--h2">渋木すず</h2>
        <div class="c-content">
            <?php echo  apply_filters('the_content', get_field('shibuki')); ?>
        </div>
        <?php if(get_field('shibuki-x') || get_field('shibuki-instagram') || get_field('shibuki-facebook')) : ?>
            <ul class="p-about__sns-list">
                <?php if(get_field('shibuki-x')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('shibuki-x')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_x.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(get_field('shibuki-instagram')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('shibuki-instagram')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_instagram.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(get_field('shibuki-facebook')) : ?>
                    <li class="p-about__sns-item">
                        <a href="<?php echo esc_url(get_field('shibuki-facebook')); ?>" target="_blank" rel="noopener norooper">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/svg/logo_facebook.svg" loading="lazy" decoding="async">
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>