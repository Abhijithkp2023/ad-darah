<?php
/**
 * Infinite Slider Component Template
 * 
 * Infinite CSS-based slider for second landing page
 *
 * @package addarah
 * 
 * Usage:
 * $infinite_slider_heading = 'Why ADDARAH Is the Best Venue for Your Wedding';
 * $infinite_slider_items = array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/second_land_slide_01.png',
 *         'heading' => 'Wedding Hall',
 *         'description' => 'Grand and elegantly decorated wedding hall...',
 *     ),
 * );
 * include locate_template('template-parts/InfiniteSlider.php');
 */

// Get variables with defaults
$infinite_slider_heading = isset($infinite_slider_heading) ? $infinite_slider_heading : 'Why ADDARAH Is the Best Venue for Your Wedding';
$infinite_slider_items = isset($infinite_slider_items) && is_array($infinite_slider_items) ? $infinite_slider_items : array();

// Duplicate items for seamless infinite loop (need at least 2 sets)
$duplicated_items = array_merge($infinite_slider_items, $infinite_slider_items);
?>

<section class="infinite-slider-section pb_100 pt_100">
	<div class="container">
		<?php if ($infinite_slider_heading): ?>
			<h2 class="infinite-slider-section-heading"><?php echo esc_html($infinite_slider_heading); ?></h2>
		<?php endif; ?>
	</div>
	
	<div class="infinite-slider-cards-wrapper" data-infinite-slider>
		<div class="infinite-slider-track">
			<?php foreach ($duplicated_items as $index => $item): ?>
				<div class="infinite-slider-card">
					<?php if (!empty($item['image'])): ?>
						<div class="infinite-slider-card-image">
							<img src="<?php echo esc_url($item['image']); ?>" 
								alt="<?php echo esc_attr($item['heading'] ?? 'Venue image'); ?>">
						</div>
					<?php endif; ?>
					
					<div class="infinite-slider-card-overlay">
						<?php if (!empty($item['heading'])): ?>
							<h3 class="infinite-slider-card-heading"><?php echo esc_html($item['heading']); ?></h3>
						<?php endif; ?>
						
						<?php if (!empty($item['description'])): ?>
							<p class="infinite-slider-card-description"><?php echo esc_html($item['description']); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

