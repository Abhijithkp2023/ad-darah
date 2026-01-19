<?php
/**
 * News Tabs Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/NewsTabs');
 * 
 * Optional query vars:
 * set_query_var('active_tab', 'news'); // 'all', 'news', 'blog', 'gallery'
 */

// Get active tab from query var or default
$active_tab = get_query_var('active_tab', 'news');

// Get page URLs for each tab
$all_page_url = '#';
$news_page_url = '#';
$blog_page_url = '#';
$gallery_page_url = '#';

// Find All News page
$all_news_pages = get_pages(array(
	'meta_key' => '_wp_page_template',
	'meta_value' => 'page-all-news.php'
));
if (!empty($all_news_pages)) {
	$all_page_url = get_permalink($all_news_pages[0]->ID);
}

// Find News page
$news_pages = get_pages(array(
	'meta_key' => '_wp_page_template',
	'meta_value' => 'page-news.php'
));
if (!empty($news_pages)) {
	$news_page_url = get_permalink($news_pages[0]->ID);
}

// Find Blog & Articles page
$blog_pages = get_pages(array(
	'meta_key' => '_wp_page_template',
	'meta_value' => 'page-blog-articles.php'
));
if (!empty($blog_pages)) {
	$blog_page_url = get_permalink($blog_pages[0]->ID);
}

// Find Gallery page (if it exists)
$gallery_pages = get_pages(array(
	'meta_key' => '_wp_page_template',
	'meta_value' => 'page-gallery.php'
));
if (!empty($gallery_pages)) {
	$gallery_page_url = get_permalink($gallery_pages[0]->ID);
}

// Fallback: If All News page not found, use News page URL
if ($all_page_url === '#' && $news_page_url !== '#') {
	$all_page_url = $news_page_url;
}

// Tab items
$tabs = array(
	array(
		'id' => 'all',
		'label' => 'All',
		'url' => $all_page_url
	),
	array(
		'id' => 'news',
		'label' => 'News',
		'url' => $news_page_url
	),
	array(
		'id' => 'blog',
		'label' => 'Blog & Articles',
		'url' => $blog_page_url
	),
	array(
		'id' => 'gallery',
		'label' => 'Gallery',
		'url' => $gallery_page_url
	)
);
?>

<section class="news-tabs-nav" data-page-tabs>
	<div class="container">
		<ul class="news-tabs-list">
			<?php foreach ($tabs as $tab) : ?>
				<li class="news-tabs-item <?php echo ($active_tab === $tab['id']) ? 'active' : ''; ?>">
					<a href="<?php echo esc_url($tab['url']); ?>" class="news-tabs-link" data-tab="<?php echo esc_attr($tab['id']); ?>">
						<?php echo esc_html($tab['label']); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

