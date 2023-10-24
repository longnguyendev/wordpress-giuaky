<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="pt-3 ">
		<?php
			$day = get_the_date('d');
			$month = get_the_date('m');
			$content = explode(' ', get_the_content(), 15);
			$images = get_the_post_thumbnail(get_the_ID());
			echo '<div class ="module-5 post-card row border-content" >';
			echo '<div class="col-md-4 img-content">';
			echo $images;	
			echo '</div>'; 		
			echo '<div class="post-crated-at col-md-2 my-3 text-center">';
			echo '<span><h1>' . $day . '</h1></span>';
			echo '<span> Tháng ' . $month . '</span>';
			echo '</div>'; // Thời gian đăng bài viết
			echo '<h4 class="post-title col-md-6 pt-3"><a class="title-content" href="' . get_permalink() . '">' . get_the_title() . '</a>'; // Tiêu đề bài viết
			if (count($content) >= 15) {
				echo '<p class="content">' . wp_trim_words(get_the_content(), 15, '') . '<a href="'.get_permalink().'"> [...]</a>' . '</p>'; // Nội dung bài viết
			} else {
				echo '<p class="content">' . get_the_content() . '</p>'; // Nội dung bài viết
			}
			echo '</h4>';
			echo '</div>';
		?>
	</div>
</article><!-- #post-${ID} -->
