<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
while (have_posts()) :
	the_post();

	get_template_part('template-parts/content/content-single');

	if (is_attachment()) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone'), '%title'),
			)
		);
	}


	if (is_user_logged_in()) {
		if (comments_open() || get_comments_number()) {
			comments_template();
?>
			<div class="module-8">
				<div class="card text-end">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs">
							<li class="nav-item">
								<a class="nav-link active" aria-current="true" href="#">Make a Post</a>
							</li>
						</ul>
					</div>
					<?php
					$comment_form_args = array(
						'title_reply' => 'Make a Post',
						'comment_notes_before' => '',
						'class_submit' => 'btn btn-primary mt-3',
						'class_form' => 'commentform text-end',
						'id_form' => 'commentform',
						'id_submit' => 'submit',
						'comment_field' => '', // Để trống để không có trường bình luận mặc định
						'submit_button' => '<div class="card-body">
												<div class="form-floating">
													<textarea class="form-control" placeholder="What are you thinking..." id="floatingTextarea2" name="comment" style="height: 100px"></textarea>
													<label for="floatingTextarea2">What are you thinking...</label>
												</div>
												<button type="submit" class="btn btn-primary mt-3" id="submit">Share</button>
											</div>',

					);
					comment_form($comment_form_args);
					?>

				</div>
			</div>
		<?php
		}
	} else {
		?>
		<div class="comment-guest">
			<?php
			// If comments are open or there is at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) {
				comments_template();
			}
			?>
		</div>
	<?php
	}

	// Previous/next post navigation.
	$twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg('ui', 'arrow_left') : twenty_twenty_one_get_icon_svg('ui', 'arrow_right');
	$twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg('ui', 'arrow_right') : twenty_twenty_one_get_icon_svg('ui', 'arrow_left');

	$twentytwentyone_next_label     = esc_html__('Next post', 'twentytwentyone');
	$twentytwentyone_previous_label = esc_html__('Previous post', 'twentytwentyone');

	?>
	<div class="module-7">
		<?php
		$next_date = get_next_post()->post_date;
		$next_day = date("j", strtotime($next_date));
		$next_month = date("m", strtotime($next_date));
		$next_year = date("y", strtotime($next_date));

		$prev_date = get_previous_post()->post_date;
		$prev_day = date("j", strtotime($prev_date));
		$prev_month = date("m", strtotime($prev_date));
		$prev_year = date("y", strtotime($prev_date));

		the_post_navigation(
			array(
				'next_text' => '<div class="date"><div class="daymonth"><div class="day">' . $next_day . '</div><div class="month">' . $next_month . '</div></div><div class="year">' . $next_year . '</div></div><div class="post-title">%title</div>',
				'prev_text' => '<div class="date"><div class="daymonth"><div class="day">' . $prev_day . '</div><div class="month">' . $prev_month . '</div></div><div class="year">' . $prev_year . '</div></div><div class="post-title">%title</div>',
			)
		);
		?>
	</div>
<?php
endwhile; // End of the loop.

get_footer();
