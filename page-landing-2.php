<?php
/**
 * The second landing page template file
 *
 * This is the template for the second landing page
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page page-landing-2">
		<?php
		// Second Landing Banner Section
		get_template_part('template-parts/SecondLandBanner');

		// Infinite Slider Section
		$infinite_slider_heading = 'Why ADDARAH Is the Best Venue for Your Wedding';
		$infinite_slider_items = array(
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_01.png',
				'heading' => 'Grand Wedding Hall',
				'description' => 'Spacious halls with flexible layouts designed for unforgettable wedding celebrations.',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_02.png',
				'heading' => 'Bridal & VIP Suites',
				'description' => 'Private, luxurious suites for the bride, groom, and VIP guests to relax and prepare.',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_03.png',
				'heading' => 'Separate Male & Female Halls',
				'description' => 'Thoughtfully designed separate halls offering comfort, privacy, and cultural ease.',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_04.png',
				'heading' => 'Luxury Venue ',
				'description' => 'State-of-the-art lighting and sound to elevate every moment of your celebration.',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_05.png',
				'heading' => 'Dedicated Parking Area',
				'description' => 'Ample parking with professional valet service for a seamless guest experience.',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_06.png',
				'heading' => 'On site Catering Service ',
				'description' => 'Fully equipped kitchens and live stations delivering fresh, memorable cuisine.',
			),
		);
		include locate_template('template-parts/InfiniteSlider.php');

		// Landing Gallery Section
		set_query_var('landing_gallery_heading', 'Our Gallery');
		set_query_var('landing_gallery_button_text', 'View All');
		set_query_var('landing_gallery_button_link', get_permalink(get_page_by_path('gallery')));
		// Page-specific media for LandingGallery (Landing 2)
		set_query_var('landing_gallery_top_left', get_template_directory_uri() . '/assets/images/top_left.png');
		set_query_var('landing_gallery_top_left_alt', 'Landing Gallery Top Left');
		set_query_var('landing_gallery_top_right', get_template_directory_uri() . '/assets/images/top_right.png');
		set_query_var('landing_gallery_top_right_alt', 'Landing Gallery Top Right');
		set_query_var('landing_gallery_bottom_left', get_template_directory_uri() . '/assets/images/bottom_left.png');
		set_query_var('landing_gallery_bottom_left_alt', 'Landing Gallery Bottom Left');
		set_query_var('landing_gallery_bottom_right', get_template_directory_uri() . '/assets/images/bottom_right.png');
		set_query_var('landing_gallery_bottom_right_alt', 'Landing Gallery Bottom Right');
		set_query_var('landing_gallery_video_src', get_template_directory_uri() . '/assets/videos/home-video.mp4');
		get_template_part('template-parts/LandingGallery');

		// Single Testimonial Section
		$single_testimonial_title = 'Featured Clients';
		$single_testimonial_show_navigation = true;
		$single_testimonial_decor_image = get_template_directory_uri() . '/assets/images/single_testimonial_decor_2.png';
		$single_testimonial_variant_class = 'landing-page-2-variant';
		$single_testimonial_items = array(
			array(
				'review' => 'This venue is perfect for large celebrations! The elegant halls and impeccable service made our wedding unforgettable.',
				'name' => 'Sarah Mitchell',
				'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
				'rating' => 5,
			),
			array(
				'review' => 'AD-DARAH exceeded all our expectations. The attention to detail and luxurious facilities created the perfect atmosphere for our event.',
				'name' => 'Ahmed Al-Rashid',
				'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
				'rating' => 5,
			),
			array(
				'review' => 'The professional team and world-class facilities made our corporate event a huge success. Highly recommended!',
				'name' => 'Fatima Hassan',
				'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
				'rating' => 5,
			),
		);
		include locate_template('template-parts/SingleTestimonial.php');

		get_template_part('template-parts/VideoForm');


		$wedding_packages_heading = 'Wedding Packages';
		$wedding_packages_description = 'AD-DARAH offers world-class facilities tailored for weddings and social celebrations. Every detail—from the grand halls to the private suites—is crafted to ensure your event unfolds seamlessly with elegance and ease.';
		$wedding_packages_items = array(
			array(
				'image' => get_template_directory_uri() . '/assets/images/package_01.png',
				'heading' => 'Pearl Package',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
				'pdf_url' => '#',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/package_02.png',
				'heading' => 'Diamond Package',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
				'pdf_url' => '#',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/package_03.png',
				'heading' => 'Royal Package',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
				'pdf_url' => '#',
			),
		);
		include locate_template('template-parts/WeddingPackages.php');
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();
?>

<!-- Direct script load for SingleTestimonial (fallback) -->
<script>
	console.log("Template loaded: page-landing-2.php");
	(function () {
		// Wait for Swiper to be available
		function loadSingleTestimonialScript() {
			if (typeof Swiper !== 'undefined') {
				console.log("Swiper is available, loading SingleTestimonial.js...");
				var script = document.createElement('script');
				script.src = '<?php echo get_template_directory_uri(); ?>/assets/js/SingleTestimonial.js?v=<?php echo _S_VERSION; ?>';
				script.onload = function () {
					console.log("SingleTestimonial.js loaded successfully!");
				};
				script.onerror = function () {
					console.error("Failed to load SingleTestimonial.js from:", script.src);
				};
				document.head.appendChild(script);
			} else {
				console.log("Waiting for Swiper to load...");
				setTimeout(loadSingleTestimonialScript, 100);
			}
		}

		// Try loading immediately
		loadSingleTestimonialScript();

		// Also try after window load
		window.addEventListener('load', function () {
			setTimeout(loadSingleTestimonialScript, 200);
		});
	})();
</script>