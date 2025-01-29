<?php
/*
Template Name: 23kofuku
*/
?>

<?php get_header(); ?>

<section class="global-wrapper kofuku">
    <?php get_template_part('template-parts/nav'); ?>

    <div class="contents-wrapper">
        <?php while (have_posts()): the_post(); ?>
            <div class="next-visual">
                <img src="<?php echo $cfs->get('mainvisual'); ?>">
            </div>
            <div class="next-visual next-visual--sp">
                <a href="<?php echo $cfs->get('mainvisual'); ?>" data-lightbox="mainvisual">
                    <img src="<?php echo $cfs->get('mainvisual'); ?>">
                </a>
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
                <?php echo $cfs->get('description'); ?>
                <?php if(!empty($post->post_content)): ?>
                    <?php the_content(); ?>
                <?php endif; ?>
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

            <div id="symposium" class="next-content p-symposium">
                <h3 class="p-symposium__title">
                    同時開催<br>
                    「現実をまた見つけるためのシンポジウム」
                </h3>
                <p class="p-symposium__description">
                本作『幸福な島の夜』は「最も不気味な他者としての自己」をテーマとして掲げているが、あらゆる価値観や概念が変容し続ける現代において、リアリティは不可解なもの、これまでの尺度では測れないものの中にこそあると言えるだろう。しかしその一見新しい現実は、これまで存在しなかったわけでも、身を隠していたわけでもなく、大きな歴史の中でただ見過ごされてきたに過ぎない。それら見過ごされてきた現実と向き合い、言葉を交わすことによって、これからの時代を生きるための現実を改めて「見つける」ためのシンポジウムを開催する。
                </p>
                <div class="p-symposium__item js-open-profile-parent">
                    <h4 class="p-symposium__item-title">シンポジウム①「社会規範から少し外れた人間を、フィクションはどう描けるのか？」</h4>
                    <p class="p-symposium__item-date">日時：10月29日（日）16:45-18:45</p>                    
                    <p class="p-symposium__item-description">
                        例えばジェンダーや家族といった、身の回りの領域について語るときにも、社会規範というものは常についてまわる。その問題についてはこれまで様々に語られてきたものの、未だに根強く社会の中に残り、容易には脱することはできない。フィクションは時によって、それを解体するための指針を示すこともあれば、逆に規範を強化してしまうこともある。軽やかに規範からはみ出ながら新しいフィクションを創作していくには、どのような態度が必要だろうか？　ゲストと共に実作の例に触れつつ、これからの時代を生きるためのフィクションについて考察する。
                    </p>
                    <ul class="p-symposium__guest-list">
                        <li class="p-symposium__guest-item">登壇者</li>
                        <li class="p-symposium__guest-item js-open-profile-child">
                            <p class="p-symposium__guest-name js-open-profile-btn">小澤みゆき（編集者・ライター）</p>
                            <div class="p-symposium__guest-profile js-open-profile-content">
                                <span class="p-symposium__close-btn js-open-profile-close"></span>
                                <div class="p-symposium__guest-profile-inner">
                                    <figure class="p-symposium__guest-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/image_ozawa.png" alt="小澤みゆき氏のプロフィール画像" width="1969" height="1978">
                                    </figure>
                                    <div class="p-symposium__guest-text">
                                        <p>
                                            1988年生まれ。文筆・出版を中心とした自主制作を通して、よりよい生やフェミニズムの実践を模索しています。おもな制作物に、ウェブ同人誌『作家の手帖』、編著『かわいいウルフ』、同人誌『海響一号　大恋愛』など。近年は1930年代の日本におけるヴァージニア・ウルフの翻訳について個人調査を行っています。<br>
                                            <a href="https://kaikyosha.net" target="blank">https://kaikyosha.net</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="p-symposium__guest-item js-open-profile-child">
                            <p class="p-symposium__guest-name js-open-profile-btn">北村みなみ（イラストレーター／映像作家／漫画作家）</p>
                            <div class="p-symposium__guest-profile js-open-profile-content">
                                <span class="p-symposium__close-btn js-open-profile-close"></span>
                                <div class="p-symposium__guest-profile-inner">
                                    <figure class="p-symposium__guest-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/image_kitamura.jpg" alt="北村みなみ氏のプロフィール画像" width="2450" height="2450">
                                    </figure>                                    
                                    <div class="p-symposium__guest-text">
                                        <p>静岡県戸田村にて海と山に囲まれ育つ。</p>
                                        <p>2021年6月、WIREDの漫画連載をまとめた単行本「グッバイ・ハロー・ワールド」（rn press）を刊行。同年7月、イラスト作品集「宇宙（ユニヴァース）」（グラフィック社）を刊行。</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="p-symposium__guest-item js-open-profile-child">
                            <p class="p-symposium__guest-name js-open-profile-btn">カゲヤマ気象台（劇作家・演出家、円盤に乗る派代表）</p>
                            <div class="p-symposium__guest-profile js-open-profile-content">
                                <span class="p-symposium__close-btn js-open-profile-close"></span>
                                <div class="p-symposium__guest-profile-inner">
                                    <figure class="p-symposium__guest-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/image_kageyama_square.jpg" alt="カゲヤマ気象台のプロフィール画像" width="1000" height="667">
                                        <figcaption>photo by Arata Mino</figcaption>
                                    </figure>                                                   
                                    <div class="p-symposium__guest-text">                     
                                        <p>1988年静岡県浜松市生まれ。早稲田大学第一文学部卒。 2008年に演劇プロジェクト「sons wo:」を設立。劇作・演出・音響デザインを手がける。</p>
                                        <p>2018年より「円盤に乗る派」に改名。2013年、『野良猫の首輪』でフェスティバル/トーキョー13公募プログラムに参加。2015年度よりセゾン文化財団セゾン・フェロー。2017年に『シティIII』で第17回AAF戯曲賞大賞受賞。2021年より共同アトリエ「円盤に乗る場」を運営。</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="p-symposium__guest-item js-open-profile-child">
                            <p class="p-symposium__guest-name js-open-profile-btn">司会：曽根千智</p>
                            <div class="p-symposium__guest-profile js-open-profile-content">
                                <span class="p-symposium__close-btn js-open-profile-close"></span>
                                <div class="p-symposium__guest-profile-inner">
                                    <figure class="p-symposium__guest-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/image_sone.jpg" alt="曽根千智氏のプロフィール画像" width="1046" height="1568">
                                        <figcaption>photo by Saki Chikai</figcaption>
                                    </figure>                                          
                                    <div class="p-symposium__guest-text">                          
                                       <p>兵庫県出身。大学卒業後、人材系IT企業にて研究開発職として働きながら、こまばアゴラ演劇学校無隣館（3期）で学ぶ。現在は、劇作、演出、ドラマトゥルク、コーディネーター、研究員として活動している。参加・演出作品に『遊行権』（19）『The City & The City: Divided Senses』（20）『マミマニア』（21）など。</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="p-symposium__item js-open-profile-parent">
                    <h4 class="p-symposium__item-title">シンポジウム②「人間の"外"へと向かう経験について」</h4>
                    <p class="p-symposium__item-date">日時：11月3日（金）16:45-18:45</p>
                    <p class="p-symposium__item-description">
                        人間の社会はこれまで、無条件に人間というものを前提としながら、あくまで人間のために作られてきた。しかし、その"人間"という前提は、本当に絶対的なものだろうか？　"人間"というものはこういうものであると、無意識のうちに思い込んでいないだろうか？　気候変動によって自然が姿を変え、人間の能力を超えるAIの可能性に直面し、これまでの前提が揺らいでいる現在、そもそも"人間"というものの意味から問い直さなければならない。どこまでが人間で、どこからが人間ではないのか、その領域について改めて思考を展開しつつ、人間の"外"を指向するという経験を共有したい。
                    </p>
                    <ul class="p-symposium__guest-list">
                        <li class="p-symposium__guest-item">登壇者</li>
                        <li class="p-symposium__guest-item js-open-profile-child">
                            <p class="p-symposium__guest-name js-open-profile-btn">江永泉（批評家）</p>
                            <div class="p-symposium__guest-profile js-open-profile-content">
                                <span class="p-symposium__close-btn js-open-profile-close"></span>
                                <div class="p-symposium__guest-profile-inner">
                                    <figure class="p-symposium__guest-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/image_enaga.jpg" alt="江永泉氏のプロフィール画像" width="1944" height="2592">
                                    </figure>                                                                    
                                    <div class="p-symposium__guest-text">
                                        <p>著作に『闇の自己啓発』(早川書房、2021年、木澤佐登志・ひでシス・役所暁と共著)、「集まる流れを探るため──羽鳥ヨダ嘉郎『リンチ(戯曲)』」(『地域上演』第二号 2022年10月)、「笑えないところで笑う――向坂達矢『FINAL FUNTASY僕と犬と厭離穢土』」(Blu-ray版『FF』特典、2023年5月)などがある。2023年4月、『TED×Utokyo2023“どくどく”』にスピーカーとして参加。2023年2月よりYouTubeチャンネルTERECOにて米原将磨とコンテンツ雑談「光の曠達」を配信中。</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="p-symposium__guest-item js-open-profile-child">
                            <p class="p-symposium__guest-name js-open-profile-btn">小宮りさ麻吏奈（アーティスト/ アーター ）</p>
                            <div class="p-symposium__guest-profile js-open-profile-content">
                                <span class="p-symposium__close-btn js-open-profile-close"></span>
                                <div class="p-symposium__guest-profile-inner">
                                    <figure class="p-symposium__guest-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/image_komiya.jpg" alt="小宮りさ麻吏奈氏のプロフィール画像" width="500" height="500">
                                        <figcaption>Photo by Ardie Yorgans</figcaption>
                                    </figure>                                                                  
                                    <div class="p-symposium__guest-text">
                                        <p>クィア的視座から浮かび上がる時間論への関心から「新しい生殖の方法を模索する」をテーマにメディア横断的に活動している。プロジェクトに「小宮花店」、オルタナティブスペース「野方の空白」の運営。共同プロジェクトとして、制度における同性婚不可と建築法の問題を重ね合わせ再建築不可の土地に庭をつくる「繁殖する庭」、クィア・フェミニズムアートプラットフォーム「FAQ?」など。また、同名義にて漫画家としても活動中。</p>
                                    </div>  
                                </div>
                            </div>
                        </li>
                        <li class="p-symposium__guest-item js-open-profile-child">
                            <p class="p-symposium__guest-name js-open-profile-btn">カゲヤマ気象台（劇作家・演出家、円盤に乗る派代表）</p>
                            <div class="p-symposium__guest-profile js-open-profile-content">
                                <span class="p-symposium__close-btn js-open-profile-close"></span>
                                <div class="p-symposium__guest-profile-inner">
                                    <figure class="p-symposium__guest-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/image_kageyama_square.jpg" alt="カゲヤマ気象台のプロフィール画像" width="1000" height="667">
                                        <figcaption>photo by Arata Mino</figcaption>
                                    </figure>                                                   
                                    <div class="p-symposium__guest-text">                     
                                        <p>1988年静岡県浜松市生まれ。早稲田大学第一文学部卒。 2008年に演劇プロジェクト「sons wo:」を設立。劇作・演出・音響デザインを手がける。</p>
                                        <p>2018年より「円盤に乗る派」に改名。2013年、『野良猫の首輪』でフェスティバル/トーキョー13公募プログラムに参加。2015年度よりセゾン文化財団セゾン・フェロー。2017年に『シティIII』で第17回AAF戯曲賞大賞受賞。2021年より共同アトリエ「円盤に乗る場」を運営。</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="p-symposium__guest-item js-open-profile-child">
                            <p class="p-symposium__guest-name js-open-profile-btn">司会：曽根千智</p>
                            <div class="p-symposium__guest-profile js-open-profile-content">
                                <span class="p-symposium__close-btn js-open-profile-close"></span>
                                <div class="p-symposium__guest-profile-inner">
                                    <figure class="p-symposium__guest-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/image_sone.jpg" alt="曽根千智氏のプロフィール画像" width="1046" height="1568">
                                        <figcaption>photo by Saki Chikai</figcaption>
                                    </figure>                                          
                                    <div class="p-symposium__guest-text">                          
                                       <p>兵庫県出身。大学卒業後、人材系IT企業にて研究開発職として働きながら、こまばアゴラ演劇学校無隣館（3期）で学ぶ。現在は、劇作、演出、ドラマトゥルク、コーディネーター、研究員として活動している。参加・演出作品に『遊行権』（19）『The City & The City: Divided Senses』（20）『マミマニア』（21）など。</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <p class="p-symposium__price">
                    料金：500円<br>
                    ※本公演のチケットをお持ちの方は無料
                </p>
                <p class="p-symposium__ticket">
                    ご予約：<br>
                    <a href="https://noruha.stores.jp/?category_id=64e3117ab37ea4002e67e06b" target="blank">https://noruha.stores.jp/?category_id=64e3117ab37ea4002e67e06b</a>
                </p>
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

            <div id="contact" class="next-content">
                <div class="next-detail-title">
                    <span>お問い合わせ</span>
                </div>
                <?php echo $cfs->get('contact'); ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>