<?php
/**
 * Image Text Section Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $image_text_image = get_template_directory_uri() . '/assets/images/about_pic.jpg';
 * $image_text_headline_1 = 'Discover the Story Behind';
 * $image_text_headline_2 = 'AD-DARAH';
 * $image_text_paragraph_1 = 'AD-DARAH is Riyadh\'s premier destination for iconic events...';
 * $image_text_paragraph_2 = 'AD-DARAH is a world-class events venue located in the heart of Riyadh...';
 * include locate_template('template-parts/ImageTextSection.php');
 */

// Set defaults if variables not provided
$image_text_image = isset($image_text_image) ? $image_text_image : '';
$image_text_headline_1 = isset($image_text_headline_1) ? $image_text_headline_1 : '';
$image_text_headline_2 = isset($image_text_headline_2) ? $image_text_headline_2 : '';
$image_text_button_text = isset($image_text_button_text) ? $image_text_button_text : '';
$image_text_button_link = isset($image_text_button_link) ? $image_text_button_link : '';

// Handle paragraphs - accept array or individual variables
if (isset($image_text_paragraphs) && is_array($image_text_paragraphs)) {
	// Use provided array
	$image_text_paragraphs = $image_text_paragraphs;
} else {
	// Fallback to individual variables for backward compatibility
	$image_text_paragraph_1 = isset($image_text_paragraph_1) ? $image_text_paragraph_1 : '';
	$image_text_paragraph_2 = isset($image_text_paragraph_2) ? $image_text_paragraph_2 : '';
	$image_text_paragraphs = array();
	if (!empty($image_text_paragraph_1)) {
		$image_text_paragraphs[] = $image_text_paragraph_1;
	}
	if (!empty($image_text_paragraph_2)) {
		$image_text_paragraphs[] = $image_text_paragraph_2;
	}
}

// If no image provided, don't render
if (empty($image_text_image)) {
	return;
}
?>

<section class="image-text-section">
	<div class="container">
		<div class="image-text-wrapper">
			<div class="image-text-left">
				<?php if ($image_text_image): ?>
					<img src="<?php echo esc_url($image_text_image); ?>"
						alt="<?php echo esc_attr($image_text_headline_2 ?: 'Image'); ?>">
				<?php endif; ?>
			</div>
			<div class="image-text-right">
				<?php if ($image_text_headline_1 || $image_text_headline_2): ?>
					<h2 class="image-text-headline">
						<?php if ($image_text_headline_1): ?>
							<?php echo esc_html($image_text_headline_1); ?>
						<?php endif; ?>
						<?php if ($image_text_headline_2): ?>
							<span><?php echo esc_html($image_text_headline_2); ?></span>
						<?php endif; ?>
					</h2>
				<?php endif; ?>
				<?php if (!empty($image_text_paragraphs)): ?>
					<?php foreach ($image_text_paragraphs as $paragraph): ?>
						<p><?php echo esc_html($paragraph); ?></p>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if (!empty($image_text_button_text) && !empty($image_text_button_link)): ?>
					<a href="<?php echo esc_url($image_text_button_link); ?>" class="primary-button image-text-button">
						<?php echo esc_html($image_text_button_text); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>