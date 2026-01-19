<?php
/**
 * Main Banner Component Template
 * 
 * Main banner for the front page/homepage
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/MainBanner');
 * 
 */

// Get banner parameters from query vars or use defaults
$main_banner_title = get_query_var('main_banner_title', get_theme_mod('main_banner_title', 'AdDarah'));
$main_banner_subtitle = get_query_var('main_banner_subtitle', get_theme_mod('main_banner_subtitle', 'AD-DARAH combines modern luxury with Saudi heritage to host unforgettable events'));
$main_banner_button_text = get_query_var('main_banner_button_text', get_theme_mod('main_banner_button_text', 'Get Started'));
$main_banner_button_link = get_query_var('main_banner_button_link', get_theme_mod('main_banner_button_link', '#'));
$main_banner_bg_image = get_query_var('main_banner_bg_image', get_theme_mod('main_banner_bg_image', get_template_directory_uri() . '/assets/images/about-banner.jpg'));
?>

<section class="main-banner-container">
	<div class="main-banner-overlay"></div>
	<div class="main-banner-mask">
		<img class="main-banner-mask-img"
			src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/banner-mask.svg'); ?>" alt=""
			aria-hidden="true">
	</div>
	<div class="main-banner-content container">
		<div class="main-banner-text-wrapper">
			<div class="main-banner-title-wrapper">
				<h1 class="main-banner-title">
					<?php echo esc_html($main_banner_title); ?>
				</h1>
			</div>
			<div class="main-banner-subtitle-wrapper">
				<p class="main-banner-subtitle">
					<?php echo esc_html($main_banner_subtitle); ?>
				</p>
			</div>
		</div>
		<div class="main-banner-form-wrapper ">
			<form class="main-banner-form" action="#" method="post">
				<div class="form-field">
					<label for="full-name" class="form-label">Full Name</label>
					<input type="text" id="full-name" name="full_name" placeholder="Enter Full Name" class="form-input"
						required>
				</div>
				<div class="form-field">
					<label for="email" class="form-label">Email Address</label>
					<input type="email" id="email" name="email" placeholder="xyz@mail.com" class="form-input" required>
				</div>
				<div class="form-field">
					<label for="phone" class="form-label">Phone No.</label>
					<input type="tel" id="phone" name="phone" placeholder="071 123 4567" class="form-input" required>
				</div>
				<div class="form-field">
					<label for="event-type" class="form-label">Event Type</label>
					<select id="event-type" name="event_type" class="form-input" required>
						<option value="">Select Event Type</option>
						<option value="wedding">Wedding</option>
						<option value="corporate">Corporate</option>
						<option value="social">Social</option>
					</select>
				</div>
				<div class="form-field">
					<label for="event-date" class="form-label">Event Date</label>
					<input type="date" id="event-date" name="event_date" class="form-input" required>
				</div>
				<div class="form-field">
					<label for="contact-time" class="form-label">Preferred Contact Time</label>
					<select id="contact-time" name="contact_time" class="form-input" required>
						<option value="">Select Time</option>
						<option value="morning">Morning</option>
						<option value="afternoon">Afternoon</option>
						<option value="evening">Evening</option>
					</select>
				</div>
				<a type="submit" class="primary-button">Book a Visit</a>
			</form>
		</div>
	</div>
	<div class="main-banner-image">
		<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/banner-main-img.jpg'); ?>" alt=""
			aria-hidden="true">
	</div>
</section>