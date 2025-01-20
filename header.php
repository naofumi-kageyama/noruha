<?php
    // if(!is_home()):
    // if(is_page('210')):
    // $userArray = array(
    // "noruha" => "kofukubbs"
    // );
    // basic_auth($userArray);
    // endif;
    // endif;
?>
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
<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" > -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.css"> -->
<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?<?php echo filemtime( get_stylesheet_directory() . '/style.css'); ?>"> -->

<?php if( is_page_template('page-23kofuku.php') || is_page_template('page-23kofuku-bbs.php')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/kofuku.css">
<?php endif; ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!-- [if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- <?php wp_deregister_script('jquery'); ?> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.marquee.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script> -->

<?php wp_head(); ?>
</head>

<div class="renewal">
    <header class="l-header">
        <div id="header">
            <a class="l-header__logo" href="<?php echo esc_url( home_url() ); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo_noruha.png" alt="円盤に乗る派　NORUHA">
            </a>
        </div>
    </header>
</div>
<body <?php body_class(); ?>>