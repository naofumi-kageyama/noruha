<?php
/*
Template Name: next_test
*/
?>

<?php get_header(); ?>

<section class="global-wrapper">
    <?php include('menu.php'); ?>

    <div class="contents-wrapper">
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
            </div>

            <div class="next-content">
                <div class="next-detail-title">
                    <span>人々</span>
                </div>

                <?php
                    $fields = cfs()->get('people'); //親ループ
                    foreach ($fields as $field) :
                ?>
                    <div class="credit-area">
                        <div class="role-area">
                            <p><?php echo $field['role']; ?></p>
                        </div>
                        <div class="name-area">
                            <?php
                                $fields = $field['individual']; //子ループ
                                foreach ((array)$fields as $field):
                            ?>
                                <div class="name">
                                    <p class="open-profile"><?php echo $field['name']; ?></p>
                                    <?php if(!empty($field['profile'])): ?>
                                        <div class="profile">
                                            <span class="batsu"></span>
                                            <?php echo $field['profile']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>                
                <?php endforeach; ?>

                <p><?php echo $cfs->get('remarks'); ?></p>

                <div class="organizer">
                    <?php
                        $fields = cfs()->get('organizer'); //親ループ
                        foreach ($fields as $field) :
                    ?>
                        <div class="credit-area">
                            <div class="role-area">
                                <p><?php echo $field['role']; ?></p>
                            </div>
                            <div class="name-area">
                                <div class="name">
                                    <p><?php echo $field['name']; ?></p>
                                    <?php if($field['imgs-true']): ?>
                                        <?php
                                            $fields = $field['logo-imgs']; //子ループ
                                            foreach ((array)$fields as $field):
                                        ?>
                                            <img src="<?php echo $field['logo-img']; ?>">
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="grant">
                        <?php echo $cfs->get('grant'); ?>
                    </div>

                </div>
            </div>

            <div class="next-content">
                <div class="next-detail-title">
                    <span>日時</span>
                </div>
                <p>
                    <?php echo $cfs->get('timetable'); ?>
                </p>
            </div>

            <div class="next-content">
                <div class="next-detail-title">
                    <span>料金</span>
                </div>
                <p>
                    <?php echo $cfs->get('prize'); ?>
                </p>
            </div>

            <div class="next-content">
                <div class="next-detail-title">
                    <span>チケット</span>
                </div>
                <?php echo $cfs->get('ticket'); ?>
            </div>

            <div class="next-content">
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

            <div class="next-content">
                <div class="next-detail-title">
                    <span>お問い合わせ</span>
                </div>
                <?php echo $cfs->get('contact'); ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>