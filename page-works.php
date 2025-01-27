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
                        <div class="next-copy">
                            <p><?php echo $cfs->get('catch'); ?></p>
                        </div>
                        <div class="next-description">
                            <?php echo $cfs->get('description'); ?>
                            <?php if(!empty($post->post_content)): ?>
                                <?php the_content(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="p-works__section p-works-info">
                        <div id="people" class="next-content">
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
                                <table class="credit-area">
                                <?php
                                    $fields = cfs()->get('organizer'); //親ループ
                                    foreach ($fields as $field) :
                                ?>
                                    <tr>
                                        <th class="role-area">
                                            <p><?php echo $field['role']; ?></p>
                                        </th>
                                        <td class="name-area">
                                            <div class="name">
                                                <p><?php echo $field['name']; ?></p>
                                                <?php if($field['imgs-true']): ?>
                                                    <div class="organizer-logo-wrap">
                                                        <?php
                                                            $fields = $field['logo-imgs']; //子ループ
                                                            foreach ((array)$fields as $field):
                                                        ?>
                                                            <img src="<?php echo $field['logo-img']; ?>">
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </table>

                                <div class="grant">
                                    <?php echo $cfs->get('grant'); ?>
                                </div>
                            </div>
                        </div>
                        <div id="timetable" class="next-content">
                            <div class="next-detail-title">
                                <span>日時</span>
                            </div>
                            <p>
                                <?php echo $cfs->get('timetable'); ?>
                            </p>
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
                    </div>
                <?php endwhile; ?>
            <?php else:  ?>
                <?php echo get_the_password_form(); ?>
            <?php endif;  ?>
        <?php endif;  ?>
    </main>
</div>

<?php get_footer(); ?>