<?php
/**
 * The front page template file
 *
 * This is the template for the home page
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		<?php
		// Main Banner Section
		get_template_part('template-parts/MainBanner');

		// Where Ever Content Section
		get_template_part('template-parts/WhereEver');

		// Statistics Section
		?>
		<section class="pb_100">
			<?php get_template_part('template-parts/Statistics'); ?>
		</section>
		<?php
		// Partners/Logos Marquee Section
		?>
		<section class="pb_100">
			<?php get_template_part('template-parts/Partners'); ?>
		</section>
		<?php

		// Services Stack Section
		$services_stack_services = array(
			array(
				'tag' => 'OUR SERVICES',
				'title' => 'Corporate Events',
				'description' => 'From global conferences to high-level government meetings, our venue offers the perfect setting for impactful events.',
				'image' => get_template_directory_uri() . '/assets/images/stack_img_01.png',
				'link' => home_url('/corporate-services'),
			),
			array(
				'tag' => 'OUR SERVICES',
				'title' => 'Weddings & <br /> Social Celebrations',
				'description' => 'A royal backdrop for your big day, blending tradition with elegance.',
				'image' => get_template_directory_uri() . '/assets/images/stack_img_02.png',
				'link' => home_url('/weddings-social-services'),
			),
			array(
				'tag' => 'OUR SERVICES',
				'title' => 'Catering',
				'description' => 'Exquisite on-site and off-site catering tailored to your event.',
				'image' => get_template_directory_uri() . '/assets/images/stack_img_03.png',
				'link' => home_url('/catering-services'),
			),
		);
		set_query_var('services_stack_services', $services_stack_services);
		get_template_part('template-parts/ServicesStack');

		// Testimonials Section
		get_template_part('template-parts/Testimonials');
		// News & Articles Section
		get_template_part('template-parts/NewsArticles');

		// Virtual Tour Section
		get_template_part('template-parts/VirtualTour');

		// Contact Us Section
		get_template_part('template-parts/ContactUs');
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();

