<?php
/**
 * Blog List Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/BlogList');
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

// Static blog data based on the image descriptions
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
?>

<div class="news-list-section">
	<div class="container">
		<div class="news-list-grid">
			<?php foreach ($blog_items as $item) : ?>
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

