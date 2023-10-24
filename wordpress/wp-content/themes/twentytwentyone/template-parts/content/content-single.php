<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <?php
            $has_sidebar_7 = is_active_sidebar('sidebar-7');

            if ($has_sidebar_7) { ?>

                <div class="footer-widgets column-two grid-item">
                    <?php dynamic_sidebar(index: 'sidebar-7'); ?>
                </div>

            <?php }
            ?>

        </div>
        <div class="col-8 background-content">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <!-- Sua module 6 -->
            <header class="line container alignwide">

                    <div class="detail">
                        <div class=" row title pt-4">
                            <div class="col-md-10">
                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            </div>
                            <div class="col-md-2">
                                <?php 
                                    $day = get_the_date('d');
                                    $month = get_the_date('m');
                                    $year = get_the_date('y');
                                ?>
                                <div class="headlinesdate">
                                    <div class="headlinesdm">
                                        <div class="headlinesday"><?php echo $day ?></div>
                                        <div class="headlinesmonth"><?php echo $month ?></div>
                                    </div>
                                    <div class="headlinesyear">
                                        '<?php echo $year ?></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php twenty_twenty_one_post_thumbnail(); ?>

            </header><!-- .entry-header -->

                <div class="container">
                    <div class="entry-contenc">
                        <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
                                'after'    => '</nav>',
                                /* translators: %: Page number. */
                                'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
                            )
                        );
                        ?>
                    </div><!-- .entry-content -->
                </div><!-- .entry-content -->

                <footer class="entry-footer editfooter">
                    <?php twenty_twenty_one_entry_meta_footer(); ?>
                </footer><!-- .entry-footer -->

                <?php if (!is_singular('attachment')) : ?>
                    <?php get_template_part('template-parts/post/author-bio'); ?>
                <?php endif; ?>

            </article><!-- #post-<?php the_ID(); ?> -->
        </div>
        <div class="col-2">
            <?php
            $has_sidebar_8 = is_active_sidebar('sidebar-8');

            if ($has_sidebar_8) { ?>

                <div class="footer-widgets column-two grid-item">
                    <?php dynamic_sidebar(index: 'sidebar-8'); ?>
                </div>

            <?php }
            ?>
        </div>
    </div>
</div>

