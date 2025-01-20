<?php
/*
Template Name: 23-kofuku-bbs
*/
?>

<?php
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
            echo '<div class="p-content__post">';
            echo '<p class="p-content__no">' . $no . '</p>';
            echo '<p class="p-content__author">投稿者：'.$author . '</p>';
            echo '<p class="p-content__text">'.$content . '</p>';
            echo '</div>';
            $no = $no - 1;

            if($no <= $first_no - $post_per_page){
                break;
            }
        }
        
        $all_pages = ceil($all_count / $post_per_page);
        if($all_pages > 1){
            echo '<ul class="p-content__pagination p-pagination">';
            for($count = 1; $count <= $all_pages; $count++){
                if($count == $page){
                    echo '<li class="p-pagination__item is_current">' . $count . '</li>';
                } else {
                    echo '<li class="p-pagination__item"><a class="p-pagination__link" href="' . get_the_permalink() . '?pages=' . $count . '">' . $count . '</a></li>';
                }
            }
            echo '</ul>';
        }
    }
?>
<?php get_header(); ?>

<main class="global-wrapper kofuku-bbs p-main">
    <section class="p-container">
        <!-- <?php include('menu.php'); ?> -->
        <div class="p-container__head p-head">
            <h2 class="p-head__title">上演『幸福な島の夜』に関する調査</h2>
            <div class="p-head__description">
                <div class="p-head__description-text">
                    <p class="p-head__description-line">令和5年10月26日から11月5日にかけて、東京都・目黒区（当時）にあった劇場「こまばアゴラ劇場」にて、演劇プロジェクト≪円盤に乗る派≫による作品『幸福な島の夜』が上演されました。</p>
                    <p class="p-head__description-line">近年の調査によって、写真・映像・戯曲といったいくつかの断片的な資料こそ発見されましたが、当時の観客が上演をどのように受け止め、どのようなことを感じたのかは残されていません。令和年代の記録の多くは、現在アクセス不可能になっている旧www（ワールド・ワイド・ウェブ）上の「ソーシャル・メディア」と呼ばれる媒体にしか残されておらず、また、紙のアンケートという風習も、当時の演劇業界ではすでに廃れていました。</p>
                    <p class="p-head__description-line">旧演劇文化調査委員会は、かつての演劇文化の調査を通じて、失われた時代の再発見・記録・保存に務めております。</p>
                    <p class="p-head__description-line">もし、当時の演劇をご覧になった方がいましたら、どのようなささいなことでも構いません。そのとき感じたこと、思ったことなど、こちらの掲示板に残していただけたらと思います。</p>
                </div>
                <p class="p-head__signature">旧演劇文化調査委員会</p>
            </div>
            <div class="p-head__image-wrap">
                <figure class="p-head__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/image_agora.webp" alt="こまばアゴラ劇場の写真">
                    <figcaption class="p-head__caption">こまばアゴラ劇場の写真（当時）</figcaption>
                </figure>
                <!-- <figure class="p-head__image">
                    <img src="" alt="『幸福な島の夜』の舞台写真">
                    <figcaption class="p-head__caption">『幸福な島の夜』の舞台写真</figcaption>
                </figure> -->
            </div>
            <form class="p-head__form p-form" action="" method="post">
                <div class="p-form__input-wrap p-form__input-wrap--author">
                    <label class="p-form__label" for="author">お名前（匿名可）</label><input class="p-form__author-input" type="text" id="author" name="comment_author">
                </div>
                <div class="p-form__input-wrap">
                    <label class="p-form__label" for="content">内容</label>
                    <textarea class="p-form__content-textarea" id="content" name="comment_content" rows="8" required></textarea>
                </div>
                <input class="p-form__submit-button" type="submit" value="投稿する"/>
            </form>
            <p class="p-head__remarks">※当掲示板についてのご質問、削除依頼等は<a href="mailto:info@noruha.net">こちら</a></p>
        </div>
        <article class="p-container__content p-content">
            <?php generate_bbs(); ?>
        </article>
        </div>
    </section>
</main>
<?php get_footer(); ?>