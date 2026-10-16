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
    wp_enqueue_script('script', get_template_directory_uri(). '/dist/js/bundle.js', array(), null, true);
  }
}

add_action('wp_enqueue_scripts', 'print_scripts');