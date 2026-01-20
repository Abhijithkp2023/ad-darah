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
			get_template_part('template-parts/GalleryGrid');
			?>
		</section>
	</div>
</main><!-- #main -->

<?php
get_footer();

