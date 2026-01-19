<?php
/**
 * Venue At A Glance Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $venue_slides = array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/venue_1.jpg',
 *         'title' => 'VENUE AT A GLANCE',
 *         'capacity_label' => 'Total Capacity',
 *         'capacity_value' => 'Up to 2,500 Guests',
 *         'button_text' => 'Download Venue Floor Plan',
 *         'button_url' => '#'
 *     ),
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/venue_2.jpg',
 *         'title' => 'GRAND HALL',
 *         'capacity_label' => 'Capacity',
 *         'capacity_value' => '1,500 Guests',
 *         'button_text' => 'View Details',
 *         'button_url' => '#'
 *     )
 * );
 * include locate_template('template-parts/VenueAtAGlance.php');
 */

// Set defaults if variables not provided
$venue_title = isset($venue_title) ? $venue_title : 'VENUE AT A GLANCE';
$venue_slides = isset($venue_slides) && is_array($venue_slides) ? $venue_slides : array();

// Backward compatibility: if old format is used, convert it
if (empty($venue_slides) && isset($venue_images) && is_array($venue_images)) {
	$venue_capacity_label = isset($venue_capacity_label) ? $venue_capacity_label : 'Total Capacity';
	$venue_capacity_value = isset($venue_capacity_value) ? $venue_capacity_value : '';
	$venue_button_text = isset($venue_button_text) ? $venue_button_text : 'Download Venue Floor Plan';
	$venue_button_url = isset($venue_button_url) ? $venue_button_url : '#';
	
	foreach ($venue_images as $image) {
		$venue_slides[] = array(
			'image' => $image,
			'capacity_label' => $venue_capacity_label,
			'capacity_value' => $venue_capacity_value,
			'button_text' => $venue_button_text,
			'button_url' => $venue_button_url
		);
	}
}

// If no slides provided, don't render
if (empty($venue_slides)) {
	return;
}
?>

<section class="venue-at-a-glance" data-venue-glance>
	<div class="container">
		<?php if ($venue_title): ?>
			<h2 class="venue-title"><?php echo esc_html($venue_title); ?></h2>
		<?php endif; ?>
		<div class="venue-swiper-container">
			<!-- Main Swiper -->
			<div class="swiper venue-main-swiper" data-venue-main-swiper>
				<div class="swiper-wrapper">
					<?php foreach ($venue_slides as $index => $slide): ?>
						<?php
						$slide_image = isset($slide['image']) ? $slide['image'] : '';
						$slide_capacity_label = isset($slide['capacity_label']) ? $slide['capacity_label'] : '';
						$slide_capacity_value = isset($slide['capacity_value']) ? $slide['capacity_value'] : '';
						$slide_button_text = isset($slide['button_text']) ? $slide['button_text'] : '';
						$slide_button_url = isset($slide['button_url']) ? $slide['button_url'] : '#';
						?>
						<div class="swiper-slide">
							<div class="venue-slide-content">
								<?php if ($slide_image): ?>
									<img src="<?php echo esc_url($slide_image); ?>" alt="<?php echo esc_attr($venue_title . ' - Slide ' . ($index + 1)); ?>">
								<?php endif; ?>
								<div class="venue-overlay"></div>
									<div class="venue-info">
										<?php if ($slide_capacity_label): ?>
											<div class="venue-capacity">
												<span class="capacity-label"><?php echo esc_html($slide_capacity_label); ?></span>
												<?php if ($slide_capacity_value): ?>
													<span class="capacity-value"><?php echo esc_html($slide_capacity_value); ?></span>
												<?php endif; ?>
											</div>
										<?php endif; ?>
										<?php if ($slide_button_text && $slide_button_url): ?>
											<a href="<?php echo esc_url($slide_button_url); ?>" class="venue-button">
												<?php echo esc_html($slide_button_text); ?>
											</a>
										<?php endif; ?>
									
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				
				<!-- Navigation Arrows -->
				<div class="venue-navigation">
					<button class="venue-swiper-prev" aria-label="Previous slide">
						<image src="<?php echo get_template_directory_uri(); ?>/assets/images/right_arw.svg" alt="Previous slide" />
					</button>
					<button class="venue-swiper-next" aria-label="Next slide">
                        <image src="<?php echo get_template_directory_uri(); ?>/assets/images/right_arw.svg" alt="Previous slide" />
					</button>
				</div>
			</div>
			
			<!-- Thumbnail Swiper -->
			<div class="swiper venue-thumbnail-swiper" data-venue-thumbnail-swiper>
				<div class="swiper-wrapper">
					<?php foreach ($venue_slides as $index => $slide): ?>
						<?php
						$slide_image = isset($slide['image']) ? $slide['image'] : '';
						?>
						<div class="swiper-slide">
							<div class="venue-thumbnail">
								<?php if ($slide_image): ?>
									<img src="<?php echo esc_url($slide_image); ?>" alt="<?php echo esc_attr($venue_title . ' - Thumbnail ' . ($index + 1)); ?>">
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
