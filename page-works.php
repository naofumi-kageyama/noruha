<?php
/*
Template Name: works
*/
?>

<?php get_header(); ?>
<div class="renewal">
    <main class="l-main p-works">
        <?php if (have_posts()): ?>
            <?php if( !post_password_required( $post->ID ) ) :  ?>
                <?php while (have_posts()): the_post(); ?>
                    <div class="p-works__section">
                        <?php
                            $args = [
                                'cfs' => $cfs,
                                'additional' => ''
                            ];
                            get_template_part('template-parts/works-main-visual', 'null', $args);
                        ?>
                    </div>
                    <div class="p-works__section">
                        <?php
                            $args = [
                                'cfs' => $cfs,
                                'additional' => ''
                            ];
                            get_template_part('template-parts/works-description', 'null', $args);
                        ?>
                    </div>
                    <div class="p-works__section">
                        <?php
                            $args = [
                                'cfs' => $cfs,
                                'additional' => ''
                            ];
                            get_template_part('template-parts/works-info', 'null', $args);
                        ?>
                    </div>
                <?php endwhile; ?>
            <?php else:  ?>
                <?php echo get_the_password_form(); ?>
            <?php endif;  ?>
        <?php endif;  ?>
    </main>
</div>

<?php get_footer(); ?>