<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<section class="no-results not-found">
	<header class="page-header alignwide">
		<?php if (is_search()) : ?>

			<h1 class="page-title text-danger text-center">
				<?php
				printf(
					/* translators: %s: Search term. */
					esc_html__('Search: %s', 'twentytwentyone'),
					'<span class="page-description search-term text-dark">"' . esc_html(get_search_query()) . '"</span>'
				);
				?>
			</h1>

		<?php else : ?>

			<h1 class="page-title"><?php esc_html_e('Nothing here', 'twentytwentyone'); ?></h1>

		<?php endif; ?>
	</header><!-- .page-header -->

	<div class="page-content">

		<?php if (is_home() && current_user_can('publish_posts')) : ?>

			<?php
			printf(
				'<p>' . wp_kses(
					/* translators: %s: Link to WP admin new post page. */
					__('Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwentyone'),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url(admin_url('post-new.php'))
			);
			?>

		<?php elseif (is_search()) : ?>

			<p class="text-center"><?php esc_html_e('Sorry, but nothing find any results for your search. You can give it another try through the search form below.', 'twentytwentyone'); ?></p>
			<div class="bg-search">
				<?php get_search_form(); ?>
			</div>



		<?php else : ?>

			<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentytwentyone'); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->