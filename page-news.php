<?php
/**
 * Template Name: News
 * The news template file
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
		set_query_var('active_tab', 'news');
		get_template_part('template-parts/NewsTabs');
		?>

		<section class="news-page-content pt_120 pb_80">
			<div class="wrap">
				<div class="news-list-title-block">
					<h2 class="title_style_1 yello">News</h2>

					<select name="news-list-select" id="news-list-select" class="news-list-select">
						<option value="1">2025</option>
						<option value="2">2024</option>
						<option value="3">2023</option>
						<option value="4">2022</option>
						<option value="5">2021</option>
						<option value="6">2020</option>
						<option value="7">2019</option>
						<option value="8">2018</option>
						<option value="9">2017</option>
						<option value="10">2016</option>
					</select>
				</div>

				<div class="news-list-section">
					<?php
					// Get the press release detail page URL
					$press_release_detail_url = home_url('/press-release-detail');
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
							'image' => get_template_directory_uri() . '/assets/images/news-01.jpg',
							'date' => '05 Aug 2022',
							'title' => 'ADDarah and the future of Saudi hospitality',
							'link' => $press_release_detail_url
						),
						array(
							'image' => get_template_directory_uri() . '/assets/images/news-02.jpg',
							'date' => '05 Aug 2022',
							'title' => 'Marzouq Al-Harbi: Delivering hospitality projects in line with Vision 2030',
							'link' => $press_release_detail_url
						),
						array(
							'image' => get_template_directory_uri() . '/assets/images/news-03.jpg',
							'date' => '05 Aug 2022',
							'title' => 'Marzouq Al-Harbi: Delivering hospitality projects in line with Vision 2030',
							'link' => $press_release_detail_url
						),
						array(
							'image' => get_template_directory_uri() . '/assets/images/news-04.jpg',
							'date' => '05 Aug 2022',
							'title' => 'ADDarah and the future of Saudi hospitality',
							'link' => $press_release_detail_url
						),
						array(
							'image' => get_template_directory_uri() . '/assets/images/news-05.jpg',
							'date' => '05 Aug 2022',
							'title' => 'ADDarah and the future of Saudi hospitality',
							'link' => $press_release_detail_url
						),
						array(
							'image' => get_template_directory_uri() . '/assets/images/news-06.jpg',
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
	</div>
</main><!-- #main -->

<?php
get_footer();

