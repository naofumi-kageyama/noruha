<?php
// title取得
add_theme_support('title-tag');

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
function remove_protected($title) {
  return '%s';
}
add_filter('protected_title_format', 'remove_protected');

// ページごとにnoindexを設定
function add_noindex_metabox() {
    add_meta_box( 'custom_noindex', 'インデックス設定', 'create_noindex', array('post', 'page'), 'side' );
}
add_action( 'admin_menu', 'add_noindex_metabox' );

//// 管理画面にフィールドを出力
function create_noindex( WP_Post $post ) {
    $keyname = 'noindex';
    $get_value = get_post_meta( $post->ID, $keyname, true );
    wp_nonce_field( 'action_' . $keyname, 'nonce_' . $keyname );
    $value = 'noindex';
    $checked = '';
    if( $value === $get_value ) $checked = ' checked';
    echo '<label><input type="checkbox" name="' . $keyname . '" value="' . $value . '"' . $checked . '>' . $keyname . '</label>';
}

//// カスタムフィールドの保存
function save_custom_noindex( int $post_id ) {
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
add_action( 'save_post', 'save_custom_noindex' );

//basic認証
function basic_auth( array $auth_list, $realm = "Restricted Area", $failed_text = "認証に失敗しました" ) {
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