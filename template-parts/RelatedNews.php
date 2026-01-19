<?php
/**
 * Related News Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/RelatedNews');
 * 
 * Optional query vars:
 * set_query_var('related_news_title', 'Related Blogs');
 * set_query_var('related_news_view_all_url', home_url('/blog'));
 * set_query_var('related_news_items', array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/image.jpg',
 *         'date' => '05 Aug 2022',
 *         'title' => 'Title here',
 *         'link' => '#'
 *     )
 * ));
 */

// Get parameters from query vars or use defaults
$related_news_title = get_query_var('related_news_title', 'Related Blogs');
$related_news_view_all_url = get_query_var('related_news_view_all_url', home_url('/blog'));
$related_news_items = get_query_var('related_news_items', array());

// Default items if none provided
if (empty($related_news_items)) {
	$related_news_items = array(
		array(
			'image' => get_template_directory_uri() . '/assets/images/rel-img-01.jpg',
			'date' => '05 Aug 2022',
			'title' => 'Marzouq Al-Harbi: Delivering hospitality projects in line with Vision 2030',
			'link' => '#'
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/rel-img-02.jpg',
			'date' => '05 Aug 2022',
			'title' => 'ADDarah and the future of Saudi hospitality',
			'link' => '#'
		)
	);
}
?>

<section class=" mt_120 related-news-section" style="background: #F4F1E7 url('<?php echo get_template_directory_uri(); ?>/assets/images/related-bg.svg') no-repeat center center; background-size: cover;">
	<div class="container">
		<div class="title-block-related">
			<h2 class="title_style_1"><?php echo esc_html($related_news_title); ?></h2>
			<a class="primary-button" href="<?php echo esc_url($related_news_view_all_url); ?>">View All</a>
		</div>

		<div class="related-news-carousel-wrapper">
			<div class="swiper related-news-carousel" data-related-news-swiper>
				<div class="swiper-wrapper">
					<?php foreach ($related_news_items as $item) : ?>
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
</section>

