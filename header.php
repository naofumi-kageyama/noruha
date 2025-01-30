<!DOCTYPE html>
<html lang="ja">
<meta charset="<?php bloginfo('charset'); ?>" >
<?php echo_meta_description_tag(); ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge" >
<meta content="width=device-width,initial-scale=1.0,user-scalable=yes" name="viewport">
<?php
    if(is_singular() && get_post_meta($post->ID , 'noindex' , true)){
        echo '<meta name="robots" content="noindex,follow" />';
    }
?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="l-header">
        <div class="l-header__logo-container js-header-height">
            <a class="l-header__logo" href="<?php echo esc_url( home_url() ); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_noruha.png" alt="円盤に乗る派　NORUHA">
            </a>
        </div>
        <?php if(!is_home() && !is_front_page()) get_template_part('template-parts/nav'); ?>
    </header>