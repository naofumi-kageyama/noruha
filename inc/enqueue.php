<?php
//css取得
function enqueue_style(){
  wp_enqueue_style('style', get_stylesheet_directory_uri(). '/dist/css/style.min.css', array(), '1.0.0');
  wp_enqueue_style('tailwind', get_stylesheet_directory_uri(). '/dist/css/tailwind.min.css', array('style'), '1.0.0');
}
add_action('wp_enqueue_scripts','enqueue_style');

//js取得
function print_scripts() {
  if(!is_admin() && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))){
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', array(), null, false);

    wp_enqueue_script('marquee', get_template_directory_uri(). '/assets/js/jquery.marquee.js', array('jquery'), null, true);
    wp_enqueue_script('marquee-config', get_template_directory_uri(). '/assets/js/marquee-config.js', array('jquery'), null, true);

    wp_enqueue_script('script', get_template_directory_uri(). '/dist/js/bundle.js', array('jquery'), null, true);
  }
}

add_action('wp_enqueue_scripts', 'print_scripts');