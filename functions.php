<?php
// $url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// preg_match((), $url, )

// if($url == "thedumbwaiter") {
//   wp_redirect('', 'ステータスコード' );
// }
// title取得
add_theme_support( 'title-tag' );

//フロントページではtitleのみ
function wp_document_title_parts ( $title ) {
    if ( is_home() || is_front_page() ) {
    unset( $title['tagline'] );
    }
    return $title;
    }
    add_filter( 'document_title_parts', 'wp_document_title_parts', 10, 1 );

//セパレーターを'|'に
function wp_document_title_separator( $separator ) {
    $separator = '|';
    return $separator;
}
add_filter( 'document_title_separator', 'wp_document_title_separator' );

//css取得
function enqueue_style(){
  wp_enqueue_style('style', get_stylesheet_directory_uri(). '/css/common.css', array(), '1.0.0');
  // wp_enqueue_style('lightbox', get_stylesheet_directory_uri(). 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.css');  
  wp_enqueue_style('renewal', get_stylesheet_directory_uri(). '/css/renewal.css', array(), '1.0.0');
  if( is_page_template('page-23kofuku.php') || is_page_template('page-23kofuku-bbs.php') ) {
    wp_enqueue_style('kofuku', get_stylesheet_directory_uri(). '/css/kofuku.css', array(), '1.0.0');
  }
}
add_action('wp_enqueue_scripts','enqueue_style');

function print_scripts() {
	if (!is_admin()) {
		wp_deregister_script('jquery'); //デフォルトjquery削除
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', true);
		// wp_enqueue_script('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js', true);
		wp_enqueue_script('marquee', get_template_directory_uri(). '/js/jquery.marquee.js', true);
		wp_enqueue_script('script', get_template_directory_uri(). '/js/script.js', true);
    if(is_home() || is_front_page()) {
      wp_enqueue_script('marquee-config', get_template_directory_uri(). '/js/marquee-config.js', true);
      wp_enqueue_script('form', get_template_directory_uri(). '/js/form.js', true);
      wp_enqueue_script('top-profile', get_template_directory_uri(). '/js/top-profile.js', true);
    } else {    
      wp_enqueue_script('profile', get_template_directory_uri(). '/js/profile.js', true);
    }
	}
}
add_action('wp_print_scripts', 'print_scripts');

//meta description取得
function get_meta_description() {
  global $post;
  $description = "";
  if ( is_front_page() ) {
    // フロントページでは、ブログの説明文を取得
    $description = get_bloginfo( 'description' );
  }
  elseif ( is_page() ) {
    // 固定ページでは、本文を取得
    $description = strip_tags($post->post_content);
  }
  elseif ( is_category() ) {
    // カテゴリーページでは、カテゴリーの説明文を取得
    $description = category_description();
  }
  elseif ( is_single() ) {
    if ($post->post_excerpt) {
      // 記事ページでは、記事本文から抜粋を取得
      $description = $post->post_excerpt;
    } else {
      // post_excerpt で取れない時は、自力で記事の冒頭100文字を抜粋して取得
      $description = strip_tags($post->post_content);
      $description = str_replace("\n", "", $description);
      $description = str_replace("\r", "", $description);
      $description = mb_substr($description, 0, 100) . "...";
    }
  } else {
    ;
  }

  return $description;
}

// echo meta description tag
function echo_meta_description_tag() {
  if ( is_front_page() || is_page() || is_category() || is_single() ) {
    echo '<meta name="description" content="' . get_meta_description() . '" />' . "\n";
  }
}

//ウィジェット有効
if (function_exists('register_sidebar')) {
  register_sidebar(array(
  'name' => 'サイドバー1',
  'id' => 'sidebar1',
  'before_widget' => '<div>',
  'after_widget' => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>'
  ));
 }

// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');


// パスワード保護ページカスタマイズ
function my_password_form() {
  return
    '<div class="page_pass_wrap">
      <div class="page_pass_text">このコンテンツはパスワードで保護されています。閲覧するにはパスワードを入力してください。</div>
      <form class="page_pass" action="' . home_url() . '/wp-login.php?action=postpass" method="post">
      <input class="page_pass_input" name="post_password" type="password" size="">
      <input class="page_pass_submit" type="submit" name="Submit" value="' . esc_attr__("送信") . '">
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