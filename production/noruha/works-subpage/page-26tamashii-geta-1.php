<?php
/*
Template Name: 26tamashii-rekishi-top
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>日和下駄の歴史に刻め！</title>
    <meta name="description" content="歴史的な俳優を目指す日和下駄が、《円盤に乗る派》新作公演のメンバーと対談。現代演劇を取り巻く状況を読み解き、これからの活動のヒントを探るポッドキャスト。">
    <link rel="canonical" href="https://noruha.net/tamashii/hiyorigeta-no-rekishi-ni-kizame/" />
    <meta property="og:title" content="日和下駄の歴史に刻め！">
    <meta property="og:description" content="歴史的な俳優を目指す日和下駄が、《円盤に乗る派》新作公演のメンバーと対談。現代演劇を取り巻く状況を読み解き、これからの活動のヒントを探るポッドキャスト。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://noruha.net/tamashii/hiyorigeta-no-rekishi-ni-kizame/" />
    <meta property="og:image" content="https://noruha.net/wp-content/themes/noruha2022/dist/images/image_rekishi-profile-ogp.webp">
    <meta property="og:image:secure_url" content="https://noruha.net/wp-content/themes/noruha2022/dist/images/image_rekishi-profile-ogp.webp">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:image:alt" content="日和下駄の歴史に刻め！">
    <meta property="og:site_name" content="日和下駄の歴史に刻め！">
    <meta property="og:locale" content="ja_JP">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@hiyorigeta">
    <meta name="twitter:title" content="日和下駄の歴史に刻め！">
    <meta name="twitter:description" content="歴史的な俳優を目指す日和下駄が、《円盤に乗る派》新作公演のメンバーと対談。現代演劇を取り巻く状況を読み解き、これからの活動のヒントを探るポッドキャスト。">
    <meta name="twitter:image" content="https://noruha.net/wp-content/themes/noruha2022/dist/images/image_rekishi-profile-ogp.webp">
    <link rel="icon" href="/wp-content/themes/noruha2022/dist/images/favicon.ico">
  <style>
    :root{
      --gothic: "Yu Gothic","Hiragino Kaku Gothic ProN","Meiryo",sans-serif;
      --mincho: "Yu Mincho","Hiragino Mincho ProN",serif;

      --border-strong: 2.5px solid #d3d6db;
      --border-thin: 1px solid #e0e0e0;
      --box-bg: rgba(246,247,248,0.85);

      --max-width: 760px;

      /* 記事サムネ＞プロフィール画像 の優先度を担保するための上限値 */
      --article-thumb-max: 320px;  /* 記事サムネの見せたい最大幅 */
      --profile-media-max: 260px;  /* 記事サムネより少し小さく */
    }

    body{
      font-family: var(--mincho);
      background:#fff;
      color:#222;
      margin:0;
    }

    .container{
      max-width: var(--max-width);
      margin:0 auto;
      padding:16px;
    }
    @media (min-width:520px){
      .container{ padding:24px; }
    }
    @media (min-width:960px){
      .container{ padding:24px 32px; }
    }
    @media (min-width:1280px){
      .container{ padding:24px 48px; }
    }

    /* タイトル画像 */
    .title-img{
      display:block;
      width:100%;
      max-width:420px;
      margin:32px auto 24px;
      object-fit:contain;
    }

    /* 概要：ボックス感強め */
    .summary-box{
      border: var(--border-thin);
      background: rgba(246,247,248,0.55);
      border-radius: 8px;
      padding: 28px 20px;
      margin-bottom: 32px;
      line-height:1.9;
      font-size:1rem;
    }

    /* 記事：基本2列、極小スマホだけ1列 */
    .article-list{
      margin-bottom:56px;
      display:grid;
      grid-template-columns: 1fr 1fr;
      gap:18px;
    }
    @media (max-width:480px){
      .article-list{ grid-template-columns:1fr; gap:14px; }
    }
    @media (min-width:960px){
      .article-list{ gap:32px; }
    }

    .article-link{
      text-decoration:none;
      color:inherit;
      display:block;
    }

    .article-card{
      background:transparent; /* ボックス無し */
      border:none;
      box-shadow:none;
      overflow:hidden;
      min-width:0;
    }

    /* トリミングしない（contain） + 変な背景色は付けない */
    .article-thumb{
      width:100%;
      max-width: var(--article-thumb-max);
      margin:0 auto;
      aspect-ratio: 16 / 9;
      height:auto;
      object-fit:contain;
      display:block;
      background:transparent;
    }

    /* タイトル/ゲスト：画像の左端に揃える（= サムネと同じ幅に揃える） */
    .article-info{
      max-width: var(--article-thumb-max);
      margin: 12px auto 0;
      display:flex;
      flex-direction:column;
      gap:6px;
      align-items:flex-start;
    }

    /* 1行に収める（長い場合は省略） */
    .article-title,
    .article-guest{
      font-family: var(--gothic);
      margin:0;
      width:100%;
      white-space:nowrap;
      overflow:hidden;
      text-overflow:ellipsis;
    }
    .article-title{
      font-size: clamp(0.95rem, 2.2vw, 1.08rem);
      font-weight:700;
      line-height:1.4;
      letter-spacing:0.01em;
    }
    .article-guest{
      font-size: clamp(0.88rem, 1.8vw, 0.98rem);
      color:#444;
      font-weight:500;
      line-height:1.4;
    }

    /* プロフィール */
    .profile-section{
      display:flex;
      flex-direction:column;
      gap:18px;
      border-top: var(--border-thin);
      border-bottom: var(--border-thin);
      padding: 28px 0 24px;
      margin-bottom:40px;
      align-items:center;
    }

    /* pad帯でも「記事サムネ＞プロフィール画像」になるよう上限を小さめに固定 */
    .profile-media{
      width:60%;
      max-width: var(--profile-media-max);
      min-width: 140px;
      display:flex;
      flex-direction:column;
      align-items:center;
      gap:10px;
    }

    .profile-img{
      width:100%;
      height:auto;
      object-fit:contain; /* トリミングなし */
      display:block;
      background:transparent;
    }

    .profile-credit{
      font-family: var(--mincho);
      font-size:0.9rem;
      color:#666;
      line-height:1.4;
      text-align:center;
      margin:0;
    }

    .profile-main{
      text-align:center;
      width:100%;
      max-width:520px;
    }

    .profile-nameset{
      font-family: var(--gothic);
      font-size:1.08rem;
      margin:0 0 10px;
      color:#222;
      font-weight:normal;
    }
    .profile-nameset .main{
      font-weight:700; /* 名前だけ太字 */
      font-size:1.13rem;
      letter-spacing:0.01em;
    }
    .profile-nameset .sub{
      font-weight:normal;
      font-size:0.98rem;
      margin-left:6px;
      color:#666;
    }

    .profile-body{
      font-family: var(--mincho);
      font-size:1rem;
      line-height:1.9;
      color:#222;
      margin:0 0 10px;
    }

    .profile-x{
      font-family: var(--gothic);
      font-size:0.98rem;
      color:#555;
      text-decoration:underline;
      margin-top:8px;
      display:inline-block;
      letter-spacing:0.01em;
    }

    /* PC：左（画像+撮影）と右（名前+本文+@）の縦を揃える */
    @media (min-width:960px){
      .profile-section{
        flex-direction:row;
        align-items:stretch;
        justify-content:center;
        gap:32px;
        padding:36px 0 32px;
      }

      .profile-media{
        width: 220px;
        max-width: 220px;
        min-width: 180px;
        align-items:flex-start;
      }

      /* 右側の高さに追従（撮影クレジット分は下に残す） */
      .profile-img{
        flex:1;
        height:100%;
      }

      .profile-credit{
        text-align:left;
        margin-top:8px;
      }

      .profile-main{
        text-align:left;
        width:auto;
        display:flex;
        flex-direction:column;
      }
    }

    .back-link{
      display:block;
      margin:0 auto 32px;
      font-family: var(--gothic);
      font-size:1rem;
      color:#222;
      text-decoration:underline;
      text-align:center;
      transition: color 0.2s;
    }
    .back-link:hover{ color:#666; }
      .summary-box p {
        margin: 0;
      }
      .credit {
        font-family: var(--gothic);
        font-size: 0.92rem;
        color: #666;
        text-align: center;
        margin-top: 24px;
        margin-bottom: 10px;
      }
    .sr-only{
      position:absolute;
      width:1px;
      height:1px;
      padding:0;
      margin:-1px;
      overflow:hidden;
      clip:rect(0,0,0,0);
      white-space:nowrap;
      border:0;
    }
  </style>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-QV80TZK3W7"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-QV80TZK3W7');
  </script>
</head>

<body>
  <div class="container">
    <h1 class="sr-only">日和下駄の歴史に刻め！</h1>
    <img class="title-img" src="/wp-content/themes/noruha2022/dist/images/image_rekishi-title.webp" alt="日和下駄の歴史に刻め！">

    <div class="summary-box">
      <p>これは、歴史的な俳優になりたい日和下駄が、円盤に乗る派の新作公演『「いまのところまだ存在しているわたしのたましいが……」』に参加しているメンバーに話を聞き、どうやったら日和下駄がその名を歴史に刻むことができるのかを考えるポッドキャスト番組です。それぞれのゲストとテーマを設定して対談を実施することで、《乗る派》の状況や現代演劇を取り巻く状況について議論を深めます。いまの状況を読み解き、その中でどのように活動をしていくことができるのか。日和下駄が歴史に名を刻むための模索は続きます。</p>
    </div>

    <div class="article-list">

      <a class="article-link" href="https://noruha.net/tamashii/hiyorigeta-no-rekishi-ni-kizame/vol1/">
        <div class="article-card">
          <img class="article-thumb" src="/wp-content/themes/noruha2022/dist/images/image_rekishi-thumb-Kageyama.webp" alt="カゲヤマ気象台">
          <div class="article-info">
            <p class="article-title">日和下駄の歴史に刻め！第一回</p>
            <p class="article-guest">ゲスト：カゲヤマ気象台</p>
          </div>
        </div>
      </a>

      <a class="article-link" href="https://noruha.net/tamashii/hiyorigeta-no-rekishi-ni-kizame/vol2/">
        <div class="article-card">
          <img class="article-thumb" src="/wp-content/themes/noruha2022/dist/images/image_rekishi-thumb-Yamamoto.webp" alt="山本ジャスティン伊等">
          <div class="article-info">
            <p class="article-title">日和下駄の歴史に刻め！第二回</p>
            <p class="article-guest">ゲスト：山本ジャスティン伊等</p>
          </div>
        </div>
      </a>

      <a class="article-link" href="https://noruha.net/tamashii/hiyorigeta-no-rekishi-ni-kizame/vol3/">
        <div class="article-card">
          <img class="article-thumb" src="/wp-content/themes/noruha2022/dist/images/image_rekishi-thumb-Hatakeyama.webp" alt="畠山峻">
          <div class="article-info">
            <p class="article-title">日和下駄の歴史に刻め！第三回</p>
            <p class="article-guest">ゲスト：畠山峻</p>
          </div>
        </div>
      </a>

      <a class="article-link" href="https://noruha.net/tamashii/hiyorigeta-no-rekishi-ni-kizame/vol4/">
        <div class="article-card">
          <img class="article-thumb" src="/wp-content/themes/noruha2022/dist/images/image_rekishi-thumb-HukasawaYokota.webp" alt="深澤しほ、横田僚平">
          <div class="article-info">
            <p class="article-title">日和下駄の歴史に刻め！第四回</p>
            <p class="article-guest">ゲスト：深澤しほ、横田僚平</p>
          </div> 
        </div>
      </a>

      <a class="article-link" href="https://noruha.net/tamashii/hiyorigeta-no-rekishi-ni-kizame/vol5/">
        <div class="article-card">
          <img class="article-thumb" src="/wp-content/themes/noruha2022/dist/images/image_rekishi-thumb-Watanabe.webp" alt="渡邊まな実">
          <div class="article-info">
            <p class="article-title">日和下駄の歴史に刻め！第五回</p>
            <p class="article-guest">ゲスト：渡邊まな実</p>
          </div>
        </div>
      </a>
      
    </div>

    <div class="profile-section">
      <div class="profile-media">
       
        <img class="profile-img" src="/wp-content/themes/noruha2022/dist/images/image_rekishi-profile.webp" alt="日和下駄">
        <p class="profile-credit">撮影：志賀耕太</p>
      </div>

      <div class="profile-main">
        <div class="profile-nameset">
          <span class="main">日和下駄</span><span class="sub">（hiyorigeta）</span>
        </div>
        <p class="profile-body">
          1995年鳥取県生まれ。俳優、制作。2019年より円盤に乗る派に参加。以降のすべての作品に出演。特技は料理、木登り、整理整頓、人を褒めること。人が集まって美味しいご飯を食べることが好き。下駄と美味しんぼに詳しい。
        </p>
        <a class="profile-x" href="https://x.com/hiyorigeta" target="_blank" rel="noopener noreferrer">@hiyorigeta</a>
      </div>
    </div>

    <p class="credit">企画：日和下駄、中條玲</p>
    <a class="back-link" href="https://noruha.net/tamashii/" target="_blank" rel="noopener noreferrer">公演ページに戻る</a>
  </div>
</body>
</html>