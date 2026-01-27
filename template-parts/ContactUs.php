<?php
/**
 * Contact Us Component Template
 *
 * @package addarah
 * 
 * Usage:
 * set_query_var('contact_title', 'Your Event, Our Venue — Excellence Awaits');
 * set_query_var('contact_description', 'Lorem Ipsum is simply dummy text...');
 * set_query_var('contact_button_text', 'Contact Us');
 * set_query_var('contact_button_link', '#');
 * set_query_var('contact_bg_image', get_template_directory_uri() . '/assets/images/contact-bg.jpg');
 * get_template_part('template-parts/ContactUs');
 */

// Get contact us settings from query vars first, then theme mods, then defaults
$contact_title = get_query_var('contact_title', get_theme_mod('contact_title', 'Your Event, Our Venue — Excellence Awaits'));
$contact_description = get_query_var('contact_description', get_theme_mod('contact_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'));
$contact_button_text = get_query_var('contact_button_text', get_theme_mod('contact_button_text', 'Contact Us'));
$contact_button_link = get_query_var('contact_button_link', get_theme_mod('contact_button_link', '#'));
$contact_bg_image = get_query_var('contact_bg_image', get_theme_mod('contact_bg_image', get_template_directory_uri() . '/assets/images/contact-bg.png'));
?>

<section class="contact-us-container pb_120 pt_120"
	style="background-image: url('<?php echo esc_url($contact_bg_image); ?>');">
	<div class="container">
		<div class="contact-us-content">
			<?php if ($contact_title): ?>
				<h2 class="contact-us-title"><?php echo esc_html($contact_title); ?></h2>
			<?php endif; ?>

			<?php if ($contact_description): ?>
				<p class="contact-us-description"><?php echo esc_html($contact_description); ?></p>
			<?php endif; ?>

			<?php if ($contact_button_text): ?>
				<button type="button" class="primary-button contact-section-button mid_wide" id="contactUsButton">
					<?php echo esc_html($contact_button_text); ?>
				</button>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- Contact Us Popup Modal -->
<div class="contact-popup-overlay" id="contactPopupOverlay">
	<div class="contact-popup-modal">
		<button class="contact-popup-close" id="contactPopupClose" aria-label="Close contact form">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M18 6L6 18M6 6L18 18" stroke="#C5B17F" stroke-width="2" stroke-linecap="round" />
			</svg>
		</button>
		<div class="contact-popup-content">
			<!-- Decorative Background Section (Left) -->
			<div class="contact-popup-decorative-bg">
				<?php
				$decorative_bg_image = get_query_var('contact_decorative_bg', get_template_directory_uri() . '/assets/images/connect_form.png');
				?>
				<img src="<?php echo esc_url($decorative_bg_image); ?>" alt="Decorative Background"
					class="contact-popup-bg-image">
			</div>

			<!-- Form Section (Right) -->
			<div class="contact-popup-form-wrapper">
				<h2 class="contact-popup-title">Connect With Us</h2>
				<form class="contact-popup-form" action="#" method="post">
					<div class="contact-popup-field">
						<input type="text" id="contact-name" name="name" placeholder="Name" class="contact-popup-input"
							required>
					</div>
					<div class="contact-popup-field">
						<input type="email" id="contact-email" name="email" placeholder="Email"
							class="contact-popup-input" required>
					</div>
					<div class="contact-popup-field">
						<input type="tel" id="contact-phone" name="phone" placeholder="Phone Number"
							class="contact-popup-input" required>
					</div>
					<div class="contact-popup-field">
						<textarea id="contact-message" name="message" placeholder="Message"
							class="contact-popup-input contact-popup-textarea" rows="4" required></textarea>
					</div>
					<button type="submit" class="primary-button">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>