<?php get_header(); ?>
<main class="p-top">
    <section class="p-top__section p-top__left">
        <div class="p-top__section-inner p-top-next-section">
            <h2 class="p-top-next-section__heading top-left-title">Next Exhibition Information</h2>
            <?php
                $args = array(
                    'post_type'      => 'page',
                    'pagename'       => 'the-ghost-is-here',
                    'posts_per_page' => 1,
                );

                $query = new WP_Query( $args );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post();
                        ?>
                        <div class="p-top-next-section__main-visual">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/image_coming-soon.webp" alt="coming soon" width="1080" height="1080" loading="lazy" decoding="async">
                            <?php endif; ?>
                        </div>
                        <div class="p-top-next-section__title-container">
                            <?php if (get_field('header')): ?>
                                <p class="p-top-next-section__title-header"><?php echo get_field('header'); ?></p>
                            <?php endif; ?>
                            <h3 class="p-top-next-section__title"><?php echo get_the_title(); ?></h3>
                            <?php if (get_field('subtitle')) : ?>
                                <p class="p-top-next-section__subtitle"><?php echo get_field('subtitle'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="p-top-next-section__description-container">
                            <div class="p-top-next-section__description-section">
                                <h4 class="p-top-next-section__description-heading c-heading--black">会期</h4>
                                <div class="p-top-next-section__description-text-container">
                                    <p class="p-top-next-section__date"><?php echo esc_html(get_field('date')); ?></p>
                                </div>
                            </div>
                            <div class="p-top-next-section__description-section">
                                <h4 class="p-top-next-section__description-heading c-heading--black">会場</h4>
                                <div class="p-top-next-section__description-text-container">
                                    <p class="p-top-next-section__venue-name"><?php echo esc_html(get_field('venue')); ?></p>
                                </div>
                            </div>
                            <div class="p-top-next-section__description-section">
                                <h4 class="p-top-next-section__description-heading c-heading--black">人々</h4>
                                <div class="p-top-next-section__description-text-container">
                                    <dl class="p-top-next-section__people-list">
                                        <dt class="p-top-next-section__people-term">演出</dt>
                                        <dd class="p-top-next-section__people-description">カゲヤマ気象台*</dd>
                                    </dl>
                                    <dl class="p-top-next-section__people-list">
                                        <dt class="p-top-next-section__people-term">出演</dt>
                                        <dd class="p-top-next-section__people-description">
                                            キヨスヨネスク（humunus）<br>
                                            瀧腰教寛<br>
                                            畠山峻*（PEOPLE太）<br>
                                            日和下駄*<br>
                                            深澤しほ<br>
                                            油井文寧（Dr. Holiday Laboratory）
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="p-top-next-section__description-section c-content">
                                <p>*=円盤に乗る派プロジェクトメンバー</p>
                            </div>
                        </div>
                        <a class="p-top-next-section__button" href="<?php echo esc_html(get_the_permalink()); ?>">詳細</a>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>
        </div>
    </section>
    <section class="p-top__section p-top__right">
        <div class="p-top__section-inner p-top-main-section">
            <?php get_template_part('template-parts/nav'); ?>
            <div class="p-top-main-section__copy-container js-marquee">
                <p class="p-top-main-section__copy">人間のかたちをして生きていくとき大事なのは、いつでも円盤に乗れるようにしておくことだ。</p>
            </div>
            <?php
                $image = get_field('image');
                if(!empty($image)) :
                    ?>
                    <div class="p-top-main-section__main-visual-container">
                        <figure class="p-top-main-section__main-visual">
                            <img
                                src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_html($image['alt']); ?>"
                                width="<?php echo esc_attr($image['sizes'][ 'large-width' ]); ?>"
                                height="<?php echo esc_attr($image['sizes'][ 'large-height' ]); ?>"
                                loading="lazy" decoding="async"
                            >
                            <?php if(get_field('caption')) : ?>
                            <figcaption><?php echo esc_html(get_field('caption')); ?></figcaption>
                            <?php endif; ?>
                        </figure>
                    </div>
                    <?php
                endif;
            ?>
            <div id="declaration" class="p-top-main-section__section">
                <h2 class="p-top-main-section__section-heading">円盤に乗る派宣言</h2>
                <div class="p-top-main-section__section-content">
                    <p>「架空の存在であってはならない。大きな声を出してはならない。誰でもここで生きることはできる。静かで自由な場所に、円盤はやってくる。誰も興味はないかもしれないけれど、それに乗るということはよい物語だ。人間のかたちをして生きていくとき大事なのは、いつでも円盤に乗れるようにしておくことだ。そこでは見たことのない、知らないものがなぜか親しい。価値は過剰にはならない。然るべき未来について考える。時間は経っているが、周りに気づかれるほど長くはない。帰ってきたときも、誰にも興味はもたれない。」
                    </p>
                </div>
            </div>
            <div class="p-top-main-section__section">
                <h2 class="p-top-main-section__section-heading">円盤に乗る派について</h2>
                <div class="p-top-main-section__section-content p-top-main-section__about-content c-content">
                    <p>円盤に乗る派は複数の作家・表現者が一緒にフラットにいられるための時間、あるべきところにいられるような場所を作るプロジェクトとして、2018年にスタートしました。軸になるのはカゲヤマ気象台による上演作品ですが、様々なプログラムや冊子の発行、シンポジウムなどを並行して行います。<br>ここで試みられるのは匿名／顕名が平等になる場所です。誰でも発信が可能であり、大きな民衆の声が響き渡る世界の中で、小さな声が守られる場所はとても貴重です。さまざまな声が飛び交ううるさい場所を逃れて、そこであればしっかりものを見、考え、落ち着くことのできるという場所を確保します。それは演劇にまつわるあらゆる要素を、生活とダイレクトに接続するということでもあります。このプロジェクトを通じて、種々の、色んな意味で「実際に活用できる」アイディアを提唱します。ここを訪れた観客たちが各々の生活の中で、それらを実践し、少しでもより生きやすくなることができればと思います。<br>いつか現れる円盤に乗るということに、強い目的も思想もありません。それはただ「円盤に乗ってみた」という事実が残るだけです。他の人に何ら影響を与えることもなく、大きな社会にとって何の関係もありません。しかし「円盤に乗った人」と「乗らなかった人」は明らかに何かが違ってしまったはずであり、あくまで個人的なその変化に興味を持つ人々、誰にも気づかれない秘密を抱えたい人間たちこそ、「円盤に乗る派」と呼べるでしょう。
                    </p>
                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="c-button p-top-main-section__button">more</a>
                </div>
            </div>
            <div class="p-top-main-section__section">
                <h2 class="p-top-main-section__section-heading">プロジェクトメンバー</h2>
                <div class="p-top-main-section__section-content p-top-main-section__members-content">
                    <div class="p-top-main-section__members-image">
                        <img width="2000" height="1334"
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_members.webp"
                            alt="円盤に乗る派のメンバー写真" loading="lazy" decoding="async" />
                    </div>
                    <div class="p-top-main-section__members-column-wrapper js-member-open-column-wrapper">
                        <div class="p-top-main-section__members-column js-member-open-column">
                            <div class="p-top-main-section__member-container js-member-open-container">
                                <div class="p-top-main-section__member-image-container js-member-open-button">
                                    <img width="720" height="480"
                                        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_kageyama_off.webp"
                                        class="p-top-main-section__member-image--off" alt="カゲヤマ気象台の写真" loading="lazy" decoding="async" />
                                    <img width="720" height="480"
                                        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_kageyama_on.webp"
                                        class="p-top-main-section__member-image--on" alt="カゲヤマ気象台の写真" loading="lazy" decoding="async" />
                                </div>
                                <h3 class="p-top-main-section__member-heading">カゲヤマ気象台</h3>
                                <div class="p-top-main-section__member-description c-content js-member-open-target">
                                    <p>劇作家・演出家。1988年静岡県浜松市生まれ。演劇プロジェクト《円盤に乗る派》代表。2015年よりセゾン文化財団セゾン・フェローに選出。『シティⅢ』で第17回AAF戯曲賞大賞受賞。代表的な作品に『仮想的な失調』（《東京芸術祭 2024》プログラム）、『「いまのところまだ存在しているわたしのたましいが……」』（2026）など。共同アトリエ／コミュニティである《円盤に乗る場》を2021年より運営中。</p>
                                    <a href="<?php echo esc_url(home_url('/about/#kageyama')); ?>" class="c-button p-top-main-section__button">more</a>
                                </div>
                            </div>
                            <div class="p-top-main-section__member-container js-member-open-container">
                                <div class="p-top-main-section__member-image-container js-member-open-button">
                                    <img width="720" height="480"
                                        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_geta_off.webp"
                                        class="p-top-main-section__member-image--off" alt="日和下駄の写真" loading="lazy" decoding="async" />
                                    <img width="720" height="480"
                                        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_geta_on.webp"
                                        class="p-top-main-section__member-image--on" alt="日和下駄の写真" loading="lazy" decoding="async" />
                                </div>
                                <h3 class="p-top-main-section__member-heading">日和下駄</h3>
                                <div class="p-top-main-section__member-description c-content js-member-open-target">
                                    <p>1995年鳥取県生まれ。2019年より円盤に乗る派に参加。以降のすべての作品に出演。特技は料理、木登り、整理整頓、人を褒めること。人が集まって美味しいご飯を食べることが好き。下駄と美味しんぼに詳しい。</p>
                                    <a href="<?php echo esc_url(home_url('/about/#geta')); ?>" class="c-button p-top-main-section__button">more</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-top-main-section__members-column js-member-open-column">
                            <div class="p-top-main-section__member-container js-member-open-container">
                                <div class="p-top-main-section__member-image-container js-member-open-button">
                                    <img width="720" height="480"
                                        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_hatakeyama_off.webp"
                                        class="p-top-main-section__member-image--off" alt="畠山峻の写真" loading="lazy" decoding="async" />
                                    <img width="720" height="480"
                                        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_hatakeyama_on.webp"
                                        class="p-top-main-section__member-image--on" alt="畠山峻の写真" loading="lazy" decoding="async" />
                                </div>
                                <h3 class="p-top-main-section__member-heading">畠山峻</h3>
                                <div class="p-top-main-section__member-description c-content js-member-open-target">
                                    <p>1987年北海道札幌市生まれ。舞台芸術学院演劇部本科卒。俳優としてブルーノプロデュース、20歳の国、亜人間都市などの作品に出演。カゲヤマ気象台の作品では『おはようクラブ』『野生のカフカ＠おいしいカレー』『流刑地エウロパ』などに出演。演劇ユニットpeople太では演出をしています。<br><a href="http://people-futoshi.blogspot.com/" target="blank">http://people-futoshi.blogspot.com/</a></p>
                                    <a href="<?php echo esc_url(home_url('/about/#hatakeyama')); ?>" class="c-button p-top-main-section__button">more</a>
                                </div>
                            </div>
                            <div class="p-top-main-section__member-container js-member-open-container">
                                <div class="p-top-main-section__member-image-container js-member-open-button">
                                    <img width="1000" height="667"
                                        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_shibuki_off.webp"
                                        class="p-top-main-section__member-image--off" alt="渋木すずの写真" loading="lazy" decoding="async" />
                                    <img width="1000" height="667"
                                        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/image_shibuki_on.webp"
                                        class="p-top-main-section__member-image--on" alt="渋木すずの写真" loading="lazy" decoding="async" />
                                </div>
                                <h3 class="p-top-main-section__member-heading">渋木すず</h3>
                                <div class="p-top-main-section__member-description c-content js-member-open-target">
                                    <p>1990年広島県生まれ。会社員。エッセイを書く。「ちょっとしたパーティー(@A_little_party)」という名前で餅つきや同人誌作り等々に勤しんでいる。<br>
                                    note: <a href="https://note.com/suzu_shibuki" target="blank">https://note.com/suzu_shibuki</a></p>
                                    <p>円盤に乗る派への参加に寄せて/渋木すず: <a href="https://note.com/noruha/n/n05f26a4f098d" target="blank">https://note.com/noruha/n/n05f26a4f098d</a></p>
                                    <a href="<?php echo esc_url(home_url('/about/#shibuki')); ?>" class="c-button p-top-main-section__button">more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="p-top-main-section__members-image-credit js-member-open-next-element">Photography by Arata Mino</p>
                </div>
            </div>
        </div>
        <p class="p-top__copyright">&copy; <?php echo date('Y'); ?> noruha</p>
    </section>
</main>
<?php get_footer(); ?>