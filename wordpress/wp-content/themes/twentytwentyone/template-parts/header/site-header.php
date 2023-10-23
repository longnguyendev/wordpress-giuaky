<?php

/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= (true === get_theme_mod('display_title_and_tagline', true)) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu('primary') ? ' has-menu' : '';
?>

<header id="masthead" class="<?php echo esc_attr($wrapper_classes); ?>">

	<?php get_template_part('template-parts/header/site-branding'); ?>

	<a class="menu-button" href=".">
		<span>Home</span>
	</a>

	<form method="get" class="searchform" action="<?php echo home_url('/'); ?>">
		<input type="text" class="search-input" name="s" placeholder="Search" />
		<input type="submit" class="search-submit" name="submit" value="Submit" />
	</form>

	<?php get_template_part('template-parts/header/site-nav'); ?>

	<div class="menu-func">
		<a class="menu-button" type="button">
			<i class="fa-solid fa-ellipsis"></i>
			<span>Menu</span>
		</a>
		<a class="menu-button" href="<?php echo get_search_link(); ?>">
			<i class="fa fa-search" aria-hidden="true"></i>
			<span>Search</span>
		</a>
		<div class="dropdown">
			<a class="dropdown-toggle menu-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
				<i class="fa fa-user-circle-o"></i>
				<span>Account
					<span class="caret"></span></span>
			</a>
			<ul class="dropdown-menu">
				<?php
				if (is_user_logged_in()) {
				?>
					<li><a class="dropdown-item" href="<?php echo wp_logout_url(); ?>">Logout</a></li>
				<?php
				} else {
				?>
					<li><a class="dropdown-item" href="<?php echo wp_login_url(); ?>">Login</a></li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>

</header><!-- #masthead -->