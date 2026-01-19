<?php
/**
 * Timeline Slider Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $timeline_headline = 'Rooted in Saudi Identity';
 * $timeline_description = 'Inspired by the Kingdom\'s heritage and values...';
 * $timeline_slides = array(
 *     array(
 *         'year' => '2024',
 *         'image' => get_template_directory_uri() . '/assets/images/root_1.jpg',
 *         'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
 *     ),
 *     array(
 *         'year' => '2023',
 *         'image' => get_template_directory_uri() . '/assets/images/root_2.jpg',
 *         'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
 *     )
 * );
 * include locate_template('template-parts/TimelineSlider.php');
 */

// Set defaults if variables not provided
$timeline_headline = isset($timeline_headline) ? $timeline_headline : 'Rooted in Saudi Identity';
$timeline_description = isset($timeline_description) ? $timeline_description : '';
$timeline_slides = isset($timeline_slides) && is_array($timeline_slides) ? $timeline_slides : array();

// If no slides provided, don't render
if (empty($timeline_slides)) {
	return;
}

// Extract years for timeline navigation
$timeline_years = array();
foreach ($timeline_slides as $slide) {
	if (isset($slide['year'])) {
		$timeline_years[] = $slide['year'];
	}
}
?>

<section class="timeline-slider" data-timeline-slider>
	<div class="container">
		<div class="timeline-header">
			<div class="timeline-header-left">
				<?php if ($timeline_headline): ?>
					<h2 class="timeline-headline"><?php echo esc_html($timeline_headline); ?></h2>
				<?php endif; ?>
			</div>
			<div class="timeline-header-right">
				<?php if ($timeline_description): ?>
					<p><?php echo esc_html($timeline_description); ?></p>
				<?php endif; ?>
				<div class="timeline-navigation">
					<button class="timeline-swiper-prev" aria-label="Previous slide">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/right_arw.svg" alt="Previous slide" />
					</button>
					<button class="timeline-swiper-next" aria-label="Next slide">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/right_arw.svg" alt="Next slide" />
					</button>
				</div>
			</div>
		</div>

		<div class="timeline-swiper-container">
			<div class="swiper timeline-main-swiper" data-timeline-main-swiper>
				<div class="swiper-wrapper">
					<?php foreach ($timeline_slides as $index => $slide): ?>
						<?php
						$slide_year = isset($slide['year']) ? $slide['year'] : '';
						$slide_image = isset($slide['image']) ? $slide['image'] : '';
						$slide_description = isset($slide['description']) ? $slide['description'] : '';
						?>
						<div class="swiper-slide" data-year="<?php echo esc_attr($slide_year); ?>">
							<div class="timeline-card">
								<?php if ($slide_image): ?>
									<div class="timeline-image">
										<img src="<?php echo esc_url($slide_image); ?>" alt="<?php echo esc_attr($timeline_headline . ' - ' . $slide_year); ?>">
									</div>
								<?php endif; ?>
								<div class="timeline-card-content">
									<?php if ($slide_year): ?>
										<div class="timeline-year"><?php echo esc_html($slide_year); ?></div>
									<?php endif; ?>
									<?php if ($slide_description): ?>
										<p><?php echo esc_html($slide_description); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
		<?php if (!empty($timeline_years)): ?>
			<div class="timeline-indicator">
				<div class="timeline-line">
					<div class="timeline-progress" data-timeline-progress></div>
				</div>
				<div class="timeline-years">
					<?php foreach ($timeline_years as $index => $year): ?>
						<button class="timeline-year-btn <?php echo $index === 0 ? 'active' : ''; ?>" data-year="<?php echo esc_attr($year); ?>" data-slide-index="<?php echo esc_attr($index); ?>">
							<span class="timeline-year-label"><?php echo esc_html($year); ?></span>
						</button>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	
</section>
