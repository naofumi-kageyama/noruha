<?php
/*
Template Name: 23kofuku
*/
?>
<?php get_header(); ?>
<main class="l-main p-works">
    <?php if (have_posts()): ?>
        <?php if( !post_password_required( $post->ID ) ) :  ?>
            <?php while (have_posts()): the_post(); ?>
                <div class="p-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                            'additional' => ''
                        ];
                        get_template_part('template-parts/works-main-visual', 'null', $args);
                    ?>
                </div>
                <div class="p-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                            'additional' => ''
                        ];
                        get_template_part('template-parts/works-description', 'null', $args);
                    ?>
                </div>
                
                <div id="symposium" class="p-23kofuku-symposium c-white-area">
                    <h2 class="p-23kofuku-symposium__heading">
                        同時開催<br>
                        「現実をまた見つけるためのシンポジウム」
                    </h2>
                    <p class="p-23kofuku-symposium__description">
                        本作『幸福な島の夜』は「最も不気味な他者としての自己」をテーマとして掲げているが、あらゆる価値観や概念が変容し続ける現代において、リアリティは不可解なもの、これまでの尺度では測れないものの中にこそあると言えるだろう。しかしその一見新しい現実は、これまで存在しなかったわけでも、身を隠していたわけでもなく、大きな歴史の中でただ見過ごされてきたに過ぎない。それら見過ごされてきた現実と向き合い、言葉を交わすことによって、これからの時代を生きるための現実を改めて「見つける」ためのシンポジウムを開催する。
                    </p>
                    <ul class="p-23kofuku-symposium__symposium-list js-open-profile-parent-wrapper">
                        <li class="p-23kofuku-symposium__symposium-item js-open-profile-parent">
                            <h3 class="p-23kofuku-symposium__symposium-heading">シンポジウム①「社会規範から少し外れた人間を、フィクションはどう描けるのか？」</h3>
                            <p class="p-23kofuku-symposium__symposium-date">日時：10月29日（日）16:45-18:45</p>                    
                            <p class="p-23kofuku-symposium__symposium-description">
                                例えばジェンダーや家族といった、身の回りの領域について語るときにも、社会規範というものは常についてまわる。その問題についてはこれまで様々に語られてきたものの、未だに根強く社会の中に残り、容易には脱することはできない。フィクションは時によって、それを解体するための指針を示すこともあれば、逆に規範を強化してしまうこともある。軽やかに規範からはみ出ながら新しいフィクションを創作していくには、どのような態度が必要だろうか？　ゲストと共に実作の例に触れつつ、これからの時代を生きるためのフィクションについて考察する。
                            </p>
                            <ul class="p-23kofuku-symposium__guest-list js-open-profile-children-wrapper">
                                <li class="p-23kofuku-symposium__guest-item"><h4 class="p-23kofuku-symposium__guest-heading">登壇者</h4></li>
                                <li class="p-23kofuku-symposium__guest-item js-open-profile-container js-open-profile-child">
                                    <p class="p-23kofuku-symposium__guest-name js-open-profile-button">小澤みゆき（編集者・ライター）</p>
                                    <div class="p-23kofuku-symposium__guest-profile c-white-area js-open-profile-target">
                                        <button class="p-23kofuku-symposium__close-button js-open-profile-button"></button>
                                        <div class="p-23kofuku-symposium__guest-profile-inner">
                                            <figure class="p-23kofuku-symposium__guest-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image_ozawa.png" alt="小澤みゆき氏のプロフィール画像" width="1969" height="1978">
                                            </figure>
                                            <div class="p-23kofuku-symposium__guest-description">
                                                    <p>
                                                    1988年生まれ。文筆・出版を中心とした自主制作を通して、よりよい生やフェミニズムの実践を模索しています。おもな制作物に、ウェブ同人誌『作家の手帖』、編著『かわいいウルフ』、同人誌『海響一号　大恋愛』など。近年は1930年代の日本におけるヴァージニア・ウルフの翻訳について個人調査を行っています。<br>
                                                    <a href="https://kaikyosha.net" target="blank">https://kaikyosha.net</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="p-23kofuku-symposium__guest-item js-open-profile-container js-open-profile-child">
                                    <p class="p-23kofuku-symposium__guest-name js-open-profile-button">北村みなみ（イラストレーター／映像作家／漫画作家）</p>
                                    <div class="p-23kofuku-symposium__guest-profile c-white-area js-open-profile-target">
                                        <button class="p-23kofuku-symposium__close-button js-open-profile-button"></button>
                                        <div class="p-23kofuku-symposium__guest-profile-inner">
                                            <figure class="p-23kofuku-symposium__guest-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image_kitamura.jpg" alt="北村みなみ氏のプロフィール画像" width="2450" height="2450">
                                            </figure>                                    
                                            <div class="p-23kofuku-symposium__guest-description">
                                                    <p>静岡県戸田村にて海と山に囲まれ育つ。</p>
                                                <p>2021年6月、WIREDの漫画連載をまとめた単行本「グッバイ・ハロー・ワールド」（rn press）を刊行。同年7月、イラスト作品集「宇宙（ユニヴァース）」（グラフィック社）を刊行。</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="p-23kofuku-symposium__guest-item js-open-profile-container js-open-profile-child">
                                    <p class="p-23kofuku-symposium__guest-name js-open-profile-button">カゲヤマ気象台（劇作家・演出家、円盤に乗る派代表）</p>
                                    <div class="p-23kofuku-symposium__guest-profile c-white-area js-open-profile-target">
                                        <button class="p-23kofuku-symposium__close-button js-open-profile-button"></button>
                                        <div class="p-23kofuku-symposium__guest-profile-inner">
                                            <figure class="p-23kofuku-symposium__guest-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image_kageyama_square.jpg" alt="カゲヤマ気象台のプロフィール画像" width="1000" height="667">
                                                <figcaption>photo by Arata Mino</figcaption>
                                            </figure>                                                   
                                        <div class="p-23kofuku-symposium__guest-description">                          
                                                <p>1988年静岡県浜松市生まれ。早稲田大学第一文学部卒。 2008年に演劇プロジェクト「sons wo:」を設立。劇作・演出・音響デザインを手がける。</p>
                                                <p>2018年より「円盤に乗る派」に改名。2013年、『野良猫の首輪』でフェスティバル/トーキョー13公募プログラムに参加。2015年度よりセゾン文化財団セゾン・フェロー。2017年に『シティIII』で第17回AAF戯曲賞大賞受賞。2021年より共同アトリエ「円盤に乗る場」を運営。</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="p-23kofuku-symposium__guest-item js-open-profile-container js-open-profile-child">
                                    <p class="p-23kofuku-symposium__guest-name js-open-profile-button">司会：曽根千智</p>
                                    <div class="p-23kofuku-symposium__guest-profile c-white-area js-open-profile-target">
                                        <button class="p-23kofuku-symposium__close-button js-open-profile-button"></button>
                                        <div class="p-23kofuku-symposium__guest-profile-inner">
                                            <figure class="p-23kofuku-symposium__guest-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image_sone.jpg" alt="曽根千智氏のプロフィール画像" width="1046" height="1568">
                                                <figcaption>photo by Saki Chikai</figcaption>
                                            </figure>                                          
                                            <div class="p-23kofuku-symposium__guest-description">                          
                                                <p>兵庫県出身。大学卒業後、人材系IT企業にて研究開発職として働きながら、こまばアゴラ演劇学校無隣館（3期）で学ぶ。現在は、劇作、演出、ドラマトゥルク、コーディネーター、研究員として活動している。参加・演出作品に『遊行権』（19）『The City & The City: Divided Senses』（20）『マミマニア』（21）など。</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="p-23kofuku-symposium__symposium-item js-open-profile-parent">
                            <h3 class="p-23kofuku-symposium__symposium-heading">シンポジウム②「人間の"外"へと向かう経験について」</h3>
                            <p class="p-23kofuku-symposium__symposium-date">日時：11月3日（金）16:45-18:45</p>
                            <p class="p-23kofuku-symposium__symposium-description">
                                人間の社会はこれまで、無条件に人間というものを前提としながら、あくまで人間のために作られてきた。しかし、その"人間"という前提は、本当に絶対的なものだろうか？　"人間"というものはこういうものであると、無意識のうちに思い込んでいないだろうか？　気候変動によって自然が姿を変え、人間の能力を超えるAIの可能性に直面し、これまでの前提が揺らいでいる現在、そもそも"人間"というものの意味から問い直さなければならない。どこまでが人間で、どこからが人間ではないのか、その領域について改めて思考を展開しつつ、人間の"外"を指向するという経験を共有したい。
                            </p>
                            <ul class="p-23kofuku-symposium__guest-list js-open-profile-children-wrapper">
                                <li class="p-23kofuku-symposium__guest-item"><h4 class="p-23kofuku-symposium__guest-heading">登壇者</h4></li>
                                <li class="p-23kofuku-symposium__guest-item js-open-profile-container js-open-profile-child">
                                    <p class="p-23kofuku-symposium__guest-name js-open-profile-button">江永泉（批評家）</p>
                                    <div class="p-23kofuku-symposium__guest-profile c-white-area js-open-profile-target">
                                        <button class="p-23kofuku-symposium__close-button js-open-profile-button"></button>
                                        <div class="p-23kofuku-symposium__guest-profile-inner">
                                            <figure class="p-23kofuku-symposium__guest-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image_enaga.jpg" alt="江永泉氏のプロフィール画像" width="1944" height="2592">
                                            </figure>                                                                    
                                            <div class="p-23kofuku-symposium__guest-description">
                                                    <p>著作に『闇の自己啓発』(早川書房、2021年、木澤佐登志・ひでシス・役所暁と共著)、「集まる流れを探るため──羽鳥ヨダ嘉郎『リンチ(戯曲)』」(『地域上演』第二号 2022年10月)、「笑えないところで笑う――向坂達矢『FINAL FUNTASY僕と犬と厭離穢土』」(Blu-ray版『FF』特典、2023年5月)などがある。2023年4月、『TED×Utokyo2023“どくどく”』にスピーカーとして参加。2023年2月よりYouTubeチャンネルTERECOにて米原将磨とコンテンツ雑談「光の曠達」を配信中。</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="p-23kofuku-symposium__guest-item js-open-profile-container js-open-profile-child">
                                    <p class="p-23kofuku-symposium__guest-name js-open-profile-button">小宮りさ麻吏奈（アーティスト/ アーター ）</p>
                                    <div class="p-23kofuku-symposium__guest-profile c-white-area js-open-profile-target">
                                        <button class="p-23kofuku-symposium__close-button js-open-profile-button"></button>
                                        <div class="p-23kofuku-symposium__guest-profile-inner">
                                            <figure class="p-23kofuku-symposium__guest-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image_komiya.jpg" alt="小宮りさ麻吏奈氏のプロフィール画像" width="500" height="500">
                                                <figcaption>Photo by Ardie Yorgans</figcaption>
                                            </figure>                                                                  
                                            <div class="p-23kofuku-symposium__guest-description">
                                                    <p>クィア的視座から浮かび上がる時間論への関心から「新しい生殖の方法を模索する」をテーマにメディア横断的に活動している。プロジェクトに「小宮花店」、オルタナティブスペース「野方の空白」の運営。共同プロジェクトとして、制度における同性婚不可と建築法の問題を重ね合わせ再建築不可の土地に庭をつくる「繁殖する庭」、クィア・フェミニズムアートプラットフォーム「FAQ?」など。また、同名義にて漫画家としても活動中。</p>
                                            </div>  
                                        </div>
                                    </div>
                                </li>
                                <li class="p-23kofuku-symposium__guest-item js-open-profile-container js-open-profile-child">
                                    <p class="p-23kofuku-symposium__guest-name js-open-profile-button">カゲヤマ気象台（劇作家・演出家、円盤に乗る派代表）</p>
                                    <div class="p-23kofuku-symposium__guest-profile c-white-area js-open-profile-target">
                                        <button class="p-23kofuku-symposium__close-button js-open-profile-button"></button>
                                        <div class="p-23kofuku-symposium__guest-profile-inner">
                                            <figure class="p-23kofuku-symposium__guest-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image_kageyama_square.jpg" alt="カゲヤマ気象台のプロフィール画像" width="1000" height="667">
                                                <figcaption>photo by Arata Mino</figcaption>
                                            </figure>                                                   
                                        <div class="p-23kofuku-symposium__guest-description">                          
                                                <p>1988年静岡県浜松市生まれ。早稲田大学第一文学部卒。 2008年に演劇プロジェクト「sons wo:」を設立。劇作・演出・音響デザインを手がける。</p>
                                                <p>2018年より「円盤に乗る派」に改名。2013年、『野良猫の首輪』でフェスティバル/トーキョー13公募プログラムに参加。2015年度よりセゾン文化財団セゾン・フェロー。2017年に『シティIII』で第17回AAF戯曲賞大賞受賞。2021年より共同アトリエ「円盤に乗る場」を運営。</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="p-23kofuku-symposium__guest-item js-open-profile-container js-open-profile-child">
                                    <p class="p-23kofuku-symposium__guest-name js-open-profile-button">司会：曽根千智</p>
                                    <div class="p-23kofuku-symposium__guest-profile c-white-area js-open-profile-target">
                                        <button class="p-23kofuku-symposium__close-button js-open-profile-button"></button>
                                        <div class="p-23kofuku-symposium__guest-profile-inner">
                                            <figure class="p-23kofuku-symposium__guest-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image_sone.jpg" alt="曽根千智氏のプロフィール画像" width="1046" height="1568">
                                                <figcaption>photo by Saki Chikai</figcaption>
                                            </figure>                                          
                                            <div class="p-23kofuku-symposium__guest-description">                          
                                                <p>兵庫県出身。大学卒業後、人材系IT企業にて研究開発職として働きながら、こまばアゴラ演劇学校無隣館（3期）で学ぶ。現在は、劇作、演出、ドラマトゥルク、コーディネーター、研究員として活動している。参加・演出作品に『遊行権』（19）『The City & The City: Divided Senses』（20）『マミマニア』（21）など。</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p class="p-23kofuku-symposium__price js-open-profile-next-element">
                        料金：500円<br>
                        ※本公演のチケットをお持ちの方は無料
                    </p>
                    <p class="p-23kofuku-symposium__ticket">
                        ご予約：<br>
                        <a href="https://noruha.stores.jp/?category_id=64e3117ab37ea4002e67e06b" target="blank">https://noruha.stores.jp/?category_id=64e3117ab37ea4002e67e06b</a>
                    </p>
                </div>
                <div class="p-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                            'additional_member' => '',
                            'additional_venue' => '
                            '
                        ];
                        get_template_part('template-parts/works-info', 'null', $args);
                    ?>
                </div>
            <?php endwhile; ?>
        <?php else:  ?>
            <?php echo get_the_password_form(); ?>
        <?php endif;  ?>
    <?php endif;  ?>
</main>
<?php get_footer(); ?>