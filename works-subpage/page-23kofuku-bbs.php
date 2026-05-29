<?php
/*
Template Name: 23-kofuku-bbs
*/
?>
<?php
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        global $wpdb;
        $no = 0;

        if (isset($_POST['comment_author'])) {
            $author = $_POST['comment_author'];
            $post_id = get_the_ID();
            $author_IP = $_SERVER["REMOTE_ADDR"];
            $date = wp_date('Y-m-d H:i:s');
            $date_gmt = gmdate('Y-m-d H:i:s');
            $content = $_POST['comment_content'];
            $approved = 1;
            $agent = $_SERVER['HTTP_USER_AGENT'];

            $comment_column = array(
                'comment_author' => $author,
                'comment_post_ID' => $post_id,
                'comment_author_IP' => $author_IP,
                'comment_date' => $date,
                'comment_date_gmt' => $date_gmt,
                'comment_content' => $content,
                'comment_approved' => $approved,
                'comment_agent' => $agent
            );
            $comment_type = array('%s', '%d', '%s', '%s', '%s', '%s', '%d', '%s');
            $wpdb -> insert("wp_comments", $comment_column, $comment_type);
        }

        $url = get_the_permalink('210');
        header("location: $url");
        exit;
    }

    function generate_bbs() {
        global $wpdb;
        $post_per_page = 10; //ページあたりの件数
        $page = $_GET['pages'] ?? 1;
        $first_post = $post_per_page * $page - $post_per_page + 1;
        $post_id = get_the_ID();

        $results = $wpdb->get_results("SELECT comment_author, comment_content FROM wp_comments WHERE comment_post_ID = " . $post_id);
        $reverse = array_reverse($results);
        $all_count = count($results);
        $no = $all_count;
        $first_no = $all_count - $first_post + 1;
        foreach ($reverse as $row) {
            if($no > $first_no){
                $no = $no - 1;
                continue;
            }

            $author = $row->comment_author;
            if(empty($author)){
                $author = "匿名希望";
            }
            $content = $row->comment_content;
            echo '<div class="content__post">';
            echo '<p class="content__no">' . $no . '</p>';
            echo '<p class="content__author">投稿者：'.$author . '</p>';
            echo '<p class="content__text">'.$content . '</p>';
            echo '</div>';
            $no = $no - 1;

            if($no <= $first_no - $post_per_page){
                break;
            }
        }

        $all_pages = ceil($all_count / $post_per_page);
        if($all_pages > 1){
            echo '<ul class="content__pagination">';
            for($count = 1; $count <= $all_pages; $count++){
                if($count == $page){
                    echo '<li class="content__pagination-item is-current">' . $count . '</li>';
                } else {
                    echo '<li class="content__pagination-item"><a class="content__pagination-link" href="' . get_the_permalink() . '?pages=' . $count . '">' . $count . '</a></li>';
                }
            }
            echo '</ul>';
        }
    }
?>
<?php get_header(); ?>
<style>
.bbs {
  background-color: #333;
  color: #fff;
  font-size: 14px;
  font-family: "ＭＳ ゴシック", "MS Gothic", sans-serif;
  font-weight: 400;
}
.bbs__section {
  margin-top: 150px;
  margin-bottom: 150px;
}
.bbs__section:first-child {
  margin-top: 0;
}
.bbs__section:last-child {
  margin-bottom: 0;
}
@media screen and (max-width: 640px) {
  .bbs__section {
    margin-top: 100px;
    margin-bottom: 100px;
  }
  .bbs__section:first-child {
    margin-top: 0;
  }
  .bbs__section:last-child {
    margin-bottom: 0;
  }
}

