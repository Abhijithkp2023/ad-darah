<?php
/**
 * Landing Page Gallery Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $landing_gallery_heading = 'Our Gallery';
 * $landing_gallery_button_text = 'View All';
 * $landing_gallery_button_link = '#';
 * include locate_template('template-parts/LandingGallery.php');
 */

// Get variables with defaults
$landing_gallery_heading = isset($landing_gallery_heading) ? $landing_gallery_heading : 'Our Gallery';
$landing_gallery_button_text = isset($landing_gallery_button_text) ? $landing_gallery_button_text : 'View All';
$landing_gallery_button_link = isset($landing_gallery_button_link) ? $landing_gallery_button_link : '#';

// Allow pages to override media assets per page while keeping safe defaults
$landing_gallery_top_left = isset($landing_gallery_top_left)
	? $landing_gallery_top_left
	: get_template_directory_uri() . '/assets/images/top_left.png';
$landing_gallery_top_left_alt = isset($landing_gallery_top_left_alt)
	? $landing_gallery_top_left_alt
	: 'Gallery Top Left';

$landing_gallery_top_right = isset($landing_gallery_top_right)
	? $landing_gallery_top_right
	: get_template_directory_uri() . '/assets/images/top_right.png';
$landing_gallery_top_right_alt = isset($landing_gallery_top_right_alt)
	? $landing_gallery_top_right_alt
	: 'Gallery Top Right';

$landing_gallery_bottom_left = isset($landing_gallery_bottom_left)
	? $landing_gallery_bottom_left
	: get_template_directory_uri() . '/assets/images/bottom_left.png';
$landing_gallery_bottom_left_alt = isset($landing_gallery_bottom_left_alt)
	? $landing_gallery_bottom_left_alt
	: 'Gallery Bottom Left';

$landing_gallery_bottom_right = isset($landing_gallery_bottom_right)
	? $landing_gallery_bottom_right
	: get_template_directory_uri() . '/assets/images/bottom_right.png';
$landing_gallery_bottom_right_alt = isset($landing_gallery_bottom_right_alt)
	? $landing_gallery_bottom_right_alt
	: 'Gallery Bottom Right';

$landing_gallery_video_src = isset($landing_gallery_video_src)
	? $landing_gallery_video_src
	: get_template_directory_uri() . '/assets/images/form_video.mp4';
$landing_gallery_center_alt = isset($landing_gallery_center_alt)
	? $landing_gallery_center_alt
	: 'Gallery Center';

// Detect whether center media is a video or image (supports image fallback)
$landing_gallery_is_video = preg_match('/\.(mp4|webm|ogg)$/i', $landing_gallery_video_src) === 1;
?>
<section class="landing-gallery-section pb_100 pt_100">
	<div class="container">
		<h2 class="landing-gallery-heading"><?php echo esc_html($landing_gallery_heading); ?></h2>
		
		<div class="landing-gallery-grid">
			<!-- Top Left Image -->
			<div class="landing-gallery-item landing-gallery-top-left">
				<img src="<?php echo esc_url($landing_gallery_top_left); ?>" alt="<?php echo esc_attr($landing_gallery_top_left_alt); ?>">
			</div>

			<!-- Center Video -->
			<div class="landing-gallery-item landing-gallery-center">
				<?php if ($landing_gallery_is_video): ?>
					<video autoplay muted loop playsinline>
						<source src="<?php echo esc_url($landing_gallery_video_src); ?>" type="video/mp4">
					</video>
				<?php else: ?>
					<img src="<?php echo esc_url($landing_gallery_video_src); ?>" alt="<?php echo esc_attr($landing_gallery_center_alt); ?>">
				<?php endif; ?>
			</div>

			<!-- Top Right Image -->
			<div class="landing-gallery-item landing-gallery-top-right">
				<img src="<?php echo esc_url($landing_gallery_top_right); ?>" alt="<?php echo esc_attr($landing_gallery_top_right_alt); ?>">
			</div>

			<!-- Bottom Left Image -->
			<div class="landing-gallery-item landing-gallery-bottom-left">
				<img src="<?php echo esc_url($landing_gallery_bottom_left); ?>" alt="<?php echo esc_attr($landing_gallery_bottom_left_alt); ?>">
			</div>

			<!-- Bottom Right Image -->
			<div class="landing-gallery-item landing-gallery-bottom-right">
				<img src="<?php echo esc_url($landing_gallery_bottom_right); ?>" alt="<?php echo esc_attr($landing_gallery_bottom_right_alt); ?>">
			</div>
		</div>

		<div class="landing-gallery-button-wrapper">
			<a href="<?php echo esc_url($landing_gallery_button_link); ?>" class="landing-gallery-button">
				<?php echo esc_html($landing_gallery_button_text); ?>
			</a>
		</div>
	</div>
</section>

