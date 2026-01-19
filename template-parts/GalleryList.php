<?php
/**
 * Gallery List Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/GalleryList');
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

// Static gallery data - placeholder images
$gallery_items = array(
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-01.jpg',
		'date' => '20 Mar 2025',
		'title' => 'AD-DARAH Event Gallery: Celebrating Excellence',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-02.jpg',
		'date' => '18 Mar 2025',
		'title' => 'Luxury Venue Showcase: Our Beautiful Spaces',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-03.jpg',
		'date' => '15 Mar 2025',
		'title' => 'Corporate Events: Professional Excellence',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-04.jpg',
		'date' => '12 Mar 2025',
		'title' => 'Wedding Celebrations: Unforgettable Moments',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-05.jpg',
		'date' => '10 Mar 2025',
		'title' => 'Architectural Beauty: Design & Heritage',
		'link' => $press_release_detail_url
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news-06.jpg',
		'date' => '08 Mar 2025',
		'title' => 'Culinary Excellence: Our Chef Team in Action',
		'link' => $press_release_detail_url
	)
);
?>

<div class="news-list-section">
	<div class="container">
		<div class="news-list-grid">
			<?php foreach ($gallery_items as $item) : ?>
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

