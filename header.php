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
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<?php wp_head(); ?>
</head>

<div class="renewal">
    <header class="l-header">
        <a class="l-header__logo" href="<?php echo esc_url( home_url() ); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo_noruha.png" alt="円盤に乗る派　NORUHA">
        </a>
    </header>
    <?php if(!is_home() && !is_front_page()) get_template_part('template-parts/nav'); ?>
</div>
<body <?php body_class(); ?>>