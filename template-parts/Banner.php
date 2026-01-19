<?php
/**
 * Banner Component Template
 *
 * @package addarah
 * 
 * Usage:
 * set_query_var('banner_title', 'About Us');
 * set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/about-banner.jpg');
 * get_template_part('template-parts/Banner');
 */

// Get banner parameters from query vars or use defaults
$banner_title = get_query_var('banner_title', '');
$banner_bg_image = get_query_var('banner_bg_image', '');

// If no background image provided, don't render
if (empty($banner_bg_image)) {
	return;
}
?>

<section class="banner-container" data-banner-ref>
	<div class="banner-content container">
		<div class="container">
			<?php if ($banner_title): ?>
				<h1 class="banner-title" data-aos="fade-up"><?php echo esc_html($banner_title); ?></h1>
			<?php endif; ?>
		</div>
	</div>
	<img src="<?php echo esc_url($banner_bg_image); ?>" alt="" aria-hidden="true">
</section>