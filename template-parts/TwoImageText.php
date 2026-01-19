<?php
/**
 * Two Image Text Section Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $two_image_text_heading = 'Weddings & Social Services';
 * $two_image_text_description = 'From intimate engagements to royal weddings...';
 * $two_image_text_items = array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/wedding_01.png',
 *         'heading' => 'Female Packages',
 *         'paragraph' => 'Experience an atmosphere of elegance...',
 *         'button_text' => 'Explore More',
 *         'button_link' => '#'
 *     ),
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/wedding_02.png',
 *         'heading' => 'Male Packages',
 *         'paragraph' => 'Host your celebration in a grand setting...',
 *         'button_text' => 'Explore More',
 *         'button_link' => '#'
 *     ),
 * );
 * include locate_template('template-parts/TwoImageText.php');
 */

// Get variables with defaults
$two_image_text_heading = isset($two_image_text_heading) ? $two_image_text_heading : '';
$two_image_text_description = isset($two_image_text_description) ? $two_image_text_description : '';
$two_image_text_items = isset($two_image_text_items) && is_array($two_image_text_items) ? $two_image_text_items : array();
?>

<section class="two-image-text-section pb_100 pt_100">
	<div class="container">
		<?php if ($two_image_text_heading): ?>
			<h2 class="two-image-text-heading"><?php echo esc_html($two_image_text_heading); ?></h2>
		<?php endif; ?>
		
		<?php if ($two_image_text_description): ?>
			<p class="two-image-text-description"><?php echo esc_html($two_image_text_description); ?></p>
		<?php endif; ?>

		<?php if (!empty($two_image_text_items)): ?>
			<div class="two-image-text-cards-wrapper">
				<?php foreach ($two_image_text_items as $item): ?>
					<div class="two-image-text-card">
						<?php if (!empty($item['image'])): ?>
							<div class="two-image-text-card-image">
								<img src="<?php echo esc_url($item['image']); ?>" 
									alt="<?php echo esc_attr($item['heading'] ?? 'Image'); ?>">
							</div>
						<?php endif; ?>
						
						<div class="two-image-text-card-overlay">
							<?php if (!empty($item['heading'])): ?>
								<h3 class="two-image-text-card-heading"><?php echo esc_html($item['heading']); ?></h3>
							<?php endif; ?>
							
							<?php if (!empty($item['paragraph'])): ?>
								<p class="two-image-text-card-paragraph"><?php echo wp_kses_post($item['paragraph']); ?></p>
							<?php endif; ?>
							
							<?php if (!empty($item['button_text']) && !empty($item['button_link'])): ?>
								<a href="<?php echo esc_url($item['button_link']); ?>" class="primary-button two-image-text-card-button">
									<?php echo esc_html($item['button_text']); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

