<?php
/*
Template Name: 22mdumbwaiter-movie
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
                        var videoSrc = 'https://noruha.net/thedumbwaiter/add824ebb1/master.m3u8';
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

                    <h2 class="moral-title">円盤に乗る派『料理昇降機』</h2>
                    <p classs="moral-info">
                        2024年5月3日（金・祝）～5月4日（土・祝）<br>
                        会場：おぐセンター　2階<br>
                        詳細：<a href="https://noruha.net/thedumbwaiter/">https://noruha.net/thedumbwaiter/</a><br>
                        <br>
                        撮影・編集：宮﨑輝
                    </p>
                <?php else:  ?>
                    <img class="passImg" src="<?php echo get_template_directory_uri(); ?>/images/image_dumbwaiter.jpg"/>
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