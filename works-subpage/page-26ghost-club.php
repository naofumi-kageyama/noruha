<?php
/*
Template Name: 26ghost-club
*/
?>
<?php get_header(); ?>
<main class="l-main">
    <?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="c-article">
            <?php if(has_post_thumbnail()) : ?>
                <div class="c-article__thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <h1 class="c-article__title">
                <?php echo get_the_title(); ?>
            </h1>
            <article class="mb-[80px] c-content">
                <div class="mb-12">
                    <p class="text-center text-lg md:text-xl font-bold">経由地は「劇場」！<br>2027年春、高円寺でクリエイティブな〈旅行〉を一緒につくりませんか？</p>
                </div>
                <div class="mb-12">
                    <p>《円盤に乗る派》は、2026年9月の『幽霊はここにいる』の上演を経て、2027年4月に座・高円寺1にて新作公演を行います。</p>
                    <p>これに合わせて、乗る派クラブでは「乗る派クラブ#3｜春の観劇パックキャンペーン（仮）」を計画しています。《円盤に乗る派》新作公演の観劇を組み込んだ「観劇パック」を、ゼロから企画・実施する〈旅行〉代理店の新規メンバーを募集します。</p>
                    <p>ここで言う〈旅行〉は単なる観光ツアーでも、解説付きの観劇ツアーでもありません。日々の生活の中から観劇の楽しみ方を発掘し、「劇場へと足を運ぶ」という体験として、自分自身でデザインすること。これこそが、わたしたちが考える〈旅行〉です。</p>
                    <p>劇場がある高円寺は、サブカルチャーと下町の気配が混ざり合い、自由で活気あふれる街です。2027年春、劇場のある街でより豊かな時間を過ごすための「体験」を一緒につくりましょう。</p>
                    <p>企画の募集の詳細については、『幽霊はここにいる』最終日に開催される説明会にて発表します。どうぞお楽しみに。</p>
                </div>
                <h2>説明会詳細</h2>
                <p>
                    日時：2026年9月26日（土）16:00〜17:00<br>
                    会場：森下スタジオ Cスタジオ<br>
                    登壇：カゲヤマ気象台、川口智子、中條玲
                </p>
                <h3>【話すこと（予定）】</h3>
                <ul>
                    <li>乗る派クラブってなに？</li>
                    <li>〈旅行〉をつくるとは？「観劇パック」とはなに？</li>
                    <li>募集概要、詳細の発表</li>
                    <li>質疑応答</li>
                </ul>
                <p><small>*後日、説明会の録音および資料の公開を行います</small></p>
                <h2>スケジュール</h2>
                <p>
                    2026年10月31日（土）｜募集締切<br>
                    2026年10月〜2027年2月｜月1回程度のプランニングミーティング、ワーク（全5回を予定）<br>
                    2027年3月｜「観劇パック」実施準備<br>
                    2027年4月中旬｜「春の観劇パックキャンペーン（仮）」実施
                </p>
                <h2>募集概要</h2>
                <h3>【対象】</h3>
                <p>どなたでも</p>
                <h3>【実施内容】</h3>
                <ul>
                    <li>《円盤に乗る派》新作公演の観劇を組み込んだ「観劇パック（＝ワークショップ）」をつくる</li>
                    <li>2027年4月新作公演時に、「観劇パック（＝ワークショップ）」を実施する</li>
                </ul>
                <h3>【参加費】</h3>
                <p>5,000円（税込）</p>
                <p>
                    <small>*参加確定後に、指定の銀行口座へ振り込みにてお支払いいただきます<br>*参加費は、「春の観劇パックキャンペーン（仮）」実施にあたって必要な資材の購入等に使用します<br>*4月の新作公演の観劇代金は、乗る派クラブで負担します<br>*参加にあたっての交通費は自己負担になります</small>
                </p>
                <h3>【エントリー】</h3>
                <p>応募フォーム：<a href="https://docs.google.com/forms/d/e/1FAIpQLSd52P94wpyybykF1AdBwK6vXD0ZPBc4OejvXuY96CPedJ5EvA/viewform" target="_blank" rel="noreferer noopener">https://docs.google.com/forms/d/e/1FAIpQLSd52P94wpyybykF1AdBwK6vXD0ZPBc4OejvXuY96CPedJ5EvA/viewform</a></p>
                <ul>
                    <li>氏名</li>
                    <li>年齢</li>
                    <li>連絡先（メールアドレス）</li>
                    <li>応募動機／最近関心があること</li>
                    <li>備考、質問事項</li>
                </ul>
                <p>
                    <small>*2026年10月〜2027年2月のプランニングミーティング／ワークは、参加者と共に日程調整を行います。原則全日程参加をお願いします。<br>*応募締め切りは2026年10月31日（土）23:59<br>*応募者多数の場合は書類選考を行います。</small>
                </p>
                <div class="flex flex-col items-end gap-4 mt-12 md:flex-row md:items-center md:gap-8">
                    <div>
                        <h2>《乗る派クラブ》とは？</h2>
                        <p>《円盤に乗る派》から派生して立ち上げられた企画チーム。創作チームとは異なる視点で多様な企画を行うことで、演劇公演を単なる作品発表の場から、ここに集う様々な人たちのための《場所》へと展開させることを目指す。</p>
                    </div>
                    <div>
                        <div class="w-40 ml-auto md:w-48"><img src="<?php echo esc_attr(get_template_directory_uri() . '/dist/images/logo_club.webp'); ?>" alt="乗る派クラブ" width="400" height="196" loading="lazy" decoding="async"></div>
                    </div>
                </div>
                <div class="c-white-area flex flex-col md:flex-row gap-[30px] md:gap-[50px] mt-12">
                    <div class="w-full max-w-[300px] shrink-0">
                        <figure>
                            <img src="<?php echo esc_attr(get_template_directory_uri() . '/dist/images/image_kawaguchi.webp'); ?>" alt="乗る派クラブ" width="600" height="400" loading="lazy" decoding="async">
                            <figcaption class="text-xs md:text-sm mt-3 text-right">写真：大野隆介</figcaption>
                        </figure>
                    </div>
                    <div>
                        <h3>【ファシリテーター】川口智子</h3>
                        <p>演出家。子どもと一緒に町で遊ぶプログラムからパンクな現代演劇まで、幅広く”劇場”をつくる。主な演出作品にコンテンポラリー・パンク・オペラ『鏡の向こう見えない私の顔』。市民／公共ホールとの取り組みに「劇場留学～『モモ』と音楽の旅～』（小田原市）、「くにたちオペラ『あの町は今日もお祭り』」など多数。まちに劇場をインストールする”con-cen”メンバーとしても活動。<a href="tomococafe.com/" target="_blank" rel="noreferer noopener">tomococafe.com/</a></p>
                    </div>
                </div>
                <p>企画：カゲヤマ気象台、川口智子、中條玲</p>
            </article>
        </section>
    <?php endwhile; ?>
    <?php else: ?>
        <p>コンテンツがありません</p>
    <?php endif; ?>
    <section class="my-[100px] first:mt-0 last:mb-0 text-sm">
        <h2 class="c-heading--h2">公演情報</h2>
        <div class="flex flex-col gap-[30px] md:flex-row md:gap-[50px]">
            <div class="max-w-[450px]">
                <div class="mb-[10px]">
                    <?php echo wp_get_attachment_image(632, 'large'); ?>
                </div>
            </div>
            <div>
                <p class="text-sm md:text-base">資本主義社会で生きるアナタに…</p>
                <p class="text-lg md:text-xl">幽霊はここにいる（作・安部公房）</p>
                <div class="my-[1em] first:mt-0 last:mb-0">
                    <h2 class="w-fit p-[5px] leading-none bg-black text-[#d6d6d6] font-semibold mb-[0.5em]">会期</h2>
                    <div>
                        <p class="my-[1em] first:mt-0 last:mb-0">2026年9月23日（水・祝）〜9月26日（土）</p>
                    </div>
                </div>
                <div class="my-[1em] first:mt-0 last:mb-0">
                    <h2 class="w-fit p-[5px] leading-none bg-black text-[#d6d6d6] font-semibold mb-[0.5em]">会場</h2>
                    <div>
                        <p class="my-[1em] first:mt-0 last:mb-0">森下スタジオ Cスタジオ（東京都江東区）</p>
                    </div>
                </div>
                <div class="my-[1em] first:mt-0 last:mb-0">
                    <h2 class="w-fit p-[5px] leading-none bg-black text-[#d6d6d6] font-semibold mb-[0.5em]">人々</h2>
                    <div>
                        <dl class="grid grid-cols-[auto_1fr] gap-x-[1em]">
                            <dt>演出</dt>
                            <dd>カゲヤマ気象台*</dd>
                            <dt>出演</dt>
                            <dd>
                                キヨスヨネスク（humunus）<br>
                                瀧腰教寛<br>
                                畠山峻*（PEOPLE太）<br>
                                日和下駄*<br>
                                深澤しほ<br>
                                油井文寧（Dr. Holiday Laboratory）
                            </dd>
                        </dl>
                        <p>*＝円盤に乗る派プロジェクトチーム</p>
                    </div>
                </div>
                <a class="c-button" href="<?php echo esc_url(home_url('/the-ghost-is-here/')); ?>">公演詳細</a>
            </div>
        </div>
    </section>
</main>
<a class="c-floating-button" href="<?php echo esc_url(home_url('/the-ghost-is-here/')); ?>#ticket">TICKET</a>
<?php get_footer(); ?>