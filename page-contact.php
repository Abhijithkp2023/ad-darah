<?php
/**
 * Template Name: Contact Us
 * The contact us template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		<?php
		// Banner Section
		set_query_var('banner_title', 'Contact Us');
		set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/contact-baner-img.jpg');
		get_template_part('template-parts/Banner');
		?>

		<section class="contact-page-content pt_120 pb_120">
			<?php
			// Contact Form Section
			get_template_part('template-parts/ContactForm');
			?>
		</section>

		

		<section class="contact-info-map-page-section">
			<?php
			// Contact Info and Map Section
			get_template_part('template-parts/ContactInfoMap');
			?>
		</section>

		<div class="contact-page-testimonial-wrapper">
			<?php
			// Single Testimonial Section
			$single_testimonial_title = 'Featured Clients';
			$single_testimonial_decor_image = get_template_directory_uri() . '/assets/images/single_testimonial_decor_2.png';
			$single_testimonial_items = array(
				array(
					'review' => 'This venue is perfect for large celebrations! The spaciousness is ideal for accommodating a significant number of guests, making it a fantastic choice for big events.',
					'name' => 'Sarah Mitchell',
					'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
					'rating' => 4,
				),
				array(
					'review' => 'I attended the Ramadan Iftar at Al-Dara Hall and it was an amazing experience the steak was tender and delicious and the shawarma was perfect the Italian corner was fancy and the pizza was so good the desserts were varied and tasted great the Arabic dishes',
					'name' => 'Ryan Lee',
					'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
					'rating' => 4,
				),
				array(
					'review' => 'The buffet offers an impressive variety of cuisines, from Arabic to Indian, ensuring there\'s something for everyone. The food quality is excellent, with fresh and flavorful dishes, particularly at the live stations.',
					'name' => 'Emma Algunaibet',
					'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
					'rating' => 4,
				),
			);

			include locate_template('template-parts/SingleTestimonial.php');
			?>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
?>

<!-- Direct script load for SingleTestimonial (fallback) -->
<script>
	console.log("Template loaded: page-contact.php");
	(function () {
		console.log("Loading SingleTestimonial.js directly from template...");
		var script = document.createElement('script');
		script.src = '<?php echo get_template_directory_uri(); ?>/assets/js/SingleTestimonial.js?v=<?php echo _S_VERSION; ?>';
		script.onload = function () {
			console.log("SingleTestimonial.js loaded successfully!");
		};
		script.onerror = function () {
			console.error("Failed to load SingleTestimonial.js from:", script.src);
		};
		document.head.appendChild(script);
	})();
</script>