<?php
/*
Template Name: 26tamashii-diary
*/
?>
<?php get_header(); ?>
<?php
    function fetchOgpData($url, $cacheTime = 3600) {
        $cacheDir = __DIR__ . '/cache';

        // キャッシュディレクトリが存在しない場合は作成する
        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }

        // URLから一意のファイル名を生成 (URLの長さを揃えて安全に扱うためにmd5ハッシュ化)
        $cacheFile = $cacheDir . '/ogp_' . md5($url) . '.json';

        // 1. キャッシュが存在し、かつ有効期限内（デフォルト1時間）であればそれを返す
        if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
            $cachedData = file_get_contents($cacheFile);
            if ($cachedData !== false) {
                $parsedData = json_decode($cachedData, true);
                if (is_array($parsedData)) {
                    return $parsedData;
                }
            }
        }
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
            if (!($tag instanceof DOMElement)) continue;
            $property = str_replace('og:', '', $tag->getAttribute('property'));
            $ogpData[$property] = $tag->getAttribute('content');
        }

        if (!empty($ogpData)) {
            file_put_contents($cacheFile, json_encode($ogpData, JSON_UNESCAPED_UNICODE));
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

<main id="top" class="l-main p-26tamashii-diary">
    <div class="c-article">
        <section class="p-26tamashii-diary__section">
            <?php if(has_post_thumbnail()) : ?>
                <div class="c-article__thumbnail">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>
            <h1 class="p-26tamashii-diary__title"><?php the_title(); ?></h1>
            <div class="p-26tamashii-diary__description">
                <p>円盤に乗る派の公演<a href="<?php echo esc_url(home_url('/tamashii/')); ?>">『「いまのところまだ存在しているわたしのたましいが……」』</a>では、ご来場くださったみなさんから<a href="<?php echo esc_url(home_url('/submit-diary/')); ?>">">観劇した日の日記を募集</a>いたしました。たくさんのご応募、誠にありがとうございました。</p>
                <p>お寄せいただいた日記を一覧にして紹介いたします。いただいた日記からは、あの日劇場に集まったみなさんの生活や思考の軌跡をたどることができます。これを読むみなさんも、あの時期をどのように過ごしていたか、あるいは今どのように日々を送っているか、ふと立ち止まって思いを馳せてみるきっかけもなるかもしれません。</p>
            </div>
            <ul class="p-26tamashii-diary__toc c-white-area">
                <li class="p-26tamashii-diary__toc-item">
                    <a href="#diary1">2026年3月12日（木）</a>
                </li>
                <li class="p-26tamashii-diary__toc-item">
                    <a href="#diary2">2026年3月13日（金）</a>
                </li>
                <li class="p-26tamashii-diary__toc-item">
                    <a href="#diary3">2026年3月14日（土）</a>
                </li>
                <li class="p-26tamashii-diary__toc-item">
                    <a href="#diary4">2026年3月15日（日）</a>
                </li>
            </ul>
        </section>
        <section id="diary1" class="p-26tamashii-diary__section">
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
        <section id="diary2" class="p-26tamashii-diary__section">
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
        </section>
        <section id="diary3" class="p-26tamashii-diary__section">
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
        <section id="diary4" class="p-26tamashii-diary__section">
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
        <section class="p-26tamashii-diary__section p-26tamashii-card">
        <div class="p-26tamashii-card__left">
            <div class="p-26tamashii-card__image">
                <?php
                    if(has_post_thumbnail( 478 )) {
                        echo get_the_post_thumbnail( 478, 'large' );
                    }
                ?>
            </div>
        </div>
        <div class="p-26tamashii-card__right">
            <h2 class="p-26tamashii-card__title">「いまのところまだ存在しているわたしのたましいが……」</h2>
            <dl class="p-26tamashii-card__info">
                <dt class="p-26tamashii-card__info-term c-heading-black-background">会期</dt>
                <dd class="p-26tamashii-card__info-description">2026年3月12日（木）～15日（日）</dd>
                <dt class="p-26tamashii-card__info-term c-heading-black-background">会場</dt>
                <dd class="p-26tamashii-card__info-description">吉祥寺シアター（東京都武蔵野市）</dd>
            </dl>
            <a href="<?php echo esc_url(home_url('/tamashii/')); ?>" class="c-button p-26tamashii-card__button">公演詳細</a>
        </div>
    </section>
    </div>
    <a class="c-floating-button" href="#top">TOP</a>
</main>
<?php get_footer(); ?>