<?php
/**
 * News & Articles Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/NewsArticles');
 */

?>

<section class="news-articles-container">
	<div class="container text-center">
		<div class="title-block ">
			<h5>News & Articles</h5>
			<h2>What’s New Happening</h2>
			<a href="#" class="buttion primary-button">
				Explore More
				<span class="su_button_circle desplode-circle" style="left: 110px; top: 292.438px;"></span></a>
		</div>
	</div>



	<div class="news-articles-slider-wrapper">
		<div class="swiper news-articles-swiper" data-news-articles-swiper>
			<div class="swiper-wrapper">
				<!-- Swiper Slides - Static Data -->
				<?php
				$news_images = array(
					get_template_directory_uri() . '/assets/images/news_01.png',
					get_template_directory_uri() . '/assets/images/news_02.png',
					get_template_directory_uri() . '/assets/images/news_03.png',
				);

				$news_data = array(
					array('date' => '05 August 2022', 'heading' => 'Inside ADDarah\'s vision for transformative hospitality'),
					array('date' => '05 August 2022', 'heading' => 'ADDarah and the future of Saudi hospitality'),
					array('date' => 'August 2022', 'heading' => 'Zouq Al-Harbi: Delivering hospitality projects in line with Vision 2030'),
				);

				// Repeat images for multiple slides
				for ($i = 0; $i < 12; $i++):
					$image_index = $i % 3;
					$data_index = $i % 3;
					?>
					<div class="swiper-slide">
						<div class="news-article-card">
							<div class="news-article-image"
								style="background-image: url('<?php echo esc_url($news_images[$image_index]); ?>');">
								<div class="news-article-overlay"></div>
								<div class="news-article-content">
									<div class="news-article-left">
										<div class="news-article-date">
											<?php echo esc_html($news_data[$data_index]['date']); ?></div>
										<h3 class="news-article-heading">
											<?php echo esc_html($news_data[$data_index]['heading']); ?></h3>
									</div>
									<div class="news-article-right">
										<a href="#" class="news-article-learn-more">
											<span class="news-article-learn-text">Learn More</span>
											<span class="news-article-learn-icon">
												<svg width="34" height="34" viewBox="0 0 34 34" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<rect x="0.617143" y="32.7086" width="32.0914" height="32.0914"
														rx="16.0457" transform="rotate(-90 0.617143 32.7086)" stroke="currentColor"
														stroke-width="1.23429" />
													<path d="M10.0361 16.6636H23.2906" stroke="currentColor" stroke-width="1.23429"
														stroke-linecap="round" stroke-linejoin="round" />
													<path d="M19.5035 12.8766L23.2906 16.6636" stroke="currentColor"
														stroke-width="1.23429" stroke-linecap="round"
														stroke-linejoin="round" />
													<path d="M19.5029 20.4507L23.2899 16.6637" stroke="currentColor"
														stroke-width="1.23429" stroke-linecap="round"
														stroke-linejoin="round" />
												</svg>

											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endfor; ?>
			</div>

			<!-- Navigation Buttons -->
			<!-- <div class="news-articles-navigation">
					<button class="news-articles-prev-btn" aria-label="Previous slide">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
					<button class="news-articles-next-btn" aria-label="Next slide">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
				</div> -->
		</div>
	</div>






</section>