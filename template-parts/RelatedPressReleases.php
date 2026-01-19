<?php
/**
 * Related Press Releases Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/RelatedPressReleases');
 */

// Get related press releases (excluding current post)
$current_post_id = get_the_ID();
$related_posts = get_posts(array(
	'post_type' => 'post',
	'posts_per_page' => 6,
	'post__not_in' => array($current_post_id),
	'orderby' => 'date',
	'order' => 'DESC'
));

if (empty($related_posts)) {
	// Fallback: Get latest posts if no related posts found
	$related_posts = get_posts(array(
		'post_type' => 'post',
		'posts_per_page' => 6,
		'orderby' => 'date',
		'order' => 'DESC'
	));
}
?>

<?php if (!empty($related_posts)) : ?>
	<section class="related-press-releases-section">
		<div class="container">
			<div class="title-block">
				<h5>Related Press Releases</h5>
				<h2>More from Our News</h2>
			</div>

			<div class="related-press-releases-carousel-wrapper">
				<div class="swiper related-press-releases-carousel" data-related-press-releases-swiper>
					<div class="swiper-wrapper">
						<?php foreach ($related_posts as $post) : setup_postdata($post); ?>
							<?php
							$post_image = get_the_post_thumbnail_url($post->ID, 'large');
							if (!$post_image) {
								$post_image = get_template_directory_uri() . '/assets/images/news_01.png';
							}
							$post_date = get_the_date('d M Y', $post->ID);
							$post_title = get_the_title($post->ID);
							$post_link = get_permalink($post->ID);
							?>
							<div class="swiper-slide">
								<article class="related-press-release-item">
									<?php if ($post_image) : ?>
										<div class="related-press-release-image">
											<a href="<?php echo esc_url($post_link); ?>">
												<img src="<?php echo esc_url($post_image); ?>" alt="<?php echo esc_attr($post_title); ?>">
											</a>
										</div>
									<?php endif; ?>
									
									<div class="related-press-release-content">
										<?php if ($post_date) : ?>
											<span class="related-press-release-date"><?php echo esc_html($post_date); ?></span>
										<?php endif; ?>
										
										<?php if ($post_title) : ?>
											<h3 class="related-press-release-title">
												<a href="<?php echo esc_url($post_link); ?>"><?php echo esc_html($post_title); ?></a>
											</h3>
										<?php endif; ?>
									</div>
								</article>
							</div>
						<?php endforeach; wp_reset_postdata(); ?>
					</div>
				</div>

				<div class="related-press-releases-navigation">
					<button class="related-press-releases-prev-btn" aria-label="Previous">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
					<button class="related-press-releases-next-btn" aria-label="Next">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

