<?php
/**
 * News List Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/NewsList');
 */

// Get news items from query var (passed from page template)
$news_items = get_query_var('news_items', array());
?>

<div class="news-list-section">
	<div class="container">
		<div class="news-list-grid">
			<?php foreach ($news_items as $item): ?>
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
								<span class="read-more-text">Learn More</span>
								<span class="read_icon">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/learn-icn.svg"
										alt="Read More">
								</span>
							</a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</div>