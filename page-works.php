<?php
/*
Template Name: works
*/
?>
<?php get_header(); ?>
<main class="l-main c-works">
    <?php if (have_posts()): ?>
        <?php if( !post_password_required( $post->ID ) ) :  ?>
            <?php while (have_posts()): the_post(); ?>
                <section class="c-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-main-visual', 'null', $args);
                    ?>
                </section>
                <section class="c-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-description', 'null', $args);
                    ?>
                </section>
                <section class="c-works__section">
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-member', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-timetable', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-price', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-ticket', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-venue', 'null', $args);
                    ?>
                    <?php
                        $args = [
                            'cfs' => $cfs,
                        ];
                        get_template_part('template-parts/works-info-contact', 'null', $args);
                    ?>
                </section>
            <?php endwhile; ?>
        <?php else:  ?>
            <?php echo get_the_password_form(); ?>
        <?php endif;  ?>
    <?php endif;  ?>
</main>
<?php get_footer(); ?>