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

	// If comments are open or there is at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()) {
		comments_template();
	}

	// Previous/next post navigation.
	$twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg('ui', 'arrow_left') : twenty_twenty_one_get_icon_svg('ui', 'arrow_right');
	$twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg('ui', 'arrow_right') : twenty_twenty_one_get_icon_svg('ui', 'arrow_left');

	$twentytwentyone_next_label     = esc_html__('Next post', 'twentytwentyone');
	$twentytwentyone_previous_label = esc_html__('Previous post', 'twentytwentyone');

?>
	<div class="module-7">
		<?php
		the_post_navigation(
			array(
				'next_text' => '<div class="date"><div class="daymonth"><div class="day">' . get_the_date('d') . '</div><div class="month">' . get_the_date('m') . '</div></div><div class="year">' . get_the_date('y') . '</div></div><div class="post-title">%title</div>',
				'prev_text' => '<div class="date"><div class="daymonth"><div class="day">' . get_the_date('d') . '</div><div class="month">' . get_the_date('m') . '</div></div><div class="year">' . get_the_date('y') . '</div></div><div class="post-title">%title</div>',
			)
		);
		?>
	</div>
<?php
endwhile; // End of the loop.

get_footer();
