<?php
/*
Template Name: 24kasou
*/
?>

<?php get_header(); ?>

<section class="global-wrapper">
    <?php include('menu.php'); ?>

    <div class="contents-wrapper">
    <?php if( !post_password_required( $post->ID ) ) :  ?>
        <?php while (have_posts()): the_post(); ?>
            <div class="next-visual">
                <img src="<?php echo $cfs->get('mainvisual'); ?>">
            </div>
            <div class="next-title-wrapper">
                <p class="next-title"><?php the_title(); ?></p>
                <p class="next-subtitle"><?php echo $cfs->get('subtitle'); ?></p>
            </div>
            <div class="next-detail-wrapper">
                <div class="next-detail-contents">
                    <div class="next-detail">
                        <div class="next-detail-title">
                            <span>会期</span>
                        </div>
                        <p class="next-detail-text"><?php echo $cfs->get('date'); ?></p>
                    </div>
                    <div class="next-detail">
                        <div class="next-detail-title">
                            <span>会場</span>
                        </div>
                        <p class="next-detail-text"><?php echo $cfs->get('venue'); ?></p>
                    </div>
                </div>
            </div>

            <div class="next-copy">
                <p><?php echo $cfs->get('catch'); ?></p>
            </div>
            <div class="next-description">
                <div class="renewal">
                    <div class="p-24kasou-description c-white-area">
                        <div class="p-24kasou-description__content">
                            <?php echo $cfs->get('description'); ?>
                        </div>
                        <?php
                            $genres = array(
                                'interview' => 'インタビュー',
                                'review' => '批評',
                                'essay' => 'エッセイ'
                            );
                            $args = array(
                                'post_parent' => get_the_ID(),
                                'post_type' => 'page',
                                'posts_per_page' => -1,
                                'orderby' => 'menu_order',
                                'order' => 'ASC',
                                'has_password' => false,
                            );
                            $children = new WP_Query($args);
                        ?>
                        <?php if($children->have_posts()): ?>
                            <div class="p-24kasou-description__article">
                                <h3 class="p-24kasou-description__article-heading">関連記事</h3>
                                <ul class="p-24kasou-description__genre-list">
                                    <?php foreach($genres as $key => $label) : ?>                                   
                                        <?php $genre_exist = false; ?>
                                        <?php while($children->have_posts()): ?>
                                        <?php $children->the_post();?>
                                            <?php $this_article_genre = CFS()->get('genre'); ?>
                                            <?php if(is_array($this_article_genre)): ?>
                                                <?php foreach($this_article_genre as $this_article_key => $this_article_label): ?>
                                                    <?php if($this_article_key == $key) $genre_exist = true; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endwhile;?>
                                        <?php if($genre_exist) : ?>
                                            <li class="p-24kasou-description__genre-item">
                                                <h4 class="p-24kasou-description__genre-heading"><?php echo $label; ?></h4>
                                                <ul class="p-24kasou-description__article-list">
                                                    <?php while($children->have_posts()): ?>
                                                    <?php $children->the_post();?>                                            
                                                        <?php $this_article_genre = CFS()->get('genre'); ?>
                                                        <?php if(is_array($this_article_genre)): ?>
                                                            <?php foreach($this_article_genre as $this_article_key => $this_article_label): ?>
                                                                <?php if($this_article_key == $key) : ?>
                                                                    <li class="p-24kasou-description__article-item">
                                                                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    <?php endwhile;?>
                                                </ul>
                                            </li>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif;?>
                        <?php wp_reset_postdata();?>
                    </div>
                </div>
            </div>
            <div id="people" class="next-content">
                <div class="next-detail-title">
                    <span>人々</span>
                </div>

                <?php
                    $fields = cfs()->get('people'); //親ループ
                    foreach ($fields as $field) :
                ?>
                    <div class="credit-area">
                        <div class="role-area">
                            <p><?php echo $field['role']; ?></p>
                        </div>
                        <div class="name-area">
                            <?php
                                $fields = $field['individual']; //子ループ
                                foreach ((array)$fields as $field):
                            ?>
                                <div class="name">
                                    <p class="open-profile"><?php echo $field['name']; ?></p>
                                    <?php if(!empty($field['profile'])): ?>
                                        <div class="profile">
                                            <span class="batsu"></span>
                                            <?php echo $field['profile']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <p><?php echo $cfs->get('remarks'); ?></p>

                <div class="organizer">
                    <table class="credit-area">
                    <?php
                        $fields = cfs()->get('organizer'); //親ループ
                        foreach ($fields as $field) :
                    ?>
                        <tr>
                            <th class="role-area">
                                <p><?php echo $field['role']; ?></p>
                            </th>
                            <td class="name-area">
                                <div class="name">
                                    <p><?php echo $field['name']; ?></p>
                                    <?php if($field['imgs-true']): ?>
                                        <div class="organizer-logo-wrap">
                                            <?php
                                                $fields = $field['logo-imgs']; //子ループ
                                                foreach ((array)$fields as $field):
                                            ?>
                                                <img src="<?php echo $field['logo-img']; ?>">
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </table>

                    <div class="grant">
                        <?php echo $cfs->get('grant'); ?>
                    </div>
                </div>
            </div>

            <div id="timetable" class="next-content">
                <div class="next-detail-title">
                    <span>日時</span>
                </div>
                <p>
                    <?php echo $cfs->get('timetable'); ?>
                </p>
            </div>

            <div id="price" class="next-content">
                <div class="next-detail-title">
                    <span>料金</span>
                </div>
                <p>
                    <?php echo $cfs->get('price'); ?>
                </p>
            </div>

            <div id="ticket" class="next-content">
                <div class="next-detail-title">
                    <span>チケット</span>
                </div>
                <?php echo $cfs->get('ticket'); ?>
            </div>

            <div id="venue" class="next-content">
                <div class="next-detail-title">
                    <span>会場</span>
                </div>
                <div class="next-venue-logo">
                    <?php echo $cfs->get('next-venue-logo'); ?>
                </div>
                <div class="next-venue-detail">
                    <?php echo $cfs->get('next-venue-detail'); ?>
                </div>
            </div>

            <div class="renewal">
                <div class="l-project">
                    <section class="l-project__section p-24kasou-kansou c-white-area">
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
                    </section>
                </div>
            </div>

            <div id="contact" class="next-content">
                <div class="next-detail-title">
                    <span>お問い合わせ</span>
                </div>
                <?php echo $cfs->get('contact'); ?>
            </div>
        <?php endwhile; ?>

        <?php else:  ?>
            <?php echo get_the_password_form(); ?>
        <?php endif;  ?>
    </div>
</section>
<div class="renewal">
    <a class="c-floating-button" href="<?php echo esc_url(get_page_link(239)); ?>#ticket">TICKET</a>
</div>
<?php get_footer(); ?>