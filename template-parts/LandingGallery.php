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
?>
<section class="landing-gallery-section pb_100 pt_100">
	<div class="container">
		<h2 class="landing-gallery-heading"><?php echo esc_html($landing_gallery_heading); ?></h2>
		
		<div class="landing-gallery-grid">
			<!-- Top Left Image -->
			<div class="landing-gallery-item landing-gallery-top-left">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/top_left.png'); ?>" alt="Gallery Top Left">
			</div>

			<!-- Center Video -->
			<div class="landing-gallery-item landing-gallery-center">
				<video autoplay muted loop playsinline>
					<source src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/form_video.mp4'); ?>" type="video/mp4">
				</video>
			</div>

			<!-- Top Right Image -->
			<div class="landing-gallery-item landing-gallery-top-right">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/top_right.png'); ?>" alt="Gallery Top Right">
			</div>

			<!-- Bottom Left Image -->
			<div class="landing-gallery-item landing-gallery-bottom-left">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/bottom_left.png'); ?>" alt="Gallery Bottom Left">
			</div>

			<!-- Bottom Right Image -->
			<div class="landing-gallery-item landing-gallery-bottom-right">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/bottom_right.png'); ?>" alt="Gallery Bottom Right">
			</div>
		</div>

		<div class="landing-gallery-button-wrapper">
			<a href="<?php echo esc_url($landing_gallery_button_link); ?>" class="landing-gallery-button">
				<?php echo esc_html($landing_gallery_button_text); ?>
			</a>
		</div>
	</div>
</section>

