<?php
/**
 * News List Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/NewsList');
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
?>

<div class="news-list-section">
	<div class="container">
		<div class="news-list-grid">
			<?php foreach ($news_items as $item) : ?>
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
			<?php endforeach; ?>
		</div>
	</div>
            </div>

