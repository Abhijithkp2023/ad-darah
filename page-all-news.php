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

		<section class="news-page-content pt_120">
			<div class="wrap">
				<div class="news-list-title-block">
					<h2 class="title_style_1 yello">News </h2>
					<a href="#" class="buttion primary-button">
						View All
						<span class="su_button_circle desplode-circle" style="left: 155.391px; top: 270px;"></span></a>


				</div>

				<div class="news-list-section">
					<?php
					// Get the press release detail page URL
					$press_release_detail_url = '#';
					$press_release_pages = get_pages(array(
						'meta_key' => '_wp_page_template',
						'meta_value' => 'page-press-release-detail.php'
					));

					if (!empty($press_release_pages)) {
						$press_release_detail_url = get_permalink($press_release_pages[0]->ID);
					}

					// News items data
					$news_items = array(
						array(
							'image' => get_template_directory_uri() . '/assets/images/all_news_01.png',
							'date' => '05 Aug 2022',
							'title' => 'ADDarah and the future of Saudi hospitality',
							'link' => $press_release_detail_url
						),
						array(
							'image' => get_template_directory_uri() . '/assets/images/all_news_02.png',
							'date' => '05 Aug 2022',
							'title' => 'Marzouq Al-Harbi: Delivering hospitality projects in line with Vision 2030',
							'link' => $press_release_detail_url
						)
					);

					// Pass news items to template part
					set_query_var('news_items', $news_items);
					get_template_part('template-parts/NewsList');
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
				'image' => get_template_directory_uri() . '/assets/images/blog-02.png',
				'date' => '05 Mar 2025',
				'title' => 'Culinary Excellence: Our Professional Chef Team',
				'link' => $press_release_detail_url
			)
		);

		set_query_var('related_news_title', 'Blog & Articles');
		set_query_var('related_news_title_color', '#C5B17F');
		set_query_var('related_news_view_all_url', $all_news_page_url);
		set_query_var('related_news_items', $related_news_items);
		get_template_part('template-parts/RelatedNews');
		?>

		<?php
		// Gallery Grid Section
		// get_template_part('template-parts/GalleryGrid');
		$landing_gallery_heading = 'Photo Gallery';
		$landing_gallery_button_text = 'View All';
		$landing_gallery_section_classes = 'landing-gallery-section no-bg';
		$landing_gallery_button_link = get_permalink(get_page_by_path('gallery'));
		// Page-specific media for LandingGallery
		$landing_gallery_top_left = get_template_directory_uri() . '/assets/images/gallery-01.jpg';
		$landing_gallery_top_left_alt = 'Gallery Top Left';
		$landing_gallery_top_right = get_template_directory_uri() . '/assets/images/gallery-04.jpg';
		$landing_gallery_top_right_alt = 'Gallery Top Right';
		$landing_gallery_bottom_left = get_template_directory_uri() . '/assets/images/gallery-02.jpg';
		$landing_gallery_bottom_left_alt = 'Gallery Bottom Left';
		$landing_gallery_bottom_right = get_template_directory_uri() . '/assets/images/gallery-05.jpg';
		$landing_gallery_bottom_right_alt = 'Gallery Bottom Right';
		$landing_gallery_video_src = get_template_directory_uri() . '/assets/images/gallery-03.jpg';
		include locate_template('template-parts/LandingGallery.php');
		?>


		<?php
		// Full Video Section
		$full_video_thumbnail = get_template_directory_uri() . '/assets/images/g_video_thumb.jpg';
		$full_video_url = get_template_directory_uri() . '/assets/videos/g_video.mp4';

		include locate_template('template-parts/FullVideoSection.php');
		?>




	</div>
</main><!-- #main -->

<?php
get_footer();

