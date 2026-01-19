<?php
/**
 * Perfect Day Section Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $perfect_day_bg_image = get_template_directory_uri() . '/assets/images/perfect_day_bg.png';
 * $perfect_day_heading = 'Everything for Your Perfect Day';
 * $perfect_day_paragraph = 'From intimate engagements to royal weddings...';
 * $perfect_day_slider_items = array(
 *     array('heading' => 'Weddings & Engagements', 'paragraph' => 'Celebrate in a setting...'),
 *     array('heading' => 'Facilities', 'paragraph' => 'Fully segregated...'),
 * );
 * include locate_template('template-parts/PerfectDaySection.php');
 */

// Get variables with defaults
$perfect_day_bg_image = isset($perfect_day_bg_image) ? $perfect_day_bg_image : '';
$perfect_day_heading = isset($perfect_day_heading) ? $perfect_day_heading : '';
$perfect_day_paragraph = isset($perfect_day_paragraph) ? $perfect_day_paragraph : '';
$perfect_day_slider_items = isset($perfect_day_slider_items) && is_array($perfect_day_slider_items) ? $perfect_day_slider_items : array();

// If no background image provided, don't render
if (empty($perfect_day_bg_image)) {
	return;
}
?>

<section class="perfect-day-section pb_100 pt_100">
	<div class="perfect-day-bg" style="background-image: url('<?php echo esc_url($perfect_day_bg_image); ?>');">
		<div class="perfect-day-overlay"></div>
	</div>
	<div class="container">
		<div class="perfect-day-content">
			<div class="perfect-day-header">
				<?php if ($perfect_day_heading): ?>
					<h2 class="perfect-day-heading"><?php echo esc_html($perfect_day_heading); ?></h2>
				<?php endif; ?>
				<?php if ($perfect_day_paragraph): ?>
					<p class="perfect-day-paragraph"><?php echo esc_html($perfect_day_paragraph); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php if (!empty($perfect_day_slider_items)): ?>
			<div class="perfect-day-slider swiper" data-perfect-day-swiper>
				<div class="swiper-wrapper">
					<?php foreach ($perfect_day_slider_items as $item): ?>
						<div class="swiper-slide perfect-day-card">
							<div class="perfect-day-card-decor">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/perfect day_decor.svg'); ?>"
									alt="" aria-hidden="true">
							</div>
							<?php if (!empty($item['heading'])): ?>
								<h3 class="perfect-day-card-heading"><?php echo esc_html($item['heading']); ?></h3>
							<?php endif; ?>
							<?php if (!empty($item['paragraph'])): ?>
								<p class="perfect-day-card-paragraph"><?php echo esc_html($item['paragraph']); ?></p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
	
	<?php endif; ?>
</section>