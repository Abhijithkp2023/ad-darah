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

		// Video Form Section
		get_template_part('template-parts/VideoForm');
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();

