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
		set_query_var('banner_title', 'Press Releases');
		set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/news-banner.jpg');
		get_template_part('template-parts/Banner');
		?>

		<?php
		// News Tabs Section
		set_query_var('active_tab', 'gallery');
		get_template_part('template-parts/NewsTabs');
		?>


		<?php
		// Gallery Grid Section
		set_query_var('landing_gallery_heading', 'Photo Gallery');
		set_query_var('landing_gallery_button_text', 'View All');
		set_query_var('landing_gallery_section_classes', 'landing-gallery-section no-bg');
		set_query_var('landing_gallery_button_link', get_permalink(get_page_by_path('gallery')));
		// Page-specific media for LandingGallery
		set_query_var('landing_gallery_top_left', get_template_directory_uri() . '/assets/images/gallery-01.jpg');
		set_query_var('landing_gallery_top_left_alt', 'Gallery Top Left');
		set_query_var('landing_gallery_top_right', get_template_directory_uri() . '/assets/images/gallery-04.jpg');
		set_query_var('landing_gallery_top_right_alt', 'Gallery Top Right');
		set_query_var('landing_gallery_bottom_left', get_template_directory_uri() . '/assets/images/gallery-02.jpg');
		set_query_var('landing_gallery_bottom_left_alt', 'Gallery Bottom Left');
		set_query_var('landing_gallery_bottom_right', get_template_directory_uri() . '/assets/images/gallery-05.jpg');
		set_query_var('landing_gallery_bottom_right_alt', 'Gallery Bottom Right');
		set_query_var('landing_gallery_video_src', get_template_directory_uri() . '/assets/images/gallery-03.jpg');
		
		// Second gallery grid images
		set_query_var('landing_gallery_second_left', get_template_directory_uri() . '/assets/images/gal_left.png');
		set_query_var('landing_gallery_second_left_alt', 'Gallery Second Left');
		set_query_var('landing_gallery_second_center_top', get_template_directory_uri() . '/assets/images/gal_center_top.png');
		set_query_var('landing_gallery_second_center_top_alt', 'Gallery Second Center Top');
		set_query_var('landing_gallery_second_center_bottom', get_template_directory_uri() . '/assets/images/gal_center_bottom.png');
		set_query_var('landing_gallery_second_center_bottom_alt', 'Gallery Second Center Bottom');
		set_query_var('landing_gallery_second_right', get_template_directory_uri() . '/assets/images/gal_right.png');
		set_query_var('landing_gallery_second_right_alt', 'Gallery Second Right');
		
		get_template_part('template-parts/LandingGallery');
		?>

		<?php
		// Full Video Section
		$full_video_thumbnail = get_template_directory_uri() . '/assets/images/g_video_thumb.jpg';
		$full_video_url = get_template_directory_uri() . '/assets/videos/g_video.mp4';

		include locate_template('template-parts/FullVideoSection.php');
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();
?>

<!-- Direct script load for Full Video Section (fallback) -->
<script>
	// Also load FullVideoSection.js directly
	(function () {
		console.log("Loading FullVideoSection.js directly from template...");
		var script = document.createElement('script');
		script.src = '<?php echo get_template_directory_uri(); ?>/assets/js/FullVideoSection.js?v=<?php echo _S_VERSION; ?>';
		script.onload = function () {
			console.log("FullVideoSection.js loaded successfully!");
		};
		script.onerror = function () {
			console.error("Failed to load FullVideoSection.js from:", script.src);
		};
		document.head.appendChild(script);
	})();
</script>