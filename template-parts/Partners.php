<?php
/**
 * Partners/Logos Marquee Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/Partners');
 */

// Get partners images from the partners folder
$partners_dir = get_template_directory() . '/assets/images/partners/';
$partners_url = get_template_directory_uri() . '/assets/images/partners/';
$partners_images = array();

// Get all partner images
if (is_dir($partners_dir)) {
	$files = scandir($partners_dir);
	foreach ($files as $file) {
		if (preg_match('/\.(jpg|jpeg|png|svg|webp)$/i', $file)) {
			$partners_images[] = $partners_url . $file;
		}
	}
}

// If no images found, use default placeholder
if (empty($partners_images)) {
	$partners_images = array(
		get_template_directory_uri() . '/assets/images/main-logo.svg',
	);
}

// Duplicate the array to create seamless loop
$partners_images = array_merge($partners_images, $partners_images);
?>

<section class="partners-container">
	<div class="partners-marquee-wrapper">
		<div class="partners-marquee-header">
			<h5 class="sub-title">Our Partners</h5>
		</div>

		<ul class="partners-marquee">
			<?php foreach ($partners_images as $index => $image_url): ?>
				<li class="partners-item">
					<div class="partners-logo">
						<img src="<?php echo esc_url($image_url); ?>" alt="Partner Logo <?php echo esc_attr($index + 1); ?>"
							loading="lazy">
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

</section>