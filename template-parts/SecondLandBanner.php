<?php
/**
 * Second Landing Banner Component Template
 * 
 * Banner for the second landing page
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/SecondLandBanner');
 * 
 */

// Get banner parameters from query vars or use defaults
$second_land_banner_title = get_query_var('second_land_banner_title', 'Your Unforgettable Wedding Begins at AD-DARAH');
$second_land_banner_description = get_query_var('second_land_banner_description', 'Elegant venues, impeccable service, and luxurious experiences in the heart of Riyadh.');
$second_land_banner_button_text = get_query_var('second_land_banner_button_text', 'Plan Your Event');
$second_land_banner_button_link = get_query_var('second_land_banner_button_link', '#');
$second_land_banner_bg_image = get_query_var('second_land_banner_bg_image', get_template_directory_uri() . '/assets/images/second_land_banner.png');
?>

<section class="second-land-banner-container">
	<div class="second-land-banner-image">
		<img src="<?php echo esc_url($second_land_banner_bg_image); ?>" alt="" aria-hidden="true">
	</div>
	<div class="second-land-banner-overlay"></div>
	<div class="second-land-banner-content">
		<div class="container">
			<div class="second-land-banner-text-wrapper">
				<h1 class="second-land-banner-title">
					<?php echo esc_html($second_land_banner_title); ?>
				</h1>
				<p class="second-land-banner-description">
					<?php echo esc_html($second_land_banner_description); ?>
				</p>
				<a href="<?php echo esc_url($second_land_banner_button_link); ?>" class="primary-button second-land-banner-button">
					<?php echo esc_html($second_land_banner_button_text); ?>
				</a>
			</div>
		</div>
	</div>
</section>

