<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="module-13">
				<h2>Trang mới nhất</h2>
				<?php
				$args = array(
					'post_type' => 'page',
					'posts_per_page' => 3,
					'order' => 'DESC',
					'orderby' => 'date',
				);

				$query = new WP_Query($args);

				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();

						$title = get_the_title();
						$content = wp_trim_words(get_the_content(), 30); // Giới hạn nội dung 30 từ
						$thumbnail = get_the_post_thumbnail(get_the_ID()); // Lấy ảnh đại diện nhỏ

						// Hiển thị thông tin trang
						echo '<h4>' . $title . '</h4>';
						echo '<hr>';
						echo $thumbnail; // Hiển thị ảnh đại diện
						echo '<p>' . $content . '</p>';
					}
					wp_reset_postdata();
				}
				?>
			</div>
		</div>
		<div class="col-md-6 pt-2 px-5 background-content">
			<?php
			if (have_posts()) {
			?>
				<!-- <header class="page-header alignwide">
					<h1 class="page-title">
						<?php
						// printf(
							/* translators: %s: Search term. */
						// 	esc_html__('Results for "%s"', 'twentytwentyone'),
						// 	'<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
						// );
						// ?>
					</h1>
				</header> -->
				<!-- .page-header -->

				<!-- <div class="search-result-count default-max-width">
					<?php
					printf(
						esc_html(
							/* translators: %d: The number of search results. */
							_n(
								'We found %d result for your search.',
								'We found %d results for your search.',
								(int) $wp_query->found_posts,
								'twentytwentyone'
							)
						),
						(int) $wp_query->found_posts
					);
					?>
				</div> -->
				<!-- .search-result-count -->
				<?php
				// Start the Loop.
				while (have_posts()) {
					the_post();

					/*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
					get_template_part('template-parts/content/content-excerpt', get_post_format());
				} // End the loop.

				// Previous/next page navigation.
				twenty_twenty_one_the_posts_navigation();

				// If no content, include the "No posts found" template.
			} else { ?>
				<div class="module-4">
					<?php get_template_part('template-parts/content/content-none'); ?>
				</div>
			<?php
			} ?>
		</div>
		<div class="col-md-3">
			<?php
			$has_sidebar_5 = is_active_sidebar('sidebar-5');

			if ($has_sidebar_5) { ?>

				<div class="footer-widgets column-two grid-item">
					<?php dynamic_sidebar(index: 'sidebar-5'); ?>
				</div>

			<?php }
			?>
		</div>
		<!-- Lasted Post -->
	</div>
	<div class="module-15 default-max-width">
		<h1>Lastest News</h1>
		<?php
		// Lấy danh sách các bài viết từ widget "Latest Posts"
		$recent_posts = wp_get_recent_posts(array(
			'numberposts' => 5,  // Số lượng bài viết bạn muốn hiển thị
			'post_status' => 'publish'
		));

		// Duyệt qua danh sách bài viết và hiển thị thông tin
		foreach ($recent_posts as $post) {
			echo '<div class ="post-card row" >';
			echo '<h4 class="post-title col-md-9"><a href="' . get_permalink($post['ID']) . '">' . $post['post_title'] . '</a></h4>'; // Tiêu đề bài viết
			echo '<h5 class="post-crated-at col-md-3">' . date('d M Y', strtotime($post['post_date'])) . '</h5>'; // Thời gian đăng bài viết
			if (strlen($post['post_content']) > 251) {
				echo '<p>' . substr($post['post_content'], 0, 251) . '...' . '</p>'; // Nội dung bài viết
			} else {
				echo '<p>' . $post['post_content'] . '</p>'; // Nội dung bài viết
			}
			echo '</div>';
		}
		?>
	</div>
</div>


<?php

get_footer();
