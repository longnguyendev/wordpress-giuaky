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
		<div class="col-2">
			<?php
			$has_sidebar_4 = is_active_sidebar('sidebar-4');

			if ($has_sidebar_4) { ?>

				<div class="footer-widgets column-two grid-item">
					<?php dynamic_sidebar(index: 'sidebar-4'); ?>
				</div>

			<?php }
			?>
		</div>
		<div class="col-8">
			<?php
			if (have_posts()) {
			?>
				<header class="page-header alignwide">
					<h1 class="page-title">
						<?php
						printf(
							/* translators: %s: Search term. */
							esc_html__('Results for "%s"', 'twentytwentyone'),
							'<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
						);
						?>
					</h1>
				</header><!-- .page-header -->

				<div class="search-result-count default-max-width">
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
				</div><!-- .search-result-count -->
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
			} else {
				get_template_part('template-parts/content/content-none');
			} ?>
		</div>
		<div class="col-2">
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
		<?php
		$has_sidebar_6 = is_active_sidebar('sidebar-6');

		if ($has_sidebar_6) { ?>

			<div class="footer-widgets column-two grid-item">
				<?php dynamic_sidebar(index: 'sidebar-6'); ?>
			</div>

		<?php }
		?>
	</div>
</div>



<?php

get_footer();
