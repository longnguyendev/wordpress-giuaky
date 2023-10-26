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
		<div class="col-md-3">
			<div class="module-9">
				<?php 
				$has_sidebar_7 = is_active_sidebar('sidebar-7');
				if($has_sidebar_7) {
					dynamic_sidebar('sidebar-7');
				}
				?>
			</div>
		</div>
		<div class="col-md-6 background-content">
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
		<div class="col-md-3">
			<div class="module-10">
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 5, // Số lượng bài viết mới nhất bạn muốn hiển thị
					'orderby' => 'date',
					'order' => 'DESC',
				);

				$recent_posts = new WP_Query($args);

				if ($recent_posts->have_posts()) :
					echo '<h2>Recent Posts</h2>';
					echo '<ul>';
					while ($recent_posts->have_posts()) : $recent_posts->the_post();
						// Lấy ngày tháng của bài viết


						// Hiển thị tiêu đề bài viết và ngày tháng trong thẻ <li>
						echo '<li>';
						echo '<div class="headlinesdate">';
						echo '<div class="headlinesdm">';
						echo '<div class="headlinesday">' . get_the_date('d') . '</div>';
						echo '<div class="headlinesmonth">' . get_the_date('m') . '</div>';
						echo '</div>';
						echo '<div class="headlinesyear">' . get_the_date('y') . '</div>';
						echo '</div>';
						echo '<div class="headlinestitle">';
						echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
						echo '</div>';
						echo '</li>';
					endwhile;
					echo '</ul>';
					echo '<a class="button-see-all" href="' . get_permalink(get_option('page_for_posts')) . '">XEM TẤT CẢ TIN TỨC</a>';
				endif;

				wp_reset_postdata(); // Đặt lại trạng thái truy vấn
				?>
			</div>
		</div>
	</div>
</div>

