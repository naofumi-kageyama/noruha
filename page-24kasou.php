<?php
/*
Template Name: 24kasou
*/
?>
<?php get_header(); ?>
<main class="l-main c-works">
    <?php if (have_posts()): ?>
        <?php if( !post_password_required( $post->ID ) ) :  ?>
            <?php while (have_posts()): the_post(); ?>
                <section class="c-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                            'additional' => ''
                        ];
                        get_template_part('template-parts/works-main-visual', 'null', $args);
                    ?>
                </section>
                <section class="c-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                            'additional' => ''
                        ];
                        get_template_part('template-parts/works-description', 'null', $args);

                        $genres = array(
                            "interview" => "インタビュー",
                            "review" => "批評",
                            "essay" => "エッセイ"
                        );
                        $args = array(
                            "post_parent" => get_the_ID(),
                            "post_type" => "page",
                            "posts_per_page" => -1,
                            "orderby" => "menu_order",
                            "order" => "ASC",
                            "has_password" => false,
                        );
                        $children = new WP_Query($args);

                        $all_genre_array = array();
                        if($children->have_posts()){
                            foreach($genres as $key => $label){
                                $genre_exist = false;
                                while($children->have_posts()){
                                    $children->the_post();
                                    $this_article_genre = CFS()->get("genre");
                                    if(is_array($this_article_genre)){
                                        foreach($this_article_genre as $this_article_key => $this_article_label){
                                            if($this_article_key == $key) $genre_exist = true;
                                        }
                                    }
                                }
                                if($genre_exist){
                                    $genre_array = array(
                                        'genre' => $label,
                                        'articles' => ''
                                    );
                                    $articles_array = array();
                                    while($children->have_posts()){
                                        $children->the_post();
                                        $article_array = array();
                                        $this_article_genre = CFS()->get("genre");
                                        if(is_array($this_article_genre)){
                                            foreach($this_article_genre as $this_article_key => $this_article_label){
                                                if($this_article_key == $key){
                                                    $article_array = array(
                                                        'permalink' => get_the_permalink(),
                                                        'title' => get_the_title()
                                                    );
                                                    $articles_array[] = $article_array; 
                                                }
                                            }
                                        }
                                    }
                                    $genre_array['articles'] = $articles_array;
                                    $all_genre_array[] = $genre_array;
                                }
                            }
                        }

                        $output = "";
                        foreach($all_genre_array as $genre){
                            $output = $output . '
                                <li class="p-24kasou-description__genre-item">
                                    <h4 class="p-24kasou-description__genre-heading">'. $genre['genre'] .'</h4>
                                    <ul class="p-24kasou-description__article-list">
                            ';
                            foreach($genre['articles'] as $article){
                                $output = $output . '                                    
                                    <li class="p-24kasou-description__article-item">
                                        <a href="' . $article['permalink'] . '">'. $article['title'] . '</a>
                                    </li>
                                ';
                            }
                            $output = $output . '
                                    </ul>
                                </li>
                            ';
                        }
                        echo '
                            <div class="c-works__additional-content p-24kasou-description c-white-area">
                                <h2 class="p-24kasou-description__heading">関連記事</h2>
                                <ul class="p-24kasou-description__genre-list">
                                    ' . $output . '
                                </ul>
                            </div>
                        ';
                        wp_reset_postdata();
                    ?>
                </section>
                <section class="c-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-member', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-timetable', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-price', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-ticket', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-venue', 'null', $args);
                    ?>
                    <div class="c-works__info-section p-24kasou-kansou c-white-area">
                        <p class="p-24kasou-kansou__subheading">寄り道して帰ろう</p>
                        <h3 class="p-24kasou-kansou__heading">円盤に乗る派『仮想的な失調』感想会</h3>
                        <div class="p-24kasou-kansou__main">
                            <div class="p-24kasou-kansou__section">
                                <h4 class="p-24kasou-kansou__section-heading">開催概要</h4>
                                <div class="p-24kasou-kansou__text-wrap">
                                    <p class="p-24kasou-kansou__text">
                                        円盤に乗る派『仮想的な失調』の終演後に、感想会を開催します。東京芸術祭事務局がホストとなり、お話しします。<br>
                                        観劇の感想を話してもよし、集まった人の話を聞いてもよし、公演コラボメニューを味わうもよしです。
                                    </p>
                                    <p class="p-24kasou-kansou__text">
                                        今年の東京芸術祭のテーマは『トランジット・ナウ～寄り道しよう、舞台の世界へ～』。ぜひ、お帰りの前にゆるっと寄り道してみてください。
                                    </p>
                                </div>
                            </div>
                            <div class="p-24kasou-kansou__section">
                                <h4 class="p-24kasou-kansou__section-heading">開催回</h4>
                                <div class="p-24kasou-kansou__text-wrap">
                                    <p class="p-24kasou-kansou__text">
                                        9月
                                        19日(木)  19:00（20:30終演予定）<br>
                                        20日(金)  14:00（15:30終演予定）<br>
                                        21日(土)  19:00（20:30終演予定）　※14:00の回は開催なし<br>
                                        22日(日･祝) 14:00（15:30終演予定）
                                    </p>
                                    <p class="p-24kasou-kansou__text">
                                        準備ができ次第開始／最大1時間ほど／途中参加・退出OK<br>
                                        雨天中止の可能性あり
                                    </p>
                                </div>
                            </div>
                            <div class="p-24kasou-kansou__section">
                                <h4 class="p-24kasou-kansou__section-heading">会場</h4>                                
                                <div class="p-24kasou-kansou__text-wrap">
                                    <p class="p-24kasou-kansou__text">
                                        東京芸術劇場 劇場前広場<br>
                                        「東京芸術祭ひろば - トランジット キッチン」
                                    </p>
                                    <h5 class="p-24kasou-kansou__list-heading">= menu =</h5>
                                    <ul class="p-24kasou-kansou__list">
                                        <li class="p-24kasou-kansou__list-item">コラボかき氷（円盤に乗る派、木ノ下歌舞伎）</li>
                                        <li class="p-24kasou-kansou__list-item">コラボバゲットサンド（チェルフィッチュ）</li>
                                        <li class="p-24kasou-kansou__list-item">世界のバゲットサンド</li>
                                        <li class="p-24kasou-kansou__list-item">コーヒー／アルコール 他 ドリンク</li>
                                        <li class="p-24kasou-kansou__list-item">（キッチンカーの営業時間は21時まで）</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-contact', 'null', $args);
                    ?>
                </section>
            <?php endwhile; ?>
        <?php else:  ?>
            <?php echo get_the_password_form(); ?>
        <?php endif;  ?>
    <?php endif;  ?>
</main>
<?php get_footer(); ?>