<?php
/**
 * The about template file
 *
 * 
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		<?php
		// Banner Section
		set_query_var('banner_title', 'About Us');
		set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/about-banner.png');
		get_template_part('template-parts/Banner');
		?>

		<?php
		$image_text_image = get_template_directory_uri() . '/assets/images/about_pic.jpg';
		$image_text_headline_1 = 'Discover the Story Behind';
		$image_text_headline_2 = 'AD-DARAH';
		$image_text_paragraphs = array(
			'AD-DARAH is Riyadh\'s premier destination for iconic events, built on a strong Saudi heritage while embracing modern innovation. From corporate summits to royal weddings, our venue represents elegance, excellence, and cultural pride.',
			'AD-DARAH is a world-class events venue located in the heart of Riyadh, designed to host corporate, cultural, and social gatherings of all scales. Combining architectural excellence with modern amenities, we provide an unmatched setting for experiences that leave a lasting impression.'
		);

		include locate_template('template-parts/ImageTextSection.php'); ?>
		<?php
		// Statistics Section
		?>
		<section class="pb_100">
			<?php get_template_part('template-parts/Statistics'); ?>
		</section>
		<?php
		// Partners/Logos Marquee Section
		get_template_part('template-parts/Partners');
		// Venue At A Glance Section
		$venue_title = 'VENUE AT A GLANCE';
		$venue_slides = array(
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_1.jpg',
				'capacity_label' => 'Total Capacity',
				'capacity_value' => 'Up to 2,500 Guests',
				'button_text' => 'Download Venue Floor Plan',
				'button_url' => '#'
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_2.jpg',
				'capacity_label' => 'Total Capacity',
				'capacity_value' => '1,500 Guests',
				'button_text' => 'View Details',
				'button_url' => '#'
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_3.jpg',
				'capacity_label' => 'Total Capacity',
				'capacity_value' => '500 Guests',
				'button_text' => 'Learn More',
				'button_url' => '#'
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_4.jpg',
				'capacity_label' => 'Total Capacity',
				'capacity_value' => '800 Guests',
				'button_text' => 'Explore',
				'button_url' => '#'
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_5.jpg',
				'capacity_label' => 'Total Capacity',
				'capacity_value' => '2,000 Guests',
				'button_text' => 'View Floor Plan',
				'button_url' => '#'
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_6.jpg',
				'capacity_label' => 'Welcome Area',
				'capacity_value' => 'Spacious Lobby',
				'button_text' => 'Take Tour',
				'button_url' => '#'
			)
		);
		include locate_template('template-parts/VenueAtAGlance.php'); ?>
		<?php
		// Timeline Slider Section
		$timeline_headline = 'Rooted in Saudi Identity';
		$timeline_description = 'Inspired by the Kingdom\'s heritage and values, AD-DARAH was envisioned as more than just a venue—it is a cultural landmark. Every detail, from the architectural design to the hospitality experience, reflects the richness of Saudi tradition while offering the sophistication of modern luxury.';
		$timeline_slides = array(
			array(
				'year' => '2024',
				'image' => get_template_directory_uri() . '/assets/images/root_1.jpg',
				'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
			),
			array(
				'year' => '2023',
				'image' => get_template_directory_uri() . '/assets/images/root_2.jpg',
				'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
			),
			array(
				'year' => '2022',
				'image' => get_template_directory_uri() . '/assets/images/root_3.jpg',
				'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
			),
			array(
				'year' => '2021',
				'image' => get_template_directory_uri() . '/assets/images/root_1.jpg',
				'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
			),
			array(
				'year' => '2020',
				'image' => get_template_directory_uri() . '/assets/images/root_2.jpg',
				'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
			),

		);
		include locate_template('template-parts/TimelineSlider.php'); ?>
		<div class="about-page-services-stack-wrapper">
			<?php
			// Vision Mission Stack Section
			$services_stack_services = array(
				array(
					'title' => 'Our Vision',
					'description' => 'To be the Kingdom\'s leading venue for prestigious events, setting new benchmarks in hospitality and excellence.',
					'image' => get_template_directory_uri() . '/assets/images/vision.jpg',
				),
				array(
					'title' => 'Our Mission',
					'description' => 'To deliver exceptional experiences that honor Saudi heritage while embracing innovation, creating unforgettable moments for every event we host.',
					'image' => get_template_directory_uri() . '/assets/images/mision.jpg',
				),
			);
			set_query_var('services_stack_services', $services_stack_services);
			get_template_part('template-parts/ServicesStack');
			?>
		</div>
		<?php
		// Dual Slider Section
		$dual_slider_heading = 'Our Values';
		$dual_slider_items = array(
			array(
				'subheading' => 'Heritage & Identity',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
				'image' => get_template_directory_uri() . '/assets/images/dual_01.png',
			),
			array(
				'subheading' => 'Excellence in Service',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
				'image' => get_template_directory_uri() . '/assets/images/dual_02.png',
			),
			array(
				'subheading' => 'Innovation & Modernity',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
				'image' => get_template_directory_uri() . '/assets/images/dual_03.png',
			),
		);
		set_query_var('dual_slider_heading', $dual_slider_heading);
		set_query_var('dual_slider_items', $dual_slider_items);
		get_template_part('template-parts/DualSlider');
		?>
		<?php
		// Sustainability Section
		$sustainability_tag = 'Sustainability & Vision 2030';
		$sustainability_heading = 'Our Commitment to the Future';
		$sustainability_paragraph = 'At AD-DARAH, sustainability is not an option—it is our responsibility. In alignment with Saudi Arabia\'s Vision 2030, we have integrated eco-conscious practices and innovative solutions that reduce environmental impact while elevating guest experiences.';
		$sustainability_image = get_template_directory_uri() . '/assets/images/future.png';
		$sustainability_items = array(
			array(
				'icon' => get_template_directory_uri() . '/assets/images/energy.svg',
				'text' => 'Smart energy management system',
			),
			array(
				'icon' => get_template_directory_uri() . '/assets/images/catering.svg',
				'text' => 'Sustainable catering solutions',
			),
			array(
				'icon' => get_template_directory_uri() . '/assets/images/food.svg',
				'text' => 'Locally sourced materials and food',
			),
			array(
				'icon' => get_template_directory_uri() . '/assets/images/recycle.svg',
				'text' => 'Waste reduction & recycling initiatives',
			),
		);
		set_query_var('sustainability_tag', $sustainability_tag);
		set_query_var('sustainability_heading', $sustainability_heading);
		set_query_var('sustainability_paragraph', $sustainability_paragraph);
		set_query_var('sustainability_image', $sustainability_image);
		set_query_var('sustainability_items', $sustainability_items);
		get_template_part('template-parts/Sustainability');
		?>
		<?php
		// Contact Us Section
		get_template_part('template-parts/ContactUs');
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();