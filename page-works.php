<?php
/*
Template Name: works
*/
?>

<?php get_header(); ?>
<div class="renewal">
<?php include('menu.php'); ?>
    <main class="l-main p-works">        
        <?php if (have_posts()): ?>
            <?php if( !post_password_required( $post->ID ) ) :  ?>
                <?php while (have_posts()): the_post(); ?>
                    <div class="p-works__section p-works-main-visual">
                        <div class="p-works-main-visual__main-visual">
                            <img src="<?php echo esc_url($cfs->get('mainvisual')); ?>">
                        </div>
                        <div class="p-works-main-visual__title-container">
                            <h1 class="p-works-main-visual__title"><?php the_title(); ?></h1>
                            <p class="p-works-main-visual__subtitle"><?php echo $cfs->get('subtitle'); ?></p>
                        </div>
                        <div class="p-works-main-visual__info-wrapper">
                            <div class="p-works-main-visual__info-container">
                                <h3 class="p-works-main-visual__info-heading c-heading-black-background">会期</h3>
                                <p class="p-works-main-visual__info-text next-detail-text"><?php echo esc_html($cfs->get('date')); ?></p>
                            </div>
                            <div class="p-works-main-visual__info-container">
                            <h3 class="p-works-main-visual__info-heading c-heading-black-background">会場</h3>
                                <p class="p-works-main-visual__info-text"><?php echo esc_html($cfs->get('venue')); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="p-works__section p-works-description">
                        <p class="p-works-description__copy"><?php echo $cfs->get('catch'); ?></p>
                        <div class="p-works-description__text c-rich-text next-description">
                            <?php echo apply_filters("the_content",$cfs->get('description')); ?>
                        </div>
                        <?php if(!empty($post->post_content)): ?>
                            <div class="p-works-description__content c-content">
                                <?php the_content(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-works__section p-works-info">
                        <div class="p-works-info__section">
                            <h2 class="p-works-info__section-heading c-heading-black-background">人々</h2>
                            <div class="p-works-info__member-list-container">
                                <dl class="p-works-info__member-list js-open-profile-parent-wrapper">
                                    <?php
                                        $fields = cfs()->get('people');
                                        foreach ($fields as $field) :
                                    ?>
                                        <div class="p-works-info__member-terms-container js-open-profile-parent">
                                            <dt class="p-works-info__member-terms"><?php echo esc_html($field['role']); ?></dt>
                                            <dd class="p-works-info__member-description js-open-profile-children-wrapper">
                                                <?php
                                                    $fields = $field['individual'];
                                                    foreach ((array)$fields as $field):
                                                ?>
                                                    <div class="p-works-info__member-container js-open-profile-container js-open-profile-child">
                                                        <p class="p-works-info__member-name js-open-profile-button"><?php echo esc_html($field['name']); ?></p>
                                                        <?php if(!empty($field['profile'])): ?>
                                                            <div class="p-works-info__member-profile c-white-area c-rich-text js-open-profile-target">
                                                                <button class="c-white-area__close"></button>
                                                                <?php echo apply_filters("the_content", $field['profile']); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </dd>
                                        </div>
                                    <?php endforeach; ?>
                                </dl>
                                <p class="p-works-info__member-remarks"><?php echo esc_html($cfs->get('remarks')); ?></p>
                            </div>

                            <div class="p-works-info__organizer-list-container">
                                <dl class="p-works-info__organizer-list">
                                    <?php
                                        $fields = cfs()->get('organizer'); //親ループ
                                        foreach ($fields as $field) :
                                    ?>
                                        <div class="p-works-info__organizer-terms-container">
                                            <dt class="p-works-info__organizer-terms"><?php echo esc_html($field['role']); ?></dt>
                                            <dd class="p-works-info__organizer-description">
                                            <?php echo nl2br(esc_textarea($field['name'])); ?>
                                                    <?php if($field['imgs-true']): ?>
                                                        <!-- <div class="organizer-logo-wrap">
                                                            <?php
                                                                $fields = $field['logo-imgs']; //子ループ
                                                                foreach ((array)$fields as $field):
                                                            ?>
                                                                <img src="<?php echo $field['logo-img']; ?>">
                                                            <?php endforeach; ?>
                                                        </div> -->
                                                    <?php endif; ?>
                                            </dd>
                                        </div>
                                    <?php endforeach; ?>
                                </dl>
                                <table class="credit-area">
                                </table>

                                <div class="grant">
                                    <?php echo $cfs->get('grant'); ?>
                                </div>
                            </div>
                        </div>
                        <div id="timetable" class="p-works-info__section">
                            <h2 class="p-works-info__section-heading c-heading-black-background">日時</h2>
                            <p>
                                <?php echo $cfs->get('timetable'); ?>
                            </p>
                        </div>
                        <div id="price" class="p-works-info__section">
                            <h2 class="p-works-info__section-heading c-heading-black-background">料金</h2>
                            <p>
                                <?php echo $cfs->get('price'); ?>
                            </p>
                        </div>
                        <div id="ticket" class="p-works-info__section">
                            <h2 class="p-works-info__section-heading c-heading-black-background">チケット</h2>
                            <?php echo $cfs->get('ticket'); ?>
                        </div>
                        <div id="venue" class="p-works-info__section">
                            <h2 class="p-works-info__section-heading c-heading-black-background">会場</h2>
                            <div class="next-venue-logo">
                                <?php echo $cfs->get('next-venue-logo'); ?>
                            </div>
                            <div class="next-venue-detail">
                                <?php echo $cfs->get('next-venue-detail'); ?>
                            </div>
                        </div>
                        <div id="contact" class="p-works-info__section">
                            <h2 class="p-works-info__section-heading c-heading-black-background">お問い合わせ</h2>
                            <?php echo $cfs->get('contact'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else:  ?>
                <?php echo get_the_password_form(); ?>
            <?php endif;  ?>
        <?php endif;  ?>
    </main>
</div>

<?php get_footer(); ?>