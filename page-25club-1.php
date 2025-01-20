<?php
/*
Template Name: 25club-1
*/
?>

<?php get_header(); ?>

<section class="global-wrapper">
    <?php include('menu.php'); ?>

    <div class="contents-wrapper">
    <?php if( !post_password_required( $post->ID ) ) :  ?>
        <?php while (have_posts()): the_post(); ?>
            <div class="next-visual">
                <img src="<?php echo $cfs->get('mainvisual'); ?>">
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
        
        <?php else:  ?>
            <?php echo get_the_password_form(); ?>
        <?php endif;  ?>
    </div>
</section>

<?php get_footer(); ?>