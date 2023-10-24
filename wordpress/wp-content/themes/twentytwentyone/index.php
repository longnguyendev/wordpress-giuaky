<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<?php
			$has_sidebar_2 = is_active_sidebar('sidebar-2');

			if ($has_sidebar_2) { ?>

				<div class="footer-widgets column-two grid-item">
					<?php dynamic_sidebar(index: 'sidebar-2'); ?>
				</div>

			<?php }
			?>

		</div>
		<div class="col-md-8">
			<div class="module-2">
				<?php
				// Lấy danh sách các bài viết từ widget "Latest Posts"
				$recent_posts = wp_get_recent_posts(
					array(
						'numberposts' => 5,
						// Số lượng bài viết bạn muốn hiển thị
						'post_status' => 'publish'
					)
				);

				// Duyệt qua danh sách bài viết và hiển thị thông tin
				foreach ($recent_posts as $post) {
					echo '<div class ="module-2 post-card row" >';
					
					echo '<div class="post-crated-at col-md-3 text-center">';
					echo '<p class="h1">' . date('d', strtotime($post['post_date'])) . '</p>';
					echo '<p>Tháng' . date('m', strtotime($post['post_date'])) . '</p>';
					 echo '</div>'; // Thời gian đăng bài viết
					echo '<h4 class="post-title col-md-9"><a href="' . get_permalink($post['ID']) . '">' . $post['post_title'] . '</a>'; // Tiêu đề bài viết
					if (strlen($post['post_content']) > 152) {
						echo '<p class="content">' . substr($post['post_content'], 0, 152) . '<a href="'.get_permalink($post['ID']).'">[...]</a>' . '</p>'; // Nội dung bài viết
					} else {
						echo '<p class="content">' . $post['post_content'] . '</p>'; // Nội dung bài viết
					}
					echo '</h4>';
					echo '</div>';
				}
				?>
			</div>

		</div>
		<div class="col-md-2">
			<div class="module-12">
				<?php
				$has_sidebar_2 = is_active_sidebar('sidebar-3');

				if ($has_sidebar_2) { ?>

					<div class="footer-widgets column-two grid-item">
						<?php dynamic_sidebar(index: 'sidebar-3'); ?>
					</div>

				<?php }
				?>

			</div>
		</div>
	</div>
</div>

<?php if (is_home() && !is_front_page() && !empty(single_post_title('', false))): ?>
	<header class="page-header alignwide">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
<?php endif; ?>


<?php

get_footer();
