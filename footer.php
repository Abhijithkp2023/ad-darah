<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package addarah
 */

// Get Footer settings from theme mods or defaults
$footer_logo = get_theme_mod('footer_logo', get_template_directory_uri() . '/assets/images/logo-white.svg');
$footer_copyright = get_theme_mod('footer_copyright', '©2025, addarah, All Rights Reserved');
$footer_terms_link = get_theme_mod('footer_terms_link', '#');
$footer_privacy_link = get_theme_mod('footer_privacy_link', '#');
$newsletter_heading = get_theme_mod('footer_newsletter_heading', 'Newsletter Signup');
$newsletter_description = get_theme_mod('footer_newsletter_description', 'Stay updated with the latest news, insights, and exclusive updates.');

// Social links data - ordered to match design: Instagram, LinkedIn, Facebook, X
$social_links = array(
	array(
		'id' => 1,
		'name' => 'Instagram',
		'icon' => get_template_directory_uri() . '/assets/images/instagram-icon.svg',
		'url' => get_theme_mod('footer_instagram_url', '#'),
	),
	array(
		'id' => 2,
		'name' => 'LinkedIn',
		'icon' => get_template_directory_uri() . '/assets/images/linkedin-icon.svg',
		'url' => get_theme_mod('footer_linkedin_url', '#'),
	),
	array(
		'id' => 3,
		'name' => 'Facebook',
		'icon' => get_template_directory_uri() . '/assets/images/facebook-icon.svg',
		'url' => get_theme_mod('footer_facebook_url', '#'),
	),
	array(
		'id' => 4,
		'name' => 'X',
		'icon' => get_template_directory_uri() . '/assets/images/twitter-icon.svg',
		'url' => get_theme_mod('footer_twitter_url', '#'),
	),
);

// Quick links - use WordPress menu if available, otherwise use defaults
$quick_links = array();
$menu_items = wp_get_nav_menu_items('menu-1');
if ($menu_items) {
	foreach ($menu_items as $item) {
		$quick_links[] = array(
			'id' => $item->ID,
			'name' => $item->title,
			'url' => $item->url,
		);
	}
} else {
	// Fallback quick links
	$quick_links = array(
		array('id' => 1, 'name' => 'About Us', 'url' => home_url('/about')),
		array('id' => 2, 'name' => 'Subsidiaries', 'url' => home_url('/subsidiaries')),
		array('id' => 3, 'name' => 'Investments', 'url' => home_url('/investments')),
		array('id' => 4, 'name' => 'Downloads', 'url' => home_url('/downloads')),
		array('id' => 5, 'name' => 'Careers', 'url' => home_url('/careers')),
		array('id' => 6, 'name' => 'News & Media', 'url' => home_url('/news')),
		array('id' => 7, 'name' => 'Contact Us', 'url' => home_url('/contact-us')),
	);
}
?>

<footer id="colophon" class="site-footer footer">
	<div class="container pt_100 pb_40 footer-container">
		<!-- Main Footer Content -->
		<div class="footer-main-content">
			<!-- Logo Section -->
			<div class="footer-logo-section">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.svg" alt="Footer Logo"
					class="footer-logo">
			</div>

			<!-- Newsletter Section -->
			<div class="footer-newsletter-section">
				<h3 class="footer-newsletter-heading">Subscribe to our newsletter</h3>
				<form class="footer-newsletter-form">
					<input type="email" placeholder="Email Address" class="footer-newsletter-input" required>
					<button type="submit" class="primary-button">Subscribe</button>
				</form>
			</div>

			<!-- Navigation Links Section -->
			<div class="footer-link-list">
				<div class="footer-link-column">
					<h4 class="footer-link-heading">Explore</h4>
					<ul class="footer-link-items">
						<li><a href="<?php echo home_url('/about-us'); ?>">About Us</a></li>
						<li><a href="<?php echo home_url('/media-center'); ?>">Media Center</a></li>
						<li><a href="<?php echo home_url('/contact-us'); ?>">Contact Us</a></li>
					</ul>
				</div>
				<div class="footer-link-column">
					<h4 class="footer-link-heading">Services</h4>
					<ul class="footer-link-items">
						<li><a href="<?php echo home_url('/corporate-services'); ?>">Corporate Services</a></li>
						<li><a href="<?php echo home_url('/weddings-social-services-detail'); ?>">Weddings & Social
								Services</a></li>
						<li><a href="<?php echo home_url('/catering-services'); ?>">Catering Services</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Bottom Section - Copyright and Legal Links -->
		<div class="footer-bottom-section">
			<div class="footer-bottom-left">
				<span class="footer-copyright">
					© <?php echo date('Y'); ?>. AD-DARAH. All Rights Reserved |
					<a href="<?php echo esc_url($footer_terms_link); ?>" class="footer-legal-link">Terms &
						Conditions</a> |
					<a href="<?php echo esc_url($footer_privacy_link); ?>" class="footer-legal-link">Privacy Policy</a>
				</span>
			</div>
			<div class="footer-bottom-right">
				<?php foreach ($social_links as $social): ?>
					<a href="<?php echo esc_url($social['url']); ?>" class="footer-social-link" <?php echo ($social['url'] !== '#') ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>>
						<?php echo esc_html($social['name']); ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>