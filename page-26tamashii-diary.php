<?php
/*
Template Name: 26tamashii-diary
*/
?>
<?php get_header(); ?>
<?php
    function fetchOgpData($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // リダイレクトを追従

        // ▼ココを変更（DiscordのBotのフリをする）
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Discordbot/2.0; +https://discordapp.com)');

        $html = curl_exec($ch);
        curl_close($ch);

        if (!$html) return [];

        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $html);
        libxml_clear_errors();

        $xpath = new DOMXPath($dom);
        $ogpMetaTags = $xpath->query('//meta[starts-with(@property, "og:")]');

        $ogpData = [];
        foreach ($ogpMetaTags as $tag) {
            $property = str_replace('og:', '', $tag->getAttribute('property'));
            $ogpData[$property] = $tag->getAttribute('content');
        }

        return $ogpData;
    }

    /**
     * 日記リストのHTMLを表示する関数
     *
     * @param array $diaries 日記データの配列
     */
    function display_diary_list($diaries) {
        if (empty($diaries) || !is_array($diaries)) {
            return;
        }
        ?>
        <?php
            foreach ($diaries as $diary) :
            $name = $diary['name'] ?? '無名';
            $url  = $diary['url'] ?? '';

            if (empty($url)) continue;

            // x.com を 外部サービス(fxtwitter.com) に置換してフェッチする
            // ※元のコメントに合わせて fxtwitter.com を使用
            $fetch_url = str_replace('x.com', 'fxtwitter.com', $url);
            $ogp = fetchOgpData($fetch_url);

            // ?? 演算子を使って、左側が無い場合は右側を採用する
            $ogp_title = $ogp['title'] ?? '';
            $ogp_image = $ogp['image'] ?? '';
            $ogp_alt   = $ogp['image.alt'] ?? '';
            ?>
            <li class="p-26tamashii-diary__item c-white-area">
                <h3 class="p-26tamashii-diary__item-title"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>さん</h3>
                <a class="p-26tamashii-diary__item-link" href="<?php echo esc_url($url); ?>" target="_blank"><?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?></a>
                <?php if ( !empty($ogp_image) ) : ?>
                    <figure class="p-26tamashii-diary__item-image">
                        <img src="<?php echo esc_url($ogp_image); ?>" alt="<?php echo esc_attr($ogp_alt); ?>">
                        <?php if ( !empty($ogp_title) ) : ?>
                            <figcaption><?php echo esc_html($ogp_title); ?></figcaption>
                        <?php endif; ?>
                        <a href="<?php echo esc_url($url); ?>" target="_blank"></a>
                    </figure>
                <?php endif; ?>
            </li>
            <?php
        endforeach;
    }
?>

