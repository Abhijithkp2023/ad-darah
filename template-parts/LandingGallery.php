<?php
/**
 * Landing Page Gallery Component Template
 *
 * @package addarah
 * 
 * Usage:
 * set_query_var('landing_gallery_heading', 'Our Gallery');
 * set_query_var('landing_gallery_button_text', 'View All');
 * set_query_var('landing_gallery_button_link', '#');
 * get_template_part('template-parts/LandingGallery');
 */

// Get variables from query vars with defaults
$landing_gallery_heading = get_query_var('landing_gallery_heading', 'Our Gallery');
$landing_gallery_button_text = get_query_var('landing_gallery_button_text', 'View All');
$landing_gallery_button_link = get_query_var('landing_gallery_button_link', '#');

// Allow pages to override media assets per page while keeping safe defaults
$landing_gallery_top_left = get_query_var('landing_gallery_top_left', get_template_directory_uri() . '/assets/images/top_left.png');
$landing_gallery_top_left_alt = get_query_var('landing_gallery_top_left_alt', 'Gallery Top Left');

$landing_gallery_top_right = get_query_var('landing_gallery_top_right', get_template_directory_uri() . '/assets/images/top_right.png');
$landing_gallery_top_right_alt = get_query_var('landing_gallery_top_right_alt', 'Gallery Top Right');

$landing_gallery_bottom_left = get_query_var('landing_gallery_bottom_left', get_template_directory_uri() . '/assets/images/bottom_left.png');
$landing_gallery_bottom_left_alt = get_query_var('landing_gallery_bottom_left_alt', 'Gallery Bottom Left');

$landing_gallery_bottom_right = get_query_var('landing_gallery_bottom_right', get_template_directory_uri() . '/assets/images/bottom_right.png');
$landing_gallery_bottom_right_alt = get_query_var('landing_gallery_bottom_right_alt', 'Gallery Bottom Right');

$landing_gallery_video_src = get_query_var('landing_gallery_video_src', get_template_directory_uri() . '/assets/images/form_video.mp4');
$landing_gallery_center_alt = get_query_var('landing_gallery_center_alt', 'Gallery Center');

// Detect whether center media is a video or image (supports image fallback)
$landing_gallery_is_video = preg_match('/\.(mp4|webm|ogg)$/i', $landing_gallery_video_src) === 1;

// Allow pages to pass extra classes (e.g., remove background)
$landing_gallery_section_classes = get_query_var('landing_gallery_section_classes', 'landing-gallery-section');

// Second gallery grid images (optional)
$landing_gallery_second_left = get_query_var('landing_gallery_second_left', '');
$landing_gallery_second_left_alt = get_query_var('landing_gallery_second_left_alt', 'Gallery Second Left');
$landing_gallery_second_center_top = get_query_var('landing_gallery_second_center_top', '');
$landing_gallery_second_center_top_alt = get_query_var('landing_gallery_second_center_top_alt', 'Gallery Second Center Top');
$landing_gallery_second_center_bottom = get_query_var('landing_gallery_second_center_bottom', '');
$landing_gallery_second_center_bottom_alt = get_query_var('landing_gallery_second_center_bottom_alt', 'Gallery Second Center Bottom');
$landing_gallery_second_right = get_query_var('landing_gallery_second_right', '');
$landing_gallery_second_right_alt = get_query_var('landing_gallery_second_right_alt', 'Gallery Second Right');

// Check if second grid should be displayed
$show_second_grid = !empty($landing_gallery_second_left) && !empty($landing_gallery_second_center_top) && !empty($landing_gallery_second_center_bottom) && !empty($landing_gallery_second_right);
?>
<section class="<?php echo esc_attr($landing_gallery_section_classes); ?> pb_100 pt_100">
	<div class="container">
		<h2 class="landing-gallery-heading"><?php echo esc_html($landing_gallery_heading); ?></h2>

		<div class="landing-gallery-grid">
			<!-- Top Left Image -->
			<div class="landing-gallery-item landing-gallery-top-left">
				<img src="<?php echo esc_url($landing_gallery_top_left); ?>"
					alt="<?php echo esc_attr($landing_gallery_top_left_alt); ?>">
			</div>

			<!-- Center Video -->
			<div class="landing-gallery-item landing-gallery-center">
				<?php if ($landing_gallery_is_video): ?>
					<video autoplay muted loop playsinline>
						<source src="<?php echo esc_url($landing_gallery_video_src); ?>" type="video/mp4">
					</video>
				<?php else: ?>
					<img src="<?php echo esc_url($landing_gallery_video_src); ?>"
						alt="<?php echo esc_attr($landing_gallery_center_alt); ?>">
				<?php endif; ?>
			</div>

			<!-- Top Right Image -->
			<div class="landing-gallery-item landing-gallery-top-right">
				<img src="<?php echo esc_url($landing_gallery_top_right); ?>"
					alt="<?php echo esc_attr($landing_gallery_top_right_alt); ?>">
			</div>

			<!-- Bottom Left Image -->
			<div class="landing-gallery-item landing-gallery-bottom-left">
				<img src="<?php echo esc_url($landing_gallery_bottom_left); ?>"
					alt="<?php echo esc_attr($landing_gallery_bottom_left_alt); ?>">
			</div>

			<!-- Bottom Right Image -->
			<div class="landing-gallery-item landing-gallery-bottom-right">
				<img src="<?php echo esc_url($landing_gallery_bottom_right); ?>"
					alt="<?php echo esc_attr($landing_gallery_bottom_right_alt); ?>">
			</div>
		</div>

		<?php if ($show_second_grid): ?>
			<div class="landing-gallery-grid landing-gallery-grid-second" style="margin-top: 20px;">
				<!-- Second Grid Left Image -->
				<div class="landing-gallery-item landing-gallery-second-left">
					<img src="<?php echo esc_url($landing_gallery_second_left); ?>"
						alt="<?php echo esc_attr($landing_gallery_second_left_alt); ?>">
				</div>

				<!-- Second Grid Center Top Image -->
				<div class="landing-gallery-item landing-gallery-second-center-top">
					<img src="<?php echo esc_url($landing_gallery_second_center_top); ?>"
						alt="<?php echo esc_attr($landing_gallery_second_center_top_alt); ?>">
				</div>

				<!-- Second Grid Center Bottom Image -->
				<div class="landing-gallery-item landing-gallery-second-center-bottom">
					<img src="<?php echo esc_url($landing_gallery_second_center_bottom); ?>"
						alt="<?php echo esc_attr($landing_gallery_second_center_bottom_alt); ?>">
				</div>

				<!-- Second Grid Right Image -->
				<div class="landing-gallery-item landing-gallery-second-right">
					<img src="<?php echo esc_url($landing_gallery_second_right); ?>"
						alt="<?php echo esc_attr($landing_gallery_second_right_alt); ?>">
				</div>
			</div>
		<?php endif; ?>

		<div class="landing-gallery-button-wrapper">
			<a href="<?php echo esc_url($landing_gallery_button_link); ?>" class="landing-gallery-button">
				<?php echo esc_html($landing_gallery_button_text); ?>
			</a>
		</div>
	</div>
</section>