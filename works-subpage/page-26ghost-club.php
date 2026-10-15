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
                    <div class="max-w-[600px] mx-auto">
                        <img
                            loading="lazy"
                            decoding="async"
                            src="<?php echo esc_html(get_template_directory_uri()); ?>/dist/images/image_ghost-club.webp"
                            alt="2026年11月〜2027年3月：「観劇パック」をつくる。クラブ参加者A〜Hが、それぞれ観劇パックA〜Hをつくる（ファシリテーション：川口智子／壁打ち）。2027年4月：「観劇パック」を実施する。観劇パックAに観客A、観客B、観客C、観客D、観客E…が参加する。参加者の方には、「観劇パック」をつくっていただき、観客の方に向けて実施していただきます。円盤に乗る派 新作公演 2027年4月（〇〇日××時）。上演の前後に「観劇パック」を実施します。観客の方は、選んだ「観劇パック」に参加します。乗る派クラブ 春の観劇パックキャンペーン（仮）。NORUHA CLUB"
                            width="800"
                            height="1000"
                        />
                    </div>
                </div>
                <div class="c-white-area mb-12">
                    <ul>
                        <li><a href="#greeting">ごあいさつ</a></li>
                        <li><a href="#briefing">説明会詳細</a></li>
                        <li><a href="#schedule">スケジュール</a></li>
                        <li><a href="#entry">募集概要</a></li>
                        <li><a href="#about">《乗る派クラブ》とは？</a></li>
                        <li><a href="#qa">Q&amp;A</a></li>
                    </ul>
                </div>
                <h2 id="greeting">ごあいさつ</h2>
                <div>
                    <p>最近、公演の制作として関わるとき、とりわけ「広報」と名前のついた動きをするとき、ある「バラバラさ」が実現できないかと、そして上演を観ることが実りある運動へと変容するための設計ができないかと考えています。</p>
                    <p>例えば、なにかの人文書を読んでいて、その身体のまま演劇を観にいくと、その本に書かれていることがまさしく目の前で繰り広げられているような心地がしてくることがあります。別に、上演がそのようなテーマを掲げていなくても。本に書かれている一節が上演の補助線になるような瞬間。上演が本に書かれている重力の実践を行っているような瞬間。「観る」ことにはそういう力が働きます。</p>
                    <p>観ること、そして「観客」と呼ばれる存在は何者なのでしょうか。この場所に足を運ぶまでにどんな情報を摂取して、どんな経路を辿って、どんな暮らしの中から上演に辿り着くのか。まだ出来上がっていない上演のことを説明したり、解説したり、期待感を煽るような情報よりも、まったく関係ない補助線がすーっと引かれているような方が、主体的に観ることができるのかも。主体的とは？</p>
                    <p>今回の乗る派クラブでは、そんなことに真正面から取り組みます。「観る」ということの立場から、「観る」ことは「つくる」ことだと言ってみる。自分の興味を元手に、楽しく観るための準備をして人と共有する。作品というより、自分自身への長い長い伴走のような取り組みです。ぜひ一緒に遊びましょう。</p>
                    <p class="text-right">中條玲</p>
                </div>
                <div class="mt-12">
                    <p>円盤に乗る派の公演そのもののクリエイションに入るわけではなく、関連プログラムをつくる目的でもなく、劇場という場所と時間を共有する試みとして今回の乗る派クラブ：旅行代理店企画を発表しました。</p>
                    <p>劇場という空間、とりわけ”客席”という空間に入れない時間帯、演目の準備をしている時間だったり閉館後の真夜中の時間だったり、そういう時間の”客席”の体験を、「観劇パック」として町ごと考えてみよう、というのが入口です。</p>
                    <p>パックというと劇場にお揃いの体がやってくるというイメージとはむしろ逆で、とてもバラバラであるということを拡張するような、そんな楽しみ方になればいいなと思っています。<br>
                    旅行代理店の仲間になってくださるみなさんとは、観劇パックというひとつの（そして実態としてはおそらく複数の）手段を発明するために、客席／劇場／町についてのいろんな話をしながら、まさに「クラブ活動」のように半年間を過ごしていければ嬉しいです。</p>
                    <p>楽しさや面白さ、疑問や不安も一緒に話していきたいと思います。ご応募、お待ちしています。</p>
                    <p class="text-right">川口智子</p>
                </div>
                <div class="mt-12">
                    <p>創造的であるとはどういうことだろう？ということをしばしば考えます。自分は劇作家を名乗っていて、創作をアイデンティティとする人間なので創造的であることは大事なわけですが、しかしそうでなくても創造的であることはできるし、大きな意味を持ちます。創造性を失ってしまうと、人生はいくらかつまらなくなるでしょう。</p>
                    <p>新しい料理に挑戦することも創造的だし、散歩にいつもと違う道を選ぶのも同じく創造的です。それらは文字通り新しい道を切り開き、何かと何かを別のしかたで結び直すような行為です。そういう意味で、劇場に行くというのはそれだけで創造的な行為だと思っています。惰性で劇場に行く、などということは（一部の演劇関係者にはそういう人もいるかもしれませんが）まずないでしょう。劇場は作家や俳優といった作り手だけでなく、観客の創造性も同じく渦巻いている場所である、というイメージを私は持っています。</p>
                    <p>今回の企画で、その創造性がより具体的な形をとって表れたら、というようなことをひそかに期待しています。ある観客の創造性が他の観客の創造性を刺激し、連鎖的に広がっていくとしたら、そんなに劇場らしいことはないと私は思います。</p>
                    <p class="text-right">カゲヤマ気象台</p>
                </div>
                <h2 id="briefing">説明会詳細</h2>
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
                <div class="mt-4">
                <iframe class="w-full max-w-[560px] h-auto aspect-video" width="560" height="315" src="https://www.youtube.com/embed/xT21n4FjFjI?si=gCZDmOdGXNkEQyPd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <p class="mt-3">
                    <a href="https://docs.google.com/presentation/d/1GkmgtCDun0ddbQHMVpNoXWyjmYUNHsEk/edit?usp=sharing&ouid=109692162753132272141&rtpof=true&sd=true" target="_blank" rel="noreferer noopener">当日の資料(pptx)</a>
                </p>
                <h2 id="schedule">スケジュール</h2>
                <p>
                    2026年10月31日（土）｜募集締切<br>
                    2026年10月〜2027年2月｜月1回程度のプランニングミーティング、ワーク（全5回を予定）<br>
                    2027年3月｜「観劇パック」実施準備<br>
                    2027年4月中旬｜「春の観劇パックキャンペーン（仮）」実施
                </p>
                <h2 id="entry">募集概要</h2>
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
                        <h2 id="about">《乗る派クラブ》とは？</h2>
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
                <h2 id="qa">Q&A</h2>
                <dl>
                    <dt class="font-semibold mb-2">Q.乗る派クラブとはなんですか？</dt>
                    <dd class="mb-8 last:mb-0">
                        <p>《円盤に乗る派》から派生して立ち上げられた企画チームのことです。上演と並ぶ形で様々な企画を実施しています。ワークショップや上演とは異なる体験をつくることで、演劇公演という催しを、上演の本編を鑑賞するだけの場にするのではなく、集う人たちがこの場所で「遊ぶ」ことを目指しています。</p>
                        <p>今回は、「鑑賞という体験を、鑑賞する人が自ら創造する」ということを目指して、「観劇パック」をつくるというプログラムを用意しています。</p>
                    </dd>
                    <dt class="font-semibold mb-2">Q.今回の募集は、具体的に何を募集しているのですか？</dt>
                    <dd class="mb-8 last:mb-0">
                        <p>円盤に乗る派は、4月に座・高円寺1で新作公演を実施します。そのタイミングで、「乗る派クラブ｜春の観劇パックキャンペーン（仮）」を実施します。今回の募集では、「観劇パック」をつくる人を募集しています。</p>
                        <p>参加いただく方には、ご自身の関心ごとから「観劇パック＝観劇を含む1日の体験」をつくっていただき、4月の公演のタイミングで、観客に向けて「観劇パック」を提供していただきます。</p>
                    </dd>
                    <dt class="font-semibold mb-2">Q.「観劇パック」とはなんですか？</dt>
                    <dd class="mb-8 last:mb-0">
                        <p>円盤に乗る派の新作公演を観劇することを工程に組み込んだ体験のことです。例えば、旅行に行くときに、楽しむための旅程を立てたり、訪れる場所のことを調べてみたりするイメージで、新作公演をより楽しむためのプログラムをつくってください。</p>
                    </dd>
                    <dt class="font-semibold mb-2">Q.「観劇パック」は有料で販売しますか？</dt>
                    <dd class="mb-8 last:mb-0">
                        <p>現時点では原則「無料」の体験を想定しています（観劇のチケット代金のみ）。</p>
                        <p>しかし、体験の内容によっては経費がかかることがあるかもしれません。</p>
                        <p>また、体験自体を「有料」で販売したいという意見が出た場合は、目的や趣旨を検討し、「体験に金額をつける」という観点から一緒に検討しましょう。</p>
                    </dd>
                    <dt class="font-semibold mb-2">Q.「観劇パック」の実施内容に指定はありますか？</dt>
                    <dd class="mb-8 last:mb-0">
                        <p>参加者それぞれの関心ごとをもとに、オーダーメードの「観劇パック」をつくっていきます。クラブ運営から具体的な指定をすることはありません。</p>
                        <p>具体的には、公演を実施する「高円寺」にフォーカスしたり、「円盤に乗る派」の作風にフォーカスしたり、全く関係ないモチーフから体験をつくっていただいても構いません。</p>
                    </dd>
                    <dt class="font-semibold mb-2">Q.「観劇パック」をつくる時のサポートは何がありますか？</dt>
                    <dd class="mb-8 last:mb-0">
                        <p>演出家・川口智子さんがファシリテーションを行います。それぞれの関心ごとをどのように「観劇パック」の体験へと落とし込んでいくかの壁打ちを実施します（全5回を予定）。また実施希望内容に応じて、随時、運営側からの情報提供や機会の提供を行います（例：稽古場の見学など）。</p>
                        <p>あくまで、鑑賞する視点からの「体験」の構築（作品の解説ではない）を想定しているため、基本的には一般に公開される情報が手がかりとなります。</p>
                    </dd>
                    <dt class="font-semibold mb-2">Q.参加日程はいつわかりますか？</dt>
                    <dd class="mb-8 last:mb-0">
                        <p>参加日程は、参加が確定した方と個別に調整を行います。全5回を予定していますが、全体でタイミングの調整が難しい場合でも、個別のファシリテーションを実施する予定です。</p>
                    </dd>
                    <dt class="font-semibold mb-2">Q.「観劇パック」とは具体的にはどのようなものが想定されますか？</dt>
                    <dd class="mb-8 last:mb-0">
                        <p>必ずしも限定するものではありませんが、以下のようなものが想像されます。</p>
                        <ul>
                            <li>観劇後に、幽霊と一緒に居酒屋へいく</li>
                            <li>高円寺の街の歴史についてリサーチをして観劇日に備える</li>
                            <li>公演と同日に実施されるイベントとハシゴをする</li>
                            <li>観劇後に街歩きをしながら感想戦を行う</li>
                        </ul>
                    </dd>
                </dl>
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