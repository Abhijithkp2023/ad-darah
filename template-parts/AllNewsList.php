<?php
/**
 * All News List Component Template
 * Combines News and Blog items
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/AllNewsList');
 */

// Get the press release detail page URL
$press_release_detail_url = '#';
$press_release_pages = get_pages(array(
	'meta_key' => '_wp_page_template',
	'meta_value' => 'page-press-release-detail.php'
));

if (!empty($press_release_pages)) {
	$press_release_detail_url = get_permalink($press_release_pages[0]->ID);
}

// Static news data
$news_items = array(
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-01.jpg',
		'date' => '05 Aug 2022',
		'title' => 'Marzouq Al-Harbi: Delivering hospitality projects in line with Vision 2030',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-02.jpg',
		'date' => '05 Aug 2022',
		'title' => 'ADDarah and the future of Saudi hospitality',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-03.jpg',
		'date' => '05 Aug 2022',
		'title' => 'Inside ADDarah\'s vision for transformative hospitality',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-04.jpg',
		'date' => '05 Aug 2022',
		'title' => 'AD-DARAH: A landmark of architectural excellence in Riyadh',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-05.jpg',
		'date' => '05 Aug 2022',
		'title' => 'Modern design meets traditional Saudi heritage at AD-DARAH',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-06.jpg',
		'date' => '05 Aug 2022',
		'title' => 'Transforming event experiences through innovative hospitality',
		'link' => $press_release_detail_url
	)
);

// Static blog data
$blog_items = array(
	array(
		'image' => get_template_directory_uri() . '/assets/images/blog-06.jpg',
		'date' => '15 Mar 2025',
		'title' => 'Conference & Event Excellence: Professional Meeting Spaces at AD-DARAH',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/blog-05.jpg',
		'date' => '12 Mar 2025',
		'title' => 'AD-DARAH: Architectural Grandeur and Illuminated Elegance',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/blog-04.jpg',
		'date' => '10 Mar 2025',
		'title' => 'Celebrating Saudi Heritage: Traditional Attire and Cultural Pride',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/blog-03.jpg',
		'date' => '08 Mar 2025',
		'title' => 'Luxurious Lounge Spaces: Elegant Event Preparation at AD-DARAH',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/blog-02.jpg',
		'date' => '05 Mar 2025',
		'title' => 'Culinary Excellence: Our Professional Chef Team',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/blog-01.jpg',
		'date' => '01 Mar 2025',
		'title' => 'AD-DARAH Entrance: Where Modern Design Meets Traditional Architecture',
		'link' => $press_release_detail_url
	)
);

// Combine all items
$all_items = array_merge($news_items, $blog_items);

// Sort by date (newest first) - simple date comparison
usort($all_items, function($a, $b) {
	$date_a = strtotime($a['date']);
	$date_b = strtotime($b['date']);
	return $date_b - $date_a; // Descending order (newest first)
});
?>

<div class="news-list-section">
	<div class="container">
		<div class="related-news-carousel-wrapper">
			<div class="swiper related-news-carousel" data-all-news-swiper>
				<div class="swiper-wrapper">
					<?php foreach ($all_items as $item) : ?>
						<div class="swiper-slide">
							<article class="related-news-item">
								<div class="related-news-image">
									<a href="<?php echo esc_url($item['link']); ?>">
										<img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
									</a>
								</div>
								<div class="related-news-content">
									<span class="related-news-date"><?php echo esc_html($item['date']); ?></span>
									<div class="related-news-title-wrap">
										<h3 class="related-news-title">
											<a href="<?php echo esc_url($item['link']); ?>"><?php echo esc_html($item['title']); ?></a>
										</h3>
										<a href="<?php echo esc_url($item['link']); ?>" class="read-more-link">
											<span class="read-more-text">Read More</span>
											<span class="read_icon">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/learn-icn.svg" alt="Read More">
											</span>
										</a>
									</div>
								</div>
							</article>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

