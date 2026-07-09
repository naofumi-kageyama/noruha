<!DOCTYPE html>
<html dir="ltr" lang="ja">
<meta charset="<?php bloginfo('charset'); ?>" >
<meta http-equiv="X-UA-Compatible" content="IE=edge" >
<meta content="width=device-width,initial-scale=1.0,user-scalable=yes" name="viewport">
<?php
    if(is_singular() && get_post_meta(get_the_ID() , 'noindex' , true)){
        echo '<meta name="robots" content="noindex,follow" />';
    }
?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="l-header">
        <div class="l-header__logo-container js-header">
            <?php if(is_home() || is_front_page()) echo '<h1 class="l-header__h1">'; ?>
                <a class="l-header__logo" href="<?php echo esc_url( home_url() ); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/logo_noruha.webp" alt="円盤に乗る派　NORUHA" loading="lazy" decoding="async">
                </a>
            <?php if(is_home() || is_front_page()) echo '</h1>'; ?>
            <button type="button" class="l-header__toggle js-nav-toggle">
                <span class="u-visually-hidden">メニュー</span>
                <span class="l-header__toggle-line l-header__toggle-line--top"></span>
                <span class="l-header__toggle-line l-header__toggle-line--middle"></span>
                <span class="l-header__toggle-line l-header__toggle-line--bottom"></span>
            </button>
            <ul class="l-header__list js-nav">
                <li class="l-header__item"><a class="l-header__link" href="<?php echo esc_url(home_url('/about/')); ?>">About</a></li>
                <li class="l-header__item"><a class="l-header__link" href="<?php echo esc_url(home_url('/works/')); ?>">Works</a></li>
                <li class="l-header__item"><a class="l-header__link" href="https://noruha.stores.jp/" target="blank">Shop</a></li>
                <li class="l-header__item"><a class="l-header__link" href="https://noruba.net/" target="blank">Noruba</a></li>
            </ul>
        </div>
        <?php if(!is_home() && !is_front_page()) get_template_part('template-parts/nav'); ?>
    </header>