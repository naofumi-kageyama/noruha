<?php
/*
Template Name: 22moral-movie
*/
?>

<?php get_header(); ?>


<section class="global-wrapper">
    <?php get_template_part('template-parts/nav'); ?>

    <div class="contents-wrapper">
        <?php if (have_posts()): ?>
        <?php while (have_posts()) : the_post(); ?>
            <h1><?php echo get_the_title(); ?></h1>
            
            <article class="basicContent">
                <?php if( !post_password_required( $post->ID ) ) :  ?>
                    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
                    <video id="hls" preload="metadata" controls="" width="100%" playsinline="" poster="サムネURL"></video>

                    <script>
                    var videoSrc = 'https://noruha.net/wp-content/uploads/moral-movie/master.m3u8';
                    var video = document.getElementById("hls");
                        video.volume = 0.5;
                    var config = {maxBufferLength: 12,maxBufferSize: 10 * 1000 * 1000
                    };
                    if (Hls.isSupported()) {
                        var hls = new Hls(config);
                        hls.loadSource(videoSrc);
                        hls.attachMedia(video);
                    }
                    else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                        var hls = new Hls(config);
                        video.src = videoSrc;
                    }
                    </script>

                    <h2 class="moral-title">円盤に乗る派extra『MORAL』（如月小春作『MORAL』より）</h2>
                    <p classs="moral-info">
                        2022年11月19日〜20日<br>
                        会場：BUoY
                    </p>

                    <div class="credit-area">
                        <div class="role-area">
                            <p>演出</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">カゲヤマ気象台*</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p>1988年静岡県浜松市生まれ。早稲田大学第一文学部卒。東京と浜松の二都市を拠点として活動する。 2008年に演劇プロジェクト「sons wo:」を設立。劇作・演出・音響デザインを手がける。2018年より「円盤に乗る派」に改名。2013年、『野良猫の首輪』でフェスティバル／トーキョー13公募プログラムに参加。2015年度よりセゾン文化財団セゾン・フェロー。2017年に『シティⅢ』で第17回AAF戯曲賞大賞受賞。</p>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="credit-area">
                        <div class="role-area">
                            <p>出演</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">加賀田玲</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p><span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;1996年福島県生まれ。早稲田大学文化構想学部卒業。小田尚稔の演劇『是でいいのだ』（2020 - 2022）、亜人間都市『草、生える』（2022）などに出演。&quot;}" data-sheets-userformat="{&quot;2&quot;:6915,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;11&quot;:4,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:2236962},&quot;15&quot;:&quot;Arial, Helvetica, sans-serif&quot;}">1996年福島県生まれ。早稲田大学文化構想学部卒業。小田尚稔の演劇『是でいいのだ』（2020 &#8211; 2022）、亜人間都市『草、生える』（2022）などに出演。</span></p>
                                </div>
                            </div>
                        <div class="name">
                            <p class="open-profile">玉波さやか</p>
                            <div class="profile">
                                <span class="batsu"></span>
                                <p><span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;2021年3月早稲田大学文学部卒。在学中は劇団てあとろ50'に所属し、俳優、制作として活動。『うっかり！ハッピーエンド』、『夏じゃなくてお前のせい』（モミジノハナ）等に出演。現在は会社員。&quot;}" data-sheets-userformat="{&quot;2&quot;:15107,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;11&quot;:4,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:2236962},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:10}">2021年3月早稲田大学文学部卒。在学中は劇団てあとろ50&#8217;に所属し、俳優、制作として活動。『うっかり！ハッピーエンド』、『夏じゃなくてお前のせい』（モミジノハナ）等に出演。現在は会社員。</span></p>
                            </div>
                        </div>
                        <div class="name">
                            <p class="open-profile">ツカダソラ</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <div dir="auto">5月生まれ、京都大学総合人間学部を卒業。</div>
                                    <div dir="auto">言葉になること、声に出すことにささやかな興味があります。<wbr />ここ最近は音響のお手伝いをしたり友達に会ったりしていました。<wbr />いつか薄い煙か丸くて手触りのいい石になりたいです。</div>
                                </div>
                            </div>
                            <div class="name">
                                <p class="open-profile">冨田粥</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p><span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;1997年北海道生。早稲田大学文学部演劇映像コース卒。都内在住。リモートワークで主にシステム開発に関わる仕事をしています。プログラミングなどはできません。&quot;}" data-sheets-userformat="{&quot;2&quot;:6915,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;11&quot;:4,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:2236962},&quot;15&quot;:&quot;Arial, Helvetica, sans-serif&quot;}">1997年北海道生。早稲田大学文学部演劇映像コース卒。都内在住。リモートワークで主にシステム開発に関わる仕事をしています。プログラミングなどはできません。</span></p>
                                </div>
                            </div>
                            <div class="name">
                                <p class="open-profile">畠山峻*(PEOPLE太)</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p>1987年生まれ 北海道出身。舞台芸術学院演劇部本科58期卒。<br />円盤に乗る派プロジェクトメンバー。俳優としてブルーノプロデュース、20歳の国、亜人間都市などの作品に出演。個人演劇ユニットPEOPLE太（ピープルフトシ）としてもゆるやかに活動中。</p>
                                </div>
                            </div>
                            <div class="name">
                                <p class="open-profile">日比野桃子</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p><span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;1996年千葉県船橋市生まれ。「踊ってしまう」現象について考えている。最近の興味は、質問と回答、声と背骨、詩など。秋田県秋田市に住んでいて、新聞記者をやっている。&quot;}" data-sheets-userformat="{&quot;2&quot;:769,&quot;3&quot;:{&quot;1&quot;:0},&quot;11&quot;:4,&quot;12&quot;:0}">1996年千葉県船橋市生まれ。「踊ってしまう」現象について考えている。最近の興味は、質問と回答、声と背骨、詩など。秋田県秋田市に住んでいて、新聞記者をやっている。</span></p>
                                </div>
                            </div>
                            <div class="name">
                                <p class="open-profile">日和下駄*</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p>1995年鳥取県生まれ。2019年より円盤に乗る派に参加。以降のすべての作品に出演。特技は料理、木登り、整理整頓、人を褒めること。人が集まって美味しいご飯を食べることが好き。下駄と美味しんぼに詳しい。</p>
                                </div>
                            </div>
                            <div class="name">
                                <p class="open-profile">藤澤奈穂</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p><span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;2003年生まれ。東京藝術大学 美術学部 先端芸術表現科に在籍中。大学では現代美術、舞台芸術を学ぶ。個人史と社会を接続するための言葉と身体に関心があり、パフォーマンスや映像、テキストなどのメディアを横断しながら制作を行う。アーティストコレクティブ 牛二卵性双生児としても活動。&quot;}" data-sheets-userformat="{&quot;2&quot;:15107,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;11&quot;:4,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:2236962},&quot;15&quot;:&quot;UICTFontTextStyleBody&quot;,&quot;16&quot;:10}">2003年生まれ。東京藝術大学 美術学部 先端芸術表現科に在籍中。大学では現代美術、舞台芸術を学ぶ。個人史と社会を接続するための言葉と身体に関心があり、パフォーマンスや映像、テキストなどのメディアを横断しながら制作を行う。アーティストコレクティブ 牛二卵性双生児としても活動。</span></p>
                                </div>
                            </div>
                            <div class="name">
                                <p class="open-profile">室山栞菜</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p><span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;1998年、神奈川県生まれ。武蔵野美術大学造形学部芸術文化学科卒業。関東で美術施工をしている。&quot;}" data-sheets-userformat="{&quot;2&quot;:6915,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;11&quot;:4,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:2236962},&quot;15&quot;:&quot;Arial, Helvetica, sans-serif&quot;}">1998年、神奈川県生まれ。武蔵野美術大学造形学部芸術文化学科卒業。関東で美術施工をしている。</span></p>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="credit-area">
                        <div class="role-area">
                            <p>照明</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">みなみあかり(ACoRD)</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p>舞台照明家。ACoRD代表。舞台照明デザイナー。<br />遅れて迎えた思春期を謳歌している人。演劇を中心にミュージカル・バレエ、エンタメなどジャンルにとらわれず作品に光を灯す。バーチャルステージや京都劇場へも進出し、まだまだ新しい世界が見たい今日この頃。<br />円盤に乗る派では「清潔でとても明るい場所を」「流刑地エウロパ」などの照明デザインを担当<br />Twitter/Instagram：@akariMinami</p>
                                </div>
                            </div>
                            <div class="name">
                                <p class="open-profile">河野真衣</p>
                            </div>
                        </div>
                    </div>                
                    <div class="credit-area">
                        <div class="role-area">
                            <p>音楽</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">TOMC</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p>ビート＆アンビエント・プロデューサー。</p>
                                    <p>2015年にデビュー後、カナダ〈Inner Ocean Records〉、日本の〈Local Visions〉等から作品を発表。リリースごとに明確なコンセプトを掲げ、独自の波形編集で作り込まれたジャズ・ヒップホップやアンビエントの作品群で知られる。<br />メジャー/マイナーを問わず広範囲な音楽知識を活かし、専門誌・ウェブ媒体への寄稿～音楽プレイリスターとしてのメディア出演も多数。</p>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="credit-area">
                        <div class="role-area">
                            <p>音響</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">カゲヤマ気象台*</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p>1988年静岡県浜松市生まれ。早稲田大学第一文学部卒。東京と浜松の二都市を拠点として活動する。 2008年に演劇プロジェクト「sons wo:」を設立。劇作・演出・音響デザインを手がける。2018年より「円盤に乗る派」に改名。2013年、『野良猫の首輪』でフェスティバル／トーキョー13公募プログラムに参加。2015年度よりセゾン文化財団セゾン・フェロー。2017年に『シティⅢ』で第17回AAF戯曲賞大賞受賞。</p>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="credit-area">
                        <div class="role-area">
                            <p>美術</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">渡邊織音(グループ・野原)</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p><span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;1986年東京生まれ。建築家・舞台美術家。\n早稲田大学創造理工学部建築学科卒。\n福島・NPO法人野馬土理事。京都・北山舎メンバー。\n2017年よりグループ・野原に参画。在学時より自力建設を通した震災支援や海外WSを中心とした活動に関わり続け、設計事務所を経て現在にいたる。\n風景と力に着目し活動を続けている。\n舞台制作の過程をドローイングやスケッチを継続中。東京と山梨を往復や、移動や旅の中で創作の展開を続け、2021年より個展を再始動している。\n近年の舞台美術として、グループ・野原『自由の国のイフィゲーニエ』(2021)、ヌトミック『ぼんやりブルース』(2022)、円盤に乗る派『仮想的な失調』(2022)がある。\nhttp://wshikine.s1001.xrea.com/&quot;}" data-sheets-userformat="{&quot;2&quot;:1049345,&quot;3&quot;:{&quot;1&quot;:0},&quot;11&quot;:4,&quot;12&quot;:0,&quot;23&quot;:1}" data-sheets-textstyleruns="{&quot;1&quot;:0}{&quot;1&quot;:310,&quot;2&quot;:{&quot;2&quot;:{&quot;1&quot;:2,&quot;2&quot;:1136076},&quot;9&quot;:1}}" data-sheets-hyperlinkruns="{&quot;1&quot;:310,&quot;2&quot;:&quot;http://wshikine.s1001.xrea.com/&quot;}{&quot;1&quot;:341}">1986年東京生まれ。建築家・舞台美術家。<br />早稲田大学創造理工学部建築学科卒。<br />福島・NPO法人野馬土理事。京都・北山舎メンバー。<br />2017年よりグループ・野原に参画。在学時より自力建設を通した震災支援や海外WSを中心とした活動に関わり続け、設計事務所を経て現在にいたる。<br />風景と力に着目し活動を続けている。<br />舞台制作の過程をドローイングやスケッチを継続中。東京と山梨を往復や、移動や旅の中で創作の展開を続け、2021年より個展を再始動している。<br />近年の舞台美術として、グループ・野原『自由の国のイフィゲーニエ』(2021)、ヌトミック『ぼんやりブルース』(2022)、円盤に乗る派『仮想的な失調』(2022)がある。<br /><a class="in-cell-link" href="http://wshikine.s1001.xrea.com/" target="_blank" rel="noopener">http://wshikine.s1001.xrea.com/</a></span></p>
                                </div>
                            </div>
                            <div class="name">
                                <p class="open-profile">堀尾理沙</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p><span style="font-weight: 400;">1999年千葉県生まれ。早稲田大学大学院創造理工研究科建築学専攻に在籍。小林恵吾研究室にて建築デザインを学んでいる。</span></p>
                                    <p><span style="font-weight: 400;">人が持つ感覚や感情を追い、空間設計を通じて身体の内面にアプローチする方法を探っている。</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="credit-area">
                        <div class="role-area">
                            <p>衣装</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">永瀬泰生(隣屋)</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p><span style="font-weight: 400;">大阪出身。衣裳家・俳優として活動。演劇をつくる団体「隣屋」所属。<br /></span><span style="font-weight: 400;">国内外カンパニーの衣裳デザイン・製作・アシスタントなど。<br /></span><span style="font-weight: 400;">物語から集めた様々なモチーフをつなぎ合わせ、規定されない人間像を立ち上げる。<br /></span><span style="font-weight: 400;">身体の記憶を縫い合わせることをテーマに舞台上でリアルタイムで作品製作をするライブソーイングや、製作過程で発生したマテリアルによるグッズ製作も行う。</span></p>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="credit-area">
                        <div class="role-area">
                            <p>フライヤーデザイン</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">鈴木健太</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p>デザイン、音楽、演劇などの制作と発表。1993年生。武蔵野美術大学視覚伝達デザイン学科卒。美学校実作講座『演劇　似て非なるもの』第2期修了。バンド「山二つ」にてギター・歌など。</p>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="credit-area">
                        <div class="role-area">
                            <p>制作</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">金森千紘(infans.)</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p><span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;1981年東京都生まれ。大学で建築を学んだ後、美術書の企画営業、ポラロイドフィルムの再生産プロジェクトに従事。現代美術のギャラリーに勤務後、フリーランスとして活動。美術、パフォーミングアーツの分野でアーティストやプロジェクトのマネージメント、展覧会企画などに携わる。&quot;}" data-sheets-userformat="{&quot;2&quot;:897,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:0,&quot;11&quot;:4,&quot;12&quot;:0}">1981年東京都生まれ。大学で建築を学んだ後、美術書の企画営業、ポラロイドフィルムの再生産プロジェクトに従事。現代美術のギャラリーに勤務後、フリーランスとして活動。美術、パフォーミングアーツの分野でアーティストやプロジェクトのマネージメント、展覧会企画などに携わる。</span></p>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="credit-area">
                        <div class="role-area">
                            <p>制作補佐</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">渋木すず*</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p>1990年広島県生まれ。会社員。エッセイを書く。「ちょっとしたパーティー(@A_little_party)」という名前で餅つきや同人誌作り等々に勤しんでいる。<br />note: <a href="https://note.com/suzu_shibuki" target="_blank" rel="noopener">https://note.com/suzu_shibuki</a></p>
                                    <p>円盤に乗る派への参加に寄せて/渋木すず: <a href="https://note.com/noruha/n/n05f26a4f098d" target="_blank" rel="noopener">https://note.com/noruha/n/n05f26a4f098d</a></p>
                                </div>
                            </div>
                            <div class="name">
                                <p class="open-profile">畠山峻*</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p>1987年生まれ 北海道出身。舞台芸術学院演劇部本科58期卒。<br />円盤に乗る派プロジェクトメンバー。俳優としてブルーノプロデュース、20歳の国、亜人間都市などの作品に出演。個人演劇ユニットPEOPLE太（ピープルフトシ）としてもゆるやかに活動中。</p>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="credit-area">
                        <div class="role-area">
                            <p>記録映像</p>
                        </div>
                        <div class="name-area">
                            <div class="name">
                                <p class="open-profile">石黒萌子</p>
                                <div class="profile">
                                    <span class="batsu"></span>
                                    <p>千葉大学建築学科卒業、東京藝術大学大学院デザイン専攻修了。 在学中ウィーン応用芸術大学にて舞台美術・映像表現を学ぶ。 幼少期にはじめたクラシックバレエに影響を受け、身体感覚と空間の関係性を制作テーマとしてきた。<br>建築・舞台美術事務所での勤務を経て、写真・映像表現を軸にパフォーマンスやインスタレーションも行っている。<br>2020年より、株式会社toha代表取締役。こちらでは主に建築空間と自然に特化した映像と写真を手掛ける。</p>
                                </div>
                            </div>
                        </div>
                    </div>  
                
                    <p>*＝円盤に乗る派プロジェクトチーム</p>

                    <div class="organizer">
                        <div class="credit-area">
                            <div class="role-area">
                                <p>主催</p>
                            </div>
                            <div class="name-area">
                                <div class="name">
                                    <p>円盤に乗る派</p>
                                </div>
                            </div>
                        </div>
                        <div class="credit-area">
                            <div class="role-area">
                                <p>協力</p>
                            </div>
                            <div class="name-area">
                                <div class="name">
                                    <p>グループ・野原、隣屋、PEOPLE太、山吹ファクトリー、有楽町アートアーバニズムプログラムYAU、一般社団法人ベンチ</p>
                                </div>
                            </div>
                        </div>
                    
                    <div class="grant">
                        <p><span style="font-weight: 400;">文化庁「ARTS for the future! 2」補助対象事業</span></p>
                    </div>

                </div>
            </div>

                <?php else:  ?>
                    <img class="passImg" src="<?php echo get_template_directory_uri(); ?>/assets/images/moral-movie.jpg"/>
                    <?php echo get_the_password_form(); ?>
                <?php endif;  ?>
            </article>
        <?php endwhile; ?>
        <?php else: ?>
            <!-- 投稿が無い場合の処理 -->
        <?php endif; ?>
    </div>
</section>


<?php get_footer(); ?>