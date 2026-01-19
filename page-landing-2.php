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
	<div class="home-page">
		<?php
		// Second Landing Banner Section
		get_template_part('template-parts/SecondLandBanner');

		// Infinite Slider Section
		$infinite_slider_heading = 'Why ADDARAH Is the Best Venue for Your Wedding';
		$infinite_slider_items = array(
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_01.png',
				'heading' => 'Wedding Hall',
				'description' => 'Grand and elegantly decorated wedding hall with lush greenery and crystal chandeliers.',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_02.png',
				'heading' => 'Bridal & VIP Suites',
				'description' => 'Luxurious suites designed for the bride and VIP guests with elegant furnishings.',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_03.png',
				'heading' => 'Separate Male & Female Halls',
				'description' => 'Spacious and beautifully designed separate halls for male and female guests.',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_04.png',
				'heading' => 'Luxury Venue',
				'description' => 'Opulent event space with ornate mirrors, elegant decor, and romantic ambiance.',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_05.png',
				'heading' => 'Grand Entrance',
				'description' => 'Magnificent entrance with dramatic lighting and architectural grandeur.',
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/second_land_slide_06.png',
				'heading' => 'Elegant Dining',
				'description' => 'Luxurious dining areas with exquisite buffet setups and golden accents.',
			),
		);
		include locate_template('template-parts/InfiniteSlider.php');
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();