<main class="l-main p-26tamashii-diary">
    <?php if(has_post_thumbnail()) : ?>
        <div class="">
            <?php the_post_thumbnail('full'); ?>
        </div>
    <?php endif; ?>
    <h1 class="p-26tamashii-diary__title"><?php the_title(); ?></h1>
    <div class="p-26tamashii-diary__description">
        <p>説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です</p>
        <p>説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です説明です</p>
    </div>
    <section class="p-26tamashii-diary__section">
        <h2 class="p-26tamashii-diary__section-title">2026年3月12日（木）</h2>
        <ul class="p-26tamashii-diary__list">
            <?php
                $diaries = [
                    [
                        'name' => '小高大幸',
                        'url' => 'https://x.com/conc_magazine/status/2032106413561168236?s=46&t=i-0SStHTc5UX-beWDPibRg',
                    ],
                    [
                        'name' => 'さとつ',
                        'url' => 'https://satoshimurakami.net/%e6%9c%aa%e5%88%86%e9%a1%9e/12416/',
                    ],
                    [
                        'name' => '柴沼千晴',
                        'url' => 'https://chiharushiba.com/diary',
                    ],
                    [
                        'name' => '坂本彩音',
                        'url' => 'https://oyasumi-2359.hatenablog.com/entry/2026/03/21/131353?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAZnRzaAQq-5lleHRuA2FlbQIxMQBzcnRjBmFwcF9pZA8xMjQwMjQ1NzQyODc0MTQAAaeNdeT4kqkiYI-4F9XLW57noaknbw9-qAHIWureiEaB6XEB1Grdv2D3xLst0Q_aem_DzIahLY8xMXsJFpQePshAQ',
                    ],
                ];

                display_diary_list($diaries);
            ?>
        </ul>
    </section>
    <section class="p-26tamashii-diary__section">
        <h2 class="p-26tamashii-diary__section-title">2026年3月13日（金）</h2>
        <ul class="p-26tamashii-diary__list">
            <?php
                $diaries = [
                    [
                        'name' => 'マリー',
                        'url' => 'https://note.com/mofudeep/n/n22b7959e2b9a',
                    ],
                    [
                        'name' => '滝鷹介',
                        'url' => 'https://note.com/polylifestudio/n/n4be8bb158f00?sub_rt=share_sb',
                    ],
                ];

                display_diary_list($diaries);
            ?>
        </ul>

        <div class="p-26tamashii-diary__guest-article">
            <h3 class="p-26tamashii-diary__guest-article-title">2026年3月13日（金）の日記　友田とんさん</h3>
            <div class="p-26tamashii-diary__guest-article-text">
                <p>
                    朝、起きてコーヒーを入れ、朝食の支度をして妻と朝食。目玉焼きに私はトーストで妻はご飯。りんご、ジャム数種。何がきっかけであったか、食後にそのまま食卓に居座って、来月あるトークイベントのことを考える。そこでは制作の方法の話におそらくなる。ただ中身（コンテンツ）を書くのではなく、本やその流通という容れ物もつくってきたこと。中身と容れ物の両方をつくるというよりも、その境目が溶けていること。中身をつくっているはずが容れ物をつくっていたり、つくった中身が容れ物を変形してしまうこと。別にひとりですべてをやりたいと思ってやってきたわけではない。一筋縄ではいかず、出来した状況を踏まえて、一つずつステップを踏んできたらそうなっていた。簡単に中身と容れ物を分けることができない。
                </p>
                <p>
                    今日は演劇を見にいく。そのことを普段書かない日記として書くということを昨晩就寝するあたりから意識しているからか、常に自分の目というカメラが回っているような感覚がある。期せずして中身と容れ物のことを考えたが、ではこれから見に行く演劇はどこまでが演劇の中身でどこからが容れ物なのか。いつからいつまでが観劇体験なのか。そう考えると、見る前からこうして演劇について考えているのは、すでに劇場が漏れ出してきているな、などと事務所への道を歩きながら考えていた。
                </p>
                <p>
                    事務所でメールを返したり、書きかけのエッセイの原稿をプリントしたりしているうちに、とっくに出発予定の時刻になっていて急いで事務所を出る。
                </p>
                <p>
                    事務所から駅へと向かう静かな住宅街のとある民家のまえにひと月ほど前から常時見張りの警察官が立つようになったのだが、今日通りかかったら仮設のポリスボックスが設置されていた。政府要人などになると家の前に置かれる電話ボックスのようなあれだ。長期戦になるという判断なのだろう。
                </p>
                <p>
                    駅前の商店街までたどり着くと、こちらもなんだかいつもと様子が違う。人が多く、しかも動きがとどこおっている感じがする。地元の人ではなく、どの人もよそから用事で来たような人たちに見える。普段は閑散としているロータリーもなぜか人が多い。ロータリーにちょうど入ってきたバスを待つ行列ができている。バスの時刻に合わせて、いつもこんなに人が待っているだろうか？などと考えながら改札にたどりつくと、東横線が停電で一部不通になっていて、そういうことか！と合点し、そして焦る。開演に間に合うだろうか。ホームに上がると結構な数の人が待っている。向かい側を下り電車が次々に通り過ぎていく。すべてが菊名行き。こちら側も急行電車が通過していく。急行が走っているということは、遅れながらも一応動いているということだ。そのまま待っていると、ほどなくして普通電車が来る。渋谷で井の頭線に乗り、吉祥寺駅に開演30分前に着く。なんとか間に合ってよかった。
                </p>
                <p>
                    吉祥寺シアターの場所を地図で確かめたのち、そばくらいなら食べられるだろうと富士そばに入り、急いでそばを啜る。「これもう受け取りに来たの？」「何番の人が受け取りに来たのかわかんないんすよね〜」と店員さん同士で話しており、見上げると新しく導入されたらしい頭上のディスプレイには、完成して呼び出したはずの番号がいつまでもずらりと表示されたままだった。開演5分前に劇場に到着する。８割がた席が埋まっていた。着席する前にトイレに行くべきであったかもしれないと気を揉んでいるうちに照明が落ち、演劇がはじまった。
                </p>
                <p>
                    演劇でも映画でも話についていけるだろうかと最初はいつも不安だ。話の展開を把握するのが苦手で、つい細部に気を取られているうちに、置いていかれてしまう。だが、本のように戻って確かめることはできない。『「いまのところまだ存在しているわたしのたましいが……」』は、ワーグナーの歌劇『トリスタンとイゾルデ』を変奏したものであるとは先にチラシを読んで知っていた。劇の冒頭でもそう言っていた。出てくる人の名前もトリスタンやイゾルデの名を少し冗長にしたような名前になっている、と冒頭で言っていた。念のため『トリスタンとイゾルデ』の話の筋をwikipediaで読んでから来た。頭に入れてきたというほどではないが、それがどう「対応」しているのだろうか？とまるでジグソーパズルのピースをはめようと試みる感じで頭がずっと動いている。
                </p>
                <p>
                    男性は魚屋さんの白い長靴みたいなのを履き、同じような材質の肩に掛かるユニフォームを着ていて、なぜか古代ローマの人たちを思い浮かべた。この国のようでこの国でなく、現代のようで現代でない。IT企業のごくありふれた職場のようであり、新型コロナウイルスが蔓延した社会とワクチン接種のことが語られている、ようでもあるのだけれど、しかしそれがよく知っている現実と、ぴったりはまったという感触が明確には得られぬままに、劇は前へと進んでいく。どこかでこのピースをぴったりはめたてしまいたい心が常時起動していて、現実や原案との相似形を見出そうとしている。このある意味での気持ち悪さ、満たされなさが持続する。ぴたりとはまると気持ちいいのだろうなという期待感がずっとあるからか、気持ち悪さが、不思議な心地よさにもなっている。
                </p>
                <p>
                    とそんなことを考えながらも、目は舞台上で動く人を追う。なんと言えばいいのか、拳を頭上に上げるにしても、動物の着ぐるみを着たような緩慢な動き、マンガ的と言えばいいのだろうか、それがくり返されて、おもしろい。そういえば、以前に「円盤に乗る派」の演劇を駒場で見たときにも、同じようなことを思ったかもしれない。その記憶に確証はないが、確証がないからこそ、前に見たものかもしれないという不思議な心地よさがしばらく持続する。デジャヴのように、見たという確信だけがあるのとは逆の感じ。こうした持続する気持ち悪さの心地よさとは対称的に、ゾンビになってしまった人が顔を真っ白に塗って出てきたり、（ジェネリックな）赤福を頬張って死ぬなどの唐突な展開は、脈略がなく、それゆえに意表を突かれて笑ってしまう。その場所で、陰謀論や政府との癒着の話が熱く語られて、やはりこれは2026年のこの国の話なのかとまた考えるうちに、劇が終わる。
                </p>
                <p>
                    見終えてから、戯曲（へのQRコードのついた）ポストカードを買い求め、外に出るとまだ明るい。なにしろまだ４時前だ。書店を見て回ってから、ドトールへと向かう。かつてこの辺で暮らしていた時の記憶が蘇る。この並びの一軒で人と待ち合わせて飲んだな、などと思い出すが、しかしそれもそんな気がするだけかもしれない。ドトールに入り、戯曲を見返しながら、感想を書いてみようと思ったら、ポケットにあるはずの戯曲のポストカードがない。しまった、どこかで落としてしまったみたいだ。30分ほど前に見たばかりの演劇のことがもう細かには思い出せないかもしれないと焦ったが、印象に残った事柄を書き出していくと、質感や考えをめぐらせたこと、唐突に笑ったことなどが次々と連続的に思い出されていくから不思議だ。唐突に起きたことも、こうして思い出されるということは、唐突さもまた持続しているということなのだろうか。
                </p>
                <p>
                    ドトールで見たり聞こえたりしたことをきっかけに思い出されることもある。糸をより合わせるようにして思い出していく。あれはなんだったんだろう、原案や現実とどう相似形をなしているのだろう。書き出してみて、ふたたび思考をしばし浮遊させる。いつかそのピースがカチッとはまることがあるのだろうか。それはまるで体内をさまよっていたウイルスが、やがてそのスパイクタンパク質によって人の細胞の受容器にはまるようなものだ。私も誰かに何かを伝えるウイルスに、あるいはそれを妨げるワクチンになったような気持ちになった。
                </p>
                <p>
                    日が暮れて外に出て新宿に出る。ごったがえした百貨店でホワイトデーの妻へのお返しを買い求め、電車に乗る。依然として電車は停電の関係で乱れている。事務所に立ち寄り、期限の迫った経理作業をする。帰宅して豚の生姜焼きをつくる。繰り返しつくっているうちに、調味料の量は憶えてしまった。憶えたレシピ通りに作るだけ。でもこれが結構楽しい。食事は芋焼酎のソーダ割りで。今日見たことを妻に話す。どれくらい伝わったかは心許ない。食後、疲れが溜まっていて歯を磨いて寝る。
                </p>
            </div>
        </li>
    </section>
    <section class="p-26tamashii-diary__section">
        <h2 class="p-26tamashii-diary__section-title">2026年3月14日（土）</h2>
        <ul class="p-26tamashii-diary__list">
            <?php
                $diaries = [
                    [
                        'name' => 'hamato',
                        'url' => 'https://x.com/yt_indahouse/status/2032786929499140358',
                    ],
                    [
                        'name' => '鳶田夜凪',
                        'url' => 'https://x.com/tovita_yonagi/status/2032783202717446307?s=20',
                    ],
                    [
                        'name' => 'Aki Iwaya',
                        'url' => 'https://x.com/mamangao/status/2032815057994920404',
                    ],
                    [
                        'name' => 'よわさ',
                        'url' => 'https://note.com/arigatouth/n/n595ac167e967',
                    ],
                    [
                        'name' => '冨田粥',
                        'url' => 'https://note.com/_qayu/n/nc02aa85cd687',
                    ],
                    [
                        'name' => '山崎健二',
                        'url' => 'http://someisya.blog51.fc2.com/blog-entry-411.html',
                    ],
                    [
                        'name' => '小澤みゆき',
                        'url' => 'https://note.com/miyayuki7/n/n92f45d161cc8',
                    ],
                    [
                        'name' => 'HATCH',
                        'url' => 'https://mixi.jp/view_diary.pl?id=1991807974&owner_id=1572073',
                    ],
                    [
                        'name' => '垂井真',
                        'url' => 'https://note.com/afterhours_st/n/n32ee3dbac914?sub_rt=share_pb',
                    ],
                    [
                        'name' => '工藤吹',
                        'url' => 'https://note.com/z_s_lz_/n/n1c3dc86af25e?sub_rt=share_pb',
                    ],
                    [
                        'name' => '山中千瀬',
                        'url' => 'https://note.com/bit_310/n/nad73363834df?sub_rt=share_b',
                    ],
                    [
                        'name' => '山中澪',
                        'url' => 'https://twitter.com/j030i/status/2035717384871534836',
                    ],
                    [
                        'name' => '白石ころ',
                        'url' => 'https://note.com/k_oro69/n/n28d06476c83e',
                    ],
                    [
                        'name' => '佐々木朔',
                        'url' => 'https://spoken-lang.com/posts/2026/03/21/000000/',
                    ],
                ];

                display_diary_list($diaries);
            ?>
        </ul>
    </section>
    <section class="p-26tamashii-diary__section">
        <h2 class="p-26tamashii-diary__section-title">2026年3月15日（日）</h2>
        <ul class="p-26tamashii-diary__list">
            <?php
                $diaries = [
                    [
                        'name' => '森ふらち',
                        'url' => 'https://x.com/i/status/2033071998314885197',
                    ],
                    [
                        'name' => 'カネコハルナ',
                        'url' => 'https://fujibitae.hatenablog.com/entry/2026/03/16/005407',
                    ],
                ];

                display_diary_list($diaries);
            ?>
        </ul>
    </section>
</main>
<?php get_footer(); ?>