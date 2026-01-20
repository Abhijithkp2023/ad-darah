<?php
/**
 * Template Name: Gallery
 * The gallery template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		<?php
		// Banner Section
		set_query_var('banner_title', 'Gallery');
		set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/news-banner.jpg');
		get_template_part('template-parts/Banner');
		?>

		<?php
		// News Tabs Section
		set_query_var('active_tab', 'gallery');
		get_template_part('template-parts/NewsTabs');
		?>

		<section class="gallery-page-content pt_120 pb_80">
			<?php
			// Gallery Grid Section
			$gallery_items = array(
				array(
					'image' => get_template_directory_uri() . '/assets/images/gallery-01.jpg',
					'title' => 'Elegant Meeting Room',
					'link' => '#'
				),
				array(
					'image' => get_template_directory_uri() . '/assets/images/gallery-02.jpg',
					'title' => 'Grand Exterior Architecture',
					'link' => '#'
				),
				array(
					'image' => get_template_directory_uri() . '/assets/images/gallery-03.jpg',
					'title' => 'Professional Table Setting',
					'link' => '#'
				),
				array(
					'image' => get_template_directory_uri() . '/assets/images/gallery-04.jpg',
					'title' => 'Golden Architectural Details',
					'link' => '#'
				),
				array(
					'image' => get_template_directory_uri() . '/assets/images/gallery-05.jpg',
					'title' => 'Traditional Dining Experience',
					'link' => '#'
				),
				array(
					'image' => get_template_directory_uri() . '/assets/images/gallery-06.jpg',
					'title' => 'Business Presentation',
					'link' => '#'
				),
				array(
					'image' => get_template_directory_uri() . '/assets/images/gallery-07.jpg',
					'title' => 'Modern Conference Room',
					'link' => '#'
				),
				array(
					'image' => get_template_directory_uri() . '/assets/images/gallery-08.jpg',
					'title' => 'Luxurious Event Setup',
					'link' => '#'
				),
				array(
					'image' => get_template_directory_uri() . '/assets/images/gallery-09.jpg',
					'title' => 'Culinary Presentation',
					'link' => '#'
				)
			);
			set_query_var('gallery_items', $gallery_items);
			get_template_part('template-parts/GalleryGrid');
			?>
		</section>
	</div>
</main><!-- #main -->

<?php
get_footer();

