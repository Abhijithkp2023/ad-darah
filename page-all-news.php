<?php
/**
 * Template Name: All News
 * The all news template file - combines News and Blog & Articles
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		<?php
		// Banner Section
		set_query_var('banner_title', 'Press Releases');
		set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/news-banner.jpg');
		get_template_part('template-parts/Banner');
		?>

		<?php
		// News Tabs Section
		set_query_var('active_tab', 'all');
		get_template_part('template-parts/NewsTabs');
		?>

		<section class="news-page-content pt_120 pb_80">
			<div class="wrap">
<div class="news-list-title-block">
<h2 class="title_style_1 yello">News </h2>

 


<a href="#" class="buttion primary-button">
View All
        <span class="su_button_circle desplode-circle" style="left: 155.391px; top: 270px;"></span></a>


</div>

			<div class="news-list-section">
				<?php
				// All News List Section (combines News and Blog)
				get_template_part('template-parts/AllNewsList');
				?>
			</div>
		</section>


        <?php
		// Related News Section
		// Get the press release detail page URL
		$press_release_detail_url = '#';
		$press_release_pages = get_pages(array(
			'meta_key' => '_wp_page_template',
			'meta_value' => 'page-press-release-detail.php'
		));
		if (!empty($press_release_pages)) {
			$press_release_detail_url = get_permalink($press_release_pages[0]->ID);
		}

		// Get All News page URL for "View All" link
		$all_news_page_url = '#';
		$all_news_pages = get_pages(array(
			'meta_key' => '_wp_page_template',
			'meta_value' => 'page-all-news.php'
		));
		if (!empty($all_news_pages)) {
			$all_news_page_url = get_permalink($all_news_pages[0]->ID);
		}

		// Prepare related news items (can be customized)
		$related_news_items = array(
			array(
				'image' => get_template_directory_uri() . '/assets/images/blog-01.jpg',
				'date' => '01 Mar 2025',
				'title' => 'AD-DARAH Entrance: Where Modern Design Meets Traditional Architecture',
				'link' => $press_release_detail_url
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/blog-02.jpg',
				'date' => '05 Mar 2025',
				'title' => 'Culinary Excellence: Our Professional Chef Team',
				'link' => $press_release_detail_url
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/blog-03.jpg',
				'date' => '08 Mar 2025',
				'title' => 'Luxurious Lounge Spaces: Elegant Event Preparation at AD-DARAH',
				'link' => $press_release_detail_url
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/blog-04.jpg',
				'date' => '10 Mar 2025',
				'title' => 'Celebrating Saudi Heritage: Traditional Attire and Cultural Pride',
				'link' => $press_release_detail_url
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/blog-05.jpg',
				'date' => '12 Mar 2025',
				'title' => 'AD-DARAH: Architectural Grandeur and Illuminated Elegance',
				'link' => $press_release_detail_url
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/blog-06.jpg',
				'date' => '15 Mar 2025',
				'title' => 'Conference & Event Excellence: Professional Meeting Spaces at AD-DARAH',
				'link' => $press_release_detail_url
			)
		);

		set_query_var('related_news_title', 'Blog & Articles');
		set_query_var('related_news_view_all_url', $all_news_page_url);
		set_query_var('related_news_items', $related_news_items);
		get_template_part('template-parts/RelatedNews');
		?>






	</div>
</main><!-- #main -->

<?php
get_footer();

