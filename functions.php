<?php
// title取得
add_theme_support('title-tag');

//css取得
function enqueue_style(){
  wp_enqueue_style('style', get_stylesheet_directory_uri(). '/assets/css/style.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts','enqueue_style');

function print_scripts() {
	if(!is_admin() && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))){
		wp_deregister_script('jquery'); //デフォルトjquery削除
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', true);
		wp_enqueue_script('marquee', get_template_directory_uri(). '/assets/js/jquery.marquee.js', true);
		wp_enqueue_script('script', get_template_directory_uri(). '/assets/js/script.js', true);
    if(is_home() || is_front_page()) {
      wp_enqueue_script('marquee-config', get_template_directory_uri(). '/assets/js/marquee-config.js', true);
      wp_enqueue_script('form', get_template_directory_uri(). '/assets/js/form.js', true);
      wp_enqueue_script('top-profile', get_template_directory_uri(). '/assets/js/top-profile.js', true);
    } else {    
      wp_enqueue_script('profile', get_template_directory_uri(). '/assets/js/profile.js', true);
      wp_enqueue_script('set-attr-size', get_template_directory_uri(). '/assets/js/set-attr-size.js', true);
    }
    if(is_page()) {
      wp_enqueue_script('modal', get_template_directory_uri(). '/assets/js/modal.js', true);
    }
	}
}
add_action('wp_print_scripts', 'print_scripts');

// echo meta description tag
function echo_meta_description_tag() {
  if ( is_front_page() || is_page() || is_category() || is_single() ) {
    echo '<meta name="description" content="' . get_meta_description() . '" />' . "\n";
  }
}

// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');


// パスワード保護ページカスタマイズ
function my_password_form() {
  return
    '<div class="p-password-form">
      <p class="p-password-form__text">このコンテンツはパスワードで保護されています。閲覧するにはパスワードを入力してください。</p>
      <form class="p-password-form__form" action="' . home_url() . '/wp-login.php?action=postpass" method="post">
        <input class="p-password-form__input" name="post_password" type="password" size="">
        <input class="p-password-form__submit" type="submit" name="Submit" value="' . esc_attr__("送信") . '">
      </form>
    </div>'
  ;
}
add_filter('the_password_form', 'my_password_form');

// パスワード保護ページの「保護中:」を消す
add_filter('protected_title_format', 'remove_protected');
function remove_protected($title) {
  return '%s';
}

// ページごとにnoindexを設定
add_action( 'admin_menu', 'add_noindex_metabox' );
function add_noindex_metabox() {
    add_meta_box( 'custom_noindex', 'インデックス設定', 'create_noindex', array('post', 'page'), 'side' );
}

//// 管理画面にフィールドを出力
function create_noindex() {
    $keyname = 'noindex';
    global $post;
    $get_value = get_post_meta( $post->ID, $keyname, true );
    wp_nonce_field( 'action_' . $keyname, 'nonce_' . $keyname );
    $value = 'noindex';
    $checked = '';
    if( $value === $get_value ) $checked = ' checked';
    echo '<label><input type="checkbox" name="' . $keyname . '" value="' . $value . '"' . $checked . '>' . $keyname . '</label>';
}

//// カスタムフィールドの保存
add_action( 'save_post', 'save_custom_noindex' );
function save_custom_noindex( $post_id ) {
    $keyname = 'noindex';
    if ( isset( $_POST['nonce_' . $keyname] )) {
        if( check_admin_referer( 'action_' . $keyname, 'nonce_' . $keyname ) ) {
            if( isset( $_POST[$keyname] )) {
                update_post_meta( $post_id, $keyname, $_POST[$keyname] );
            } else {
                delete_post_meta( $post_id, $keyname, get_post_meta( $post_id, $keyname, true ) );
            }
        }
    }
}

//basic認証
function basic_auth($auth_list,$realm="Restricted Area",$failed_text="認証に失敗しました"){
  if (isset($_SERVER['PHP_AUTH_USER']) and isset($auth_list[$_SERVER['PHP_AUTH_USER']])){
  if ($auth_list[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW']){
  return $_SERVER['PHP_AUTH_USER'];
  }
  }
  header('WWW-Authenticate: Basic realm="'.$realm.'"');
  header('HTTP/1.0 401 Unauthorized');
  header('Content-type: text/html; charset='.mb_internal_encoding());
  die($failed_text);
}