.head__heading {
  font-size: 24px;
  text-align: center;
}
@media screen and (max-width: 640px) {
  .head__heading {
    font-size: 20px;
  }
}
.head__description {
  padding: 80px 0;
}
.head__description-line {
  margin-top: 1em;
  margin-bottom: 1em;
}
.head__description-line:first-child {
  margin-top: 0;
}
.head__description-line:last-child {
  margin-bottom: 0;
}
.head__signature {
  margin-top: 1em;
  text-align: right;
}
.head__image {
  max-width: 400px;
  margin: 0 auto;
}
.head__image figcaption {
  font-size: 12px;
  margin-top: 5px;
  text-align: right;
}
.head__form {
  width: fit-content;
  margin: 0 auto;
  margin-top: 50px;
}
@media screen and (max-width: 768px) {
  .head__form {
    width: 100%;
    max-width: 500px;
  }
}
.head__input-container {
  display: flex;
  justify-content: flex-start;
  align-items: start;
}
.head__input-container--author {
  margin-bottom: 20px;
}
@media screen and (max-width: 768px) {
  .head__input-container {
    display: block;
  }
}
.head__label {
  display: block;
  width: 150px;
}
@media screen and (max-width: 768px) {
  .head__label {
    margin-bottom: 10px;
  }
}
.head__author-input {
  display: block;
  width: 200px;
  background-color: #fff;
  color: #000;
  padding: 5px 10px;
}
.head__author-input:focus {
  outline: 2px solid #000;
}
.head__content-textarea {
  display: block;
  width: 500px;
  padding: 5px 10px;
  background-color: #fff;
  color: #000;
  resize: none;
}
.head__content-textarea:focus {
  outline: 2px solid #000;
}
@media screen and (max-width: 768px) {
  .head__content-textarea {
    width: 100%;
  }
}
.head__submit-button {
  display: block;
  background-color: #c4c4c4;
  border: 1px solid #000;
  color: #000;
  padding: 5px 10px;
  margin: 0 auto;
  margin-top: 30px;
}
.head__submit-button:focus {
  outline: 2px solid #000;
}
.head__remarks {
  text-align: right;
  margin-top: 50px;
}

.content__post {
  margin-bottom: 50px;
}
.content__no {
  margin-bottom: 1em;
}
.content__author {
  margin-bottom: 1em;
}
.content__pagination {
  display: flex;
  gap: 10px;
}
.content__pagination-link {
  text-decoration: underline;
}
</style>
<div class="bbs">
    <main class="l-main">
        <section class="bbs__section head p-container__head head">
            <h2 class="head__heading">上演『幸福な島の夜』に関する調査</h2>
            <div class="head__description">
                <div class="head__description-text">
                    <p class="head__description-line">令和5年10月26日から11月5日にかけて、東京都・目黒区（当時）にあった劇場「こまばアゴラ劇場」にて、演劇プロジェクト≪円盤に乗る派≫による作品『幸福な島の夜』が上演されました。</p>
                    <p class="head__description-line">近年の調査によって、写真・映像・戯曲といったいくつかの断片的な資料こそ発見されましたが、当時の観客が上演をどのように受け止め、どのようなことを感じたのかは残されていません。令和年代の記録の多くは、現在アクセス不可能になっている旧www（ワールド・ワイド・ウェブ）上の「ソーシャル・メディア」と呼ばれる媒体にしか残されておらず、また、紙のアンケートという風習も、当時の演劇業界ではすでに廃れていました。</p>
                    <p class="head__description-line">旧演劇文化調査委員会は、かつての演劇文化の調査を通じて、失われた時代の再発見・記録・保存に務めております。</p>
                    <p class="head__description-line">もし、当時の演劇をご覧になった方がいましたら、どのようなささいなことでも構いません。そのとき感じたこと、思ったことなど、こちらの掲示板に残していただけたらと思います。</p>
                </div>
                <p class="head__signature">旧演劇文化調査委員会</p>
            </div>
            <div class="head__image-wrap">
                <figure class="head__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image_agora.webp" alt="こまばアゴラ劇場の写真">
                    <figcaption>こまばアゴラ劇場の写真（当時）</figcaption>
                </figure>
            </div>
            <form class="head__form head" action="" method="post">
                <div class="head__input-container head__input-container--author">
                    <label class="head__label" for="author">お名前（匿名可）</label><input class="head__author-input" type="text" id="author" name="comment_author">
                </div>
                <div class="head__input-container">
                    <label class="head__label" for="content">内容</label>
                    <textarea class="head__content-textarea" id="content" name="comment_content" rows="8" required></textarea>
                </div>
                <input class="head__submit-button" type="submit" value="投稿する"/>
            </form>
            <p class="head__remarks">※当掲示板についてのご質問、削除依頼等は<a href="mailto:info@noruha.net">こちら</a></p>
        </section>
        <article class="bbs__section content">
            <?php generate_bbs(); ?>
        </article>
    </main>
</div>
<?php get_footer(); ?>